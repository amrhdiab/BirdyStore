<div id="login_panel" class="mfp-hide loginbox-popup auth-popup">
    <div class="inner-container login-panel auth-popup-panel">
        <h3 class="m_title m_title_ext text-custom auth-popup-title tcolor">SIGN INTO YOUR ACCOUNT</h3>
        <form class="login_panel" name="login_form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group kl-fancy-form {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="kl-font-alt kl-fancy-form-label">E-Mail Address</label>
                <input id="kl-email" type="email" class="form-control" name="email"
                       class="form-control inputbox kl-fancy-form-input kl-fw-input"
                       placeholder="eg: someone@something.com" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group kl-fancy-form {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="kl-font-alt kl-fancy-form-label">PASSWORD</label>
                <input id="kl-password" type="password" class="form-control inputbox kl-fancy-form-input kl-fw-input"
                       placeholder="type password" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <label class="auth-popup-remember" for="kl-rememberme">
                <input type="checkbox" name="remember" id="kl-rememberme"
                       value="forever" class="auth-popup-remember-chb" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
            <input type="submit" id="login" name="submit_button" class="btn zn_sub_button btn-fullcolor btn-md"
                   value="LOG IN">
            <input type="hidden" value="login" class="" name="form_action">
            <input type="hidden" value="login" class="" name="action">
            <input type="hidden" value="#" class="" name="submit">
            <div class="links auth-popup-links">
                <a href="#register_panel" class="create_account auth-popup-createacc kl-login-box auth-popup-link">CREATE AN ACCOUNT</a>
                <span class="sep auth-popup-sep"></span>
                <a href="#forgot_panel" class="kl-login-box auth-popup-link">FORGOT YOUR PASSWORD?</a>
            </div>
        </form>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
</div>
<div id="register_panel" class="mfp-hide loginbox-popup auth-popup">
    <div class="inner-container register-panel auth-popup-panel">
        <h3 class="m_title m_title_ext text-custom auth-popup-title">REGISTER NEW ACCOUNT</h3>
        <form class="register_panel" name="login_form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group kl-fancy-form {{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="kl-font-alt kl-fancy-form-label" for="username">USERNAME</label>
                <input id="reg-username" type="text" class="form-control inputbox kl-fancy-form-input kl-fw-input"
                       name="name" value="{{ old('name') }}" placeholder="enter a username" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group kl-fancy-form {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="kl-font-alt kl-fancy-form-label">E-Mail Address</label>
                <input id="reg-email" type="email" class="form-control inputbox kl-fancy-form-input kl-fw-input"
                       name="email" placeholder="your-email@website.com" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group kl-fancy-form {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="kl-font-alt kl-fancy-form-label">PASSWORD</label>
                <input id="reg-pass" type="password" class="form-control inputbox kl-fancy-form-input kl-fw-input"
                       name="password" placeholder="*****" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group kl-fancy-form">
                <label for="confirm-password" class="kl-font-alt kl-fancy-form-label">CONFIRM PASSWORD</label>
                <input id="reg-pass2" type="password" class="form-control inputbox kl-fancy-form-input kl-fw-input"
                       name="password_confirmation" placeholder="*****" required>
            </div>
            <div class="form-group">
                <input type="submit" id="signup" name="submit" class="btn zn_sub_button btn-block btn-fullcolor btn-md"
                       value="CREATE MY ACCOUNT">
            </div>
            <div class="links auth-popup-links">
                <a href="#login_panel" class="kl-login-box auth-popup-link">ALREADY HAVE AN ACCOUNT?</a>
            </div>
        </form>
    </div>
</div>
<div id="forgot_panel" class="mfp-hide loginbox-popup auth-popup forgot-popup">
    <div class="inner-container forgot-panel auth-popup-panel">
        <h3 class="m_title m_title_ext text-custom auth-popup-title">FORGOT YOUR PASSWORD?</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="forgot_form" name="login_form" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="form-group kl-fancy-form {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="kl-font-alt kl-fancy-form-label">E-Mail Address</label>
                <input id="forgot-email" type="email" class="form-control inputbox kl-fancy-form-input kl-fw-input"
                       name="email" value="{{ old('email') }}" placeholder="..." required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" id="recover" name="submit" class="btn btn-block zn_sub_button btn-fullcolor btn-md"
                       value="Send Password Reset Link">
            </div>
            <div class="links auth-popup-links">
                <a href="#login_panel" class="kl-login-box auth-popup-link">AAH, WAIT, I REMEMBER NOW!</a>
            </div>
        </form>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
</div>