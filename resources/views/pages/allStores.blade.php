@extends('layouts.app')

@section('title')
    All Stores | {{$settings['website_name']}}
@endsection

@section('content')

    <!-- Page sub-header + Bottom mask style 3 -->
    <div id="page_header" class="page-subheader site-subheader-cst maskcontainer--mask3">
        <div class="bgback">
        </div>

        <!-- Background -->
        <div class="kl-bg-source">
            <!-- Gradient overlay -->
            <div class="kl-bg-source__overlay" style="background:rgba(186,3,3,1); background: -moz-linear-gradient(left, rgba(186,3,3,1) 0%, rgba(53,53,53,0.85) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(186,3,3,1)), color-stop(100%,rgba(53,53,53,0.85))); background: -webkit-linear-gradient(left, rgba(186,3,3,1) 0%,rgba(53,53,53,0.85) 100%); background: -o-linear-gradient(left, rgba(186,3,3,1) 0%,rgba(53,53,53,0.85) 100%); background: -ms-linear-gradient(left, rgba(186,3,3,1) 0%,rgba(53,53,53,0.85) 100%); background: linear-gradient(to right, rgba(186,3,3,1) 0%,rgba(53,53,53,0.85) 100%);">
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
                                <li>All Stores</li>
                            </ul>
                            <!--/ Breadcrumbs -->
                            <div class="clearfix"></div>
                        </div>
                        <!--/ col-sm-6 -->

                        <div class="col-sm-6" style="padding-top: 100px">
                            <!-- Sub-header titles -->
                            <div class="subheader-titles">
                                <h2 class="subheader-maintitle">Website Stores</h2>
                                <h4 class="subheader-subtitle">GET TO KNOW ALL OF OUR DISTRIBUTORS</h4>
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

    <!-- Portfolio sortable section with custom paddings -->
    <section class="hg_section ptop-80 pbottom-80 pl-50 pr-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Portfolio sortable element -->
                    <div class="hg-portfolio-sortable">
                        <!-- Sorting toolbar -->
                        <div id="sorting" class="fixclear">
                            <span class="sortTitle"> Sort By: </span>
                            <ul id="sortBy" class="option-set " data-option-key="sortBy" data-default="">
                                <li><a href="#sortBy=name" data-option-value="name">Name</a></li>
                            </ul>
                            <span class="sortTitle"> Direction: </span>
                            <ul id="sort-direction" class="option-set" data-option-key="sortAscending">
                                <li><a href="#sortAscending=true" data-option-value="true" class="selected">ASC</a></li>
                                <li><a href="#sortAscending=false" data-option-value="false">DESC</a></li>
                            </ul>
                        </div>
                        <!--/ Sorting toolbar -->

                        <!-- Portfolio navigation list -->
                        <ul id="portfolio-nav" class="fixclear">
                            <!-- Nav all -->
                            <li class="current"><a href="#" data-filter="*">All</a></li>

                        @foreach($categories as $category)
                            <!-- Category Nav -->
                                <li class=""><a href="#" data-filter=".{{$category['slug']}}_sort">{{$category['name']}}</a></li>
                                <!--/ Category Nav -->
                            @endforeach
                        </ul>
                        <!--/ Portfolio navigation list -->

                        <div id="test" class="clear">
                        </div>

                        <!-- Portfolio thumbs (1 to 5 columns) -->
                        <ul id="thumbs" class="fixclear" data-columns="5">
                        @foreach($stores as $store)
                            <!-- Item -->
                                <li class="item kl-has-overlay @foreach($store->categories as $category){{$category['slug']}}_sort @endforeach " data-date="{{ $category->created_at->format('d-m-Y') }}">
                                    <!-- Item wrapper -->
                                    <div class="inner-item">
                                        <!-- Intro image -->
                                        <div class="img-intro">
                                            <!-- Pop-up image -->
                                            <a href="{{asset('/storage/stores/').'/'.$store['avatar']}}" data-type="image" data-lightbox="image" class="hoverLink"></a>

                                            <!-- Image -->
                                            <img src="{{asset('/storage/stores/').'/'.$store['avatar']}}" alt="{{$store['name']}}" title="{{$store['name']}}" />

                                            <!-- Overlay -->
                                            <div class="overlay">
                                                <div class="overlay-inner">
                                                    <!-- Icon = .glyphicon-picture -->
                                                    <span class="glyphicon glyphicon-picture"></span>
                                                </div>
                                            </div>
                                            <!--/ Overlay -->
                                        </div>
                                        <!--/ Intro image -->

                                        <!-- Title -->
                                        <h4 class="title">
                                            <a href="{{route('front.single.store',$store['slug'])}}"><span class="name">{{$store['name']}}</span></a>
                                        </h4>

                                        <!-- Description -->
                                        <span class="moduleDesc">
                                            <strong>Address:</strong><br>
                                            {{$store['address']}}, {{$store['governorate']}}, {{$store['city']}}<br>
                                            <strong>Working-Hours:</strong><br>
                                            {{$store['working_hours']}}
                                        </span>

                                        <div class="clear">
                                        </div>
                                    </div>
                                    <!--/ Item wrapper (.inner-item) -->
                                </li>
                                <!--/ Item -->
                            @endforeach
                        </ul>
                        <!--/ Portfolio thumbs (1 to 4 columns) -->
                    </div>
                    <!--/ Portfolio sortable element -->
                </div>
                <!--/ col-md-12 col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Portfolio sortable section with custom paddings -->

@endsection

@section('scripts')
    <!-- JS FILES // Loaded on this page -->
    <!-- Required script for sorting (masonry) elements - Isotope filter -->
    <script type="text/javascript" src="{{asset('/app/js/plugins/jquery.isotope.min.js')}}"></script>

    <!-- Required js trigger for Portfolio sortable element -->
    <script type="text/javascript" src="{{asset('/app/js/trigger/kl-portfolio-sortable.js')}}"></script>
@endsection