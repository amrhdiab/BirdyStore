@extends('layouts.app')

@section('title')
    About Us | {{$settings['website_name']}}
@endsection

@section('content')

    <!-- Page Sub-Header + mask style 6 -->
    <div id="page_header" class="page-subheader site-subheader-cst uh_zn_def_header_style maskcontainer--mask6" style="height: 450px">
        <div class="bgback"></div>

        <!-- Bakcground -->
        <div class="kl-bg-source">
            <!-- Video background container -->
            <div class="kl-video-container kl-bg-source__video">
                <!-- Video wrapper -->
                <div class="kl-video-wrapper video-grid-overlay">

                    <!-- Self Hosted Video Source -->
                    <div class="kl-video valign halign" style="width: 100%; height: 100%;" data-setup='{
                            "position": "absolute",
                            "loop": true,
                            "autoplay": true,
                            "muted": true,
                            "mp4":"{{asset('storage/slides/logo-intro.mp4')}}",
                            "video_ratio": "1.7778"
                            }'>
                    </div>
                    <!--/ Self Hosted Video Source -->
                </div>
                <!--/ Video wrapper -->
            </div>
            <!--/ Video background container -->

            <!-- Gradient overlay -->
            <div class="kl-bg-source__overlay"
                 style="background:rgba(130,36,227,0.3); background: -moz-linear-gradient(left, rgba(130,36,227,0.3) 0%, rgba(51,158,221,0.4) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(130,36,227,0.3)), color-stop(100%,rgba(51,158,221,0.4))); background: -webkit-linear-gradient(left, rgba(130,36,227,0.3) 0%,rgba(51,158,221,0.4) 100%); background: -o-linear-gradient(left, rgba(130,36,227,0.3) 0%,rgba(51,158,221,0.4) 100%); background: -ms-linear-gradient(left, rgba(130,36,227,0.3) 0%,rgba(51,158,221,0.4) 100%); background: linear-gradient(to right, rgba(130,36,227,0.3) 0%,rgba(51,158,221,0.4) 100%); ">
            </div>
            <!--/ Gradient overlay -->
        </div>
        <!--/ Bakcground -->

        <!-- Animated Sparkles -->
        <div class="th-sparkles"></div>
        <!--/ Animated Sparkles -->

        <!-- Sub-Header content wrapper -->
        <div class="ph-content-wrap">
            <div class="ph-content-v-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6" style="padding-top: 200px">
                            <!-- Breadcrumbs -->
                            <ul class="breadcrumbs fixclear">
                                <li><a href="/">Home</a></li>
                                <li>ABOUT US</li>
                            </ul>
                            <!--/ Breadcrumbs -->
                            <div class="clearfix"></div>
                        </div>
                        <!--/ col-sm-6 -->

                        <div class="col-sm-6" style="padding-top: 200px">
                            <!-- Sub-Header Titles -->
                            <div class="subheader-titles">
                                <!-- Main Title -->
                                <h2 class="subheader-maintitle">ABOUT US</h2>
                                <!--/ Main Title -->

                                <!-- Main Sub-Title -->
                                <h4 class="subheader-subtitle">GET TO KNOW US BETTER</h4>
                                <!--/ Main Sub-Title -->
                            </div>
                            <!--/ Sub-Header Titles -->
                        </div>
                        <!--/ col-sm-6 -->
                    </div>
                    <!--/ row -->
                </div>
                <!--/ container -->
            </div>
            <!--/ ph-content-v-center -->
        </div>
        <!--/ Sub-Header content wrapper -->

        <!-- Sub-Header bottom mask style 6 -->
        <div class="kl-bottommask kl-bottommask--mask6">
            <svg width="2700px" height="57px" class="svgmask" viewBox="0 0 2700 57" version="1.1"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox"
                            id="filter-mask6">
                        <feOffset dx="0" dy="-2" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                        <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1"
                                        result="shadowBlurOuter1"></feGaussianBlur>
                        <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.5 0" in="shadowBlurOuter1"
                                       type="matrix" result="shadowMatrixOuter1"></feColorMatrix>
                        <feMerge>
                            <feMergeNode in="shadowMatrixOuter1"></feMergeNode>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                        </feMerge>
                    </filter>
                </defs>
                <g transform="translate(-1.000000, 10.000000)">
                    <path d="M0.455078125,18.5 L1,47 L392,47 L1577,35 L392,17 L0.455078125,18.5 Z"
                          fill="#000000"></path>
                    <path d="M2701,0.313493752 L2701,47.2349598 L2312,47 L391,47 L2312,0 L2701,0.313493752 Z"
                          fill="#f5f5f5" class="bmask-bgfill" filter="url(#filter-mask6)"></path>
                    <path d="M2702,3 L2702,19 L2312,19 L1127,33 L2312,3 L2702,3 Z" fill="#cd2122"
                          class="bmask-customfill"></path>
                </g>
            </svg>
        </div>
        <!--/ Sub-Header bottom mask style 6 -->
    </div>
    <!--/ Page Sub-Header + mask style 6 -->

    <!-- Title + Services + Skills Diagram -->
    <section class="hg_section ptop-80 pbottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="kl-title-block clearfix text-left tbk-symbol-- tbk-icon-pos--after-title">
                        <!-- Title -->
                        <h3 class="tbk__title montserrat fw-bold fs-28">WHO WE ARE AND WHAT WE DO</h3>
                        <!--/ Title -->

                        <!-- Sub-Title -->
                        <h4 class="tbk__subtitle fw-vthin fs-18 lh-32">{{$settings['about_us']}}</h4>
                        <!--/ Sub-Title -->
                    </div>

                    <!-- separator -->
                    <div class="hg_separator clearfix mb-65">
                    </div>
                    <!--/ separator -->
                </div>
                <!--/ col-md-12 col-sm-12 -->

                <div class="col-md-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- Icon box float left -->
                            <div class="kl-iconbox kl-iconbox--align-left text-left kl-iconbox--theme-default">
                                <div class="kl-iconbox__inner">
                                    <div class="kl-iconbox__icon-wrapper ">
                                        <!-- Icon -->
                                        <img class="kl-iconbox__icon" src="{{asset('app/images/ib-ico-12.svg')}}"
                                             alt="WEB DESIGN SERVICES">
                                        <!--/ Icon -->
                                    </div>
                                    <!--/ .kl-iconbox__icon-wrapper -->

                                    <!-- content -->
                                    <div class="kl-iconbox__content-wrapper">
                                        <!-- Title -->
                                        <div class="kl-iconbox__el-wrapper kl-iconbox__title-wrapper">
                                            <h3 class="kl-iconbox__title">MANY BRANDS & STORES</h3>
                                        </div>
                                        <!--/ Title -->

                                        <!-- Description -->
                                        <div class=" kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
                                            <p class="kl-iconbox__desc">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec urna enim. Vivamus et tempor est.
                                                Nam tristique metus at varius laoreet.
                                            </p>
                                        </div>
                                        <!--/ Description -->
                                    </div>
                                    <!--/ .kl-iconbox__content-wrapper -->
                                </div>
                                <!--/ .kl-iconbox__inner -->
                            </div>
                            <!--/ Icon box float left -->
                        </div>
                        <!--/ col-md-6 col-sm-6 -->

                        <div class="col-md-6 col-sm-6">
                            <!-- Icon box float left -->
                            <div class="kl-iconbox kl-iconbox--align-left text-left kl-iconbox--theme-default">
                                <div class="kl-iconbox__inner">
                                    <div class="kl-iconbox__icon-wrapper">
                                        <!-- Icon -->
                                        <img class="kl-iconbox__icon" src="{{asset('app/images/ib-ico-21.svg')}}" alt="GRAPHIC DESIGN">
                                        <!--/ Icon -->
                                    </div>
                                    <!--/ .kl-iconbox__icon-wrapper -->

                                    <!-- content -->
                                    <div class="kl-iconbox__content-wrapper">
                                        <!-- Title -->
                                        <div class="kl-iconbox__el-wrapper kl-iconbox__title-wrapper">
                                            <h3 class="kl-iconbox__title">TOP NOTCH QUALITY</h3>
                                        </div>
                                        <!--/ Title -->

                                        <!-- Description -->
                                        <div class="kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
                                            <p class="kl-iconbox__desc">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec urna enim. Vivamus et tempor est.
                                                Nam tristique metus at varius laoreet.
                                            </p>
                                        </div>
                                        <!--/ Description -->
                                    </div>
                                    <!--/ .kl-iconbox__content-wrapper -->
                                </div>
                                <!--/ kl-iconbox__inner -->
                            </div>
                            <!--/ Icon box float left -->
                        </div>
                        <!--/ col-md-6 col-sm-6 -->
                    </div>
                    <!--/ row -->

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- Icon box float left -->
                            <div class="kl-iconbox kl-iconbox--align-left text-left kl-iconbox--theme-default ">
                                <div class="kl-iconbox__inner">
                                    <div class="kl-iconbox__icon-wrapper ">
                                        <!-- Icon -->
                                        <img class="kl-iconbox__icon" src="{{asset('app/images/ib-ico-4.svg')}}" alt="SEO SERVICES">
                                        <!--/ Icon -->
                                    </div>
                                    <!--/ .kl-iconbox__icon-wrapper -->

                                    <!-- content -->
                                    <div class="kl-iconbox__content-wrapper">
                                        <!-- Title -->
                                        <div class="kl-iconbox__el-wrapper kl-iconbox__title-wrapper">
                                            <h3 class="kl-iconbox__title">24/7 SUPPORT</h3>
                                        </div>
                                        <!--/ Title -->

                                        <!-- Description -->
                                        <div class="kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
                                            <p class="kl-iconbox__desc">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec urna enim. Vivamus et tempor est.
                                                Nam tristique metus at varius laoreet.
                                            </p>
                                        </div>
                                        <!--/ Description -->
                                    </div>
                                    <!--/ .kl-iconbox__content-wrapper -->
                                </div>
                                <!--/ .kl-iconbox__inner -->
                            </div>
                            <!--/ Icon box float left -->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- Icon box float left -->
                            <div class="kl-iconbox kl-iconbox--align-left text-left kl-iconbox--theme-default ">
                                <div class="kl-iconbox__inner">
                                    <div class="kl-iconbox__icon-wrapper">
                                        <!-- Icon -->
                                        <img class="kl-iconbox__icon" src="{{asset('app/images/ib-ico-5.svg')}}" alt="MARKETING">
                                        <!--/ Icon -->
                                    </div>
                                    <!--/ .kl-iconbox__icon-wrapper -->

                                    <!-- content -->
                                    <div class="kl-iconbox__content-wrapper">
                                        <!-- Title -->
                                        <div class="kl-iconbox__el-wrapper kl-iconbox__title-wrapper">
                                            <h3 class="kl-iconbox__title">FAST SHIPPING</h3>
                                        </div>
                                        <!--/ Title -->

                                        <!-- Description -->
                                        <div class=" kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
                                            <p class="kl-iconbox__desc">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec urna enim. Vivamus et tempor est.
                                                Nam tristique metus at varius laoreet.
                                            </p>
                                        </div>
                                        <!--/ Description -->
                                    </div>
                                    <!--/ .kl-iconbox__content-wrapper -->
                                </div>
                                <!--/ .kl-iconbox__inner -->
                            </div>
                            <!--/ Icon box float left -->
                        </div>
                    </div>
                    <!--/ row -->
                </div>
                <!--/ col-md-6 col-sm-6 -->

                <div class="col-md-6 col-sm-6">
                    <!-- spacer -->
                    <div class="th-spacer clearfix" style="height: 60px;">
                    </div>
                    <!--/ spacer -->

                    <!-- Skills Diagram -->
                    <div id="skills_diagram_el" class="kl-skills-diagram">
                        <div class="kl-skills-legend legend-topright">
                            <h4>LEGEND</h4>
                            <ul class="kl-skills-list">
                                <li data-percent="100" style="background-color:#97be0d;width: 100px;">Quality</li>
                                <li data-percent="100" style="background-color:#d84f5f;width: 100px;">Shipping</li>
                                <li data-percent="100" style="background-color:#6eabe5;width: 100px;">Support</li>
                                <li data-percent="100" style="background-color:#8dc9e8;width: 100px;">Top Brands</li>
                                <li data-percent="100" style="background-color:#bdc3c7;width: 100px;">Many Stores</li>
                            </ul>
                        </div>
                        <div class="skills-responsive-diagram">
                            <div id="thediagram" class="kl-diagram" data-width="600" data-height="600"
                                 data-maincolor="#193340" data-maintext="Our Services" data-fontsize="20px Arial"
                                 data-textcolor="#ffffff"></div>
                        </div>
                    </div>
                </div>
                <!--/ col-md-6 col-sm-6 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Title + Services + Skills Diagram -->

    <!-- Separator -->
    <section class="hg_section p-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- separator margin bottom 65px -->
                    <div class="hg_separator clearfix mb-65">
                    </div>
                    <!--/ separator -->
                </div>
                <!--/ col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Separator -->

    <!-- Media Container - Border Animation Style 2 -->
    <section class="hg_section--relative p-0">
        <div class="full_width">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- media-container -->
                    <div class="media-container style2 h-400">
                        <!-- bg source -->
                        <div class="kl-bg-source">
                            <div class="kl-bg-source__bgimage"
                                 style="background-image:url({{asset('app/images/rev_slide_3_background.jpg')}});background-repeat:no-repeat;background-attachment:scroll;background-position-x:center;background-position-y:center;background-size:cover"></div>
                            <div class="kl-bg-source__overlay" style="background-color:rgba(0,0,0,0.65)"></div>
                            <div class="kl-bg-source__overlay-gloss"></div>
                        </div>
                        <!--/ bg-source -->

                        <!-- media-container button -->
                        <a class="media-container__link media-container__link--btn media-container__link--style-borderanim2 "
                           href="#" target="_self">
                            <div class="borderanim2-svg">
                                <svg height="70" width="400" xmlns="http://www.w3.org/2000/svg">
                                    <rect class="borderanim2-svg__shape" height="70" width="400"></rect>
                                </svg>
                                <span class="media-container__text">{{strtoupper($settings['website_name'])}}</span>
                            </div>
                        </a>
                        <!--/ media-container button -->
                    </div>
                    <!--/ media-container -->
                </div>
                <!--/ col-md-12 col-sm-12  -->
            </div>
            <!--/ row -->
        </div>
        <!--/ full_width -->

        <!-- Bottom mask style 3 -->
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
        <!--/ Bottom mask style 3 -->
    </section>
    <!--/ Media Container - Border Animation Style 2 -->

    <!-- Title + Statistics - Normal Placement style -->
    <section class="hg_section ptop-80 pbottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Title -->
                    <div class="kl-title-block clearfix tbk--text-dark tbk--left text-left tbk-symbol--line_border tbk--colored tbk-icon-pos--after-title">
                        <h3 class="tbk__title montserrat fs-28 fw-extrabold">STATS &amp; FUN FACTS</h3>
                        <span class="tbk__symbol "><span></span></span>
                    </div>
                    <!--/ Title -->

                    <!-- Statistics box container -->
                    <div class="statistic-box__container statistic-box--stl-style2 statistic-box--dark">
                        <div class="statistic-box">
                            <div class="statistic-box__icon-holder">
                                <span class="statistic-box__icon icon-noun_65754"></span>
                            </div>
                            <div class="statistic-box__line">
                            </div>
                            <div class="statistic-box__details">
                                <h4 class="statistic-box__title">2500+</h4>
                                <div class="statistic-box__content">
                                    ORDERS MADE
                                </div>
                            </div>
                        </div>
                        <div class="statistic-box">
                            <div class="statistic-box__icon-holder">
                                <span class="statistic-box__icon icon-noun_61152"></span>
                            </div>
                            <div class="statistic-box__line">
                            </div>
                            <div class="statistic-box__details">
                                <h4 class="statistic-box__title">2200+</h4>
                                <div class="statistic-box__content">
                                    SUCCESSFUL SHIPMENTS
                                </div>
                            </div>
                        </div>
                        <div class="statistic-box">
                            <div class="statistic-box__icon-holder">
                                <span class="statistic-box__icon icon-gi-ico-10"></span>
                            </div>
                            <div class="statistic-box__line">
                            </div>
                            <div class="statistic-box__details">
                                <h4 class="statistic-box__title">1100+</h4>
                                <div class="statistic-box__content">
                                    SUPPORT TICKETS ANSWERED
                                </div>
                            </div>
                        </div>
                        <div class="statistic-box">
                            <div class="statistic-box__icon-holder">
                                <span class="statistic-box__icon icon-noun_167805"></span>
                            </div>
                            <div class="statistic-box__line">
                            </div>
                            <div class="statistic-box__details">
                                <h4 class="statistic-box__title">1660+</h4>
                                <div class="statistic-box__content">
                                    REVIEWS AND RATINGS
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ .statistic-box__container -->
                </div>
                <!--/ col-md-12 col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!--/ Title + Statistics - Normal Placement style -->

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

@section('scripts')
    <!-- Required scripts for Skills Diagram -->
    <script type="text/javascript" src="{{asset('app/js/plugins/raphael_diagram/raphael-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/js/plugins/raphael_diagram/init.js')}}"></script>
    <!--/ Skills Diagram -->
@endsection