@extends('layouts.app')

@section('title')
    {{$brand['name']}} | {{$settings['website_name']}}
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
                                <li><a href="{{route('front.all.brands')}}">All Brands</a></li>
                                <li>{{$brand['name']}}</li>
                            </ul>
                            <!--/ Breadcrumbs -->
                            <div class="clearfix"></div>
                        </div>
                        <!--/ col-sm-6 -->

                        <div class="col-sm-6" style="padding-top: 100px">
                            <!-- Sub-header titles -->
                            <div class="subheader-titles">
                                <h2 class="subheader-maintitle">Website Brands</h2>
                                <h4 class="subheader-subtitle">{{strtoupper($brand['name'])}}</h4>
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
    <section class="hg_section ptop-65 pbottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="row hg-portfolio-item">
                        <!-- Left side -->
                        <div class="col-sm-12 col-md-5">
                            <!-- Portfolio item content -->
                            <div class="portfolio-item-content">
                                <!-- Page/Portfolio title -->
                                <h1 class="page-title portfolio-item-title">{{$brand['name']}}</h1>

                                <!-- Description -->
                                <div class="portfolio-item-desc">
                                    <!-- Description wrapper -->
                                    <div class="portfolio-item-desc-inner">
                                        <p>{{$brand['description']}}</p>
                                    </div>
                                    <!--/ Description wrapper -->

                                    <!-- Toggle show more button -->
                                    <a href="#" class="portfolio-item-more-toggle js-toggle-class" data-target=".portfolio-item-desc" data-target-class="is-opened" data-more-text="see more" data-less-text="show less">
                                        <span class="glyphicon glyphicon-menu-down"></span>
                                    </a>
                                </div>
                                <!--/ Description -->

                                <!-- Details -->
                                <ul class="portfolio-item-details clearfix">
                                    <!-- Brand Name -->
                                    <li class="portfolio-item-details-client clearfix">
                                        <span class="portfolio-item-details-label">NAME </span>
                                        <span class="portfolio-item-details-item">{{$brand['name']}}</span>
                                    </li>
                                    <!--/ Brand Name -->

                                    <!-- Speciality -->
                                    <li class="portfolio-item-details-cat clearfix">
                                        <span class="portfolio-item-details-label">SPECIALITY</span>
                                        <span class="portfolio-item-details-item">
                                            @if(count($brand->sub_cats) > 1)
                                                @foreach($brand->sub_cats as $sub_cat)
                                                    @if($loop->last)
                                                        <a href="{{route('subCatProducts',[$sub_cat->category->slug,$sub_cat['slug']])}}" rel="tag">{{$sub_cat['name']}}</a>
                                                    @else
                                                        <a href="{{route('subCatProducts',[$sub_cat->category->slug,$sub_cat['slug']])}}" rel="tag">{{$sub_cat['name']}}</a>,
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach($brand->sub_cats as $sub_cat)
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
                                            @if(count($brand->categories) > 1)
                                                @foreach($brand->categories as $category)
                                                    @if($loop->last)
                                                        <a href="{{route('categoryProducts',$category['slug'])}}" rel="tag">{{$category['name']}}</a>
                                                    @else
                                                        <a href="{{route('categoryProducts',$category['slug'])}}" rel="tag">{{$category['name']}}</a>,
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach($brand->categories as $category)
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
                                        <a href="https://twitter.com/intent/tweet?text={{$brand['name']}}&amp;url={{route('front.single.brand',$brand['slug'])}}" title="SHARE ON TWITTER" class=" portfolio-item-share-twitter">
                                            <span class="icon-twitter"></span>
                                        </a>
                                        <a href="https://www.facebook.com/sharer/sharer.php?display=popup&amp;u={{route('front.single.brand',$brand['slug'])}}" title="SHARE ON FACEBOOK" class=" portfolio-item-share-facebook">
                                            <span class="icon-facebook"></span>
                                        </a>
                                        <a href="https://plus.google.com/share?url={{route('front.single.brand',$brand['slug'])}}" title="SHARE ON GPLUS" class=" portfolio-item-share-gplus">
                                            <span class="icon-gplus"></span>
                                        </a>
                                        <a href="http://pinterest.com/pin/create/button?description={{$brand['name']}}&amp;url={{route('front.single.brand',$brand['slug'])}}" title="SHARE ON PINTEREST" class=" portfolio-item-share-pinterest">
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
                                <a href="{{asset('/storage/brands/').'/'.$brand['avatar']}}" class="hoverLink" data-lightbox="mfp" data-mfp="image" title="{{$brand['name']}}" >
                                    <!-- Border image wrapper -->
                                    <span class="hoverBorderWrapper">
											<!-- Image -->
											<img src="{{asset('/storage/brands/').'/'.$brand['avatar']}}" class="img-responsive" alt="{{$brand['name']}}" title="{{$brand['name']}}" />
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