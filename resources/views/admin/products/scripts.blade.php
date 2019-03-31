@section('vendors')
    <!-- Datatables -->
    <script src="{{asset('vendors/datatables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/DataTables-1.10.18/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/Responsive-2.2.2/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/Responsive-2.2.2/js/responsive.bootstrap.min.js')}}"></script>
    <!-- bootstrap-multiselect -->
    <script src="{{asset('vendors/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
    <!-- Switchery Checkboxes -->
    <script src="{{asset('vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- Toastr Notifications -->
    <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
    <!-- CK-Editor -->
    <script src="{{asset('vendors/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
@endsection

@section('scripts')
    {{--Setup ajax--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            //Init DataTables
            $('#products_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                responsive: true,
                "ajax": "{{route('products.fetch')}}",
                "columns": [
                    {"data": "checkboxes", orderable: false, searchable: false},
                    {"data": "featured_image", orderable: false, searchable: false},
                    {
                        "data": "name", render: function (data, type, row) {
                        return data.length > 20 ? data.substr(0, 20) + '…' : data;
                    }
                    },
                    {"data": "price", render: $.fn.dataTable.render.number(',', '', '', '$')},
                    {"data": "stock", searchable: false},
                    {"data": "sales", searchable: false},
                    {"data": "is_featured", searchable: false},
                    {"data": "has_offer", searchable: false},
                    {"data": "discount", searchable: false},
                    {"data": "created_at", searchable: false},
                    {"data": "actions", orderable: false, searchable: false}
                ],
                order: [[9, 'desc']]
            });

            //Initializing the multiSelect dropDown
            $('#multi_select').multiselect({
                enableFiltering: true,
                maxHeight: 200,
                buttonWidth: '407px',
                enableCaseInsensitiveFiltering: true
            });

            //Initialize Switchery
            var offerSwitch = document.querySelector('#offer_switch');
            var featuredSwitch = document.querySelector('#featured_switch');
            function initSwitchery($switch,$status) {
                var switchery = new Switchery($switch,{color: '#26B99A',
                    size: 'small'});
                switchery.element.checked = $status;
                switchery.setPosition();
            }

            //Show and hide discount field based on the offer switch status
            offerSwitch.onchange = function() {
                if(offerSwitch.checked == true){
                    $('#discount_field').removeClass('hidden');
                }else{
                    $('#discount_field').addClass('hidden');
                }
            };

            //Handling a click on add new data
            $('#add_data').on('click', function () {
                $('#discount_field').addClass('hidden');
                $.ajax({
                    url: '{{route('products.dataSelect')}}',
                    type: 'GET',
                    success: function (data) {
                        $('#product_modal').modal('show');
                        $('#product_form')[0].reset();
                        $('#form_output').html('');
                        $('.modal-title').text('Add New Product');
                        $('#category').html(data.allCategories);
                        $('#brand').html(data.allBrands);
                        $('#multi_select').html(data.allStores).multiselect('rebuild');
                        $('.the_checkbox').siblings().remove();
                        initSwitchery(offerSwitch,false);
                        initSwitchery(featuredSwitch,false);
                        $('#form_action').val('insert');
                        $('#submit').val('Submit');
                    }
                });

            });

            //Submitting the Add & the Edit forms
            $('#product_form').on('submit', function (event) {
                event.preventDefault();
                var action = $('#form_action').val();
                var form_data = new FormData($('#product_form')[0]);
                $.ajax({
                    url: '{{route('products.store')}}',
                    type: 'POST',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.error.length > 0) {
                            var error_html = '';
                            data.error.forEach(function (error) {
                                error_html += "<div class='alert alert-danger'>" + error + "</div>";
                            });
                            $('#form_output').html(error_html);
                            toastr.error('Validation error', 'Error!', {timeOut: 1500});
                        } else {
                            $('#form_output').html('');
                            $('#product_form')[0].reset();
                            $('.modal-title').text('Add New Product');
                            $('#form_action').val('insert');
                            $('#submit').val('Submit');
                            $('#product_modal').modal('hide');
                            $('#products_table').DataTable().ajax.reload();
                            if (action == 'insert') {
                                toastr.success('Created product successfully.', 'Success!', {timeOut: 1500});
                            }
                            if (action == 'update') {
                                toastr.success('Updated product successfully.', 'Success!', {timeOut: 1500});
                            }
                        }
                    }
                });
            });

            //Handling a clock on the Edit button
            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $('#form_output').html('');
                $.ajax({
                    url: '{{route('products.fetch.single')}}',
                    type: 'GET',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        $('.the_checkbox').siblings().remove();
                        $('#name').val(data.info.name);
                        $('#price').val(data.info.price);
                        $('#stock').val(data.info.stock);
                        $('#sales').val(data.info.sales);
                        $('#category').html(data.category);
                        $('#brand').html(data.brand);
                        if (data.info.is_featured == 1) {
                            initSwitchery(featuredSwitch,true);
                        }else{
                            initSwitchery(featuredSwitch,false);
                        }
                        if (data.info.has_offer == 1) {
                            initSwitchery(offerSwitch,true);
                            $('#discount_field').removeClass('hidden');
                        }else{
                            initSwitchery(offerSwitch,false);
                            $('#discount_field').addClass('hidden');
                        }
                        $('#discount').val(data.info.discount);
                        $('#description').val(data.info.description);
                        $('#multi_select').html(data.stores).multiselect('rebuild');
                        $('#product_id').val(id);
                        $('#form_action').val('update');
                        $('.modal-title').text('Edit Product');
                        $('#submit').val('Update');
                        $('#product_modal').modal('show');
                    }
                });
            });

            //Handling the click on the delete button, and performing delete request
            $(document).on('click', '.delete', function () {
                var id = $(this).attr('id');
                if (confirm('Are you sure you want to delete the product?')) {
                    $.ajax({
                        url: '{{route('products.remove')}}',
                        type: 'DELETE',
                        data: {id: id},
                        success: function (data) {
                            toastr.success('Deleted product successfully.', 'Success!', {timeOut: 1500});
                            $('#products_table').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            });

            //Handling the click on the Bulk delete button, and performing bulk delete request
            $(document).on('click', '#bulk_delete', function () {
                var id = [];
                $('.product_checkbox:checked').each(function () {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    if (confirm('Are you sure you want to delete selected data?')) {

                        $.ajax({
                            url: '{{route('products.remove.bulk')}}',
                            type: 'DELETE',
                            data: {id: id},
                            success: function (data) {
                                toastr.success('Deleted data successfully.', 'Success!', {timeOut: 1500})
                                $('#products_table').DataTable().ajax.reload();
                            }
                        });
                    } else {
                        return false;
                    }
                } else {
                    alert('Please select data to delete.');
                }
            });

            //Handling a click on the view button, and fetching data for the view modal
            $(document).on('click', '.view', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '{{route('products.view')}}',
                    data: {id: id},
                    type: 'GET',
                    success: function (data) {
                        $('#product_view_modal').modal('show');
                        $('.modal-title').text('View Product');
                        $('#avatar_container').html('<img src="{{asset('/storage/products')}}/' + data.featured_image + '" style="width: 400px; height: 264px; display:block; margin:auto">');
                        $('#info').html(data.info);
                        $('#images_container').html(data.images);
                    }
                });
            });

        });
    </script>
@endsection