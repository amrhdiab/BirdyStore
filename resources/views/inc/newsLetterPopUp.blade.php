<div id="newsletter-box" class="kl-pp-box kl-newsletter-box mfp-hide" data-ppbox-timeout="10000" data-cookie-expire="7">
    <div class="kl-pp-inner">
        <div class="nlbox--preview" style="background-image:url({{asset('/app/images/nlpreview.jpg')}});">
            <div class="nlbox-logo" style="background-image:url({{asset('/app/images/kallyas-logo.svg')}})"></div>
            <!-- /.nlbox-logo -->
        </div>
        <div class="nlbox--inner">
            <div class="fs-xl fs-xs-l reset-line-height">SIGNUP TODAY!</div>
            <!-- /.fs-xl -->
            <div class="nlbox--hugediscount text-center-xs">
                <span class="fs-jumbo fs-xs-huge fw-extrabold reset-line-height mt-20 mt-xs-0" style="font-size: 40px">FREE</span>
                <br><span class="fs-jumbo fs-xs-huge fw-extrabold reset-line-height mt-20 mt-xs-0" style="font-size: 70px;margin-top: 0px">SHIPPING</span>
            </div>
            <div class="fs-xl fs-xs-l reset-line-height mb-30">FOR LIMITED TIME. GET BUSY!</div>
            <!-- /.fs-xl -->

            <!-- Begin MailChimp Signup Form -->
            <!-- tutorial here: http://designshack.net/articles/css/custom-mailchimp-email-signup-form/ -->
            <div class="newsletter-signup">
                <form action="{{route('front.newsletter')}}"
                      method="post" class="validate" novalidate>
                    {{csrf_field()}}
                    <input type="email" value="" name="email" class="form-control" placeholder="email@domain.com" required>
                    <input type="submit" name="subscribe"  value="JOIN">
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;">
                        <input type="text" name="b_xxxxxxxxxxxxxxxxxxxCUSTOMxxxxxxxxx" value="">
                    </div>
                </form>
                <div id="notification_container"></div>
            </div><!-- end newsletter-signup -->
        </div>
        <!-- /.vs-nlbox-inner -->
    </div>
    <!-- /.lb-inner -->

    <a href="#" class="dontshow">Don't show this again!</a>
</div>