@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Update password')

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

    <div class="container user-settings">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <h4 class="user-settings-head">Update password</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">

                            <form action="{{ route('frontend.user.user_password_update') }}" method="post" enctype="multipart/form-data" id="change-password-form" novalidate>
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="text-end">
                                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <input type="password" class="form-control" id="old_password" placeholder="Old password *" aria-describedby="old_password" name="old_password">
                                            @if($errors->any('old_password'))
                                                <span class="text-danger invalid">{{ $errors->first('old_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <input type="password" class="form-control" id="new_password" placeholder="New password *" aria-describedby="new_password" name="new_password">
                                            @if($errors->any('new_password'))
                                                <span class="text-danger invalid">{{ $errors->first('new_password') }}</span>
                                            @endif
                                        </div>  
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4">
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password *" aria-describedby="confirm_password">
                                            @if($errors->any('confirm_password'))
                                                <span class="text-danger invalid">{{ $errors->first('confirm_password') }}</span>
                                            @endif
                                        </div>  
                                    </div>
                                </div>

                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn text-white px-5 py-2" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Update password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Your password was successfully updated</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a href="{{ route('frontend.user.account_dashboard') }}" class="btn text-white" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(\Session::has('error'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-0 text-center">Your old password is wrong.</h4>
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
    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('#change-password-form').validate({
            ignore: '.ignore',
            errorClass: 'invalid',
            validClass: 'success',
            rules: {
                old_password: {
                    required: true,
                    minlength: 6,
                    maxlength: 100
                },
                new_password: {
                    required: true,
                    minlength: 6,
                    maxlength: 100
                },
                confirm_password: {
                    required: true,
                    equalTo: '#new_password'
                },
            },
            messages: {
                old_password: {
                    required: "Enter your old password"
                },
                new_password: {
                    required: "Enter your new password"
                },
                confirm_password: {
                    required: "Need to confirm your new password"
                },
            },
            submitHandler:function(form) {
                $.LoadingOverlay('show');
                form.submit();
            }
        });


        $('#change-password-form input').on('change', function () { 
        if ($('#change-password-form input').validate()) {
            $('.update').attr('disabled', false);
        } else {
            $('.update').attr('disabled', true);
        }
    });
    </script>
@endpush