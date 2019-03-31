@section('vendors')
    <!-- Datatables -->
    <script src="{{asset('vendors/datatables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/DataTables-1.10.18/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/Responsive-2.2.2/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/Responsive-2.2.2/js/responsive.bootstrap.min.js')}}"></script>
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
            $('#categories_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                responsive: true,
                "ajax": "{{route('categories.fetch')}}",
                "columns": [
                    {"data": "checkboxes", orderable: false, searchable: false},
                    {"data": "featured_image", orderable: false, searchable: false},
                    {"data": "name"},
                    {"data": "created_at", orderable: false, searchable: false},
                    {"data": "actions", orderable: false, searchable: false}
                ],
                order: [[3, 'desc']]
            });

            $('#add_data').on('click', function () {
                $('#cat_modal').modal('show');
                $('#cat_form')[0].reset();
                $('#form_output').html('');
                $('.modal-title').text('Add New Category');
                $('#form_action').val('insert');
                $('#submit').val('Submit');
            });

            $('#cat_form').on('submit', function (event) {
                event.preventDefault();
                var action = $('#form_action').val();
                var form_data = new FormData($('#cat_form')[0]);
                $.ajax({
                    url: '{{route('categories.store')}}',
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
                            $('#cat_form')[0].reset();
                            $('.modal-title').text('Add New Category');
                            $('#form_action').val('insert');
                            $('#submit').val('Submit');
                            $('#cat_modal').modal('hide');
                            $('#categories_table').DataTable().ajax.reload();
                            if (action == 'insert') {
                                toastr.success('Created category successfully.', 'Success!', {timeOut: 1500});
                            }
                            if (action == 'update') {
                                toastr.success('Updated category successfully.', 'Success!', {timeOut: 1500});
                            }
                        }
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $('#form_output').html('');
                $.ajax({
                    url: '{{route('categories.fetch.single')}}',
                    type: 'GET',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        $('#name').val(data.name);
                        $('#cat_id').val(id);
                        $('#form_action').val('update');
                        $('.modal-title').text('Edit Category');
                        $('#submit').val('Update');
                        $('#cat_modal').modal('show');
                    }
                });
            });

            $(document).on('click', '.delete', function () {
                var id = $(this).attr('id');
                if (confirm('Are you sure you want to delete the category?')) {
                    $.ajax({
                        url: '{{route('categories.remove')}}',
                        type: 'DELETE',
                        data: {id: id},
                        success: function (data) {
                            toastr.success('Deleted category successfully.', 'Success!', {timeOut: 1500})
                            $('#categories_table').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            });

            $(document).on('click', '#bulk_delete', function () {
                var id = [];
                $('.cat_checkbox:checked').each(function () {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    if (confirm('Are you sure you want to delete selected data?')) {

                        $.ajax({
                            url: '{{route('categories.remove.bulk')}}',
                            type: 'DELETE',
                            data: {id: id},
                            success: function (data) {
                                toastr.success('Deleted data successfully.', 'Success!', {timeOut: 1500})
                                $('#categories_table').DataTable().ajax.reload();
                            }
                        });
                    } else {
                        return false;
                    }
                } else {
                    alert('Please select data to delete.');
                }
            });

            $(document).on('click', '.view', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '{{route('categories.view')}}',
                    data: {id: id},
                    type: 'GET',
                    success: function (data) {
                        $('#cat_view_modal').modal('show');
                        $('.modal-title').text('View Category');
                        $('#featured_image_container').html('<img src="{{asset('/storage/categories')}}/' + data.featured_image + '" style="width: 400px; height: 264px; display:block; margin:auto">');
                        $('#info').html(data.info);
                    }
                });
            });

        });
    </script>
@endsection