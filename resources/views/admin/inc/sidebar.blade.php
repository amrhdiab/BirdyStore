<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="logo_container"><img src="{{asset('/storage/settings')}}/{{$settings['logo']}}" alt="site-logo" height="30px" width="30px"></i> <span id="website_name_container">{{$settings['website_name']}}</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('/storage/users').'/'.Auth::guard('admin')->user()->avatar}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::guard('admin')->user()->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{route('products.index')}}"><i class="fa fa-tags"></i> Products</a></li>
                    <li><a href="{{route('categories.index')}}"><i class="fa fa-list-alt"></i> Categories</a></li>
                    <li><a href="{{route('sub_categories.index')}}"><i class="fa fa-list-ul"></i> Sub Categories</a></li>
                    <li><a href="{{route('stores.index')}}"><i class="fa fa-shopping-basket"></i> Stores</a></li>
                    <li><a href="{{route('brands.index')}}"><i class="fa fa-star-o"></i> Brands</a></li>
                    <li><a href="{{route('orders.index')}}"><i class="fa fa-cubes"></i> Orders <span class="badge badge-pill badge-warning pull-right">{{$waitingOrders}}</span></a></li>
                    <li><a href="{{route('reviews.index')}}"><i class="fa fa-comments-o"></i> Reviews <span class="badge badge-pill badge-warning pull-right">{{$waitingReviews}}</span></a></li>
                    <li><a href="{{route('messages.index')}}"><i class="fa fa-envelope-o"></i> Messages <span class="badge badge-pill badge-warning pull-right">{{$messagesCount}}</span></a></li>
                    <li><a href="{{route('settings.index')}}"><i class="fa fa-cog"></i> Website Settings</a></li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a href="{{route('settings.index')}}" data-toggle="tooltip" data-placement="top" title="Website Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a href="{{ route('admin.logout') }}" data-toggle="tooltip" data-placement="top" title="Logout"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>