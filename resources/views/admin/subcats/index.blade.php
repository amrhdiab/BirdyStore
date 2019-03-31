@extends('admin.layouts.app')
@section('title','Sub Categories')
@section('styles')
    <link href="{{asset('vendors/datatables/DataTables-1.10.18/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables/Responsive-2.2.2/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Sub Categories</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4>Products Sub Categories</h4>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <button type="button" name="add_data" id="add_data" class="btn btn-success btn-sm pull-right">Add
                                New
                            </button>
                            <button type="button" name="bulk_delete" id="bulk_delete"
                                    class="btn btn-danger btn-sm">
                                <i class="glyphicon glyphicon-remove"></i> Bulk Delete
                            </button>
                            <table id="subcategories_table"
                                   class="table table-bordered table-hover table-striped responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Featured Image</th>
                                    <th>Name</th>
                                    <th>Parent Category</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                            </table>
                            {{--Store & Update modal--}}
                            <div class="modal fade" role="dialog" id="subcat_modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post" id="subcat_form" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add New Sub Category</h4>
                                            </div>
                                            <div class="modal-body">
                                                <span id="form_output" class="toastr"></span>
                                                <div class="form-group">
                                                    <label for="name">Sub Category name:</label>
                                                    <input type="text" name="name" id="name" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="main category">Main Category:</label>
                                                    <select class="form-control" id="main_category" name="category_id" required></select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Featured Image:</label>
                                                    <input type="file" name="featured_image" id="featured_image">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="form_action" id="form_action" value="insert">
                                                <input type="hidden" name="subcat_id" id="subcat_id" value="">
                                                <input type="submit" name="submit" id="submit" value="Submit"
                                                       class="btn btn-success">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{--View Modal--}}
                            <div class="modal fade" role="dialog" id="subcat_view_modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">View Sub Category</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div id="featured_image_container"></div>
                                            <ul id="info" class="list-group list-group-flush"
                                                style="padding: 10px;"></ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('admin.subcats.scripts')