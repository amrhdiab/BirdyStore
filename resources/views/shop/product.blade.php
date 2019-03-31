@extends('layouts.app')

@section('title')
    {{$product['name']}} - Shop | {{$settings['website_name']}}
@endsection

@section('bodyClass','kl-store kl-store-page single-product')

@section('content')

    <!-- Page sub-header invisible (no sub-header) -->
    <div id="page_header" class="page-subheader min-200 no-bg">
        <!-- Sub-Header content wrapper with custom min height .min-300  -->
        <div class="ph-content-wrap min-200" style="height: 10px;padding-top: 200px">
            <div class="ph-content-v-center">
                <div class="container">
                    <div class="row">
                        <!-- Breadcrumbs -->
                        <ul class="breadcrumbs fixclear">
                            <li><a href="/">HOME</a></li>
                            <li><a href="/shop/all">SHOP</a></li>
                            <li><a href="/shop/category/{{$product->sub_cat->category->slug}}">{{$product->sub_cat->category->name}}</a></li>
                            <li><a href="/shop/category/{{$product->sub_cat->category->slug}}/{{$product->sub_cat->slug}}">{{$product->sub_cat->name}}</a></li>
                            <li>{{$product->name}}</li>
                        </ul>
                        <!--/ Breadcrumbs -->
                    </div>
                    <!--/ row -->
                </div>
                <!--/ container -->
            </div>
            <!--/ .ph-content-v-center -->
        </div>
        <!--/ Sub-Header content wrapper -->
    </div>
    <!--/ Page sub-header invisible (no sub-header) -->

    <!-- Product page content section -->
    <section id="content" class="hg_section">
        <div class="container">
            <div class="row">
                <!-- Content with right sidebar -->
                <div class="right_sidebar col-md-9">
                    <!-- Product -->
                    <div class="product">
                        <!-- Product page -->
                        <div class="row product-page">
                            <!-- Product main images -->
                            <div class="single_product_main_image col-sm-5">
                                <!-- Badge container -->
                                <div class="zn_badge_container">
                                    @if($product['has_offer'] == 1)
                                        <span class="zn_badge_sale">SALE!</span>
                                    @endif
                                    @foreach($latest as $latest_product)
                                        @if($product['id'] == $latest_product['id'])
                                            <span class="zn_badge_new">NEW!</span>
                                        @endif
                                    @endforeach
                                </div>
                                <!--/ Badge container -->

                                <!-- Images -->
                                <div class="images">
                                    <!-- Main image -->
                                    <a href="{{asset('/storage/products/').'/'.$product['featured_image']}}" class="kl-store-main-image zoom" title="{{$product['name']}}">
                                        <img width="600" height="600" src="{{asset('/storage/products/').'/'.$product['featured_image']}}" class="attachment-shop_single wp-post-image" alt="{{$product['name']}}" title="{{$product['name']}}" />
                                    </a>
                                    <!-- Main image -->

                                    <!-- Thumbnails -->
                                    <div class="thumbnails columns-4">
                                        <!-- Thumb #1 -->
                                        <a href="{{asset('/storage/products/').'/'.$product['featured_image']}}" class="zoom first" title="{{$product['name']}}">
                                            <!-- Image -->
                                            <img width="180" height="180" src="{{asset('/storage/products/').'/'.$product['featured_image']}}" class="attachment-shop_thumbnail" alt="{{$product['name']}}" title="{{$product['name']}}" />
                                        </a>
                                    @foreach($images as $key => $image)
                                            @if($key > 0)
                                                <!-- Thumb #2 -->
                                                <a href="{{asset('/storage/products/').'/'.$image}}" class="zoom" title="{{$product['name']}}">
                                                    <!-- Image -->
                                                    <img width="180" height="180" src="{{asset('/storage/products/').'/'.$image}}" class="attachment-shop_thumbnail" alt="{{$product['name']}}" title="{{$product['name']}}" />
                                                </a>
                                                <!--/ Thumbnails -->
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                                <!--/ Images -->
                            </div>
                            <!--/ single_product_main_image col-sm-5 -->

                            <!-- Main data -->
                            <div class="main-data col-sm-7">
                                <div class="summary entry-summary">
                                    <!-- Product title -->
                                    <h2 class="product_title entry-title">{{$product['name']}}</h2>

                                    <!-- Price -->
                                    <div>
                                        <p class="price">
                                            <span class="amount">@asDollars($product['new_price'])</span>
                                        </p>
                                    </div>
                                    <!-- Price -->

                                    <!-- Description -->
                                    <div>
                                        <p class="desc kw-details-desc">
                                            {{$product['description']}}
                                        </p>
                                    </div>
                                    <!--/ Description -->

                                    <!-- Cart -->
                                    <form class="cart add_to_cart_form" method="post">
                                        <!-- Single variations wrapper -->
                                        <div class="single_variation_wrap">
                                            <!-- Price variation -->
                                            <div class="single_variation">
													<span class="price">
                                                        @if($product['has_offer'] == 1)
                                                            <del>
                                                            <span class="amount">@asDollars($product['price'])</span>
                                                            </del>
                                                        @endif
														<ins>
															<span class="amount">@asDollars($product['new_price'])</span>
														</ins>
													</span>
                                            </div>
                                            <!--/ Price variation -->
                                            @auth
                                            <!-- Button variations -->
                                            <div class="variations_button">
                                                <div class="quantity">
                                                    <input type="number" step="1" name="product_qty" value="1" title="Qty" class="input-text qty text" size="4" min="1" max="{{$product['stock']}}" style="width: 80px">
                                                </div>
                                                <button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>
                                            </div>
                                            <!--/ Button variations -->
                                            @else
                                                <a href="{{route('login')}}" class="single_add_to_cart_button button alt">Login to purchase</a>
                                            @endauth
                                        </div>
                                        <!--/ Single variations wrapper -->
                                        <input type="hidden" name="product_id" value="{{$product['id']}}">
                                        <input type="hidden" name="product_price" value="{{$product['new_price']}}">
                                    </form>
                                    <!-- Cart -->

                                    <!-- Meta -->
                                    <div class="product_meta">
                                        <span class="sku_wrapper">Stock: <span class="sku">{{$product['stock']}}</span></span>
                                        <span class="posted_in">Categories: <a href="/shop/category/{{$product->sub_cat->category->slug}}" rel="tag">{{$product->sub_cat->category->name}}</a>, <a href="/shop/category/{{$product->sub_cat->category->slug}}/{{$product->sub_cat->slug}}" rel="tag">{{$product->sub_cat->name}}</a></span>
                                    </div>
                                    <!--/ Meta -->
                                </div>
                                <!-- .summary -->
                            </div>
                            <!--/ main-data col-sm-7 -->
                        </div>
                        <!--/ row product-page -->

                        <!-- Description & Reviews tabs -->
                        <div class="tabbable">
                            <!-- Navigation -->
                            <ul class="nav fixclear">
                                <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
                                <li class=""><a href="#tab-reviews" data-toggle="tab">Reviews ({{count($productReviews)}})</a></li>
                            </ul>

                            <!-- Tab content -->
                            <div class="tab-content">
                                <!-- Description -->
                                <div class="tab-pane active" id="tab-description">
                                    <h2 class="fs-18">PRODUCT DESCRIPTION</h2>
                                    <p>
                                        {{$product['description']}}
                                    </p>
                                </div>
                                <!--/ Description -->

                                <!-- Reviews -->
                                <div class="tab-pane" id="tab-reviews">
                                    <div id="reviews">
                                        <div id="comments">
                                            <h2 class="fs-18"><small>{{count($productReviews)}} REVIEWS FOR</small> {{$product->name}}</h2>
                                            <ol class="commentlist" style="list-style: none">
                                                @if(count($productReviews)>0)
                                                    @foreach($productReviews as $review)
                                                        <!-- #comment-## -->
                                                        <li class="comment even thread-even depth-1">
                                                            <div id="comment-13">
                                                                <div class="comment_container clearfix">
                                                                    <img alt="" src="{{asset('/storage/users/').'/'.$review->user->avatar}}" class="avatar avatar-60 photo" height="60" width="60">
                                                                    <div class="comment-text">
                                                                        <p class="meta">
                                                                            <strong>{{$review->user->name}}</strong> – {{$review->updated_at->diffForHumans()}}:
                                                                        </p>
                                                                        <div class="description">
                                                                            <p>
                                                                                 {{$review->comment}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- #comment-## -->
                                                    @endforeach
                                                @endif
                                            </ol>
                                        </div>
                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                    <h3 id="reply-title" class="comment-reply-title">Add a review</h3>
                                                    @auth()
                                                    <form method="post" name="comment_form" id="comment_form">
                                                        <div class="col-sm-12 kl-fancy-form">
                                                            <textarea name="comment" id="comment" class="form-control h5-active" cols="30" rows="6" placeholder="type in your review here..." tabindex="4" required="required"></textarea>
                                                            <label class="control-label" style="margin-left: 10px">
                                                                REVIEW
                                                            </label>
                                                            <input type="hidden" name="product_id" id="product_id" value="{{$product['id']}}">
                                                            <button class="btn btn-fullcolor" type="submit" style="margin-top: 10px">Add Review</button>
                                                        </div>
                                                    </form>
                                                    @else
                                                        <p class="must-log-in">
                                                            You must be <a href="{{route('login')}}">logged in</a> to post a review.
                                                        </p>
                                                    @endauth
                                                </div>
                                                <!-- #respond -->
                                            </div>
                                        </div>

                                        <div class="clear">
                                        </div>
                                    </div>
                                </div>
                                <!--/ Reviews -->
                            </div>
                            <!--/ Tab content -->
                        </div>
                        <!-- Description & Reviews tabs -->

                        <!-- Upsells products -->
                        <div class="upsells products">
                            <!-- Title -->
                            <h2>You may also like…</h2>
                            <!-- Products -->
                            <ul class="products">
                            @foreach($upSellProducts as $product)
                                <!-- Product item -->
                                    <li class="product">
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
                            <!--/ Products -->
                        </div>
                        <!--/ Upsells products -->
                    </div>
                    <!--/ Product -->
                </div>
                <!--/ Content with right sidebar -->

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

                        <!-- Featured products widget -->
                        <div id="kl-store_top_rated_products-2" class="widget kl-store widget_top_rated_products">
                            <h3 class="widgettitle title">Featured PRODUCTS</h3>
                            <ul class="product_list_widget">
                                @foreach($featuredProducts as $product)
                                    <li>
                                        <a href="/shop/product/{{$product->slug}}" title="{{$product->name}}">
                                            <img width="180" height="180" src="{{asset('/storage/products/').'/'.$product['featured_image']}}" class="attachment-shop_thumbnail wp-post-image" alt="{{$product->name}}">
                                            <span class="product-title">{{$product->name}}</span>
                                        </a>
                                        <div class="star-rating" title="{{$product->sales}} Sales">
                                            <span style="width:100%">Only<strong class="rating"> {{$product->stock}} </strong>Pieces Left.</span>
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
                        <!--/ Featured products widget -->
                    </div>
                </div>
                <!--/ Right sidebar -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Product page content section -->

@endsection

@section('scripts')
    <!-- JS FILES // Loaded on this page -->
    <script type="text/javascript" src="{{asset('app/js/plugins/jquery-ui-1.10.3.custom.min.js')}}"></script>

    <!-- Custom Kallyas JS codes -->
    <script type="text/javascript" src="{{asset('app/js/kl-scripts.js')}}"></script>

    <!-- Custom user JS codes -->
    <script type="text/javascript" src="{{asset('app/js/kl-custom.js')}}"></script>

    <script>
        $(document).ready(function () {
            //Handle adding the review
            $('#comment_form').on('submit', function (event) {
                event.preventDefault();
                var id = $(this).find('input[name="product_id"]').val();
                var comment = $(this).find('textarea[name="comment"]').val();
                $.ajax({
                    url:'{{route('reviews.front.submit')}}',
                    type: 'POST',
                    data: {
                        id: id,
                        comment: comment
                    },
                    success: function (data) {
                        if(data.success == false){
                            toastr.error(data.error, 'Error', {timeOut: 3500, positionClass: "toast-bottom-right"});
                        }else{
                            $('#comment_form').find('textarea[name="comment"]').val('');
                            toastr.success('Your review was submitted, and waiting for admin approval.', 'Success!', {
                                timeOut: 3500,
                                positionClass: "toast-bottom-right"
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection