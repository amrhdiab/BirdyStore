@extends('admin.layouts.app')
@section('title','Settings')
@section('styles')
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Website Settings</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4>Settings</h4>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id="settings_form" class="form-horizontal form-label-left input_mask" method="post"
                                  enctype="multipart/form-data">
                                <span id="form_output"></span>
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">General Settings *</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input id="website_name" name="website_name"
                                               value="{{$settings['website_name']}}" type="text"
                                               class="form-control has-feedback-left" placeholder="Website Name" required>
                                        <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input id="contact_number" name="contact_number"
                                               value="{{$settings['contact_number']}}" type="tel"
                                               class="form-control" placeholder="Contact Number" required>
                                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-2">
                                        <input id="contact_email_1" name="contact_email_1"
                                               value="{{$settings['contact_email_1']}}" type="email"
                                               class="form-control has-feedback-left" placeholder="Email-1" required>
                                        <span class="fa fa-envelope form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input id="contact_email_2" name="contact_email_2"
                                               value="{{$settings['contact_email_2']}}" type="email"
                                               class="form-control" placeholder="Email-2" required>
                                        <span class="fa fa-envelope form-control-feedback right"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Social Urls *</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input id="facebook" name="facebook" value="{{$settings['facebook']}}"
                                               type="url"
                                               class="form-control has-feedback-left" placeholder="Facebook" required>
                                        <span class="fa fa-facebook form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input id="twitter" name="twitter" value="{{$settings['twitter']}}" type="url"
                                               class="form-control"
                                               placeholder="Twitter" required>
                                        <span class="fa fa-twitter form-control-feedback right"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-2">
                                        <input id="google" name="google" value="{{$settings['google']}}" type="url"
                                               class="form-control has-feedback-left" placeholder="Google+" required>
                                        <span class="fa fa-google-plus form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input id="dribble" name="dribble" value="{{$settings['dribble']}}" type="url"
                                               class="form-control"
                                               placeholder="Dribble" required>
                                        <span class="fa fa-dribbble form-control-feedback right"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Slogan *</label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input id="slogan" name="slogan" value="{{$settings['slogan']}}" type="text"
                                               class="form-control"
                                               placeholder="Website Slogan.." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Address *</label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input id="address" name="address" value="{{$settings['address']}}" type="text"
                                               class="form-control"
                                               placeholder="Address.." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Location-Lat/Lng *</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input id="lat" name="lat" value="{{$settings['lat']}}" type="text"
                                               class="form-control"
                                               placeholder="Latitude.." required>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input id="lng" name="lng" value="{{$settings['lng']}}" type="text"
                                               class="form-control"
                                               placeholder="Longitude.." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">About Message *</label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <textarea id="about_us" name="about_us" rows="6"
                                                  class="form-control" required>{{$settings['about_us']}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Website Logo Main *</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input id="logo" name="logo" type="file" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12 logo_container">
                                        <img src="{{asset('/storage/settings')}}/{{$settings['logo']}}" width="30px"
                                             height="30px" alt="store-logo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Website Logo Secondary *</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input id="logo2" name="logo2" type="file" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12 logo_container2">
                                        <img src="{{asset('/storage/settings')}}/{{$settings['logo2']}}" width="30px"
                                             height="30px" alt="store-logo">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                                        <button type="submit" id="submit" name="submit" class="btn btn-success">Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('admin.settings.scripts')