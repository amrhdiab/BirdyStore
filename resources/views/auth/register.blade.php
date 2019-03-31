@extends('layouts.app')
@section('title')
    Account Registration | {{$settings['website_name']}}
@endsection
@section('content')

<!-- Page sub-header + Bottom mask style 3 -->
<div id="page_header" class="page-subheader zn_def_header_style maskcontainer--mask3">
    <div class="bgback">
    </div>

    <!-- Background -->
    <div class="kl-bg-source">
        <!-- Gradient overlay -->
        <div class="kl-bg-source__overlay" style="background:rgba(0,94,176,1); background: -moz-linear-gradient(left, rgba(0,94,176,1) 0%, rgba(0,202,255,1) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(0,94,176,1)), color-stop(100%,rgba(0,202,255,1))); background: -webkit-linear-gradient(left, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%); background: -o-linear-gradient(left, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%); background: -ms-linear-gradient(left, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%); background: linear-gradient(to right, rgba(0,94,176,1) 0%,rgba(0,202,255,1) 100%);">
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
                            <li>REGISTER</li>
                        </ul>
                        <!--/ Breadcrumbs -->
                        <div class="clearfix"></div>
                    </div>
                    <!--/ col-sm-6 -->

                    <div class="col-sm-6" style="padding-top: 100px">
                        <!-- Sub-header titles -->
                        <div class="subheader-titles">
                            <h2 class="subheader-maintitle">USER ACCOUNT</h2>
                            <h4 class="subheader-subtitle">REGISTER NEW ACCOUNT</h4>
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
    <!--/ Sub-header Bottom mask style 3 -->
</div>
<!--/ Page sub-header + Bottom mask style 3 -->

<div class="container" style="padding-top: 30px; padding-bottom: 50px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-link aligncenter" href="{{ route('login') }}">Already a user? Sign In.</a>
</div>
@endsection
