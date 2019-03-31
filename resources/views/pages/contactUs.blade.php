@extends('layouts.app')

@section('title')
    Contact Us | {{$settings['website_name']}}
@endsection

@section('content')

    <!-- Google maps element -->
    <div class="kl-slideshow static-content__slideshow scontent__maps">
        <div class="th-google_map" id="theMap" style="height: 700px;">
        </div>
        <!-- end map -->

        <!-- Google map content panel -->
        <div class="kl-contentmaps__panel">
            <a href="#" class="js-toggle-class kl-contentmaps__panel-tgg hidden-xs" data-target=".kl-contentmaps__panel"
               data-target-class="is-closed"></a>
            <!-- Image & Image pop-up -->
            <a href="{{asset('/storage/settings/').'/'.$settings['logo2']}}" data-lightbox="image" class="kl-contentmaps__panel-img"
               style="background-image:url({{asset('/storage/settings/').'/'.$settings['logo2']}});width: 170px;height: 210px;margin: 0 auto"></a>

            <!-- Content -->
            <div class="kl-contentmaps__panel-info">
                <h5 class="kl-contentmaps__panel-title">{{$settings['website_name']}}</h5>
                <div class="kl-contentmaps__panel-info-text">
                    <p>{{substr($settings['about_us'],0,200)}}...</p>
                    <a href="{{route('front.about')}}" class="btn-element btn btn-fullblack btn-sm">More About Us</a>
                </div>
            </div>
            <!--/ Content -->
        </div>
        <!-- Google map content panel -->
    </div>
    <!--/ Google maps element -->

    <!-- Contact form & details section -->
    <section class="hg_section ptop-80 pbottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <!-- Contact form -->
                    <div>
                        @include('inc.flash')
                        <form action="{{route('front.contact.send')}}" method="post" class="row">
                            {{csrf_field()}}
                            <div class="cf_response"></div>
                            <p class="col-sm-12 kl-fancy-form">
                                <input type="text" name="name" id="cf_name" class="form-control"
                                       placeholder="Please enter your name" value="{{old('name')}}" tabindex="1" maxlength="35"
                                       required>
                                <label class="control-label" style="margin-left: 15px">NAME</label>
                            </p>
                            <p class="col-sm-12 kl-fancy-form">
                                <input type="email" name="email" id="cf_email" class="form-control h5-email"
                                       placeholder="Please enter your email address" value="{{old('email')}}" tabindex="1"
                                       maxlength="35" required>
                                <label class="control-label" style="margin-left: 15px">EMAIL</label>
                            </p>
                            <p class="col-sm-12 kl-fancy-form">
                                <input type="text" name="subject" id="cf_subject" class="form-control"
                                       placeholder="Enter the subject message" value="{{old('subject')}}" tabindex="1" maxlength="35"
                                       required>
                                <label class="control-label" style="margin-left: 15px">SUBJECT</label>
                            </p>
                            <p class="col-sm-12 kl-fancy-form">
                                <textarea name="body" id="cf_message" class="form-control" cols="30" rows="10"
                                          placeholder="Your message..." tabindex="4" required>{{old('body')}}</textarea>
                                <label class="control-label" style="margin-left: 15px">MESSAGE</label>
                            </p>

                            <!-- Google recaptcha required site-key -->
                            <div class="g-recaptcha" data-sitekey="xxxx"></div>

                            <p class="col-sm-12">
                                <button class="btn btn-fullcolor" type="submit">Send</button>
                            </p>

                        </form>
                    </div>
                    <!--/ Contact form -->
                </div>
                <!--/ col-md-9 col-sm-9 -->

                <div class="col-md-3 col-sm-3">
                    <!-- Contact details -->
                    <div class="text_box">
                        <h3 class="text_box-title text_box-title--style2">CONTACT INFO</h3>
                        <h4>{{$settings['address']}}</h4>
                        <p>
                            {{$settings['contact_number']}}
                        </p>
                        <p>
                            <a href="mailto:{{$settings['contact_email_1']}}">{{$settings['contact_email_1']}}</a><br>
                            <a href="mailto:{{$settings['contact_email_2']}}">{{$settings['contact_email_2']}}</a><br>
                            <a href="/">{{$settings['website_name']}}</a>
                        </p>
                    </div>
                    <!--/ Contact details -->
                </div>
                <!--/ col-md-3 col-sm-3 -->
            </div>
            <!--/ .row -->
        </div>
        <!--/ .container -->
    </section>
    <!--/ Contact form & details section -->

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
            var storeLocation = {lat: blade({!! json_encode($settings['lat']) !!}), lng: blade({!! json_encode($settings['lng']) !!})};
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
    <script type="text/javascript" src="{{asset('app/js/plugins/jquery.gmap.min.js')}}"></script>


@endsection