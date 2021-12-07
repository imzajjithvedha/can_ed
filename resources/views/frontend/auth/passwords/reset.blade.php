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
                
                <form action="{{route('frontend.auth.password.update')}}" method="post" id="reset-password-form">
                {{csrf_field()}}

                    <div class="row mt-4 justify-content-center">
                        <div class="col-10 p-3">
                            <div class="col-12">
                                <p class="mb-2 required fw-bold text-end">* Indicates required fields</p>
                            </div>
                            <div class="col-12">
                                <div class="mb-4">
                                    <input type="password" class="form-control" id="password" placeholder="Password *" aria-describedby="password" name="password">
                                    @if($errors->any('password'))
                                        <span class="text-danger invalid fw-bold">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>  
                            </div>

                            <div class="col-12">
                                <div class="mb-4">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password *" aria-describedby="confirm_password">
                                    @if($errors->any('confirm_password'))
                                        <span class="text-danger invalid fw-bold">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>  
                            </div>

                            <div class="col-12 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $user->id }}">
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 update" style="background-color: #94ca60;">Update password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Your password updated successfully.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
