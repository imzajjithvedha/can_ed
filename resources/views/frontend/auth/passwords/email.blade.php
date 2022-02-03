@extends('frontend.layouts.app')

@section('title', 'Forgot password')


@push('after-styles')
    <link href="{{ url('css/auth.css') }}" rel="stylesheet">
@endpush


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 border p-0">
                <div style="background-color: #333">
                    <h4 class="text-center text-white p-3 futura">Forgot password</h4>
                </div>
                
                <form action="{{ route('frontend.auth.password.email') }}" method="post">
                {{csrf_field()}}

                    <div class="row mt-4 justify-content-center">
                        <div class="col-10 p-3">
                            <div class="mb-4">
                                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email" name="email">
                            </div>

                            <div class="row mb-2 justify-content-center">
                                <div class="col-11 text-center">
                                    <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn w-100 text-white" id="submit_btn" disabled>Send password reset link</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(\Session::has('error'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#errorModal"></button>

        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Email does not exist in our database</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#successModal"></button>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="errorModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-0 text-center">We’ve sent a password reset link to your email</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn text-white w-25" data-bs-dismiss="modal" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
@endsection

@push('after-scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>
@endpush
