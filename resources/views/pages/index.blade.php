@extends('layouts.app')
@section('title')
    Home | {{$settings['website_name']}}
@endsection
@section('styles')
    <!-- IOS Slider required CSS Stylesheet file -->
    <link rel="stylesheet" href="{{asset('/app/css/sliders/ios/style.css')}}" type="text/css" media="all">
@endsection

@section('content')

    <!-- Slideshow - iOS Slider element with animateme scroll efect, custom height and bottom mask style 2 -->
    @include('inc.slider')
    <!--/ Slideshow - iOS Slider element with animateme scroll efect, custom height and bottom mask style 2 -->

    <!-- Action box style 3 section with custom top padding -->
    <section class="hg_section ptop-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Action box style 3 element -->
                    <div class="action_box style3" data-arrowpos="center" style="margin-top:-25px;">
                        <div class="action_box_inner">
                            <div class="action_box_content">
                                <div class="ac-content-text">
                                    <!-- Title -->
                                    <h4 class="text"><span class="fw-thin">WELCOME TO THE <span
                                                    class="fw-semibold">{{strtoupper($settings['website_name'])}}</span>, WHERE YOU CAN FULLFILL ALL OF YOUR PERSONAL STYLE DESIRES.</span>
                                    </h4>
                                    <!--/ Title -->

                                    <!-- Sub-Title -->
                                    <h5 class="ac-subtitle">{{$settings['slogan']}}</h5>
                                    <!--/ Sub-Title -->
                                </div>

                                <!-- Call to Action buttons -->
                                <div class="ac-buttons">
                                    <a class="btn btn-lined ac-btn" href="{{route('front.contact')}}" target="_blank">CONTACT US</a><a
                                            class="btn btn-fullwhite ac-btn" href="{{route('front.about')}}" target="_blank">ABOUT US</a>
                                </div>
                                <!--/ Call to Action buttons -->
                            </div>
                            <!--/ action_box_content -->
                        </div>
                        <!--/ action_box_inner -->
                    </div>
                    <!--/ Action box style 3 element -->
                </div>
                <!--/ col-md-12 col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Action box style 3 section with custom top padding -->

    <!-- Brands (Partners) Carousel section -->
    <section class="hg_section--relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Partners carousel element dark style -->
                    <div class="testimonials-partners testimonials-partners--dark">
                        <div class="ts-pt-partners ts-pt-partners--y-title clearfix">
                            <!-- Title -->
                            <div class="ts-pt-partners__title no-border">
                                <h3 class="tbk__title fw-thin fs-38 light-gray">
                                    <span class="fw-bold fs-xl">STORE</span><br>BRANDS
                                </h3>
                            </div>
                            <!--/ Title -->

                            <!-- Partners carousel wrapper -->
                            <div class="ts-pt-partners__carousel-wrapper">
                                <div class="ts-pt-partners__carousel">
                                @foreach($brands as $brand)
                                    <!-- Item -->
                                        <div class="ts-pt-partners__carousel-item">
                                            <!-- Partner image link -->
                                            <a class="ts-pt-partners__link" href="{{route('front.single.brand',$brand['slug'])}}" target="_self"
                                               title="{{$brand['name']}}">
                                                <!-- Image -->
                                                <img class="ts-pt-partners__img"
                                                     src="{{asset('/storage/brands/').'/'.$brand['avatar']}}"
                                                     alt="{{$brand['name']}}"
                                                     title="{{$brand['name']}}"/>
                                                <!--/ Image -->
                                            </a>
                                            <!--/ Partner image link -->
                                        </div>
                                        <!--/ Item -->
                                    @endforeach
                                </div>
                                <!--/ .ts-pt-partners__carousel -->
                            </div>
                            <!--/ Partners carousel wrapper -->
                        </div>
                    </div>
                    <!--/ Partners carousel element dark style - .ts-pt-partners -->
                </div>
                <!--/ col-md-12 col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Brands (Partners) Carousel section -->

    <!-- Offer banners section with white background, shadow and custom paddings -->
    <section class="hg_section--relative bg-white section-shadow ptop-65 pbottom-65">
        <!-- Background section -->
        <div class="kl-bg-source">
            <!-- Glos overlay - default white style -->
            <div class="kl-bg-source__overlay-gloss">
            </div>
        </div>
        <!--/ Background section -->

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Title element with icon symbol and custom bottom padding -->
                    <div class="kl-title-block clearfix text-center tbk-symbol--icon tbk--colored tbk-icon-pos--after-title pbottom-15">
                        <!-- Title with custom montserrat font, size and default theme color -->
                        <h3 class="tbk__title montserrat fs-26 tcolor">LATEST COLLECTIONS</h3>

                        <!-- Title bottom icon symbol = .glyphicon-option-horizontal / custom size and lightgray2 color -->
                        <div class="tbk__symbol ">
                            <span class="tbk__icon fs-28 light-gray2 glyphicon glyphicon-option-horizontal"></span>
                        </div>
                        <!--/ Title bottom icon symbol -->
                    </div>
                    <!--/ Title element with icon symbol and custom bottom padding -->

                    <!-- Offer banners element -->
                    <div class="offer-banners ob--resize-no-resize">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- Offer banner image link -->
                                <a href="/shop/category/{{$collections[0]['slug']}}" target="_blank" class="offer-banners-link hoverBorder"
                                   title="{{$collections[0]['name']}}">
                                    <!-- Border image wrapper -->
                                    <span class="hoverBorderWrapper">
											<!-- Image -->
											<img src="{{asset('/storage/categories/').'/'.$collections[0]['featured_image']}}"
                                                 class="img-responsive offer-banners-img"
                                                 alt="{{$collections[0]['name']}}" title="{{$collections[0]['name']}}"/>

                                        <!-- Hover border -->
											<span class="theHoverBorder"></span>
										</span>
                                    <!--/ Border image wrapper -->
                                </a>
                                <!--/ Offer banner image link -->
                            </div>
                            <!--/ col-sm-4 -->

                            <div class="col-sm-5">
                                <!-- Offer banner image link -->
                                <a href="/shop/category/{{$collections[1]['slug']}}" target="_blank" class="offer-banners-link hoverBorder"
                                   title="{{$collections[1]['name']}}">
                                    <!-- Border image wrapper -->
                                    <span class="hoverBorderWrapper">
											<!-- Image -->
											<img src="{{asset('/storage/categories/').'/'.$collections[1]['featured_image']}}"
                                                 alt="{{$collections[1]['name']}}" title="{{$collections[1]['name']}}"/>

                                        <!-- Hover border -->
											<span class="theHoverBorder"></span>
										</span>
                                    <!--/ Border image wrapper -->
                                </a>
                                <!--/ Offer banner image link -->
                            </div>
                            <!--/ col-sm-5 -->

                            <div class="col-sm-3">
                                <!-- Offer banner image link -->
                                <a href="/shop/category/{{$collections[2]['slug']}}" target="_blank" class="offer-banners-link hoverBorder"
                                   title="{{$collections[2]['name']}}">
                                    <!-- Border image wrapper -->
                                    <span class="hoverBorderWrapper">
											<!-- Image -->
											<img src="{{asset('/storage/categories/').'/'.$collections[2]['featured_image']}}"
                                                 class="img-responsive offer-banners-img"
                                                 alt="{{$collections[2]['name']}}" title="{{$collections[2]['name']}}"/>

                                        <!-- Hover border -->
											<span class="theHoverBorder"></span>
										</span>
                                    <!--/ Border image wrapper -->
                                </a>
                                <!--/ Offer banner image link -->
                            </div>
                            <!--/ col-sm-3 -->

                            <div class="col-sm-3">
                                <!-- Offer banner image link -->
                                <a href="/shop/category/{{$collections[3]['slug']}}" target="_blank" class="offer-banners-link hoverBorder"
                                   title="{{$collections[3]['name']}}">
                                    <!-- Border image wrapper -->
                                    <span class="hoverBorderWrapper">
											<!-- Image -->
											<img src="{{asset('/storage/categories/').'/'.$collections[3]['featured_image']}}"
                                                 class="img-responsive offer-banners-img"
                                                 alt="{{$collections[3]['name']}}" title="{{$collections[3]['name']}}"/>

                                        <!-- Hover border -->
											<span class="theHoverBorder"></span>
										</span>
                                    <!--/ Border image wrapper -->
                                </a>
                                <!--/ Offer banner image link -->
                            </div>
                            <!--/ col-sm-3 -->

                            <div class="col-sm-12">
                                <!-- Offer banner image link -->
                                <a href="/shop/category/{{$collections[4]['slug']}}" target="_blank" class="offer-banners-link hoverBorder"
                                   title="{{$collections[4]['name']}}">
                                    <!-- Border image wrapper -->
                                    <span style="height: 300px;overflow: hidden" class="hoverBorderWrapper">
											<!-- Image -->
											<img src="{{asset('/storage/categories/').'/'.$collections[4]['featured_image']}}"
                                                 class="img-responsive offer-banners-img"
                                                 alt="{{$collections[4]['name']}}" title="{{$collections[4]['name']}}"/>

                                        <!-- Hover border -->
											<span class="theHoverBorder"></span>
										</span>
                                    <!--/ Border image wrapper -->
                                </a>
                                <!--/ Offer banner image link -->
                            </div>
                            <!--/ col-sm-12 -->
                        </div>
                        <!--/ row -->
                    </div>
                    <!--/ Offer banners element -->
                </div>
                <!--/ col-md-12 col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->

        <!-- Bottom mask style 4 left aligned -->
        <div class="kl-bottommask kl-bottommask--mask4">
            <svg width="5000px" height="27px" class="svgmask svgmask-left" viewbox="0 0 5000 27" version="1.1"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <filter x="-50%" y="-50%" width="200%" height="200%" filterunits="objectBoundingBox"
                            id="filter-mask4">
                        <feoffset dx="0" dy="2" in="SourceAlpha" result="shadowOffsetInner1"></feoffset>
                        <fegaussianblur stddeviation="1.5" in="shadowOffsetInner1"
                                        result="shadowBlurInner1"></fegaussianblur>
                        <fecomposite in="shadowBlurInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1"
                                     result="shadowInnerInner1"></fecomposite>
                        <fecolormatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.35 0" in="shadowInnerInner1"
                                       type="matrix" result="shadowMatrixInner1"></fecolormatrix>
                        <femerge>
                            <femergenode in="SourceGraphic"></femergenode>
                            <femergenode in="shadowMatrixInner1"></femergenode>
                        </femerge>
                    </filter>
                </defs>
                <path d="M3.63975516e-12,-0.007 L2418,-0.007 L2434,-0.007 C2434,-0.007 2441.89,0.742 2448,2.976 C2454.11,5.21 2479,15 2479,15 L2492,21 C2492,21 2495.121,23.038 2500,23 C2505.267,23.03 2508,21 2508,21 L2521,15 C2521,15 2545.89,5.21 2552,2.976 C2558.11,0.742 2566,-0.007 2566,-0.007 L2582,-0.007 L5000,-0.007 L5000,27 L2500,27 L3.63975516e-12,27 L3.63975516e-12,-0.007 Z"
                      class="bmask-bgfill" filter="url(#filter-mask4)" fill="#f5f5f5"></path>
            </svg>
        </div>
        <!--/ Bottom mask style 4 left aligned -->
    </section>
    <!--/ Offer banners section with white background, shadow and custom paddings -->


    <!-- Shop category images section with custom paddings -->
    <section class="hg_section ptop-65 pbottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Title element -->
                    <div class="kl-title-block clearfix text-left tbk-symbol-- tbk-icon-pos--after-title">
                        <!-- Title with custom montserrat font, size and default theme color -->
                        <h3 class="tbk__title montserrat fs-26 tcolor ">BROWSE CATEGORIES</h3>

                        <!-- Sub-title with custom font size, lightgray color and thin style -->
                        <h4 class="tbk__subtitle fs-16 light-gray fw-thin">ALWAYS UPDATED</h4>
                    </div>
                    <!--/ Title element -->
                </div>
                <!--/ col-md-12 col-sm-12 -->

                @foreach($sub_cats as $sub_cat)
                    <div class="col-md-4 col-sm-4">
                        <!-- Image boxes style 4 element - bottom title -->
                        <div class="box image-boxes imgboxes_style4 kl-title_style_bottom">
                            <!-- Image box link wrapper -->
                            <a class="imgboxes4_link imgboxes-wrapper" href="/shop/category/{{$sub_cat->category->slug}}/{{$sub_cat->slug}}" target="_blank">
                                <!-- Image -->
                                <img src="{{asset('/storage/subcategories/').'/'.$sub_cat['featured_image']}}"
                                     class="img-responsive imgbox_image cover-fit-img"
                                     alt="{{$sub_cat[0]['name']}}" title="{{$sub_cat['name']}}"/>
                                <!--/ Image -->

                                <!-- Border helper -->
                                <span class="imgboxes-border-helper"></span>
                                <!--/ Border helper -->

                                <!-- Title -->
                                <h3 class="m_title imgboxes-title">{{$sub_cat['name']}}</h3>
                                <!--/ Title -->
                            </a>
                            <!--/ Image box link wrapper -->
                        </div>
                        <!--/ Image boxes style 4 element - bottom title -->
                    </div>
            @endforeach
            <!--/ col-md-4 col-sm-4 -->

                <div class="col-md-4 col-sm-4">
                    <!-- Title element with custom top padding -->
                    <div class="kl-title-block clearfix text-center tbk-symbol-- tbk-icon-pos--after-title ptop-50">
                        <!-- Title with custom montserrat font, size and bold style -->
                        <h3 class="tbk__title montserrat fs-30 fw-bold">CAN'T FIND WHAT YOU NEED?</h3>

                        <!-- Sub-title with custom font size, lightgray color and thin style -->
                        <h4 class="tbk__subtitle fs-16 light-gray fw-thin">WE HAVE JUST WHAT YOU NEED,</br>CLICK THE
                            BUTTON BELOW</h4>
                    </div>
                    <!-- Title element -->

                    <!-- Button -->
                    <div class="text-center">
                        <!-- Button lined custom style -->
                        <a class="btn-element btn btn-lined lined-custom" href="{{route('allProducts')}}"><span>SEE ALL CATEGORIES</span></a>
                    </div>
                    <!--/ Button -->
                </div>
                <!--/ col-md-4 col-sm-4 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Shop category images section with custom paddings -->


    <!-- FEATURED / LATEST / BEST SELLING Carousels section -->
    <section class="hg_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="shop-latest">
                        <div class="spp-products-rows">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Title with custom font size, default theme color  -->
                                    <h3 class="m_title fs-26 tcolor spp-title">FEATURED PRODUCTS</h3>
                                </div>
                                <!--/ col-sm-12 -->

                                <div class="col-sm-12">
                                    <!-- Shop latest carousel -->
                                    <div class="shop-latest-carousel">
                                        <!-- Featured products list -->
                                        <ul class="featured_products">
                                            <!-- Product item -->
                                            @foreach($featured_products as $product)
                                                <li>
                                                    <div class="product-list-item prod-layout-classic">

                                                        <!-- Badge container -->
                                                        <div class="zn_badge_container">
                                                            @if($product['info']['has_offer'] == 1)
                                                                <span class="zn_badge_sale">SALE!</span>
                                                            @endif
                                                            @foreach($latest as $latest_product)
                                                                @if($product['info']['id'] == $latest_product['id'])
                                                                    <span class="zn_badge_new">NEW!</span>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!--/ Badge container -->

                                                        <!-- Product container link -->
                                                        <a href="/shop/product/{{$product['info']['slug']}}" style="height: 450px; overflow: hidden">
                                                            <!-- Image wrapper -->
                                                            <span class="image kw-prodimage" style="height: 250px">
                                                                <!-- Primary image -->
                                                                <img class="kw-prodimage-img"
                                                                     src="{{asset('/storage/products/').'/'.$product['info']['featured_image']}}"
                                                                     alt="{{$product['info']['name']}}"
                                                                     title="{{$product['info']['name']}}"/>

                                                                <!-- Secondary image -->
                                                                <img class="kw-prodimage-img-secondary"
                                                                     src="{{asset('/storage/products/').'/'.$product['secondImage']}}"
                                                                     alt="{{$product['info']['name']}}"
                                                                     title="{{$product['info']['name']}}"/>
                                                            </span>
                                                            <!--/ Image wrapper -->

                                                            <!-- Details -->
                                                            <div class="details kw-details fixclear" style="height: 250px">
                                                                <!-- Title -->
                                                                <h3 class="kw-details-title">{{$product['info']['name']}}</h3>

                                                                <!-- Description -->
                                                                <p class="desc kw-details-desc">
                                                                    {{$product['info']['description']}}
                                                                </p>

                                                                <!-- Price -->
                                                                <span class="price">
                                                                    @if($product['newPrice'] != null)
                                                                        <del data-was="WAS">
																		<span class="amount">@asDollars($product['info']['price'])</span>
																	</del>
                                                                        <ins data-now="NOW">
																		<span class="amount">@asDollars($product['newPrice'])</span>
																	</ins>
                                                                    @else
                                                                        <span class="amount">@asDollars($product['info']['price'])</span>
                                                                    @endif
																</span>
                                                                <!--/ Price -->
                                                            </div>
                                                            <!--/ details fixclear -->
                                                        </a>
                                                        <!-- Product container link -->

                                                        <!-- Actions -->
                                                        <div class="actions kw-actions">
                                                            @auth
                                                            <form action="{{route('cart.add')}}" method="post" class="add_to_cart_form">
                                                                <button type="submit" name="submit"
                                                                        class="actions-addtocart add_to_cart_button product_type_simple add_cart_shop">
                                                                    Add to cart</button>
                                                                <input type="hidden"  name="product_id" value="{{$product['info']['id']}}">
                                                                <input type="hidden"  name="product_qty" value="1">
                                                                <input type="hidden" name="product_price" value="{{$product['info']['new_price']}}">
                                                            </form>
                                                            @else
                                                                <a href="{{route('login')}}" class="actions-moreinfo">Login to purchase</a>
                                                                @endauth
                                                                <a href="/shop/product/{{$product['info']['slug']}}" class="actions-moreinfo">MORE INFO</a>
                                                        </div>
                                                        <!--/ Actions -->
                                                    </div>
                                                    <!--/ product-list-item -->
                                                </li>
                                        @endforeach
                                        <!--/ Product item -->
                                        </ul>
                                        <!-- Featured products list -->

                                        <!-- Navigation controls -->
                                        <div class="th-controls controls">
                                            <a href="#" class="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a href="#" class="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                        <!--/ Navigation controls -->
                                    </div>
                                    <!--/ .shop-latest-carousel -->
                                </div>
                                <!--/ col-sm-12 -->
                            </div>
                            <!--/ row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Title with custom font size, default theme color  -->
                                    <h3 class="m_title fs-26 tcolor spp-title">LATEST PRODUCTS</h3>
                                </div>
                                <!--/ col-sm-12 -->

                                <div class="col-sm-12">
                                    <!-- Shop latest carousel -->
                                    <div class="shop-latest-carousel">
                                        <!-- Featured products list -->
                                        <ul class="featured_products">
                                        @foreach($latest_products as $product)
                                            <!-- Product item -->
                                                <li>
                                                    <div class="product-list-item prod-layout-classic">
                                                        <!-- Badge container -->
                                                        <div class="zn_badge_container">
                                                            @if($product['info']['has_offer'] == 1)
                                                                <span class="zn_badge_sale">SALE!</span>
                                                            @endif
                                                            <span class="zn_badge_new">NEW!</span>
                                                        </div>
                                                        <!--/ Badge container -->

                                                        <!-- Product container link -->
                                                        <a href="/shop/product/{{$product['info']['slug']}}" style="height: 450px; overflow: hidden">
                                                            <!-- Image wrapper -->
                                                            <span class="image kw-prodimage" style="height: 250px">
																<!-- Primary image -->
																<img class="kw-prodimage-img"
                                                                     src="{{asset('/storage/products/').'/'.$product['info']['featured_image']}}"
                                                                     alt="{{$product['info']['name']}}"
                                                                     title="{{$product['info']['name']}}"/>

                                                                <!-- Secondary image -->
																<img class="kw-prodimage-img-secondary"
                                                                     src="{{asset('/storage/products/').'/'.$product['secondImage']}}"
                                                                     alt="{{$product['info']['name']}}"
                                                                     title="{{$product['info']['name']}}"/>
															</span>
                                                            <!--/ Image wrapper -->

                                                            <!-- Details -->
                                                            <div class="details kw-details fixclear" style="height: 250px">
                                                                <!-- Title -->
                                                                <h3 class="kw-details-title">{{$product['info']['name']}}</h3>

                                                                <!-- Description -->
                                                                <p class="desc kw-details-desc">
                                                                    {{$product['info']['description']}}
                                                                </p>

                                                                <!-- Price -->
                                                                <span class="price">
                                                                    @if($product['newPrice'] != null)
                                                                        <del data-was="WAS">
																		<span class="amount">@asDollars($product['info']['price'])</span>
																	</del>
                                                                        <ins data-now="NOW">
																		<span class="amount">@asDollars($product['newPrice'])</span>
																	</ins>
                                                                    @else
                                                                        <span class="amount">@asDollars($product['info']['price'])</span>
                                                                    @endif
																</span>
                                                                <!--/ Price -->
                                                            </div>
                                                            <!--/ details fixclear -->
                                                        </a>
                                                        <!-- Product container link -->

                                                        <!-- Actions -->
                                                        <div class="actions kw-actions">
                                                            @auth
                                                            <form action="{{route('cart.add')}}" method="post" class="add_to_cart_form">
                                                                <button type="submit" name="submit"
                                                                        class="actions-addtocart add_to_cart_button product_type_simple add_cart_shop">
                                                                    Add to cart</button>
                                                                <input type="hidden"  name="product_id" value="{{$product['info']['id']}}">
                                                                <input type="hidden"  name="product_qty" value="1">
                                                                <input type="hidden" name="product_price" value="{{$product['info']['new_price']}}">
                                                            </form>
                                                            @else
                                                                <a href="{{route('login')}}" class="actions-moreinfo">Login to purchase</a>
                                                                @endauth
                                                                <a href="/shop/product/{{$product['info']['slug']}}" class="actions-moreinfo">MORE INFO</a>
                                                        </div>
                                                        <!--/ Actions -->
                                                    </div>
                                                    <!--/ product-list-item -->
                                                </li>
                                                <!--/ Product item -->
                                            @endforeach
                                        </ul>
                                        <!--/ Featured products list -->

                                        <!-- Navigation controls -->
                                        <div class="th-controls controls">
                                            <a href="#" class="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a href="#" class="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                        <!--/ Navigation controls -->
                                    </div>
                                    <!--/ Shop latest carousel -->
                                </div>
                                <!--/ col-sm-12 -->
                            </div>
                            <!--/ row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Title with custom font size, default theme color  -->
                                    <h3 class="m_title fs-26 spp-title">BEST SELLING PRODUCTS</h3>
                                </div>
                                <!--/ col-sm-12 -->

                                <div class="col-sm-12">
                                    <!-- Shop latest carousel -->
                                    <div class="shop-latest-carousel">
                                        <!-- Featured products list -->
                                        <ul class="featured_products">
                                        @foreach($best_products as $product)
                                            <!-- Product item -->
                                                <li>
                                                    <div class="product-list-item prod-layout-classic">
                                                        <!-- Badge container -->
                                                        <div class="zn_badge_container">
                                                            @if($product['info']['has_offer'] == 1)
                                                                <span class="zn_badge_sale">SALE!</span>
                                                            @endif
                                                            @foreach($latest as $latest_product)
                                                                @if($product['info']['id'] == $latest_product['id'])
                                                                    <span class="zn_badge_new">NEW!</span>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!--/ Badge container -->

                                                        <!-- Product container link -->
                                                        <a href="/shop/product/{{$product['info']['slug']}}" style="height: 450px; overflow: hidden">
                                                            <!-- Image wrapper -->
                                                            <span class="image kw-prodimage" style="height: 250px">
																<!-- Primary image -->
																<img class="kw-prodimage-img"
                                                                     src="{{asset('/storage/products/').'/'.$product['info']['featured_image']}}"
                                                                     alt="{{$product['info']['name']}}"
                                                                     title="{{$product['info']['name']}}"/>

                                                                <!-- Secondary image -->
																<img class="kw-prodimage-img-secondary"
                                                                     src="{{asset('/storage/products/').'/'.$product['secondImage']}}"
                                                                     alt="{{$product['info']['name']}}"
                                                                     title="{{$product['info']['name']}}"/>
															</span>
                                                            <!--/ Image wrapper -->

                                                            <!-- Details -->
                                                            <div class="details kw-details fixclear" style="height: 250px">
                                                                <!-- Title -->
                                                                <h3 class="kw-details-title">{{$product['info']['name']}}</h3>

                                                                <!-- Description -->
                                                                <p class="desc kw-details-desc">
                                                                    {{$product['info']['description']}}
                                                                </p>

                                                                <!-- Price -->
                                                                <span class="price">
                                                                    @if($product['newPrice'] != null)
                                                                        <del data-was="WAS">
																		<span class="amount">@asDollars($product['info']['price'])</span>
																	</del>
                                                                        <ins data-now="NOW">
																		<span class="amount">@asDollars($product['newPrice'])</span>
																	</ins>
                                                                    @else
                                                                        <span class="amount">@asDollars($product['info']['price'])</span>
                                                                    @endif
																</span>
                                                                <!--/ Price -->
                                                            </div>
                                                            <!--/ details fixclear -->
                                                        </a>
                                                        <!-- Product container link -->

                                                        <!-- Actions -->
                                                        <div class="actions kw-actions">
                                                            @auth
                                                            <form action="{{route('cart.add')}}" method="post" class="add_to_cart_form">
                                                                <button type="submit" name="submit"
                                                                        class="actions-addtocart add_to_cart_button product_type_simple add_cart_shop">
                                                                    Add to cart</button>
                                                                <input type="hidden"  name="product_id" value="{{$product['info']['id']}}">
                                                                <input type="hidden"  name="product_qty" value="1">
                                                                <input type="hidden" name="product_price" value="{{$product['info']['new_price']}}">
                                                            </form>
                                                            @else
                                                                <a href="{{route('login')}}" class="actions-moreinfo">Login to purchase</a>
                                                                @endauth
                                                                <a href="/shop/product/{{$product['info']['slug']}}" class="actions-moreinfo">MORE INFO</a>
                                                        </div>
                                                        <!--/ Actions -->
                                                    </div>
                                                    <!--/ product-list-item -->
                                                </li>
                                                <!--/ Product item -->
                                            @endforeach
                                        </ul>
                                        <!--/ Featured products list -->

                                        <!-- Navigation controls -->
                                        <div class="th-controls controls">
                                            <a href="#" class="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a href="#" class="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                        <!--/ Navigation controls -->
                                    </div>
                                    <!--/ .shop-latest-carousel -->
                                </div>
                                <!--/ col-sm-12 -->
                            </div>
                            <!--/ row -->
                        </div>
                        <!--/ spp-products-rows -->
                    </div>
                    <!--/ shop latest -->
                </div>
                <!--/ col-md-12 col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ FEATURED / LATEST / BEST SELLING Carousels section -->


    <!-- Button section with custom bottom padding -->
    <section class="hg_section pbottom-65">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Button element -->
                    <div class="text-center">
                        <!-- Button dark lined -->
                        <a class="btn-element btn btn-lined lined-dark btn-md btn-third" href="/shop/all"
                           style="margin:0 auto;">
                            <span>SEE ALL PRODUCTS OF THIS YEAR</span>
                        </a>
                    </div>
                    <!--/ Button element -->
                </div>
                <!--/ col-md-12 col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Button section with custom bottom padding -->


    <!-- Shop services full width section with custom background color and paddings + bottom mask style 3 -->
    <section class="hg_section--relative ptop-65 pbottom-85" style="background-color: #cc2e2e;">
        <!-- Background -->
        <div class="kl-bg-source">
            <!-- Gloss overlay -->
            <div class="kl-bg-source__overlay-gloss">
            </div>
            <!--/ Gloss overlay -->
        </div>
        <!--/ Background -->

        <div class="container">
            <div class="row">
                <div class="col-sm-offset-2 col-md-8 col-sm-8">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <!-- Icon box element / center aligned -->
                            <div class="kl-iconbox kl-iconbox--align-center text-center kl-iconbox--theme-light">
                                <div class="kl-iconbox__inner">
                                    <!-- Icon/Image wrapper -->
                                    <div class="kl-iconbox__icon-wrapper ">
                                        <!-- SVG icon with custom size and white color -->
                                        <img src="{{asset('/app/images/ico-world.svg')}}"
                                             class="kl-iconbox__icon fs-60 white" alt=""
                                             title=""/>
                                    </div>
                                    <!--/ .kl-iconbox__icon-wrapper -->

                                    <!-- Content wrapper -->
                                    <div class="kl-iconbox__content-wrapper">
                                        <!-- Description wrapper -->
                                        <div class="kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
                                            <!-- Description -->
                                            <p class="kl-iconbox__desc white">
                                                <!-- Font size large and semibold style -->
                                                <span class="fs-large fw-semibold">WORLD WIDE </span><br>
                                                SHIPPING
                                            </p>
                                            <!--/ Description -->
                                        </div>
                                        <!--/ Description wrapper -->
                                    </div>
                                    <!--/ .kl-iconbox__content-wrapper -->
                                </div>
                                <!--/ .kl-iconbox__inner -->
                            </div>
                            <!--/ Icon box element / center aligned -->
                        </div>
                        <!--/ col-md-4 col-sm-4 -->

                        <div class="col-md-4 col-sm-4">
                            <!-- Icon box element / center aligned -->
                            <div class="kl-iconbox kl-iconbox--align-center text-center kl-iconbox--theme-light ">
                                <div class="kl-iconbox__inner">
                                    <!-- Icon/Image wrapper -->
                                    <div class="kl-iconbox__icon-wrapper ">
                                        <!-- SVG icon with custom size and white color -->
                                        <img src="{{asset('/app/images/noun_101901.svg')}}"
                                             class="kl-iconbox__icon fs-60 white" alt=""
                                             title=""/>
                                    </div>
                                    <!--/ .kl-iconbox__icon-wrapper -->

                                    <!-- Content wrapper -->
                                    <div class="kl-iconbox__content-wrapper">
                                        <!-- Description wrapper -->
                                        <div class="kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
                                            <!-- Description -->
                                            <p class="kl-iconbox__desc white">
                                                <!-- Font size large and semibold style -->
                                                <span class="fs-large fw-semibold">FREE AND FAST</span><br>
                                                DELIVERY
                                            </p>
                                            <!--/ Description -->
                                        </div>
                                        <!--/ Description wrapper -->
                                    </div>
                                    <!--/ .kl-iconbox__content-wrapper -->
                                </div>
                                <!--/ .kl-iconbox__inner -->
                            </div>
                            <!--/ Icon box element / center aligned -->
                        </div>
                        <!--/ col-md-4 col-sm-4 -->

                        <div class="col-md-4 col-sm-4">
                            <!-- Icon box element / center aligned -->
                            <div class="kl-iconbox kl-iconbox--align-center text-center kl-iconbox--theme-light">
                                <div class="kl-iconbox__inner">
                                    <!-- Icon/Image wrapper -->
                                    <div class="kl-iconbox__icon-wrapper ">
                                        <!-- SVG icon with custom size and white color -->
                                        <img src="{{asset('/app/images/noun_47021.svg')}}"
                                             class="kl-iconbox__icon fs-60 white" alt=""
                                             title=""/>
                                    </div>
                                    <!--/ .kl-iconbox__icon-wrapper -->

                                    <!-- Content wrapper -->
                                    <div class="kl-iconbox__content-wrapper">
                                        <!-- Description wrapper -->
                                        <div class="kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
                                            <!-- Description -->
                                            <p class="kl-iconbox__desc white">
                                                <!-- Font size large and semibold style -->
                                                <span class="fs-large fw-semibold">BEST PRICE</span><br>
                                                GUARANTEED
                                            </p>
                                            <!--/ Description -->
                                        </div>
                                        <!--/ Description wrapper -->
                                    </div>
                                    <!--/ .kl-iconbox__content-wrapper -->
                                </div>
                                <!--/ .kl-iconbox__inner -->
                            </div>
                            <!--/ Icon box element / center aligned -->
                        </div>
                        <!--/ col-md-4 col-sm-4 -->
                    </div>
                    <!--/ row -->
                </div>
                <!--/ col-sm-offset-2 col-md-8 col-sm-8 -->

                <div class="col-md-12 col-sm-12">
                    <!-- Button element -->
                    <div class="text-center">
                        <!-- Button lined style -->
                        <a class="btn-element btn btn-lined btn-md" href="{{route('front.about')}}">
                            <span>OUR SERVICES</span>
                        </a>
                    </div>
                    <!--/ Button element -->
                </div>
                <!--/ col-md-12 col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->

        <!-- Bottom mask style 3 -->
        <div class="kl-bottommask kl-bottommask--mask3">
            <svg width="5000px" height="57px" class="svgmask " viewbox="0 0 5000 57" version="1.1"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <filter x="-50%" y="-50%" width="200%" height="200%" filterunits="objectBoundingBox"
                            id="filter-mask3">
                        <feoffset dx="0" dy="3" in="SourceAlpha" result="shadowOffsetInner1"></feoffset>
                        <fegaussianblur stddeviation="2" in="shadowOffsetInner1"
                                        result="shadowBlurInner1"></fegaussianblur>
                        <fecomposite in="shadowBlurInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1"
                                     result="shadowInnerInner1"></fecomposite>
                        <fecolormatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.4 0" in="shadowInnerInner1"
                                       type="matrix" result="shadowMatrixInner1"></fecolormatrix>
                        <femerge>
                            <femergenode in="SourceGraphic"></femergenode>
                            <femergenode in="shadowMatrixInner1"></femergenode>
                        </femerge>
                    </filter>
                </defs>
                <path d="M9.09383679e-13,57.0005249 L9.09383679e-13,34.0075249 L2418,34.0075249 L2434,34.0075249 C2434,34.0075249 2441.89,33.2585249 2448,31.0245249 C2454.11,28.7905249 2479,11.0005249 2479,11.0005249 L2492,2.00052487 C2492,2.00052487 2495.121,-0.0374751261 2500,0.000524873861 C2505.267,-0.0294751261 2508,2.00052487 2508,2.00052487 L2521,11.0005249 C2521,11.0005249 2545.89,28.7905249 2552,31.0245249 C2558.11,33.2585249 2566,34.0075249 2566,34.0075249 L2582,34.0075249 L5000,34.0075249 L5000,57.0005249 L2500,57.0005249 L1148,57.0005249 L9.09383679e-13,57.0005249 Z"
                      class="bmask-bgfill" filter="url(#filter-mask3)" fill="#f5f5f5"></path>
            </svg>
            <i class="glyphicon glyphicon-chevron-down"></i>
        </div>
        <!--/ Bottom mask style 3 -->
    </section>
    <!--/ Shop services full width section with custom background color and paddings + bottom mask style 3 -->

    <!-- Title with Call to Action Button -->
    <section class="hg_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- separator margin bottom 65px -->
                    <div class="hg_separator clearfix mb-65">
                    </div>
                    <!--/ separator  -->
                </div>
                <!--/ col-md-12 col-sm-12 -->

                <div class="col-md-9 col-sm-9">
                    <div class="kl-title-block clearfix tbk--text-default tbk--left text-left tbk-symbol-- tbk-icon-pos--after-title">
                        <h3 class="tbk__title montserrat fw-semibold tcolor">NEED HELP? CONTACT US...</h3>
                        <h4 class="tbk__subtitle">We'll do everything we can to make you satisfied!</h4>
                    </div>
                </div>
                <!--/ col-md-9 col-sm-9 -->

                <div class="col-md-3 col-sm-3">
                    <!-- spacer 10px -->
                    <div class="th-spacer clearfix" style="height: 10px;">
                    </div>
                    <!--/ spacer -->

                    <!-- Call to Action button -->
                    <div class="zn_buttons_element text-left">
                        <a class="btn-element btn btn-lined lined-custom btn-md btn-block " href="{{route('front.contact')}}"
                           style="margin:0 0 10px 0;"><span>CONTACT US</span></a>
                    </div>
                    <!--/ Call to Action button -->
                </div>
                <!--/ col-md-3 col-sm-3 -->
            </div>
            <!--/ row-->
        </div>
        <!--/ container -->
    </section>
    <!--/ Title with Call to Action Button -->

@endsection
@section('newsletter_popup')
    <!-- Newsletter-box -->
    @include('inc.newsLetterPopUp')
    <!--/ #newsletter-box -->
@endsection

@section('scripts')

    <!-- JS FILES // Loaded on this page -->
    <!-- Required js script for animateme scroll effect for slideshow  -->
    <script type="text/javascript" src="{{asset('/app/js/plugins/scrollme/jquery.scrollme.js')}}"></script>

    <!-- Required js script for iOS slider -->
    <script type="text/javascript" src="{{asset('/app/js/plugins/_sliders/ios/jquery.iosslider.min.js')}}"></script>

    <!-- Required js trigger for iOS Slider -->
    <script type="text/javascript" src="{{asset('/app/js/trigger/slider/ios/kl-ios-slider.js')}}"></script>

    <!-- CarouFredSel required js script for Partner / Featured products carousel elements -->
    <script type="text/javascript"
            src="{{asset('/app/js/plugins/_sliders/caroufredsel/jquery.carouFredSel-packed.js')}}"></script>

    <!-- Required js trigger for Partners Carousel -->
    <script type="text/javascript" src="{{asset('/app/js/trigger/kl-partners-carousel.js')}}"></script>
@endsection
