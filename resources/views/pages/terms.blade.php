@extends('layouts.app')

@section('title')
    Terms & Conditions | {{$settings['website_name']}}
@endsection

@section('content')

    <!-- Page header + Bottom Mask style 3 -->
    <div id="page_header" class="page-subheader site-subheader-cst uh_flat_dark_blue maskcontainer--mask3">
        <div class="bgback"></div>

        <!-- Animated Sparkles -->
        <div class="th-sparkles"></div>
        <!--/ Animated Sparkles -->

        <!-- Background -->
        <div class="kl-bg-source">
            <!-- Gradient overlay -->
            <div class="kl-bg-source__overlay" style="background:rgba(36,36,36,1); background: -moz-linear-gradient(left, rgba(36,36,36,1) 0%, rgba(107,107,107,1) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(36,36,36,1)), color-stop(100%,rgba(107,107,107,1))); background: -webkit-linear-gradient(left, rgba(36,36,36,1) 0%,rgba(107,107,107,1) 100%); background: -o-linear-gradient(left, rgba(36,36,36,1) 0%,rgba(107,107,107,1) 100%); background: -ms-linear-gradient(left, rgba(36,36,36,1) 0%,rgba(107,107,107,1) 100%); background: linear-gradient(to right, rgba(36,36,36,1) 0%,rgba(107,107,107,1) 100%); ">
            </div>
            <!--/ Gradient overlay -->
        </div>
        <!--/ Background -->

        <!-- Sub-Header content wrapper -->
        <div class="ph-content-wrap">
            <div class="ph-content-v-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6" style="padding-top: 100px">
                            <!-- Breadcrumbs -->
                            <ul class="breadcrumbs fixclear">
                                <li><a href="/">Home</a></li>
                                <li>TERMS & CONDITIONS</li>
                            </ul>
                            <!--/ Breadcrumbs -->
                        </div>
                        <!--/ col-sm-6 -->
                        <div class="col-sm-6" style="padding-top: 100px">
                            <!-- Page sub-header titles -->
                            <div class="subheader-titles">
                                <h2 class="subheader-maintitle">TERMS & CONDITIONS</h2>
                                <h4 class="subheader-subtitle">WEBSITE USAGE MADE EASY</h4>
                            </div>
                            <!--/ Page sub-header titles -->
                        </div>
                        <!--/ col-sm-6 -->
                    </div>
                    <!-- end row -->
                </div>
                <!--/ container -->
            </div>
            <!--/ .ph-content-v-center -->
        </div>
        <!-- Sub-Header content wrapper -->

        <!-- Bottom mask style 3 -->
        <div class="kl-bottommask kl-bottommask--mask3">
            <svg width="5000px" height="57px" class="svgmask " viewBox="0 0 5000 57" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-mask3">
                        <feOffset dx="0" dy="3" in="SourceAlpha" result="shadowOffsetInner1"></feOffset>
                        <feGaussianBlur stdDeviation="2" in="shadowOffsetInner1" result="shadowBlurInner1"></feGaussianBlur>
                        <feComposite in="shadowBlurInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1" result="shadowInnerInner1"></feComposite>
                        <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.4 0" in="shadowInnerInner1" type="matrix" result="shadowMatrixInner1"></feColorMatrix>
                        <feMerge>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                            <feMergeNode in="shadowMatrixInner1"></feMergeNode>
                        </feMerge>
                    </filter>
                </defs>
                <path d="M9.09383679e-13,57.0005249 L9.09383679e-13,34.0075249 L2418,34.0075249 L2434,34.0075249 C2434,34.0075249 2441.89,33.2585249 2448,31.0245249 C2454.11,28.7905249 2479,11.0005249 2479,11.0005249 L2492,2.00052487 C2492,2.00052487 2495.121,-0.0374751261 2500,0.000524873861 C2505.267,-0.0294751261 2508,2.00052487 2508,2.00052487 L2521,11.0005249 C2521,11.0005249 2545.89,28.7905249 2552,31.0245249 C2558.11,33.2585249 2566,34.0075249 2566,34.0075249 L2582,34.0075249 L5000,34.0075249 L5000,57.0005249 L2500,57.0005249 L1148,57.0005249 L9.09383679e-13,57.0005249 Z" class="bmask-bgfill" filter="url(#filter-mask3)" fill="#f5f5f5"></path>
            </svg>
            <i class="glyphicon glyphicon-chevron-down"></i>
        </div>
        <!--/ Bottom mask style 3 -->
    </div>
    <!--/ Page header + Bottom Mask style 3 -->

    <!-- Content page section -->
    <section class="hg_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Page title & Subtitle-->
                    <div class="kl-title-block clearfix tbk--left tbk-symbol--line tbk-icon-pos--after-title ptop-35 pbottom-20">
                        <h2 class="tbk__title fs-34 black montserrat"><strong>TERMS & CONDITIONS</strong></h2>
                        <div class="tbk__symbol">
                            <span></span>
                        </div>
                    </div>
                    <!--/ Page title & Subtitle-->
                </div>
                <!--/ col-md-12 col-sm-12 -->
                <div class="col-md-12 col-sm-12">
                    <p>Last updated: January 20, 2019</p>
                    <p>Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the http://birdystore.build website (the "Service") operated by Birdy Store ("us", "we", or "our").</p>
                    <p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>
                    <p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>

                    <h2>Accounts</h2>
                    <p>When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>
                    <p>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.</p>
                    <p>You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>

                    <h2>Links To Other Web Sites</h2>
                    <p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Birdy Store.</p>
                    <p>Birdy Store has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Birdy Store shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>
                    <p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>


                    <h2>Termination</h2>
                    <p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
                    <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
                    <p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
                    <p>Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.</p>
                    <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>


                    <h2>Governing Law</h2>
                    <p>These Terms shall be governed and construed in accordance with the laws of Egypt, without regard to its conflict of law provisions.</p>
                    <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>

                    <h2>Changes</h2>
                    <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 15 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
                    <p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>

                    <h2>Contact Us</h2>
                    <p>If you have any questions about these Terms, please <a href="{{route('front.contact')}}">contact us</a>.</p>
                </div>

                <div class="col-sm-12">
                    <div class="hg_separator clearfix m-65"></div>
                </div>
                <!--/ col-sm-12 -->
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <!-- Content page section -->

@endsection