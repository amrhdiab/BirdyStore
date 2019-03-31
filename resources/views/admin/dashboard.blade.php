@extends('admin.layouts.app')
@section('title','Dashboard')
@section('styles')
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row top_tiles">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-user"></i></div>
                        <div class="count">{{$usersCount}}</div>
                        <h3>User Accounts</h3>
                        <p>Total number of website users.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-comments-o"></i></div>
                        <div class="count">{{$reviewsCount}}</div>
                        <h3>Product Reviews</h3>
                        <p>Total number of reviews made on all products.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-tags"></i></div>
                        <div class="count">{{$productsCount}}</div>
                        <h3>Products</h3>
                        <p>Total number of products.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-check-square-o"></i></div>
                        <div class="count">{{$ordersCount}}</div>
                        <h3>Orders</h3>
                        <p>Total number of orders.</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Latest Users
                                <small>Subscription</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @foreach($users as $user)
                                <article class="media event">
                                    <a class="pull-left border-aero" style="text-align: center">
                                        <img src="{{asset('storage/users/').'/'.$user->avatar}}" alt="{{$user->name}}"
                                             class="img-circle" width="40px" height="40px">
                                    </a>
                                    <div class="media-body">
                                        <a class="title">{{$user->name}}</a>
                                        <p>{{$user->email}}</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Best Selling Products
                                <small>Shop</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @foreach($products as $product)
                                <article class="media event">
                                    <a class="pull-left">
                                        <img src="{{asset('storage/products/').'/'.$product->featured_image}}"
                                             alt="{{$product->name}}"
                                             width="50px" height="50px">
                                    </a>
                                    <div class="media-body">
                                        <a class="title"
                                           href="{{route('product',$product->slug)}}">{{$product->name}}</a>
                                        <p>{{$product->sales}} Sales.</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Low Stock Products
                                <small>Shop</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @foreach($lowStock_Products as $product)
                                <article class="media event">
                                    <a class="pull-left">
                                        <img src="{{asset('storage/products/').'/'.$product->featured_image}}"
                                             alt="{{$product->name}}"
                                             width="50px" height="50px">
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="{{route('product',$product->slug)}}">{{$product->name}}</a>
                                        <p>{{$product->stock}} Pieces left.</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendors')
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
@endsection
