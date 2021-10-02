@extends('frontend.layouts.app')

@section('title', 'Forgot Password')


@push('after-styles')
    <link href="{{ url('css/auth.css') }}" rel="stylesheet">
@endpush


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 border p-0">
                <div style="background-color: #333">
                    <h5 class="text-center text-white p-3">Reset Password</h5>
                </div>
                
                <form action="{{route('frontend.auth.password.reset')}}" method="post">
                {{csrf_field()}}

                    <div class="row mt-4 justify-content-center">
                        <div class="col-10 p-3">
                            <div class="mb-4">
                                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email" name="email">
                            </div>

                            <div class="mb-4">
                                <input type="password" class="form-control" id="password" aria-describedby="password" placeholder="Password" name="password">
                            </div>

                            <div class="mb-4">
                                <input type="password" class="form-control" id="confirm_password" aria-describedby="confirm_password" placeholder="Confirm Password" name="confirm_password">
                            </div>

                            <div class="text-center mt-4">
                                <input type="hidden" name="token" value="{{ $token }}">
                                <button type="submit" class="btn w-100 text-white" id="submit_btn" disabled>Send Password Reset Link</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection

@push('after-scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>
@endpush
