<div class="kl-slideshow iosslider-slideshow uh_light_gray maskcontainer--shadow_ud iosslider--custom-height scrollme kl-slider-loaded pb-47">
    <!-- Loader -->
    <div class="kl-loader">
        <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewbox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946 s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634 c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"></path><path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0 C22.32,8.481,24.301,9.057,26.013,10.047z" transform="rotate(98.3774 20 20)"><animatetransform attributetype="xml" attributename="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.5s" repeatcount="indefinite"></animatetransform></path></svg>
    </div>
    <!-- Loader -->

    <div class="bgback">
    </div>

    <!-- Animated Sparkles -->
    <div class="th-sparkles">
    </div>
    <!--/ Animated Sparkles -->

    <!-- iOS Slider wrapper with animateme scroll efect -->
    <div class="iosSlider kl-slideshow-inner animateme" data-trans="6000" data-autoplay="1" data-infinite="true" data-when="span" data-from="0" data-to="0.75" data-translatey="300" data-easing="linear">
        <!-- Slides -->
        <div class="kl-iosslider hideControls">
            <!-- Slide 1 -->
            <div class="item iosslider__item">
                <!-- Image -->
                <div class="slide-item-bg" style="background-image:url({{asset('/storage/slides/').'/'.$slides[0]['bg_media']}});">
                </div>
                <!--/ Image -->

                <!-- Gradient overlay -->
                <div class="kl-slide-overlay" style="background:rgba(32,55,152,0.4); background: -moz-linear-gradient(left, rgba(32,55,152,0.4) 0%, rgba(17,93,131,0.25) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(32,55,152,0.4)), color-stop(100%,rgba(17,93,131,0.25))); background: -webkit-linear-gradient(left, rgba(32,55,152,0.4) 0%,rgba(17,93,131,0.25) 100%); background: -o-linear-gradient(left, rgba(32,55,152,0.4) 0%,rgba(17,93,131,0.25) 100%); background: -ms-linear-gradient(left, rgba(32,55,152,0.4) 0%,rgba(17,93,131,0.25) 100%); background: linear-gradient(to right, rgba(32,55,152,0.4) 0%,rgba(17,93,131,0.25) 100%); ">
                </div>
                <!--/ Gradient overlay -->

                <!-- Captions container -->
                <div class="container kl-iosslide-caption kl-ioscaption--style4 s4ext fromleft klios-alignleft kl-caption-posv-middle">
                    <!-- Captions animateme wrapper -->
                    <div class="animateme" data-when="span" data-from="0" data-to="0.75" data-opacity="0.1" data-easing="linear">
                        <!-- Main Big Title -->
                        <h2 class="main_title has_titlebig "><span>{{$slides[0]['headline']}}</span></h2>
                        <!--/ Main Big Title -->

                        <!-- Big Title -->
                        <h3 class="title_big">{{$slides[0]['title']}}</h3>
                        <!--/ Big Title -->

                        <!-- Link button -->
                        <a class="more " href="{{$slides[0]['action1_link']}}" target="_self">{{$slides[0]['action1_title']}}</a>
                        <!--/ Link button -->

                        <!-- Small Title -->
                        <h4 class="title_small">{{$slides[0]['sub_title']}}</h4>
                        <!--/ Small Title -->
                    </div>
                    <!--/ Captions animateme wrapper -->
                </div>
                <!--/ Captions container -->
            </div>
            <!--/ Slide 1 -->

            <!-- Slide 2 -->
            <div class="item iosslider__item">
                <!-- Image -->
                <div class="slide-item-bg" style="background-image:url({{asset('/storage/slides/').'/'.$slides[1]['bg_media']}});">
                </div>
                <!--/ Image -->

                <!-- Color overlay -->
                <div class="kl-slide-overlay" style="background-color:rgba(6,111,217,0.3)">
                </div>
                <!--/ Color overlay -->

                <!-- Captions container -->
                <div class="container kl-iosslide-caption kl-ioscaption--style4 fromright klios-alignright kl-caption-posv-middle">
                    <!-- Captions animateme wrapper -->
                    <div class="animateme" data-when="span" data-from="0" data-to="0.75" data-opacity="0.1" data-easing="linear">
                        <!-- Main Big Title -->
                        <h2 class="main_title has_titlebig "><span>{{$slides[1]['headline']}}</span></h2>
                        <!--/ Main Big Title -->

                        <!-- Big Title -->
                        <h3 class="title_big"><span style="ff-alternative">{{$slides[1]['title']}}</span></h3>
                        <!--/ Big Title -->

                        <!-- Link button -->
                        <a class="more " href="{{$slides[1]['action1_link']}}" target="_self">{{$slides[1]['action1_title']}}</a>
                        <!--/ Link button -->

                        <!-- Small Title -->
                        <h4 class="title_small">{{$slides[1]['sub_title']}}</h4>
                        <!--/ Small Title -->
                    </div>
                    <!--/ Captions animateme wrapper -->
                </div>
                <!--/ Captions container -->
            </div>
            <!--/ Slide 2 -->

            <!-- Slide 3 -->
            <div class="item iosslider__item">
                <!-- Image -->
                <div class="slide-item-bg" style="background-image:url({{asset('/storage/slides/').'/'.$slides[2]['bg_media']}});">
                </div>
                <!--/ Image -->

                <!-- Color overlay -->
                <div class="kl-slide-overlay" style="background-color:rgba(4,43,135,0.45)">
                </div>
                <!-- Color overlay -->

                <!-- Captions container -->
                <div class="container kl-iosslide-caption kl-ioscaption--style5 fromleft klios-alignleft kl-caption-posv-middle">
                    <!-- Captions animateme wrapper -->
                    <div class="animateme" data-when="span" data-from="0" data-to="0.75" data-opacity="0.1" data-easing="linear">
                        <!-- Main Big Title -->
                        <h2 class="main_title has_titlebig "><span>{{$slides[2]['headline']}}</span></h2>
                        <!--/ Main Big Title -->

                        <!-- Big Title -->
                        <h3 class="title_big">{{$slides[2]['title']}}</h3>
                        <!--/ Big Title -->

                        <!-- Link buttons -->
                        <div class="more">
                            <!-- Button full color style -->
                            <a class="btn btn-fullcolor " href="{{$slides[2]['action1_link']}}" target="_self">{{$slides[2]['action1_title']}}</a>
                            <!--/ Button full color style -->
                        </div>
                        <!--/ Link buttons -->

                        <!-- Small Title -->
                        <h4 class="title_small">{{$slides[2]['sub_title']}}</h4>
                        <!--/ Small Title -->
                    </div>
                    <!--/ Captions animateme wrapper -->
                </div>
                <!--/ Captions container -->

                <!-- Image boxes -->
                <div class="klios-imageboxes fromleft klios-alignleft middle ">
                    <!-- Image boxes wrapper -->
                    <div class="kl-imgbox-inner">
                        <!-- Box #1 -->
                        <div class="kl-imgbox kl-imgbox--1">
                            <a href="{{$slides[2]['image1_link']}}" title="" class="kl-imgbox--link" style="background-image:url({{asset('/storage/slides/').'/'.$slides[2]['image1']}})"></a>
                        </div>
                        <!--/ Box #1 -->

                        <!-- Box #2 -->
                        <div class="kl-imgbox kl-imgbox--2">
                            <a href="{{$slides[2]['image2_link']}}" title="" class="kl-imgbox--link" style="background-image:url({{asset('/storage/slides/').'/'.$slides[2]['image2']}})"></a>
                        </div>
                        <!--/ Box #2 -->

                        <!-- Box #3 -->
                        <div class="kl-imgbox kl-imgbox--3">
                            <a href="{{$slides[2]['image3_link']}}" title="" class="kl-imgbox--link" style="background-image:url({{asset('/storage/slides/').'/'.$slides[2]['image3']}})"></a>
                        </div>
                        <!--/ Box #3 -->
                    </div>
                    <!--/ Image boxes wrapper -->
                </div>
                <!--/ Image boxes -->
            </div>
            <!--/ Slide 3 -->

            <!-- Slide 4 -->
            <div class="item iosslider__item">
                <!-- Image -->
                <div class="slide-item-bg" style="background-image:url({{asset('/storage/slides/').'/'.$slides[3]['bg_media']}});">
                </div>
                <!--/ Image -->

                <!-- Gradient overlay -->
                <div class="kl-slide-overlay" style="background:rgba(91,48,0,0.3); background: -moz-linear-gradient(left, rgba(91,48,0,0.3) 0%, rgba(53,53,53,0.25) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(91,48,0,0.3)), color-stop(100%,rgba(53,53,53,0.25))); background: -webkit-linear-gradient(left, rgba(91,48,0,0.3) 0%,rgba(53,53,53,0.25) 100%); background: -o-linear-gradient(left, rgba(91,48,0,0.3) 0%,rgba(53,53,53,0.25) 100%); background: -ms-linear-gradient(left, rgba(91,48,0,0.3) 0%,rgba(53,53,53,0.25) 100%); background: linear-gradient(to right, rgba(91,48,0,0.3) 0%,rgba(53,53,53,0.25) 100%); ">
                </div>
                <!--/ Gradient overlay -->

                <!-- Captions container -->
                <div class="container kl-iosslide-caption kl-ioscaption--style5 zoomin klios-aligncenter kl-caption-posv-middle">
                    <!-- Captions animateme wrapper -->
                    <div class="animateme" data-when="span" data-from="0" data-to="0.75" data-opacity="0.1" data-easing="linear">
                        <!-- Main Big Title -->
                        <h2 class="main_title has_titlebig kl-ios-has-sqbox "><span class="kl-ios-sqbox"></span><span>{{$slides[3]['headline']}}</span></h2>
                        <!--/ Main Big Title -->

                        <!-- Big Title -->
                        <h3 class="title_big">{{$slides[3]['title']}}</h3>
                        <!--/ Big Title -->

                        <!-- Link buttons -->
                        <div class="more">
                            <!-- Button full color style -->
                            <a class="btn btn-fullcolor " href="{{$slides[3]['action1_link']}}" target="_self">{{$slides[3]['action1_title']}}</a>
                            <!--/ Button full color style -->
                        </div>
                        <!--/ Link buttons -->
                    </div>
                    <!--/ Captions animateme wrapper -->
                </div>
                <!--/ Captions container -->
            </div>
            <!--/ Slide 4 -->

            <!-- Slide 5 -->
            <div class="item iosslider__item">
                <!-- Image -->
                <div class="slide-item-bg" style="background-image:url({{asset('/storage/slides/').'/'.$slides[4]['bg_media']}});">
                </div>
                <!--/ Image -->

                <!-- Gradient overlay -->
                <div class="kl-slide-overlay" style="background:rgba(132,30,193,0.25); background: -moz-linear-gradient(left, rgba(132,30,193,0.25) 0%, rgba(61,15,15,0.3) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(132,30,193,0.25)), color-stop(100%,rgba(61,15,15,0.3))); background: -webkit-linear-gradient(left, rgba(132,30,193,0.25) 0%,rgba(61,15,15,0.3) 100%); background: -o-linear-gradient(left, rgba(132,30,193,0.25) 0%,rgba(61,15,15,0.3) 100%); background: -ms-linear-gradient(left, rgba(132,30,193,0.25) 0%,rgba(61,15,15,0.3) 100%); background: linear-gradient(to right, rgba(132,30,193,0.25) 0%,rgba(61,15,15,0.3) 100%); ">
                </div>
                <!--/ Gradient overlay -->

                <!-- Captions container -->
                <div class="container kl-iosslide-caption kl-ioscaption--style5 zoomin klios-aligncenter kl-caption-posv-middle">
                    <!-- Captions animateme wrapper -->
                    <div class="animateme" data-when="span" data-from="0" data-to="0.75" data-opacity="0.1" data-easing="linear">
                        <!-- Main Big Title -->
                        <h2 class="main_title has_titlebig kl-ios-has-sqbox "><span class="kl-ios-sqbox"></span>{{$slides[4]['headline']}}</h2>
                        <!--/ Main Big Title -->

                        <!-- Big Title -->
                        <h3 class="title_big">{{$slides[4]['title']}}</h3>
                        <!--/ Big Title -->

                        <!-- Link buttons -->
                        <div class="more">
                            <!-- Button full color style -->
                            <a class="btn btn-fullcolor " href="{{$slides[4]['action1_link']}}" target="_self">{{$slides[4]['action1_title']}}</a>
                            <!--/ Button full color style -->
                        </div>
                        <!--/ Link buttons -->
                    </div>
                    <!--/ Captions animateme wrapper -->
                </div>
                <!--/ Captions container -->
            </div>
            <!--/ Slide 5 -->
        </div>
        <!--/ Slides -->

        <!-- Navigation Controls - Prev -->
        <div class="kl-iosslider-prev">
            <!-- Arrow -->
            <span class="thin-arrows ta__prev"></span>
            <!--/ Arrow -->

            <!-- Label - prev -->
            <div class="btn-label">
                PREV
            </div>
            <!--/ Label - prev -->
        </div>
        <!--/ Navigation Controls - Prev -->

        <!-- Navigation Controls - Next -->
        <div class="kl-iosslider-next">
            <!-- Arrow -->
            <span class="thin-arrows ta__next"></span>
            <!--/ Arrow -->

            <!-- Label - next -->
            <div class="btn-label">
                NEXT
            </div>
            <!--/ Label - next -->
        </div>
        <!--/ Navigation Controls - Prev -->
    </div>
    <!--/ iOS Slider wrapper with animateme scroll efect -->

    <!-- Bullets -->
    <div class="kl-ios-selectors-block bullets2">
        <div class="selectors">
            <!-- Item #1 -->
            <div class="item iosslider__bull-item first">
            </div>
            <!--/ Item #1 -->

            <!-- Item #2 -->
            <div class="item iosslider__bull-item">
            </div>
            <!--/ Item #2 -->

            <!-- Item #3 -->
            <div class="item iosslider__bull-item">
            </div>
            <!--/ Item #3 -->

            <!-- Item #4 -->
            <div class="item iosslider__bull-item selected">
            </div>
            <!--/ Item #4 -->

            <!-- Item #5 -->
            <div class="item iosslider__bull-item">
            </div>
            <!--/ Item #5 -->
        </div>
        <!--/ .selectors -->
    </div>
    <!--/ Bullets -->

    <div class="scrollbarContainer">
    </div>

    <!-- Bottom mask style 2 -->
    <div class="kl-bottommask kl-bottommask--shadow_ud">
    </div>
    <!--/ Bottom mask style 2 -->
</div>