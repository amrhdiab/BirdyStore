@extends('admin.layouts.app')
@section('title','Stores')
@section('styles')
    <link href="{{asset('vendors/datatables/DataTables-1.10.18/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables/Responsive-2.2.2/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/bootstrap-multiselect/bootstrap-multiselect.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Stores</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4>Stores</h4>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <button type="button" name="add_data" id="add_data"
                                    class="btn btn-success btn-sm pull-right">Add
                                New
                            </button>
                            <button type="button" name="bulk_delete" id="bulk_delete"
                                    class="btn btn-danger btn-sm">
                                <i class="glyphicon glyphicon-remove"></i> Bulk Delete
                            </button>
                            <table id="stores_table"
                                   class="table table-bordered table-hover table-striped responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Categories Count</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                            </table>
                            {{--Store & Update modal--}}
                            <div class="modal fade" role="dialog" id="store_modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post" id="store_form" enctype="multipart/form-data"
                                              class="form-horizontal form-label-left input_mask">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add New Store</h4>
                                            </div>
                                            <div class="modal-body">
                                                <span id="form_output" class="toastr"></span>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <input type="text" class="form-control has-feedback-left"
                                                           name="name" id="name" placeholder="Store Name" required>
                                                    <span class="fa fa-user form-control-feedback left"
                                                          aria-hidden="true"></span>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <input type="url" class="form-control" name="website" id="website"
                                                           placeholder="Store Website" required>
                                                    <span class="fa fa-globe form-control-feedback right"
                                                          aria-hidden="true"></span>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <input type="email" class="form-control has-feedback-left"
                                                           name="contact_email" id="contact_email" placeholder="Email" required>
                                                    <span class="fa fa-envelope form-control-feedback left"
                                                          aria-hidden="true"></span>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <input type="tel" class="form-control" name="contact_number"
                                                           id="contact_number" placeholder="Phone" required>
                                                    <span class="fa fa-phone form-control-feedback right"
                                                          aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <input type="text" class="form-control has-feedback-left"
                                                           name="lat" id="lat" placeholder="Location Lat" required>
                                                    <span class="fa fa-map-marker form-control-feedback left"
                                                          aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <input type="text" class="form-control" name="lng" id="lng"
                                                           placeholder="Location Lng" required>
                                                    <span class="fa fa-map-marker form-control-feedback right"
                                                          aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <select class="form-control" id="governorate"
                                                            name="governorate" required>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <select class="form-control" id="city"
                                                            name="city" required>
                                                        <option value="">Select City..</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Address<span
                                                                class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" class="form-control" name="address"
                                                               id="address" placeholder="Address" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Working
                                                        Hours<span class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" class="form-control" name="working_hours"
                                                               id="working_hours" placeholder="Working Hours" required>
                                                    </div>
                                                </div>
                                                {{--Categories selection--}}
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Categories<span
                                                                class="required">*</span></label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <select class="form-control" multiple="multiple"
                                                                name="categories[]"
                                                                id="multi_select" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                {{--Brands selection--}}
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Brands<span
                                                                class="required">*</span></label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <select class="form-control" multiple="multiple"
                                                                name="brands[]"
                                                                id="multi_select_brands" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Avatar<span
                                                                class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="file" name="avatar" id="avatar"
                                                             style="margin-top: 7px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="form_action" id="form_action"
                                                       value="insert">
                                                <input type="hidden" name="store_id" id="store_id" value="">
                                                <input type="submit" name="submit" id="submit" value="Submit"
                                                       class="btn btn-success">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{--View Modal--}}
                            <div class="modal fade" role="dialog" id="store_view_modal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">View Store</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div id="avatar_container"></div>
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
@include('admin.stores.scripts')