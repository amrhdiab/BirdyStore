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
            $('#stores_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                responsive: true,
                "ajax": "{{route('stores.fetch')}}",
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
                buttonWidth: '407px',
                enableCaseInsensitiveFiltering: true
            });
            $('#multi_select_brands').multiselect({
                enableFiltering: true,
                maxHeight: 200,
                buttonWidth: '407px',
                enableCaseInsensitiveFiltering: true
            });

            $('#add_data').on('click', function () {
                $.ajax({
                    url: '{{route('dataSelect')}}',
                    type: 'GET',
                    success: function (data) {
                        $('#store_modal').modal('show');
                        $('#store_form')[0].reset();
                        $('#form_output').html('');
                        $('.modal-title').text('Add New Store');
                        $('#city').html('<option value="">Select City..</option>');
                        $('#multi_select').html(data.allCategories).multiselect('rebuild');
                        $('#multi_select_brands').html(data.allBrands).multiselect('rebuild');
                        $('#governorate').html(data.allGovernorates);
                        $('#form_action').val('insert');
                        $('#submit').val('Submit');
                    }
                });

            });
            //Get the cities data based on the governorate selection
            $(document).on('change','#governorate',function () {
               var value = $(this).val();
                $.ajax({
                    url:'{{route('selectCity')}}',
                    type: 'GET',
                    data: {value:value},
                    success:function (data) {
                        console.log(data);
                        $('#city').html(data);
                    }
                });
            });

            $('#store_form').on('submit', function (event) {
                event.preventDefault();
                var action = $('#form_action').val();
                var form_data = new FormData($('#store_form')[0]);
                $.ajax({
                    url: '{{route('stores.store')}}',
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
                            $('#store_form')[0].reset();
                            $('.modal-title').text('Add New Store');
                            $('#form_action').val('insert');
                            $('#submit').val('Submit');
                            $('#store_modal').modal('hide');
                            $('#stores_table').DataTable().ajax.reload();
                            if (action == 'insert') {
                                toastr.success('Created store successfully.', 'Success!', {timeOut: 1500});
                            }
                            if (action == 'update') {
                                toastr.success('Updated store successfully.', 'Success!', {timeOut: 1500});
                            }
                        }
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $('#form_output').html('');
                $.ajax({
                    url: '{{route('stores.fetch.single')}}',
                    type: 'GET',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        $('#name').val(data.info.name);
                        $('#contact_email').val(data.info.contact_email);
                        $('#contact_number').val(data.info.contact_number);
                        $('#website').val(data.info.website);
                        $('#lat').val(data.info.lat);
                        $('#lng').val(data.info.lng);
                        $('#governorate').html(data.governorate);
                        $('#city').html(data.city);
                        $('#address').val(data.info.address);
                        $('#working_hours').val(data.info.working_hours);
                        $('#multi_select').html(data.categories).multiselect('rebuild');
                        $('#multi_select_brands').html(data.brands).multiselect('rebuild');
                        $('#store_id').val(id);
                        $('#form_action').val('update');
                        $('.modal-title').text('Edit Store');
                        $('#submit').val('Update');
                        $('#store_modal').modal('show');
                    }
                });
            });

            $(document).on('click', '.delete', function () {
                var id = $(this).attr('id');
                if (confirm('Are you sure you want to delete the store?')) {
                    $.ajax({
                        url: '{{route('stores.remove')}}',
                        type: 'DELETE',
                        data: {id: id},
                        success: function (data) {
                            toastr.success('Deleted store successfully.', 'Success!', {timeOut: 1500})
                            $('#stores_table').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            });

            $(document).on('click', '#bulk_delete', function () {
                var id = [];
                $('.store_checkbox:checked').each(function () {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    if (confirm('Are you sure you want to delete selected data?')) {

                        $.ajax({
                            url: '{{route('stores.remove.bulk')}}',
                            type: 'DELETE',
                            data: {id: id},
                            success: function (data) {
                                toastr.success('Deleted data successfully.', 'Success!', {timeOut: 1500})
                                $('#stores_table').DataTable().ajax.reload();
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
                    url: '{{route('stores.view')}}',
                    data: {id: id},
                    type: 'GET',
                    success: function (data) {
                        $('#store_view_modal').modal('show');
                        $('.modal-title').text('View Store');
                        $('#avatar_container').html('<img src="{{asset('/storage/stores')}}/' + data.avatar + '" style="width: 400px; height: 264px; display:block; margin:auto">');
                        $('#info').html(data.info);
                    }
                });
            });

        });
    </script>
@endsection