<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'The Shop') }}</title>

    <!--  Desktop Favicons  -->
    <link rel="icon" type="image/png" href="{{asset('/app/images/favicons/store-white_favicon 16x20.png')}}" sizes="16x20">

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
    <!-- Styles -->
    @yield('styles')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
    @auth
        <!-- Sidebar Menu -->
        @include('admin.inc.sidebar')
        <!-- /Sidebar Menu -->

            <!-- top navigation -->
        @include('admin.inc.navbar')
        <!-- /top navigation -->

            <!-- page content -->
        @yield('content')
        <!-- /page content -->

            <!-- footer content -->
        @include('admin.inc.footer')
        <!-- /footer content -->
    @else
        <!-- page content -->
        @yield('content')
        <!-- /page content -->
    @endauth
    </div>
</div>
<!-- jQuery -->
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

@yield('vendors')
<!-- Custom Theme Scripts -->
<script src="{{asset('build/js/custom.min.js')}}"></script>
@yield('scripts')

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