@extends('layouts.app')

@section('title')
    Checkout | {{$settings['website_name']}}
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
                                <li><a href="{{route('cart')}}">MY CART</a></li>
                                <li>CHECKOUT</li>
                            </ul>
                            <!--/ Breadcrumbs -->
                            <div class="clearfix"></div>
                        </div>
                        <!--/ col-sm-6 -->

                        <div class="col-sm-6" style="padding-top: 100px">
                            <!-- Sub-header titles -->
                            <div class="subheader-titles">
                                <h2 class="subheader-maintitle">SHOPPING CART</h2>
                                <h4 class="subheader-subtitle">CHECKOUT</h4>
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

    <!-- Checkout content page -->
    <section id="content" class="hg_section ptop-60">
        <div class="container">
            <div class="row">
                <div class="right_sidebar col-md-9">
                    <!-- Page title & subtitle -->
                    <div class="kl-title-block clearfix text-left tbk-symbol--line  tbk-icon-pos--after-title">
                        <h2 class="tbk__title montserrat fs-34 fw-semibold black">CHECKOUT PROCESS</h2>
                        <span class="tbk__symbol ">
								<span></span>
							</span>
                        <h4 class="tbk__subtitle fs-22 fw-thin">You're definitely on the right track!</h4>
                    </div>
                    <div class="text_box">
                        <div class="kl-store">
                            @if(Cart::count() >0)
                            @include('inc.flash')
                            <form name="checkout" method="post" class="checkout kl-store-checkout" action="{{route('cart.checkout.pay')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="col2-set" id="customer_details">
                                    <h3>Billing Details</h3>
                                    <div class="col-1">
                                        <div class="kl-store-billing-fields">
                                            <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
                                                <label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="first_name" id="billing_first_name" placeholder="First Name" value="" required>
                                            </p>
                                            <p class="form-row form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="last_name" id="billing_last_name" placeholder="Last Name" value="" required>
                                            </p>
                                            <div class="clear">
                                            </div>
                                            <p class="form-row form-row form-row-first validate-required validate-email" id="billing_email_field">
                                                <label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label><input type="email" class="input-text " name="email" id="billing_email" placeholder="E-mail Address" value="" required>
                                            </p>
                                            <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                                <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label><input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="Phone Number" value="" required>
                                            </p>
                                            <div class="clear">
                                            </div>
                                            <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                                <label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="address" id="billing_address_1" placeholder="Street address" value="" required>
                                            </p>
                                            <div class="clear">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="kl-store-shipping-fields">
                                            <p class="form-row form-row form-row-wide address-field validate-required" id="billing_city_field" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                <label for="billing_city" class="">City <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="city" id="billing_city" placeholder="City" value="" required>
                                            </p>
                                            <p class="form-row form-row form-row-first address-field validate-state" id="billing_state_field" data-o_class="form-row form-row form-row-first address-field validate-state">
                                                <label for="billing_state" class="">County <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " value="" placeholder="Country" name="country" id="billing_state" required>
                                            </p>
                                            <p class="form-row form-row form-row-last address-field validate-required validate-postcode" id="billing_postcode_field" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode">
                                                <label for="billing_postcode" class="">Postcode / Zip <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="postal" id="billing_postcode" placeholder="Postcode / Zip" value="" required>
                                            </p>
                                            <p class="form-row form-row notes" id="order_comments_field">
                                                <label for="order_comments" class="">Order Notes</label><textarea name="notes" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <h3 id="order_review_heading">Your order</h3>
                                <div id="order_review" class="kl-store-checkout-review-order">
                                    <table class="shop_table kl-store-checkout-review-order-table">
                                        <thead>
                                        <tr>
                                            <th class="product-thumbnail">
                                                &nbsp;
                                            </th>
                                            <th class="product-name">
                                                Product
                                            </th>
                                            <th class="product-total">
                                                Total
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(Cart::content() as $product)
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <img width="100" height="100" src="{{asset('/storage/products/').'/'.$product->model->featured_image}}" class="attachment-shop_thumbnail wp-post-image" alt="{{$product->name}}">
                                            </td>
                                            <td class="product-name">
                                                {{$product->name}}&nbsp; <strong class="product-quantity">× {{$product->qty}}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">${{$product->total()}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr class="shipping">
                                            <th>
                                                Shipping
                                            </th>
                                            <td>
                                                Free Shipping <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="free_shipping" class="shipping_method">
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>
                                                Total
                                            </th>
                                            <td>
                                                <strong><span class="amount">${{Cart::total()}}</span></strong>
                                            </td>
                                            <td></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div id="payment" class="kl-store-checkout-payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_cheque">
                                                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" checked="checked" data-order_button_text="">
                                                <label for="payment_method_cheque">
                                                    Pay with Stripe </label>
                                            </li>
                                        </ul>
                                        <div class="form-row place-order">
                                            <noscript>
                                                Since your browser does not support JavaScript, or it is disabled, please ensure you click the &lt;em&gt;Update Totals&lt;/em&gt; button before placing your order. You may be charged more than the amount stated above if you fail to do so.&lt;br/&gt;&lt;input type="submit" class="button alt" name="kl-store_checkout_update_totals" value="Update totals" /&gt;
                                            </noscript>
                                            <script
                                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                    data-key="pk_test_mC1rpXSv7zyfFCqPu04KwZW4"
                                                    data-amount="{{Cart::total(0,'','')*100}}"
                                                    data-name="{{$settings['website_name']}}"
                                                    data-description="The ultimate shopping destination"
                                                    data-image="{{asset('/storage/settings/').'/'.$settings['logo2']}}"
                                                    data-locale="auto">
                                            </script>
                                        </div>
                                        <div class="clear">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                                <h5 class="text-danger">No Items found in your cart. Start shopping to be able to checkout.</h5>
                            @endif
                        </div>
                    </div>
                </div>
                <!--/  -->

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
    <!--/ Checkout  content page -->
@endsection

@section('scripts')

@endsection