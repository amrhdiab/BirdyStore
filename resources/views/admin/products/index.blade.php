@extends('admin.layouts.app')
@section('title','Products')
@section('styles')
    <!-- DataTables -->
    <link href="{{asset('vendors/datatables/DataTables-1.10.18/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables/Responsive-2.2.2/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap-multiselect -->
    <link href="{{asset('vendors/bootstrap-multiselect/bootstrap-multiselect.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{asset('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Products</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4>Products</h4>
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
                            <table id="products_table"
                                   class="table table-bordered table-hover table-striped responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Featured Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Sales</th>
                                    <th>Is Featured?</th>
                                    <th>Has Offer?</th>
                                    <th>Discount %</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                            </table>
                            {{--Store & Update modal--}}
                            <div class="modal fade" role="dialog" id="product_modal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form method="post" id="product_form" enctype="multipart/form-data"
                                              class="form-horizontal form-label-left input_mask">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add New Product</h4>
                                            </div>
                                            <div class="modal-body">
                                                <span id="form_output" class="toastr"></span>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="name" class="control-label">Name*</label>
                                                    <input type="text" class="form-control has-feedback-left"
                                                           name="name" id="name" placeholder="Product Name" required>
                                                    <span class="fa fa-shopping-basket form-control-feedback left"
                                                          aria-hidden="true"></span>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="price" class="control-label">Price*</label>
                                                    <input type="text" class="form-control" name="price" id="price"
                                                           placeholder="Product Price" required>
                                                    <span class="fa fa-money form-control-feedback right"
                                                          aria-hidden="true"></span>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="stock" class="control-label">Stock*</label>
                                                    <input type="text" class="form-control has-feedback-left"
                                                           name="stock" id="stock" placeholder="Stock Amount" required>
                                                    <span class="fa fa-cubes form-control-feedback left"
                                                          aria-hidden="true"></span>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="sales" class="control-label">Sales*</label>
                                                    <input type="text" class="form-control" name="sales"
                                                           id="sales" placeholder="Number Of Sales">
                                                    <span class="fa fa-bar-chart form-control-feedback right"
                                                          aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <label for="category" class="control-label">Category*</label>
                                                    <select class="form-control" id="category"
                                                            name="category" required>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <label for="brand" class="control-label">Brand*</label>
                                                    <select class="form-control" id="brand"
                                                            name="brand" required>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Options</label>
                                                    <div style="margin-top: 5px" class="col-md-3 col-sm-3 col-xs-12">
                                                        <input type="checkbox" id="featured_switch" class="the_checkbox"
                                                               name="is_featured"> Is Featured?
                                                    </div>
                                                    <div style="margin-top: 5px" class="col-md-3 col-sm-3 col-xs-12">
                                                        <input type="checkbox" id="offer_switch" class="the_checkbox"
                                                               name="has_offer"> Has Offer?
                                                    </div>
                                                    <div id="discount_field" class="col-md-3 col-sm-3 col-xs-12 hidden">
                                                        <label for="discount"
                                                               class="control-label col-md-4 col-sm-4 col-xs-12">Disc.%</label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text" class="form-control" name="discount"
                                                                   id="discount">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description
                                                        <span class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <textarea name="description" id="description" cols="30"
                                                                  rows="6" class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select
                                                        Stores
                                                        <span class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select class="form-control" multiple="multiple"
                                                                name="stores[]"
                                                                id="multi_select" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Featured
                                                        Image<span
                                                                class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="file" name="featured_image" id="featured_image"
                                                               style="margin-top: 7px">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Product
                                                        Images<span
                                                                class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="file" name="images[]" id="images"
                                                               style="margin-top: 7px" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="form_action" id="form_action"
                                                       value="insert">
                                                <input type="hidden" name="product_id" id="product_id" value="">
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
                            <div class="modal fade" role="dialog" id="product_view_modal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">View Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div id="avatar_container"></div>
                                            <ul id="info" class="list-group list-group-flush"
                                                style="padding: 10px;"></ul>
                                            <div class="x_title">
                                                <h4>Product Images:</h4>
                                            </div>
                                            <div id="images_container" class="row"></div>
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
@include('admin.products.scripts')