@extends('admin.layouts.app')
@section('title','Orders')
@section('styles')
    <!-- DataTables -->
    <link href="{{asset('vendors/datatables/DataTables-1.10.18/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables/Responsive-2.2.2/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <style>
        #centered_table td {
            text-align: center;
        }

        #centered_table th {
            text-align: center;
        }

        #order_products td{
            text-align: center;
            vertical-align: middle;
        }

        #order_products th{
            text-align: center;
            vertical-align: middle;
        }
    </style>
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Orders</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4>Orders</h4>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <button type="button" name="bulk_delete" id="bulk_delete"
                                    class="btn btn-danger btn-sm">
                                <i class="glyphicon glyphicon-remove"></i> Bulk Delete
                            </button>
                            <table id="orders_table"
                                   class="table table-bordered table-hover table-striped responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>#Products</th>
                                    <th>Total Qnt</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                            </table>

                            {{-- Update modal --}}
                            <div class="modal fade" role="dialog" id="order_modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post" id="order_form">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Change Order Status</h4>
                                            </div>
                                            <div class="modal-body">
                                                <span id="form_output" class="toastr"></span>

                                                <div class="form-group">
                                                    <label for="status" class="control-label">Order Status</label>
                                                    <select class="form-control" id="status"
                                                            name="status">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <input type="hidden" name="order_id" id="order_id" value="">
                                                <input type="submit" name="submit" id="submit" value="Update" class="btn btn-success">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{--/ Update modal --}}

                            {{--View Modal--}}
                            <div class="modal fade" role="dialog" id="order_view_modal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">View Order</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="text-primary">Delivery Info:</h5><br>
                                            {{-- Delivery Info --}}
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th>First Name:</th>
                                                    <td id="f_name"></td>
                                                    <th>Last Name:</th>
                                                    <td id="l_name"></td>
                                                    <th>Email:</th>
                                                    <td id="email"></td>
                                                </tr>
                                                <tr>
                                                    <th>Address:</th>
                                                    <td id="address"></td>
                                                    <th>Country:</th>
                                                    <td id="country"></td>
                                                    <th>City:</th>
                                                    <td id="city"></td>
                                                </tr>
                                                <tr>
                                                    <th>Postal:</th>
                                                    <td id="postal"></td>
                                                    <th>Status:</th>
                                                    <td id="view_status"></td>
                                                    <th>Notes:</th>
                                                    <td id="notes"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            {{--/ Delivery Info --}}

                                            <hr><h5 class="text-primary">Order Products Info:</h5><br>

                                            {{-- Order Products Info --}}
                                            <table class="table table-responsive table-hover table-striped" id="order_products">
                                                <thead>
                                                <tr>
                                                    <th>#Product</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price/piece</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody id="product_table_body"></tbody>
                                                <tfoot>
                                                <tr>
                                                    <th style="text-align:right;" colspan="6">Total :</th>
                                                    <td id="total"></td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            {{--/ Order Products Info --}}
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
@include('admin.orders.scripts')