@extends('layouts.app')

@section('title')
    {{$selected_subcat['name']}} - Shop | {{$settings['website_name']}}
@endsection

@section('bodyClass','kl-store-page')

@section('content')

    <!-- Page sub-header invisible (no sub-header) -->
    <div id="page_header" class="page-subheader min-200 no-bg">
        <!-- Sub-Header content wrapper with custom min height .min-300  -->
        <div class="ph-content-wrap min-200" style="height: 10px;padding-top: 170px">
            <div class="ph-content-v-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Breadcrumbs -->
                            <ul class="breadcrumbs fixclear">
                                <li><a href="/">Home</a></li>
                                <li><a href="/shop/all">SHOP</a></li>
                                <li><a href="/shop/category/{{$selected_category->slug}}">{{$selected_category->name}}</a></li>
                                <li>{{$selected_subcat['name']}}</li>
                            </ul>
                            <!--/ Breadcrumbs -->
                        </div>
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

    <!-- Products category section with custom top padding -->
    <section class="hg_section">
        <div class="container">
            <div class="row">
                <!-- Content with left sidebar -->
                <div class="left_sidebar col-md-9">
                    <!-- Title with bold style -->
                    <h1 class="page-title fw-bold">{{$selected_subcat['name']}}</h1>

                    <!-- Ordering -->
                    <div class="kl-store-ordering">
                        <select name="orderby" class="orderby" id="orderby" style="width: 230px">
                            <option value="created_at" data-sorting_type="desc" selected>Sort by newness</option>
                            <option value="sales" data-sorting_type="desc">Sort by popularity</option>
                            <option value="new_price" data-sorting_type="asc">Sort by price: low to high</option>
                            <option value="new_price" data-sorting_type="desc">Sort by price: high to low</option>
                        </select>
                    </div>
                    <!--/ Ordering -->

                    <div class="products_wraper">
                        @include('shorts.productMarkup')
                    </div>
                </div>
                <!--/ Content with left sidebar -->

                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                <input type="hidden" name="hidden_sorting_name" id="hidden_sorting_name" value="created_at" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />

                <!-- Sidebar left -->
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
                                    <div>
                                        <input id="search_products" name="search" maxlength="20" class=" gensearch__input"
                                               type="text" size="20" placeholder="Search...">
                                    </div>
                                </div>
                                <!-- Search wrapper -->
                            </div>
                            <!--/ Search widget -->
                        </div>
                        <!--/ Search widget -->

                        <!-- Price filter widget -->
                        <div id="kl-store_price_filter-2" class="widget kl-store widget_price_filter">
                            <!-- Title -->
                            <h3 class="widgettitle title">FILTER BY PRICE</h3>
                            <div>
                                <div class="price-range">
                                    <div class="price-range-slider">
                                    </div>
                                    <button type="submit" class="button" id="price_filter_submit">Filter</button>
                                    <div class="pr-result">
                                        <span>Price: </span>
                                        <input type="text" name="price-filter" class="price-result" data-currency="$"
                                               width="width: 100px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Price filter widget -->

                        <!-- Product categories widget -->
                        <div id="kl-store_product_categories-2" class="widget kl-store widget_product_categories">
                            <!-- Title -->
                            <h3 class="widgettitle title">PRODUCT CATEGORIES</h3>

                            <!-- Product category list -->
                            <ul class="product-categories">
                                @foreach($categories as $category)
                                    <li class="cat-item"><a
                                                href="/shop/category/{{$category->slug}}">{{$category['name']}}</a><span
                                                class="count">({{count($category->products)}})</span>
                                        <ul class="children">
                                            @foreach($category->sub_cats as $sub_cat)
                                                <li class="cat-item"><a
                                                            href="/shop/category/{{$category->slug}}/{{$sub_cat->slug}}">{{$sub_cat['name']}}</a><span
                                                            class="count">({{count($sub_cat->products)}})</span></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                            <!--/ Product category list -->
                        </div>
                        <!--/ Product categories widget -->
                    </div>
                </div>
                <!--/ Sidebar left col-md-3 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Products category section with custom top padding -->

@endsection

@section('scripts')
    <!-- JS FILES // Loaded on this page -->
    <script type="text/javascript" src="{{asset('app/js/plugins/jquery-ui-1.10.3.custom.min.js')}}"></script>

    <!-- Custom Kallyas JS codes -->
    <script type="text/javascript" src="{{asset('app/js/kl-scripts.js')}}"></script>

    <!-- Custom user JS codes -->
    <script type="text/javascript" src="{{asset('app/js/kl-custom.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            // Price Filter
            var priceRange = $( ".price-range-slider" );
            if(typeof(priceRange) != 'undefined') {
                $.each(priceRange, function(index, val) {
                    var _t = $(this),
                            priceResult = _t.parent().find(".price-result"),
                            currency = priceResult.data('currency');

                    _t.slider({
                        range: true,
                        min: 0,
                        max: '{{$max_price}}',
                        values: [ {{$min_price}}, {{$max_price}} ],
                        slide: function( event, ui ) {
                            priceResult.val( currency + ui.values[ 0 ] + " - "+ currency + ui.values[ 1 ] );
                        }
                    });
                    filter_value = priceResult.val( currency + _t.slider( "values", 0 ) + " - " + currency + _t.slider( "values", 1 ) );
                });
            }
            // END Price Filter

            //Fetch Data Function
            function fetch_data(page, sort_type, sort_by, query , price_filter)
            {
                $.ajax({
                    url:"/shop/category/{{$selected_category->slug}}/{{$selected_subcat->slug}}/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query+"&price_filter="+price_filter,
                    success:function(data)
                    {
                        $('.products_wraper').html('');
                        $('.products_wraper').html(data);
                        var selectedop = $('#hidden_sorting_name').val();
                        var order = $('#hidden_sort_type').val();
                        $('#orderby [value='+selectedop+'][data-sorting_type='+order+']').attr('selected', 'true');
                    }
                })
            }

            //Ajax Search Products
            $(document).on('keyup', '#search_products', function(){
                var query = $('#search_products').val();
                var hidden_sorting_name = $('#hidden_sorting_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                var filter = $('.price-result').val();
                fetch_data(page, sort_type, hidden_sorting_name, query,filter);
            });

            //Ajax Sort Products
            $(document).on('change', '.orderby', function(){
                var sorting_name = $(this).val();
                var order_type = $("option:selected", this).data('sorting_type');

                //Set the hidden input values
                $('#hidden_sorting_name').val(sorting_name);
                $('#hidden_sort_type').val(order_type);
                var page = $('#hidden_page').val();
                var query = $('#search_products').val();
                var filter = $('.price-result').val();
                fetch_data(page, order_type, sorting_name, query,filter);
            });

            //Ajax Products Price Filtering
            $(document).on('click','#price_filter_submit',function () {
                var hidden_sorting_name = $('#hidden_sorting_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                var query = $('#search_products').val();
                var filter = $('.price-result').val();
                fetch_data(page, sort_type, hidden_sorting_name, query,filter);
            });

            //Ajax Products Pagination
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var sorting_name = $('#hidden_sorting_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var filter = $('.price-result').val();
                var query = $('#search_products').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, sorting_name, query,filter);
            });

        });

    </script>
@endsection
