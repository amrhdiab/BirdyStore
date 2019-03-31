<script>

    $(document).ready(function () {

        //Define Total variable
        var total = $('.total_ajax').data('total');
        //Define total count of items
        var count = '{{Cart::count()}}';
        //define number of products
        var numberOfItems = '{{Cart::content()->count()}}';

        //Money formatting function
        function formatToMoney(amount) {
            return '$' + (amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }

        //Handle adding to cart
        $('.add_to_cart_form').on('submit', function (event) {
            event.preventDefault();
            var id = $(this).find('input[name="product_id"]').val();
            var qty = $(this).find('input[name="product_qty"]').val();
            var price = $(this).find('input[name="product_price"]').val();
            var totalResult = qty * price;
            $.ajax({
                url: '{{route('cart.add')}}',
                type: 'POST',
                data: {
                    id: id,
                    qty: qty
                },
                success: function (data) {
                    if (data.success == false) {
                        toastr.error(data.error, 'Error', {timeOut: 3500, positionClass: "toast-bottom-right"});
                    } else {
                        //$('#form_output').html('');
                        toastr.success('Product was added to cart.', 'Success!', {
                            timeOut: 3500,
                            positionClass: "toast-bottom-right"
                        });

                        //Update the navbar values
                        count = +count;
                        count += +qty;
                        $('#navbar_total_count').html(count);
                        //check if the product already is in cart
                        if(data.exist == 0){
                            numberOfItems++;
                            $('#navbar_items_number').html(numberOfItems);
                            $('#navbar_items_number2').attr('data-count', numberOfItems);
                        }
                        $('.total_ajax').html(formatToMoney(total + totalResult));
                        total = total + totalResult;
                    }
                }
            });
        });

        //Handle Item Remove
        $('.cart_remove_button').on('click', function () {
            var id = $(this).data('product_id');
            var product = $(this).data('product');
            var itemPrice = $('#' + id).data('price');
            var itemQtty = $('.' + id).val();
            $.ajax({
                url: '{{route('cart.remove')}}',
                type: 'DELETE',
                data: {
                    id: id
                },
                success: function (data) {
                    if (data != 'success') {
                        toastr.error(data.error, 'Error', {timeOut: 3500, positionClass: "toast-bottom-right"});
                    } else {
                        $('.cart_item_' + product).remove();
                        toastr.success('Product removed from the cart.', 'Success!', {
                            timeOut: 3500,
                            positionClass: "toast-bottom-right"
                        });

                        //check if there are still items in cart
                        if (!$(".cart_item")[0]) {
                            $("#cart_update_button").remove();
                            $(".cart-collaterals").remove();
                            $("tbody").html('<tr><td colspan="6" style="text-align: center"><h5 class="text-danger">No Items found in your cart.</h5></td></tr>');
                        }

                        //update the total cart price
                        var itemQttyPrice = itemPrice * itemQtty;
                        total = (total - itemQttyPrice);
                        $('.total_ajax').html(formatToMoney(total));

                        //Update the navbar values
                        count -= itemQtty;
                        $('#navbar_total_count').html(count);
                        numberOfItems--;
                        $('#navbar_items_number').html(numberOfItems);
                        $('#navbar_items_number2').attr('data-count', numberOfItems);
                    }
                }
            });
        });

        //Handle Updating Cart
        $('#update_cart_form').on('submit', function (event) {
            event.preventDefault();
            //var qty = $(this).find('input[name="qty"]').val();
            var items = [];
            count = 0;
            $('.qty_inputs').each(function () {
                items.push([$(this).val(), $(this).data('rowid')]);
                count += +$(this).val();
                numberOfItems++;
            });
            $.ajax({
                url: '{{route('cart.update')}}',
                type: 'POST',
                data: {'items': items},
                success: function (data) {
                    total = null;
                    items.forEach(function (item) {
                        var itemPrice = $('#' + item[1]).data('price');
                        var itemQttyPrice = itemPrice * item[0];
                        total += itemQttyPrice;
                        $('#' + item[1]).html(formatToMoney(itemQttyPrice));
                    });
                    $('.total_ajax').html(formatToMoney(total));
                    toastr.success(data, 'Success!', {
                        timeOut: 3500,
                        positionClass: "toast-bottom-right"
                    });
                    //update navbar cart count
                    $('#navbar_total_count').html(count);
                }
            });
        });
    });

</script>