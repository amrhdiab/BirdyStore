@section('vendors')
    <!-- Datatables -->
    <script src="{{asset('vendors/datatables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/DataTables-1.10.18/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/Responsive-2.2.2/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/Responsive-2.2.2/js/responsive.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
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
            $('#brands_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                responsive: true,
                "ajax": "{{route('brands.fetch')}}",
                "columns": [
                    {"data": "checkboxes", orderable: false, searchable: false},
                    {"data": "avatar", orderable: false, searchable: false},
                    {"data": "name"},
                    {"data": "sub_cat_count"},
                    {"data": "created_at", searchable: false},
                    {"data": "actions", orderable: false, searchable: false}
                ],
                order: [[4, 'desc']]
            });

            $('#multi_select').multiselect({
                enableFiltering: true,
                maxHeight: 200,
                enableCaseInsensitiveFiltering: true
            });

            $('#add_data').on('click', function () {
                $.ajax({
                    url: '{{route('categoriesSelect')}}',
                    type: 'GET',
                    success: function (data) {
                        $('#brand_modal').modal('show');
                        $('#brand_form')[0].reset();
                        $('#form_output').html('');
                        $('.modal-title').text('Add New Brand');
                        $('#multi_select').html(data).multiselect('rebuild');
                        $('#form_action').val('insert');
                        $('#submit').val('Submit');
                    }
                });

            });

            $('#brand_form').on('submit', function (event) {
                event.preventDefault();
                var action = $('#form_action').val();
                var form_data = new FormData($('#brand_form')[0]);
                $.ajax({
                    url: '{{route('brands.store')}}',
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
                            $('#brand_form')[0].reset();
                            $('.modal-title').text('Add New Brand');
                            $('#form_action').val('insert');
                            $('#submit').val('Submit');
                            $('#brand_modal').modal('hide');
                            $('#brands_table').DataTable().ajax.reload();
                            if (action == 'insert') {
                                toastr.success('Created brand successfully.', 'Success!', {timeOut: 1500});
                            }
                            if (action == 'update') {
                                toastr.success('Updated brand successfully.', 'Success!', {timeOut: 1500});
                            }
                        }
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $('#form_output').html('');
                $.ajax({
                    url: '{{route('brands.fetch.single')}}',
                    type: 'GET',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('#name').val(data.info.name);
                        $('#description').val(data.info.description);
                        $('#multi_select').html(data.categories).multiselect('rebuild');
                        $('#brand_id').val(id);
                        $('#form_action').val('update');
                        $('.modal-title').text('Edit Brand');
                        $('#submit').val('Update');
                        $('#brand_modal').modal('show');
                    }
                });
            });

            $(document).on('click', '.delete', function () {
                var id = $(this).attr('id');
                if (confirm('Are you sure you want to delete the brand?')) {
                    $.ajax({
                        url: '{{route('brands.remove')}}',
                        type: 'DELETE',
                        data: {id: id},
                        success: function (data) {
                            toastr.success('Deleted brand successfully.', 'Success!', {timeOut: 1500})
                            $('#brands_table').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            });

            $(document).on('click', '#bulk_delete', function () {
                var id = [];
                $('.brand_checkbox:checked').each(function () {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    if (confirm('Are you sure you want to delete selected data?')) {

                        $.ajax({
                            url: '{{route('brands.remove.bulk')}}',
                            type: 'DELETE',
                            data: {id: id},
                            success: function (data) {
                                console.log(data);
                                toastr.success('Deleted data successfully.', 'Success!', {timeOut: 1500});
                                $('#brands_table').DataTable().ajax.reload();
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
                    url: '{{route('brands.view')}}',
                    data: {id: id},
                    type: 'GET',
                    success: function (data) {
                        console.log(data);
                        $('#brand_view_modal').modal('show');
                        $('.modal-title').text('View Brand');
                        $('#avatar_container').html('<img src="{{asset('/storage/brands')}}/' + data.avatar + '" style="width: 400px; height: 264px; display:block; margin:auto">');
                        $('#info').html(data.info);
                    }
                });
            });

        });
    </script>
@endsection