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
            $('#reviews_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                responsive: true,
                "ajax": "{{route('reviews.fetch')}}",
                "columns": [
                    {"data": "checkboxes", orderable: false, searchable: false},
                    {"data": "user_name"},
                    {"data": "comment", orderable: false, searchable: false,
                        render: function (data, type, row) {
                            return data.length > 20 ? data.substr(0, 20) + '…' : data;
                        }
                    },
                    {"data": "product",
                        render: function (data, type, row) {
                            return data.length > 20 ? data.substr(0, 20) + '…' : data;
                        }
                    },
                    {"data": "status", searchable: false},
                    {"data": "created_at", searchable: false},
                    {"data": "actions", orderable: false, searchable: false},
                ],
                order: [[5, 'desc']]
            });

            //Handling a clock on the Edit button
            $(document).on('click', '.edit', function () {
                var element = $(this);
                var id = $(this).attr('id');
                var current_status = $(this).data('status');
                $.ajax({
                    url: '{{route('reviews.store')}}',
                    type: 'POST',
                    data: {
                        id: id,
                        current_status : current_status
                    },
                    dataType: 'json',
                    success: function (data) {
                        if(data.status == 1){
                            $('span#'+id).attr('class', 'label label-success');
                            $('span#'+id).text('Published');
                            element.data('status',1);
                        }else{
                            $('span#'+id).attr('class', 'label label-warning');
                            $('span#'+id).text('Waiting');
                            element.data('status',0);
                        }
                    }
                });
            });

            //Handling the click on the delete button, and performing delete request
            $(document).on('click', '.delete', function () {
                var id = $(this).attr('id');
                if (confirm('Are you sure you want to delete the review?')) {
                    $.ajax({
                        url: '{{route('reviews.remove')}}',
                        type: 'DELETE',
                        data: {id: id},
                        success: function (data) {
                            toastr.success('Deleted review successfully.', 'Success!', {timeOut: 2000});
                            $('#reviews_table').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            });

            //Handling the click on the Bulk delete button, and performing bulk delete request
            $(document).on('click', '#bulk_delete', function () {
                var id = [];
                $('.review_checkbox:checked').each(function () {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    if (confirm('Are you sure you want to delete selected data?')) {

                        $.ajax({
                            url: '{{route('reviews.remove.bulk')}}',
                            type: 'DELETE',
                            data: {id: id},
                            success: function (data) {
                                toastr.success('Deleted data successfully.', 'Success!', {timeOut: 2000});
                                $('#reviews_table').DataTable().ajax.reload();
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
                    url: '{{route('reviews.view')}}',
                    data: {id: id},
                    type: 'GET',
                    success: function (data) {
                        $('#review_view_modal').modal('show');
                        $('ul#info').html(data.info);
                    }
                });
            });

        });
    </script>
@endsection