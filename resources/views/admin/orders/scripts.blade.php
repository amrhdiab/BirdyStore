@section('vendors')
    <!-- Datatables -->
    <script src="{{asset('vendors/datatables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/DataTables-1.10.18/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/Responsive-2.2.2/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/Responsive-2.2.2/js/responsive.bootstrap.min.js')}}"></script>
    <!-- Toastr Notifications -->
    <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
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
            $('#orders_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                responsive: true,
                "ajax": "{{route('orders.fetch')}}",
                "columns": [
                    {"data": "checkboxes", orderable: false, searchable: false},
                    {"data": "first_name"},
                    {"data": "last_name"},
                    {"data": "user_name"},
                    {"data": "products_count", orderable: false, searchable: false},
                    {"data": "quantity_total", orderable: false, searchable: false},
                    {"data": "total_price", orderable: false, searchable: false, render: $.fn.dataTable.render.number(',', '', '', '$')},
                    {"data": "current_status", searchable: false},
                    {"data": "created_at", searchable: false},
                    {"data": "actions", orderable: false, searchable: false}
                ],
                order: [[8, 'desc']]
            });

            //Submitting the Add & the Edit forms
            $('#order_form').on('submit', function (event) {
                event.preventDefault();
                var form_data = new FormData($('#order_form')[0]);
                $.ajax({
                    url: '{{route('orders.store')}}',
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
                            $('#order_modal').modal('hide');
                            $('#orders_table').DataTable().ajax.reload();
                            toastr.success('Updated order status successfully.', 'Success!', {timeOut: 2000});
                        }
                    }
                });
            });

            //Handling a click on the Edit button
            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $('#form_output').html('');
                $.ajax({
                    url: '{{route('selectStatus')}}',
                    type: 'GET',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        $('#status').html(data);
                        $('#order_id').val(id);
                        $('#order_modal').modal('show');
                    }
                });
            });

            //Handling the click on the delete button, and performing delete request
            $(document).on('click', '.delete', function () {
                var id = $(this).attr('id');
                if (confirm('Are you sure you want to delete the product?')) {
                    $.ajax({
                        url: '{{route('orders.remove')}}',
                        type: 'DELETE',
                        data: {id: id},
                        success: function (data) {
                            toastr.success('Deleted order successfully.', 'Success!', {timeOut: 2000});
                            $('#orders_table').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            });

            //Handling the click on the Bulk delete button, and performing bulk delete request
            $(document).on('click', '#bulk_delete', function () {
                var id = [];
                $('.order_checkbox:checked').each(function () {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    if (confirm('Are you sure you want to delete selected data?')) {

                        $.ajax({
                            url: '{{route('orders.remove.bulk')}}',
                            type: 'DELETE',
                            data: {id: id},
                            success: function (data) {
                                toastr.success('Deleted data successfully.', 'Success!', {timeOut: 2000});
                                $('#orders_table').DataTable().ajax.reload();
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
                    url: '{{route('orders.view')}}',
                    data: {id: id},
                    type: 'GET',
                    success: function (data) {
                        $('#order_view_modal').modal('show');
                        $('#f_name').html(data.order.first_name);
                        $('#l_name').html(data.order.last_name);
                        $('#email').html(data.order.email);
                        $('#address').html(data.order.address);
                        $('#country').html(data.order.country);
                        $('#city').html(data.order.city);
                        $('#postal').html(data.order.postal);
                        $('#view_status').html(data.order.status);
                        $('#notes').html(data.order.notes);
                        $('#product_table_body').html(data.order_products);
                        $('#total').html('$'+data.order.total_price.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
                    }
                });
            });

        });
    </script>
@endsection