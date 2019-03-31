@if(count($products)>0)
    <!-- Results -->
        <p class="kl-store-result-count">Showing all <strong style="font-size: 15px; text-decoration: underline">{{$count}}</strong> results</p>
        <!-- Products list -->
        <ul class="products clearfix" id="single_product">
        @foreach($products as $product)
            @if($product['info']['stock'] > 0)
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
            @endif
            @endforeach
        </ul>
        <!--/ Products list -->
        {!! $products->links() !!}
        {{--{{$products->links()}}--}}
    @else
        <p class="kl-store-result-count"><strong style="font-size: 15px">No Results Found...</strong></p>
    @endif