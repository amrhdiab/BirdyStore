@extends('layouts.app')

@section('title')
    My Account | {{$settings['website_name']}}
@endsection

@section('bodyClass','kl-store kl-store-page single-product')

@section('content')

    <!-- Page sub-header + Bottom mask style 3 -->
    <div id="page_header" class="page-subheader zn_def_header_style maskcontainer--mask3">
        <div class="bgback">
        </div>

        <!-- Background -->
        <div class="kl-bg-source">
            <!-- Gradient overlay -->
            <div class="kl-bg-source__overlay" style="background:rgba(0,94,176,1); background: -moz-linear-gradient(left, rgba(0,94,176,1) 0%, rgba(0,202,255,1) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(0,94,176,1)), color-stop(100%,rgba(0,202,255,1))); background: -webkit-linear-gradient(left, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%); background: -o-linear-gradient(left, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%); background: -ms-linear-gradient(left, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%); background: linear-gradient(to right, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%);">
            </div>
            <!--/ Gradient overlay -->
        </div>
        <!--/ Background -->

        <!-- Animated Sparkles -->
        <div class="th-sparkles"></div>
        <!--/ Animated Sparkles -->

        <!-- Sub-Header content wrapper -->
        <div class="ph-content-wrap">
            <div class="ph-content-v-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6" style="padding-top: 100px">
                            <!-- Breadcrumbs -->
                            <ul class="breadcrumbs fixclear">
                                <li><a href="/">Home</a></li>
                                <li>MY ACCOUNT</li>
                            </ul>
                            <!--/ Breadcrumbs -->
                            <div class="clearfix"></div>
                        </div>
                        <!--/ col-sm-6 -->

                        <div class="col-sm-6" style="padding-top: 100px">
                            <!-- Sub-header titles -->
                            <div class="subheader-titles">
                                <h2 class="subheader-maintitle">USER ACCOUNT</h2>
                                <h4 class="subheader-subtitle">DASHBOARD</h4>
                            </div>
                            <!--/ Sub-header titles -->
                        </div>
                        <!--/ col-sm-6 -->
                    </div>
                    <!--/ row -->
                </div>
                <!--/ container -->
            </div>
            <!--/ .ph-content-v-center -->
        </div>
        <!--/ Sub-Header content wrapper -->

        <!-- Sub-header Bottom mask style 3 -->
        <div class="kl-bottommask kl-bottommask--mask3">
            <svg width="5000px" height="57px" class="svgmask " viewBox="0 0 5000 57" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-mask3">
                        <feOffset dx="0" dy="3" in="SourceAlpha" result="shadowOffsetInner1"></feOffset>
                        <feGaussianBlur stdDeviation="2" in="shadowOffsetInner1" result="shadowBlurInner1"></feGaussianBlur>
                        <feComposite in="shadowBlurInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1" result="shadowInnerInner1"></feComposite>
                        <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.4 0" in="shadowInnerInner1" type="matrix" result="shadowMatrixInner1"></feColorMatrix>
                        <feMerge>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                            <feMergeNode in="shadowMatrixInner1"></feMergeNode>
                        </feMerge>
                    </filter>
                </defs>
                <path d="M9.09383679e-13,57.0005249 L9.09383679e-13,34.0075249 L2418,34.0075249 L2434,34.0075249 C2434,34.0075249 2441.89,33.2585249 2448,31.0245249 C2454.11,28.7905249 2479,11.0005249 2479,11.0005249 L2492,2.00052487 C2492,2.00052487 2495.121,-0.0374751261 2500,0.000524873861 C2505.267,-0.0294751261 2508,2.00052487 2508,2.00052487 L2521,11.0005249 C2521,11.0005249 2545.89,28.7905249 2552,31.0245249 C2558.11,33.2585249 2566,34.0075249 2566,34.0075249 L2582,34.0075249 L5000,34.0075249 L5000,57.0005249 L2500,57.0005249 L1148,57.0005249 L9.09383679e-13,57.0005249 Z" class="bmask-bgfill" filter="url(#filter-mask3)" fill="#f5f5f5"></path>
            </svg>
            <i class="glyphicon glyphicon-chevron-down"></i>
        </div>
        <!--/ Sub-header Bottom mask style 3 -->
    </div>
    <!--/ Page sub-header + Bottom mask style 3 -->


    <!-- Content section with custom top padding -->
    <section id="content" class="hg_section ptop-60">
        <div class="container">
            <div class="row">
                    <!-- Title element with bottom line left aligned -->
                    <div class="kl-title-block clearfix text-left tbk-symbol--line tbk-icon-pos--after-title">
                        <!-- Title with montserrat font and custom size, black and semibold style -->
                        <h3 style="font-size: 2em" class="tbk__title montserrat fs-34 fw-semibold black">Acount Dashboard</h3>
                        <!--/ Title with montserrat font and custom size, black and semibold style -->
                        <!-- Title bottom symbol -->
                        <div class="tbk__symbol ">
                            <span></span>
                        </div>
                        <!--/ Title bottom symbol -->
                    </div>
                    <!--/ Title element with bottom line left aligned -->

                    <div class="account_container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content">

                                        {{--Store & Update modal--}}
                                        <div class="modal fade" role="dialog" id="profile_modal">
                                            <div class="modal-dialog" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%)">
                                                <div class="modal-content">
                                                    <form method="post" id="profile_form" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Edit Profile Info</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span id="form_output" class="toastr"></span>
                                                            <div class="form-group">
                                                                <label for="name">User Name:</label>
                                                                <input type="text" name="name" id="name" class="form-control" value="{{Auth::guard()->user()->name}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="image">Avatar:</label>
                                                                <input type="file" name="avatar" id="avatar">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="user_id" value="{{Auth::guard()->user()->id}}">
                                                            <input type="submit" name="submit" id="submit" value="Update"
                                                                   class="btn btn-success">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                            <div class="profile_img">
                                                <div id="avatar_container">
                                                    <!-- Current avatar -->
                                                    <img class="img-responsive img-rounded" src="{{asset('/storage/users/').'/'.Auth::guard()->user()->avatar}}" alt="Avatar" title="Change the avatar">
                                                </div>
                                            </div>
                                            <h3 id="name_container">{{Auth::guard()->user()->name}}</h3>

                                            <ul class="list-unstyled user_data">
                                                <li><i class="fa fa-envelope"></i> {{Auth::guard()->user()->email}}</li>
                                            </ul>

                                            <a class="btn btn-success btn-sm edit"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>
                                            <br>

                                            <!-- Quick Links -->
                                            <div id="sidebar-widget" class="sidebar" style="box-shadow: none">
                                                <div class="widget widget_categories">
                                                    <!-- Widget title -->
                                                    <h3 class="widgettitle title">Quick Links</h3>
                                                    <!--/ Widget title -->

                                                    <!-- Quick Links list -->
                                                    <ul class="menu">
                                                        <li class="cat-item"><a href="{{route('user.orders')}}">All Orders</a>
                                                        </li>
                                                        <li class="cat-item"><a href="{{route('user.reviews')}}">All Reviews</a>
                                                        </li>
                                                        <li class="cat-item"><a href="{{route('cart')}}">My Shopping Cart</a>
                                                        <li class="cat-item"><a href="/password/reset">Reset Password</a>
                                                        <li class="cat-item">
                                                            <a href="{{ route('admin.logout') }}"
                                                                                onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">Logout
                                                            </a>
                                                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </li>
                                                    </ul>
                                                    <!--/ Quick Links list -->
                                                </div>
                                            </div>
                                            <!-- Quick Links -->
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">

                                            <!-- Recent Orders Carousel -->
                                            <div class="col-md-12 col-sm-12">
                                                <!-- Section title -->
                                                <div class="kl-title-block clearfix tbk--text-default tbk--center text-center tbk-symbol--line tbk--colored tbk-icon-pos--after-title" style="margin-bottom: 1px">
                                                    <!-- Title -->
                                                    <h3 class="tbk__title " style="font-size: 1.5em;margin-bottom: 1px">Your Recent Purchases</h3>
                                                    <!--/ Title -->

                                                    <!-- Title bottom symbol -->
                                                    <div class="tbk__symbol ">
                                                        <span class="tbg" style="height: 1.5px;margin-top: 1px"></span>
                                                    </div>
                                                    <!--/ Title bottom symbol -->
                                                </div>
                                                <!--/ Section title -->

                                                <!-- Section Content -->
                                                <div class="recentwork_carousel recentwork_carousel_v2 clearfix">
                                                    <!-- Carousel wrapper -->
                                                    <div class="recentwork_carousel__crsl-wrapper" style="width: 835px">
                                                        <div class="caroufredsel_wrapper" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 835px; height: 165px; margin: 0px; overflow: hidden;">
                                                            <ul class="recent_works3 fixclear recentwork_carousel__crsl" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 5800px; height: 165px; z-index: auto;">
                                                                @if(count($userOrders) >0)
                                                                    @foreach($userOrders as $order)
                                                                        @foreach($order->products as $product)
                                                                        <li style="width: 200px;">
                                                                        <!-- Portfolio link container -->
                                                                        <a href="/shop/product/{{$product->slug}}" class="recentwork_carousel__link">
                                                                            <!-- Hover container -->
                                                                            <div class="hover recentwork_carousel__hover">
                                                                                <!-- Background image with custom height -->
                                                                                <div style="height: 165px; background-image:url({{asset('/storage/products/').'/'.$product['featured_image']}});" class="recentwork_carousel__img">
                                                                                </div>
                                                                                <!--/ Background image with custom height -->

                                                                                <!-- Hover shadow overlay -->
                                                                                <span class="hov recentwork_carousel__hov"></span>
                                                                                <!--/ Hover shadow overlay -->
                                                                            </div>
                                                                            <!--/ Hover container -->

                                                                            <!-- Content details -->
                                                                            <div class="details recentwork_carousel__details">
                                                                                <!-- Plus icon -->
                                                                                <span class="plus recentwork_carousel__plus">+</span>
                                                                                <!--/ Plus icon -->

                                                                                <!-- Title -->
                                                                                <h4 class="recentwork_carousel__crsl-title">{{$product['name']}}</h4>
                                                                                <!--/ Title -->
                                                                            </div>
                                                                            <!--/ Content details -->
                                                                        </a>
                                                                        <!--/ Portfolio link container -->
                                                                    </li>
                                                                        @endforeach
                                                                    @endforeach
                                                                @else
                                                                    <p style="text-align: center">You have no previous purchases.</p>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--/ Carousel wrapper - .recentwork_carousel__crsl-wrapper -->
                                                </div>
                                                <!--/ Section Content -->
                                            </div>
                                            <!--/ Recent Orders Carousel -->

                                            <!-- Recent Comments -->
                                            <div class="col-md-12 col-sm-12">
                                                <!-- Section title -->
                                                <div class="kl-title-block clearfix tbk--text-default tbk--center text-center tbk-symbol--line tbk--colored tbk-icon-pos--after-title"
                                                     style="margin-bottom: 0px;margin-top: 50px;padding-bottom: 10px">
                                                    <!-- Title -->
                                                    <h3 class="tbk__title " style="font-size: 1.5em;margin-bottom: 1px">Your Recent Reviews</h3>
                                                    <!--/ Title -->

                                                    <!-- Title bottom symbol -->
                                                    <div class="tbk__symbol ">
                                                        <span class="tbg" style="height: 1.5px;margin-top: 1px;margin-bottom: 0px"></span>
                                                    </div>
                                                    <!--/ Title bottom symbol -->
                                                </div>
                                                <!--/ Section title -->

                                                <!-- Section Content -->
                                                <div style="margin-top: 0px">
                                                    <table class="data table table-striped no-margin">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Product</th>
                                                            <th>Comment</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(count($userReviews)>0)
                                                        @foreach($userReviews as $review)
                                                        <tr>
                                                            <td>{{$key++}}</td>
                                                            <td><a href="{{route('product',$review->product->slug)}}">{{substr($review->product->name,0,40)}}...</a></td>
                                                            <td>{{substr($review->comment,0,40)}}...</td>
                                                            <td>
                                                                @if($review->status ==1)
                                                                    <span class="label label-success">Approved</span>
                                                                @else
                                                                    <span class="label label-warning">Waiting</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                            <tr><td colspan="4" style="text-align: center"><h4>You have no reviews yet.</h4></td></tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--/ Section Content -->
                                            </div>
                                            <!--/ Recent Comments -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Content section with custom top padding -->

@endsection
@section('scripts')
    <!-- JS FILES // Loaded on this page -->
    <!-- CarouFredSel required js script for Recent Work carousel element -->
    <script type="text/javascript" src="{{asset('/app/js/plugins/_sliders/caroufredsel/jquery.carouFredSel-packed.js')}}"></script>

    <!-- Required js trigger for Recent work 3 carousel element -->
    <script type="text/javascript" src="{{asset('/app/js/trigger/kl-recent-work-carousel3.js')}}"></script>

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

            $(document).on('click', '.edit', function () {
                $('#form_output').html('');
                $('#profile_modal').modal('show');
            });

            $('#profile_form').on('submit', function (event) {
                event.preventDefault();
                var form_data = new FormData($('#profile_form')[0]);
                $.ajax({
                    url: '{{route('user.update')}}',
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
                            toastr.error('Validation error', 'Error!', {timeOut: 3000,positionClass: "toast-bottom-right"});
                        } else {
                            $('#form_output').html('');
                            $('#profile_modal').modal('hide');
                            $('#avatar').val('');
                            $('#avatar_container').html('<img class="img-responsive img-rounded" src="{{asset('/storage/users/')}}/'+data.avatar+'" alt="Avatar" title="User avatar">');
                            $('#name_container').html(data.name);
                            toastr.success('Profile updated successfully.', 'Success!', {timeOut: 3000,positionClass: "toast-bottom-right"});
                        }
                    }
                });
            });
        });
    </script>
@endsection