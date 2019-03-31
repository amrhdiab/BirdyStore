<!doctype html>
<html class="no-js" lang="en-US">
<head>

    <!-- meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">

    <meta name="keywords" content="online shop, birdy store, buy new online, free shipping"/>
    <meta name="description"
          content="Birdy store is all in one stop to buy what you need online, free shipping and many features.">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('title')</title>

    <!--  Desktop Favicons  -->
    <link rel="icon" type="image/png" href="{{asset('/app/images/favicons/store-white_favicon 16x20.png')}}" sizes="16x20">
    <!-- <link rel="icon" type="image/png" href="images/favicons/favicon-32x32.png" sizes="32x32"> -->
    <!-- <link rel="icon" type="image/png" href="images/favicons/favicon-96x96.png" sizes="96x96"> -->

    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Google Fonts CSS Stylesheet // More here http://www.google.com/fonts#UsePlace:use/Collection:Open+Sans -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic"
          rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- ***** Boostrap Custom / Addons Stylesheets ***** -->
    <link rel="stylesheet" href="{{asset('/app/css/bootstrap.css')}}" type="text/css" media="all">

    <!-- ***** Pages Style ***** -->
    @yield('styles')
    <!-- ***** Main + Responsive & Base sizing CSS Stylesheet ***** -->
    <link rel="stylesheet" href="{{asset('/app/css/template.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('/app/css/responsive.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('/app/css/base-sizing.css')}}" type="text/css" media="all">

    <!-- Custom CSS Stylesheet (where you should add your own css rules) -->
    <link rel="stylesheet" href="{{asset('/app/css/custom.css')}}" type="text/css"/>

    <!-- Toastr -->
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet"/>

</head>

<body class="@yield('bodyClass')">


<!-- Support Panel -->
<input type="checkbox" id="support_p" class="panel-checkbox">
<div class="support_panel">
    <div class="support-close-inner">
        <label for="support_p" class="spanel-label inner">
            <span class="support-panel-close">×</span>
        </label>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <!-- Title -->
                <h4 class="m_title">HOW TO SHOP</h4>

                <!-- Content - how to shop steps -->
                <div class="m_content how_to_shop">
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="number">1</span> Find your desired product.
                        </div>
                        <!--/ col-sm-4 -->

                        <div class="col-sm-4">
                            <span class="number">2</span> Review your order.
                        </div>
                        <!--/ col-sm-4 -->

                        <div class="col-sm-4">
                            <span class="number">3</span> Payment &amp; <strong>FREE</strong> shipment
                        </div>
                        <!--/ col-sm-4 -->
                    </div>
                    <!--/ row -->

                    <p>If you still have problems, please let us know, by sending an email to {{$settings['contact_email_1']}} .
                        Thank you!</p>
                </div>
                <!--/ Content - how to shop steps -->
            </div>
            <!--/ col-sm-9 -->

            <div class="col-sm-3">
                <!-- Title -->
                <h4 class="m_title">SHOWROOM HOURS</h4>

                <!-- Content -->
                <div class="m_content">
                    Mon-Fri 9:00AM - 6:00AM<br>
                    Sat - 9:00AM-5:00PM<br>
                    Sundays by appointment only!
                </div>
                <!--/ Content -->
            </div>
            <!--/ col-sm-3 -->
        </div>
        <!--/ row -->
    </div>
    <!--/ container -->
</div>
<!--/ Support Panel -->


<!-- Page Wrapper -->
<div id="page_wrapper">
    <!-- Header style 1 -->
@include('inc.header')
<!-- / Header style 1 -->


@yield('content')

<!-- Footer - Default Style -->
@include('inc.footer')
<!--/ Footer - Default Style -->

</div>
<!--/ Page Wrapper -->

<!-- NewsLetter Pop Up -->
{{--@yield('newsletter_popup')--}}
<!--/ NewsLetter Pop Up -->

<!-- Login Panel content -->
@include('inc.loginPanelPopUp')
<!--/ Login Panel content -->


<!-- ToTop trigger -->
<a href="#" id="totop">TOP</a>
<!--/ ToTop trigger -->

<!-- /////////////////////////// SCRIPTS /////////////////////////// -->

<!-- Modernizr Library -->
<script type="text/javascript" src="{{asset('/app/js/modernizr.min.js')}}"></script>

<!-- jQuery Library -->
{{--<script type="text/javascript" src="{{asset('/app/js/jquery.js')}}"></script>--}}
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>

<!-- JS FILES // These should be loaded in every page -->
<script type="text/javascript" src="{{asset('/app/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/app/js/kl-plugins.js')}}"></script>

{{--Setup ajax--}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('scripts')
<!-- Custom Kallyas JS codes -->
<script type="text/javascript" src="{{asset('app/js/kl-scripts.js')}}"></script>

<!-- Custom user JS codes -->
<script type="text/javascript" src="{{asset('app/js/kl-custom.js')}}"></script>

<!-- Modernizr script -->
<script type="text/javascript">
    //use the modernizr load to load up external scripts. This will load the scripts asynchronously, but the order listed matters. Although it will load all scripts in parallel, it will execute them in the order listed
    Modernizr.load([
        {
            // test for media query support, if not load respond.js
            test: Modernizr.mq('only all'),
            // If not, load the respond.js file
            nope: '//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js'
        }
    ]);
</script>

<!-- Notification Flash Toastr -->
<script src="{{asset('js/toastr.min.js')}}"></script>
<!-- Cart Ajax Functionality -->
@include('inc.cartAjax')

<script type="text/javascript">
    $(document).ready(function () {
        <!-- Check for any login errors & open the popup if need be -->
        @if(count($errors) > 0)
        toastr.error('{{$errors->first()}}', 'Error', {timeOut: 3500,positionClass: "toast-bottom-right"});
        @endif

        <!-- Toastr -->
        @if(session('status'))
        toastr.success('{{session('status')}}', 'Success', {timeOut: 3500,positionClass: "toast-bottom-right"});
        @endif
        @if(session('success'))
        toastr.success('{{session('success')}}', 'Success', {timeOut: 3000,positionClass: "toast-bottom-right"});
        @endif

        @if(session('error'))
        toastr.error('{{session('error')}}', 'Error', {timeOut: 3000,positionClass: "toast-bottom-right"});
        @endif

        @if(session('info'))
        toastr.info('{{session('info')}}', 'Info', {timeOut: 3000,positionClass: "toast-bottom-right"});
        @endif
    });
</script>

</body>
</html>