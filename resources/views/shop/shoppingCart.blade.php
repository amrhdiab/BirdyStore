@extends('layouts.app')

@section('title')
    Shopping Cart | {{$settings['website_name']}}
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
            <div class="kl-bg-source__overlay"
                 style="background:rgba(0,94,176,1); background: -moz-linear-gradient(left, rgba(0,94,176,1) 0%, rgba(0,202,255,1) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(0,94,176,1)), color-stop(100%,rgba(0,202,255,1))); background: -webkit-linear-gradient(left, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%); background: -o-linear-gradient(left, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%); background: -ms-linear-gradient(left, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%); background: linear-gradient(to right, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%);">
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
                                <li><a href="{{route('user.account')}}">MY ACCOUNT</a></li>
                                <li>MY CART</li>
                            </ul>
                            <!--/ Breadcrumbs -->
                            <div class="clearfix"></div>
                        </div>
                        <!--/ col-sm-6 -->

                        <div class="col-sm-6" style="padding-top: 100px">
                            <!-- Sub-header titles -->
                            <div class="subheader-titles">
                                <h2 class="subheader-maintitle">USER ACCOUNT</h2>
                                <h4 class="subheader-subtitle">MY SHOPPING CART</h4>
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
            <svg width="5000px" height="57px" class="svgmask " viewBox="0 0 5000 57" version="1.1"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox"
                            id="filter-mask3">
                        <feOffset dx="0" dy="3" in="SourceAlpha" result="shadowOffsetInner1"></feOffset>
                        <feGaussianBlur stdDeviation="2" in="shadowOffsetInner1"
                                        result="shadowBlurInner1"></feGaussianBlur>
                        <feComposite in="shadowBlurInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1"
                                     result="shadowInnerInner1"></feComposite>
                        <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.4 0" in="shadowInnerInner1"
                                       type="matrix" result="shadowMatrixInner1"></feColorMatrix>
                        <feMerge>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                            <feMergeNode in="shadowMatrixInner1"></feMergeNode>
                        </feMerge>
                    </filter>
                </defs>
                <path d="M9.09383679e-13,57.0005249 L9.09383679e-13,34.0075249 L2418,34.0075249 L2434,34.0075249 C2434,34.0075249 2441.89,33.2585249 2448,31.0245249 C2454.11,28.7905249 2479,11.0005249 2479,11.0005249 L2492,2.00052487 C2492,2.00052487 2495.121,-0.0374751261 2500,0.000524873861 C2505.267,-0.0294751261 2508,2.00052487 2508,2.00052487 L2521,11.0005249 C2521,11.0005249 2545.89,28.7905249 2552,31.0245249 C2558.11,33.2585249 2566,34.0075249 2566,34.0075249 L2582,34.0075249 L5000,34.0075249 L5000,57.0005249 L2500,57.0005249 L1148,57.0005249 L9.09383679e-13,57.0005249 Z"
                      class="bmask-bgfill" filter="url(#filter-mask3)" fill="#f5f5f5"></path>
            </svg>
            <i class="glyphicon glyphicon-chevron-down"></i>
        </div>
        <!--/ Sub-header Bottom mask style 3 -->
    </div>
    <!--/ Page sub-header + Bottom mask style 3 -->

    <!-- Cart page content section -->
    <section id="content" class="hg_section ptop-60">
        <div class="container">
            <div class="row">
                <!-- Content page with right sidebar-->
                <div class="right_sidebar col-md-9">
                    <!-- Page title & subtitle -->
                    <div class="kl-title-block clearfix text-left tbk-symbol--line  tbk-icon-pos--after-title">
                        <h2 class="tbk__title montserrat fs-34 fw-semibold black">YOUR PERSONAL BASKET</h2>
                        <span class="tbk__symbol ">
								<span></span>
							</span>
                        <h4 class="tbk__subtitle fs-22 fw-thin">Let's see what we've got inside.</h4>
                    </div>
                    <!--/ Page title & subtitle -->

                    <!-- Text box -->
                    <div class="text_box">
                        <div class="kl-store">
                            <form id="update_cart_form" method="post" class="mb-50">
                                <table class="shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-remove">
                                            &nbsp;
                                        </th>
                                        <th class="product-thumbnail">
                                            &nbsp;
                                        </th>
                                        <th class="product-name">
                                            Product
                                        </th>
                                        <th class="product-price">
                                            Price
                                        </th>
                                        <th class="product-quantity">
                                            Quantity
                                        </th>
                                        <th class="product-subtotal">
                                            Total
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(Cart::count() >0)
                                    @foreach(Cart::content() as $product)
                                    <!-- Cart Item -->
                                    <tr class="cart_item cart_item_{{$product->id}}">
                                        <td class="product-remove">
                                            <button type="button" class="remove cart_remove_button" title="Remove this item" data-product_id="{{$product->rowId}}" data-product="{{$product->id}}" style="border: none;background:none">×</button>
                                        </td>
                                        <td class="product-thumbnail">
                                            <img width="180" height="180" src="{{asset('/storage/products/').'/'.$product->model->featured_image}}" class="attachment-shop_thumbnail wp-post-image" alt="{{$product->name}}">
                                        </td>
                                        <td class="product-name">
                                            <a href="{{route('product',$product->model->slug)}}">{{$product->name}}</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">@asDollars($product->price)</span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="quantity">
                                                <input type="number" step="1" min="1" max="{{$product->model->stock}}"
                                                       name="qty[]" value="{{$product->qty}}" title="Qty"
                                                       class="input-text qty text qty_inputs {{$product->rowId}}" size="4"
                                                        data-rowId="{{$product->rowId}}" style="width: 80px">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount" id="{{$product->rowId}}" data-price="{{$product->price}}">${{$product->total()}}</span>
                                        </td>
                                    </tr>
                                    <!--/ Cart Item -->
                                    @endforeach

                                    <tr id="cart_update_button">
                                        <td colspan="6" class="actions">
                                            <input type="submit" class="button" name="update_cart" value="Update Cart">
                                        </td>
                                    </tr>
                                    @else
                                        <tr>
                                            <td colspan="6" style="text-align: center"><h5 class="text-danger">No Items found in your cart.</h5></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </form>
                            @if(Cart::count() >0)
                            <div class="cart-collaterals">
                                <div class="cart_totals " style="float: left">
                                    <h2>Cart Total</h2>
                                    <div class="order-total mb-30" style="width: 220px">
                                        <span>TOTAL: </span>
                                        <strong><span class="amount total_ajax" style="margin-left: 60px" data-total="{{Cart::total(0,'','')}}">${{Cart::total()}}</span></strong>
                                    </div>

                                    <div class="wc-proceed-to-checkout">
                                        <a href="{{route('cart.checkout')}}" class="checkout-button button alt wc-forward">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!--/ Content page -->

                <!-- Right sidebar -->
                <div class="col-md-3">
                    <div id="sidebar-widget" class="sidebar">
                        <!-- Widget -->
                        <div class="widget">
                            <!-- Title -->
                            <h3 class="widgettitle title">PRODUCT SEARCH</h3>

                            <!-- Search widget -->
                            <div class="widget_search">
                                <!-- Search wrapper -->
                                <div class="search gensearch__wrapper">
                                    <form class="gensearch__form" action="{{route('allProducts')}}" method="get" target="_blank">
                                        <input name="search" maxlength="20" class="inputbox gensearch__input" type="text" size="20" placeholder="Search...">
                                        <button type="submit" value="go" class="gensearch__submit glyphicon glyphicon-search"></button>
                                    </form>
                                </div>
                                <!-- Search wrapper -->
                            </div>
                            <!--/ Search widget -->
                        </div>
                        <!--/ Search widget -->

                        <!-- Most Recent products widget -->
                        <div id="kl-store_top_rated_products-2" class="widget kl-store widget_top_rated_products">
                            <h3 class="widgettitle title">MOST RECENT PRODUCTS</h3>
                            <ul class="product_list_widget">
                                @foreach($mostRecentProducts as $product)
                                    <li>
                                        <a href="/shop/product/{{$product->slug}}" title="{{$product->name}}">
                                            <img width="180" height="180" src="{{asset('/storage/products/').'/'.$product['featured_image']}}" class="attachment-shop_thumbnail wp-post-image" alt="{{$product->name}}">
                                            <span class="product-title">{{$product->name}}</span>
                                        </a>
                                        <div class="star-rating" title="Added: {{$product->created_at->diffForHumans()}}">
                                            <span style="width:100%">Added<strong class="rating"> {{$product->created_at->diffForHumans()}}</strong></span>
                                        </div>
                                        @if($product['new_price'] != $product['price'])
                                            <span class="amount" style="display: inline-block;text-decoration: line-through">@asDollars($product['price'])</span>
                                            <span class="amount" style="display: inline-block;">@asDollars($product['new_price'])</span>
                                        @else
                                            <span class="amount">@asDollars($product['price'])</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ Most Recent products widget -->

                        <!-- Best Selling products widget -->
                        <div id="kl-store_top_rated_products-2" class="widget kl-store widget_top_rated_products">
                            <h3 class="widgettitle title">BEST SELLING PRODUCTS</h3>
                            <ul class="product_list_widget">
                                @foreach($BestSellingProducts as $product)
                                    <li>
                                        <a href="/shop/product/{{$product->slug}}" title="{{$product->name}}">
                                            <img width="180" height="180" src="{{asset('/storage/products/').'/'.$product['featured_image']}}" class="attachment-shop_thumbnail wp-post-image" alt="{{$product->name}}">
                                            <span class="product-title">{{$product->name}}</span>
                                        </a>
                                        <div class="star-rating" title="{{$product->sales}} Sales">
                                            <span style="width:100%"><strong class="rating">{{$product->sales}} </strong>Sales.</span>
                                        </div>
                                        @if($product['new_price'] != $product['price'])
                                            <span class="amount" style="display: inline-block;text-decoration: line-through">@asDollars($product['price'])</span>
                                            <span class="amount" style="display: inline-block;">@asDollars($product['new_price'])</span>
                                        @else
                                            <span class="amount">@asDollars($product['price'])</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ Best Selling products widget -->

                    </div>
                </div>
                <!--/ Right sidebar -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Cart page content section -->

@endsection

@section('scripts')

@endsection