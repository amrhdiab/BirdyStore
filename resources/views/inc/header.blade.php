<header id="header" class="site-header style1 cta_button">
    <!-- header bg -->
    <div class="kl-header-bg"></div>
    <!--/ header bg -->

    <!-- siteheader-container -->
    <div class="container siteheader-container">
        <!-- top-header -->
        <div class="kl-top-header clearfix">
            <!-- HEADER ACTION -->
            <div class="header-links-container ">
                <ul class="topnav navRight topnav">
                    <!-- Support panel trigger -->
                    <li>
                        <label for="support_p" class="spanel-label">
                            <i class="fa fa-support"></i>
                            <span class="hidden-xs">SUPPORT</span>
                        </label>
                    </li>
                    <!--/ Support panel trigger -->

                    @guest
                        <!-- Login trigger -->
                        <li>
                            <a class="popup-with-form" href="#login_panel">
                                <i class="fa fa-user"></i>
                                <span class="hidden-xs">LOGIN</span>
                            </a>
                        </li>
                        <!--/ Login trigger -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="/my-account">Dashboard</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
                <!-- header search -->
                <div id="search" class="header-search">
                    <a href="#" class="searchBtn "><span class="glyphicon glyphicon-search icon-white"></span></a>
                    <div class="search-container">
                        <form id="searchform" class="header-searchform" action="https://www.google.com/search"
                              method="get" target="_blank">
                            <input type="hidden" id="q" name="q"/>
                            <input name="s" maxlength="20" class="inputbox" type="text" size="20" value="SEARCH ..."
                                   onblur="if (this.value=='') this.value='SEARCH ...';"
                                   onfocus="if (this.value=='SEARCH ...') this.value='';">
                            <button type="submit" id="searchsubmit"
                                    class="searchsubmit glyphicon glyphicon-search icon-white"></button>
                        </form>
                    </div>
                </div>
                <!--/ header search -->
            </div>
            <!--/ HEADER ACTION -->

            <!-- HEADER ACTION left -->
            <div class="header-leftside-container ">
                <!-- Header Social links -->
                <ul class="social-icons sc--clean topnav navRight">
                    <li><a href="{{$settings['facebook']}}" target="_self" class="icon-facebook" title="Facebook"></a>
                    </li>
                    <li><a href="{{$settings['twitter']}}" target="_self" class="icon-twitter" title="Twitter"></a></li>
                    <li><a href="{{$settings['dribble']}}" target="_self" class="icon-dribbble" title="dribble"></a>
                    </li>
                    <li><a href="{{$settings['google']}}" target="_blank" class="icon-gplus" title="Google Plus"></a>
                    </li>
                </ul>
                <!--/ Header Social links -->

                <div class="clearfix visible-xxs">
                </div>

                <!-- header contact text -->
                <span class="kl-header-toptext">QUESTIONS? CALL: <a href="#"
                                                                    class="fw-bold">{{$settings['contact_number']}}</a></span>
                <!--/ header contact text -->
            </div>
            <!--/ HEADER ACTION left -->
        </div>
        <!--/ top-header -->

        <!-- separator -->
        <div class="separator"></div>
        <!--/ separator -->

        <!-- left side -->
        <!-- logo container-->
        <div class="logo-container hasInfoCard logosize--yes">
            <!-- Logo -->
            <h1 class="site-logo logo" id="logo">
                <a href="/" title="">
                    <img height="50px" width="50px" src="{{asset('/storage/settings/').'/'.$settings['logo']}}"
                         class="logo-img" alt="{{$settings['website_name']}}" title="{{$settings['website_name']}}"/>
                </a>
            </h1>
            <!--/ Logo -->

            <!-- InfoCard -->
            <div id="infocard" class="logo-infocard">
                <div class="custom">
                    <div class="row">
                        <div class="col-sm-5">
                            <p style="text-align: center;">
                                <img height="60px" width="60px"
                                     src="{{asset('/storage/settings/').'/'.$settings['logo']}}" class=""
                                     alt="{{$settings['website_name']}}" title="{{$settings['website_name']}}"/>
                            </p>
                            <p style="text-align: center;">
                                {{$settings['slogan']}}.
                            </p>
                        </div>
                        <!--/ col-sm-5 -->

                        <div class="col-sm-7">
                            <div class="custom contact-details">
                                <p>
                                    <strong>Call: ({{$settings['contact_number']}})</strong><br>
                                    Email:&nbsp;<a
                                            href="mailto:{{$settings['contact_email_1']}}">{{$settings['contact_email_1']}}</a>
                                </p>
                                <p>
                                    <strong>Address</strong><br>
                                    {{$settings['address']}}
                                </p>
                            </div>
                            <div style="height:20px;">
                            </div>
                            <!-- Social links clean style -->
                            <ul class="social-icons sc--clean">
                                <li><a href="{{$settings['twitter']}}" target="_self" class="icon-twitter"
                                       title="Twitter"></a></li>
                                <li><a href="{{$settings['facebook']}}" target="_self" class="icon-facebook"
                                       title="Facebook"></a></li>
                                <li><a href="{{$settings['dribble']}}" target="_self" class="icon-dribbble"
                                       title="Dribbble"></a></li>
                                <li><a href="{{$settings['google']}}" target="_blank" class="icon-google"
                                       title="Google Plus"></a></li>
                            </ul>
                            <!--/ Social links clean style -->
                        </div>
                        <!--/ col-sm-7 -->
                    </div>
                    <!--/ row -->
                </div>
                <!--/ custom -->
            </div>
            <!--/ InfoCard -->

        </div>
        <!--/ logo container-->

        <!-- separator -->
        <div class="separator visible-xxs"></div>
        <!--/ separator -->

        <!-- responsive menu trigger -->
        <div id="zn-res-menuwrapper">
            <a href="#" class="zn-res-trigger zn-header-icon"></a>
        </div>
        <!--/ responsive menu trigger -->

        <!-- main menu -->
        <div id="main-menu" class="main-nav zn_mega_wrapper ">
            <ul id="menu-main-menu" class="main-menu zn_mega_menu">
                <li><a href="/">HOMEPAGE</a></li>
                <li class="menu-item-has-children"><a href="/shop/all">SHOP</a>
                    <ul class="sub-menu clearfix">
                        @foreach($categories as $category)
                            <li><a href="/shop/category/{{$category->slug}}">{{$category['name']}}</a>
                                <ul class="sub-menu clearfix">
                                    @foreach($category->sub_cats as $sub_cat)
                                        <li><a href="/shop/category/{{$category->slug}}/{{$sub_cat->slug}}">{{$sub_cat['name']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('front.all.stores')}}">STORES</a></li>
                <li><a href="{{route('front.all.brands')}}">BRANDS</a></li>
                <li><a href="{{route('front.about')}}">ABOUT US</a></li>
                <li><a href="{{route('front.contact')}}">CONTACT US</a></li>
            </ul>
        </div>
        <!--/ main menu -->

        <!-- right side -->
        <!-- Call to action ribbon Free Quote -->
        <a href="/shop/all" id="ctabutton" class="ctabutton kl-cta-ribbon" title="START SHOPPING NOW"
           target="_self"><strong>SHOP</strong>NOW
            <svg version="1.1" class="trisvg" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" preserveaspectratio="none" width="14px"
                 height="5px" viewbox="0 0 14.017 5.006" enable-background="new 0 0 14.017 5.006" xml:space="preserve"><path
                        fill-rule="evenodd" clip-rule="evenodd" d="M14.016,0L7.008,5.006L0,0H14.016z"></path></svg>
        </a>
        <!--/ Call to action ribbon Free Quote -->

        @auth()
        <!-- Shop Cart -->
        <ul class="topnav navLeft topnav--cart">
            <li class="drop">
                <a href="{{route('cart')}}" class="kl-cart-button" title="View your shopping cart">
                    <i class="glyphicon glyphicon-shopping-cart icon-white flipX-icon xs-icon" id="navbar_items_number2" data-count="{{Cart::content()->count()}}"></i>
                    <span class="hidden-xs hidden-sm hidden-md">MY CART</span>
                </a>
                <div class="pPanel">
                    <div class="inner cart-container">
                        <div class="widget_shopping_cart_content">
                            <p class="total">
                                <strong>Items in cart:</strong><span class="amount" id="navbar_items_number">{{Cart::content()->count()}}</span>
                            </p>
                            <p class="total">
                                <strong>Total count:</strong><span class="amount" id="navbar_total_count">{{Cart::count()}}</span>
                            </p>
                            <p class="total">
                                <strong>Total:</strong><span class="amount total_ajax" data-total="{{Cart::total(0,'','')}}">${{Cart::total()}}</span>
                            </p>
                            <p class="buttons">
                                <a href="{{route('cart')}}" class="button wc-forward">View Cart</a>
                                <a href="{{route('cart.checkout')}}" class="button checkout wc-forward">Checkout</a>
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <!--/ Shop Cart -->
        @endauth

    </div>
    <!--/ siteheader-container -->
</header>