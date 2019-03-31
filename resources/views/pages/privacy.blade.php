@extends('layouts.app')

@section('title')
    Privacy Policy | {{$settings['website_name']}}
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
            <div class="kl-bg-source__overlay"
                 style="background:rgba(36,36,36,1); background: -moz-linear-gradient(left, rgba(36,36,36,1) 0%, rgba(107,107,107,1) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(36,36,36,1)), color-stop(100%,rgba(107,107,107,1))); background: -webkit-linear-gradient(left, rgba(36,36,36,1) 0%,rgba(107,107,107,1) 100%); background: -o-linear-gradient(left, rgba(36,36,36,1) 0%,rgba(107,107,107,1) 100%); background: -ms-linear-gradient(left, rgba(36,36,36,1) 0%,rgba(107,107,107,1) 100%); background: linear-gradient(to right, rgba(36,36,36,1) 0%,rgba(107,107,107,1) 100%); ">
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
                                <li>PRIVACY POLICY</li>
                            </ul>
                            <!--/ Breadcrumbs -->
                        </div>
                        <!--/ col-sm-6 -->
                        <div class="col-sm-6" style="padding-top: 100px">
                            <!-- Page sub-header titles -->
                            <div class="subheader-titles">
                                <h2 class="subheader-maintitle">PRIVACY POLICY</h2>
                                <h4 class="subheader-subtitle">YOUR PRIVACY IS A PRIORITY</h4>
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
    </div>
    <!--/ Page header + Bottom Mask style 3 -->

    <!-- Content page section -->
    <section class="hg_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Page title & Subtitle-->
                    <div class="kl-title-block clearfix tbk--left tbk-symbol--line tbk-icon-pos--after-title ptop-35 pbottom-20">
                        <h2 class="tbk__title fs-34 black montserrat"><strong>PRIVACY POLICY</strong></h2>
                        <div class="tbk__symbol">
                            <span></span>
                        </div>
                    </div>
                    <!--/ Page title & Subtitle-->
                </div>
                <!--/ col-md-12 col-sm-12 -->
                <div class="col-md-12 col-sm-12">
                    <p>Last updated: January 20, 2019</p>
                    <p>We care about your privacy and how your information is used online. We respect the privacy of
                        everyone who uses our website and will only collect and use information in a matter that would
                        be convenient for you and in compliance with your rights and our obligations under the law. This
                        Policy describes how the data collected by us is used according to how you use our website.
                        Please read this Privacy Policy carefully and make sure that you understand it.<br/>
                        It is a requirement that you read and accept this Policy while registering an account.<br/>
                        Please note that his Privacy Policy is only applicable to our website. Any website linked to
                        ours has its own independent Privacy Policy. Therefore we hold no responsibility over how those
                        websites collect, store and use your information and we highly recommend that you take a look at
                        the privacy policies of those websites before giving them any personal information.</p>
                    <h2>The Information We Collect</h2>
                    <p>When registering or creating a listing on our site, as appropriate, you may be asked to enter the
                        following information:</p>
                    <ul>
                        <li>name;</li>
                        <li>contact information such as email addresses and telephone numbers;</li>
                        <li>mailing address and location;</li>
                    </ul>
                    <h2>How We Use Your Information</h2>
                    <p>We may use the information we collect from you when you register, create a listing, sign up for
                        our newsletter, surf the website, or use certain other site features in the following ways:</p>
                    <ul>
                        <li>To allow us to better service you in responding to your customer service requests.</li>
                        <li>To improve our website in order to better serve you.</li>
                        <li>To supply you with our services</li>
                        <li>To ask for feedback and reviews of our services.</li>
                        <li>To follow up with you after correspondence (live chat, email or phone inquiries).</li>
                        <li>To send you email newsletters, alerts, etc. that you subscribe to. Instructions to
                            unsubscribe will be provided at the bottom of each email.
                        </li>
                    </ul>
                    <p>With your permission, we may also send you information, news and offers on our services via
                        email. However, we will not send you any unsolicited marketing or spam and will make sure that
                        we fully protect your rights and accept our obligations under the Data Protection Act 1998 and
                        the Privacy and Electronic Communications (EC Directive) Regulations 2003, as revised in 2004,
                        2011 and 2015.</p>
                    <h2>How We Store Your Information</h2>
                    <p>We only store your data for as long as needed in order to use in the manners described above, or
                        for as long as we have your permission to keep it.<br/>
                        The security of your data is very important to us, and in order to protect and safeguard your
                        data we have the relevant physical, electronic and managerial procedures in place.<br/>
                        The steps we take in order to secure your data include using secure databases that can only be
                        accessed by company-approved individuals and parties. However, regardless of the security
                        measures that we take, it is important to note that sending data through the internet may not be
                        100% secure. You are advised to take the necessary precautions sending us information through
                        the internet.</p>
                    <h2>Sharing Your Data</h2>
                    <p>We do not sell, trade, or otherwise transfer to outside parties your Personally Identifiable
                        Information unless we provide users with advance notice. This does not include website hosting
                        partners and other parties who assist us in operating our website, conducting our business, or
                        serving our users, so long as those parties agree to keep this information confidential. We may
                        also release information when it&#8217;s release is appropriate to comply with the law, enforce
                        our site policies, or protect ours or others&#8217; rights, property or safety.<br/>
                        However, we may sometimes need to contract with third parties in order to supply services such
                        as payment processing, delivery services, advertising and marketing. In some cases, the third
                        parties may require to access some or all of your information. Rest assured that in such a case,
                        we will carry out all the necessary procedures to ensure that your data will be handled safely,
                        securely, and in compliance with your rights, our obligations, and the obligations of the third
                        party under the law.<br/>
                        We may also gather statistical data about the use of our website including website traffic,
                        usage patterns, user numbers, sales and other information. All such data will be anonymous and
                        will not include any personally identifiable information. We may occasionally share such data
                        with third parties such as prospective investors, affiliates, partners and advertisers. Data
                        will only be shared and used within the bounds of the law.<br/>
                        In certain circumstances we may be legally required to share certain data held by us, which may
                        include your personal information, for example, where we are involved in legal proceedings,
                        where we are complying with the requirements of legislation, a court order, or a governmental
                        authority. We do not require any further consent from you in order to share your data in such a
                        case and will comply as required with any legally binding request that is made of us.</p>
                    <h2>What Happens If Our Business Changes Hands?</h2>
                    <p>We may occasionally expand or reduce our business and this may involve the sale or the transfer
                        of control of all or part of our business. Data provided by users will, where relevant, be
                        transferred along with that part and the new owner or newly controlling party will, under the
                        terms of this Privacy Policy, be permitted to use the data for the purposes for which it was
                        originally collected by us.<br/>
                        In the event that any of your data is to be transferred in such a manner, you will not be
                        contacted in advance and informed of the changes. When contacted, you will not be given the
                        choice to have your data deleted or removed from the new owner or controller.</p>
                    <h2>How You Can Control Your Data</h2>
                    <p>When you submit information through our website, you may be given options to restrict our use of
                        your data. We wish to give you strong controls on how we can use your data for direct marketing
                        purposes, including the ability to opt-out or unsubscribe from receiving emails from us
                        (instructions for which will be provided at the end of those emails).</p>
                    <h2>Your Right to Withhold Information</h2>
                    <p>Certain areas of our website may be accessed without providing any data at all. However, to use
                        all features and functions available on our website, you may be required to submit or allow the
                        collection of certain data.</p>
                    <h2>About Cookies</h2>
                    <p>Our website may place and access certain first party Cookies (those that are placed directly and
                        can only be used by us) on your computer or device. We use Cookies to facilitate and improve
                        your experience on our website and to provide and improve our services. These Cookies are
                        carefully chosen and we have taken the necessary procedures to ensure that your privacy is
                        protected and respected at all times.<br/>
                        By using our website, you may also receive certain third party Cookies (those placed by
                        websites, services or parties other than us) on your computer or device. We use third party
                        Cookies on our website so that a site can remember something about you at a later time, but they
                        are not integral to the functioning of our website.<br/>
                        All Cookies used by and on our website are used in accordance with current UK and EU Cookie Law.<br/>
                        Before any Cookies are placed on your computer or device, you will be shown a message requesting
                        your consent to set those Cookies. By giving your consent to the use of Cookies, you are
                        enabling us to provide you with the best possible experience and service to you. You may, if you
                        so wish, deny consent to the use of Cookies. However, certain features of our website may not
                        function fully or as intended. You will also be given the option to allow only first party
                        Cookies and block third party Cookies.<br/>
                        Certain features of our website depend on Cookies to function. These Cookies are deemed
                        “strictly necessary” by the UK and EU Cookie Law. Your consent will not be sought to place these
                        Cookies. You may still block these cookies by changing your internet browser’s settings, but
                        please be aware that our website may not work as intended if you do so. We have taken great care
                        to ensure that your privacy is not at risk by allowing them.<br/>
                        You can choose to enable or disable Cookies in your internet browser. Most internet browsers
                        also enable you to choose whether you wish to disable all cookies or only third party cookies.
                        By default, most internet browsers accept Cookies but this can be altered. You can choose to
                        delete Cookies at any time. However, you may lose any information that enables you to access our
                        website more quickly and efficiently including, but not limited to, login and personalization
                        settings.</p>
                    <h2>Changes to Our Privacy Policy</h2>
                    <p>We may change this Privacy Policy as we may deem necessary from time to time, or as may be
                        required by law. Any changes will be immediately posted on our website and you will be deemed to
                        have accepted the terms of the Privacy Policy on your first use of our website following the
                        alterations. We recommend that you check this page regularly to keep up-to-date.</p>
                    <h2>Contact Us</h2>
                    <p>If you have any questions about these Terms, please <a href="{{route('front.contact')}}">contact
                            us</a>.</p>
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