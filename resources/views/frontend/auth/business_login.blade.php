@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Business Login')

@push('after-styles')
    <link href="{{ url('css/login.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container login" style="margin-bottom: 7rem;">
        <diw class="row justify-content-between">
            <div class="col-7">
                <div class="row align-items-center">
                    <div class="col-7">
                        <h5 class="fw-bolder">Business Login</h5>
                        <hr>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email or Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" aria-describedby="password" placeholder="Password" required>
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label gray" for="flexCheckDefault" style="font-size: 0.8rem;">
                                        Keep me logged in
                                    </label>
                                </div>
                            </div>
                            <div class="col-5">
                                <a href="#" class="text-decoration-none" style="font-size: 0.8rem; color: #800000;">Forgot your password?</a>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn w-100" id="submit_btn" disabled>Send Message</button>
                        </div>
                    </div>

                    <div class="col-5 text-center">
                        <div class="position-relative" style="top: -2rem;">
                            <a href="#" class="btn btn-light btn-block text-left border"><i class="fa fa-facebook-square" style="color:#3B579D;"></i> Login with Facebook</a>
                            <a href="#" class="btn btn-light btn-block text-left border"><i class="fa fa-google-plus-square" style="color:#DD4B39;"></i> Login with Google</a>
                            <a href="#" class="btn btn-light btn-block text-left border"><i class="fa fa-linkedin" style="color:#006097;"></i> Login with Linkedin</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4 register">
                <h5 class="fw-bolder text-center">Not Registered yet?</h5>
                <hr>

                <a href="{{ route('frontend.auth.business_register') }}" type="button" class="btn w-100">Register a business</a>
                <hr>

                <div class="border p-3">
                    <p class="gray fw-bold"><i class="fas fa-shield-alt" style="color: orange;"></i> Protect your account</p>
                    <p>Whenever you sign in proxima study website ensure that the web address in the browser start with:</p>
                    <a href="{{ route('frontend.index') }}" class="text-decoration-none" style="font-size: 0.9rem;">https://www.proximastudy.com</a>
                </div>
            </div>
        </diw>
    </div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>

@endpush
