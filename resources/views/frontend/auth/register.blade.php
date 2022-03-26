@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Register')

@push('after-styles')
    <link href="{{ url('css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')

@include('includes.partials.messages')
    <div class="container student-register" style="margin-bottom: 7rem;">
        <div class="row justify-content-between">
            <div class="col-7 py-2">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-bolder futura">Create a new account</h4>
                        <hr style="background: #bd2130; height: 1px!important; opacity: 1!important;">

                        <form action="{{ url('register') }}" method="post" enctype="multipart/form-data" class="needs-validation">
                        {{ csrf_field() }}
                            <div class="mb-3">
                                <input type="text" class="form-control" id="first_name" aria-describedby="first_name" placeholder="First name" name="first_name" required value="{{ old('first_name') }}">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="last_name" aria-describedby="last_name" placeholder="Last name" name="last_name" required value="{{ old('last_name') }}">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email" name="email" required value="{{ old('email') }}">
                            </div>
                            <!-- <div class="mb-3">
                                <input type="text" class="form-control" id="user_name" aria-describedby="user_name" placeholder="Enter a user name" name="user_name" required>
                            </div> -->
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password1" aria-describedby="password" placeholder="Password" name="password" required value="{{ old('password') }}">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password2" aria-describedby="password" placeholder="Confirm password" name="password_confirmation" required value="{{ old('password_confirmation') }}">
                            </div>

                            <div class="mb-3 text-center">
                                <label class="form-check-label gray" for="flexCheckDefault" style="font-size: 0.8rem;">
                                    By clicking submit, you agree to our <a href="{{ route('frontend.disclaimer') }}" class="fw-bold" target="_blank" style="color: black;">Disclaimer</a>, <a href="{{ route('frontend.terms_of_use') }}" target="_blank" class="fw-bold" style="color: black;">Terms of use</a> and <a href="{{ route('frontend.privacy_policy') }}" class="fw-bold" target="_blank" style="color: black;">Privacy policy</a>
                                </label>
                            </div>

                            <div class="row mt-3 justify-content-center">
                                <div class="col-md-6">
                                    <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn w-50 text-white" id="submit_btn" disabled>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-4 register">
                <h4 class="fw-bolder text-center futura">Already registered?</h4>
                <hr>

                <a href="{{ route('frontend.auth.login') }}" type="button" class="btn w-100">Login to your account</a> <br>
                <hr style="height: 0.2px!important; opacity: 0.2!important;">

                <div class="border p-3">
                    <p class="gray fw-bold"><i class="fas fa-shield-alt" style="color: orange;"></i> Protect your account</p>
                    <p>Whenever you sign in proxima study website ensure that the web address in the browser start with: <a href="{{ route('frontend.index') }}" class="text-decoration-none" style="font-size: 0.9rem;">https://www.studyingincanada.org</a></p>
                    
                </div>
            </div>
        </div>
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

    <script>
        $(document).ready(function() {
            // if($('input').hasAttribute('required')) {
            //     // $(this).attr('oninvalid', "this.setCustomValidity('This field is required')");
            //     $(this).removeAttr('placeholder');

            //     // oninvalid="this.setCustomValidity('This field is required')" oninput="this.setCustomValidity('')"
            // }

            $("form").each(function(){

                if( $(this).find(':input').attr('required') ) {
                    // $(this).attr('oninvalid', "this.setCustomValidity('This field is required')");

                    $(this).find(':input').removeAttr('placeholder');

                    // oninvalid="this.setCustomValidity('This field is required')" oninput="this.setCustomValidity('')"
                }
            });
        });
    </script>

@endpush
