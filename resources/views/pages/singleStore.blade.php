@extends('layouts.app')

@section('title')
    {{$store['name']}} | {{$settings['website_name']}}
@endsection

@section('styles')
    <style>
        #theMap {
            width: 100%;
            height: 300px;
        }
    </style>
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
                                <li><a href="{{route('front.all.stores')}}">All Stores</a></li>
                                <li>{{$store['name']}}</li>
                            </ul>
                            <!--/ Breadcrumbs -->
                            <div class="clearfix"></div>
                        </div>
                        <!--/ col-sm-6 -->

                        <div class="col-sm-6" style="padding-top: 100px">
                            <!-- Sub-header titles -->
                            <div class="subheader-titles">
                                <h2 class="subheader-maintitle">Website Stores</h2>
                                <h4 class="subheader-subtitle">{{strtoupper($store['name'])}}</h4>
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

    <!-- Portfolio item section with custom paddings -->
    <section class="hg_section ptop-40 pbottom-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div id="theMap"></div>
                    <div class="row hg-portfolio-item ptop-30">
                        <!-- Left side -->
                        <div class="col-sm-12 col-md-5">
                            <!-- Portfolio item content -->
                            <div class="portfolio-item-content">
                                <!-- Page/Portfolio title -->
                                <h1 class="page-title portfolio-item-title">{{$store['name']}}</h1>

                                <!-- Details -->
                                <ul class="portfolio-item-details clearfix">
                                    <!-- Store Name -->
                                    <li class="portfolio-item-details-client clearfix">
                                        <span class="portfolio-item-details-label">NAME </span>
                                        <span class="portfolio-item-details-item">{{$store['name']}}</span>
                                    </li>
                                    <!--/ Store Name -->

                                    <!-- Store Email -->
                                    <li class="portfolio-item-details-client clearfix">
                                        <span class="portfolio-item-details-label">EMAIL </span>
                                        <a href="mailto:{{$store['contact_email']}}">
                                            <span class="portfolio-item-details-item">{{$store['contact_email']}}</span>
                                        </a>
                                    </li>
                                    <!--/ Store Email -->
                                    <!-- Store Website -->
                                    <li class="portfolio-item-details-client clearfix">
                                        <span class="portfolio-item-details-label">WEBSITE </span>
                                        <a href="//{{$store['website']}}" target="_blank">
                                            <span class="portfolio-item-details-item">{{$store['website']}}</span>
                                        </a>
                                    </li>
                                    <!--/ Store Website -->
                                    <!-- Store Phone -->
                                    <li class="portfolio-item-details-client clearfix">
                                        <span class="portfolio-item-details-label">PHONE </span>
                                        <span class="portfolio-item-details-item">{{$store['contact_number']}}</span>
                                    </li>
                                    <!--/ Store Phone -->
                                    <!-- Store Address -->
                                    <li class="portfolio-item-details-client clearfix">
                                        <span class="portfolio-item-details-label">ADDRESS </span>
                                        <span class="portfolio-item-details-item">{{$store['address']}}</span>
                                    </li>
                                    <!--/ Store Adress -->
                                    <!-- Store Gov -->
                                    <li class="portfolio-item-details-client clearfix">
                                        <span class="portfolio-item-details-label">GOVERNORATE </span>
                                        <span class="portfolio-item-details-item">{{$store['governorate']}}</span>
                                    </li>
                                    <!--/ Store Gov -->
                                    <!-- Store City -->
                                    <li class="portfolio-item-details-client clearfix">
                                        <span class="portfolio-item-details-label">CITY </span>
                                        <span class="portfolio-item-details-item">{{$store['city']}}</span>
                                    </li>
                                    <!--/ Store City -->
                                    <!-- Store Working Hours -->
                                    <li class="portfolio-item-details-client clearfix">
                                        <span class="portfolio-item-details-label">W-HOURS </span>
                                        <span class="portfolio-item-details-item">{{$store['working_hours']}}</span>
                                    </li>
                                    <!--/ Store Working Hours -->
                                    <!-- Speciality -->
                                    <li class="portfolio-item-details-cat clearfix">
                                        <span class="portfolio-item-details-label">SPECIALITY</span>
                                        <span class="portfolio-item-details-item">
                                            @if(count($store->sub_cats) > 1)
                                                @foreach($store->sub_cats as $sub_cat)
                                                    @if($loop->last)
                                                        <a href="{{route('subCatProducts',[$sub_cat->category->slug,$sub_cat['slug']])}}" rel="tag">{{$sub_cat['name']}}</a>
                                                    @else
                                                        <a href="{{route('subCatProducts',[$sub_cat->category->slug,$sub_cat['slug']])}}" rel="tag">{{$sub_cat['name']}}</a>,
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach($store->sub_cats as $sub_cat)
                                                    <a href="{{route('subCatProducts',[$sub_cat->category->slug,$sub_cat['slug']])}}" rel="tag">{{$sub_cat['name']}}</a>
                                                @endforeach
                                            @endif
                                        </span>
                                    </li>
                                    <!--/ Speciality -->
                                    <!-- Category details -->
                                    <li class="portfolio-item-details-cat clearfix">
                                        <span class="portfolio-item-details-label">CATEGORIES</span>
                                        <span class="portfolio-item-details-item">
                                            @if(count($store->categories) > 1)
                                                @foreach($store->categories as $category)
                                                    @if($loop->last)
                                                        <a href="{{route('categoryProducts',$category['slug'])}}" rel="tag">{{$category['name']}}</a>
                                                    @else
                                                        <a href="{{route('categoryProducts',$category['slug'])}}" rel="tag">{{$category['name']}}</a>,
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach($store->categories as $category)
                                                    <a href="{{route('categoryProducts',$category['slug'])}}" rel="tag">{{$category['name']}}</a>
                                                @endforeach
                                            @endif
                                        </span>
                                    </li>
                                    <!--/ Category details -->
                                </ul>
                                <!--/ Details -->

                                <!-- Other details sharing -->
                                <div class="portfolio-item-otherdetails clearfix">
                                    <div class="portfolio-item-share clearfix" data-share-title="SHARE:">
                                        <a href="https://twitter.com/intent/tweet?text={{$store['name']}}&amp;url={{route('front.single.store',$store['slug'])}}" title="SHARE ON TWITTER" class=" portfolio-item-share-twitter">
                                            <span class="icon-twitter"></span>
                                        </a>
                                        <a href="https://www.facebook.com/sharer/sharer.php?display=popup&amp;u={{route('front.single.store',$store['slug'])}}" title="SHARE ON FACEBOOK" class=" portfolio-item-share-facebook">
                                            <span class="icon-facebook"></span>
                                        </a>
                                        <a href="https://plus.google.com/share?url={{route('front.single.store',$store['slug'])}}" title="SHARE ON GPLUS" class=" portfolio-item-share-gplus">
                                            <span class="icon-gplus"></span>
                                        </a>
                                        <a href="http://pinterest.com/pin/create/button?description={{$store['name']}}&amp;url={{route('front.single.store',$store['slug'])}}" title="SHARE ON PINTEREST" class=" portfolio-item-share-pinterest">
                                            <span class="icon-pinterest"></span>
                                        </a>
                                    </div>
                                    <!--/ social links -->
                                </div>
                                <!--/ .portfolio-item-otherdetails -->
                            </div>
                            <!--/ .portfolio-item-content -->
                        </div>
                        <!--/ col-sm-12 col-md-5 -->

                        <!-- Right side -->
                        <div class="col-sm-12 col-md-7">
                            <!-- Portfolio item right -->
                            <div class="portfolio-item-right mfp-gallery images">
                                <!-- Main portfolio image & pop-up -->
                                <a href="{{asset('/storage/stores/').'/'.$store['avatar']}}" class="hoverLink" data-lightbox="mfp" data-mfp="image" title="{{$store['name']}}" >
                                    <!-- Border image wrapper -->
                                    <span class="hoverBorderWrapper">
											<!-- Image -->
											<img src="{{asset('/storage/stores/').'/'.$store['avatar']}}" class="img-responsive" alt="{{$store['name']}}" title="{{$store['name']}}" />
                                    </span>
                                    <!--/ Border image wrapper -->
                                </a>
                                <!--/ Main portfolio image & pop-up -->
                            </div>
                            <!--/ .portfolio-item-right -->
                        </div>
                        <!--/ col-sm-12 col-md-7 -->

                        <div class="clearfix">
                        </div>
                    </div>
                    <!--/ row Portfolio item -->

                    <!-- Separator -->
                    <div class="clearfix"></div>
                </div>
                <!--/ col-md-12 col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Portfolio item section with custom paddings -->

@endsection

@section('scripts')
    <script>
        $(window).load(function(){
            //Fix the phpstorm "Expression Expected Error" when using php inside script
            function blade(_)
            {
                return _;
            }

            //Google Maps Init
            var map;
            var marker;
            var storeLocation = {lat: blade({!! json_encode($store['lat']) !!}), lng: blade({!! json_encode($store['lng']) !!})};
            function initMap() {
                map = new google.maps.Map(document.getElementById('theMap'), {
                    center: storeLocation,
                    zoom: 14
                });
                marker = new google.maps.Marker({position: storeLocation, map: map});
            }
            initMap();
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV67Q1nB1Ce5TwRpwpylZ7lSRKL9DPGuo"
            async defer></script>
@endsection