@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Close my account')

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
                        <h4 class="user-settings-head">Close my account</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                            <div class="text-center">
                                <button type="button" class="btn text-white px-5 py-2" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;" data-bs-toggle="modal" data-bs-target="#confirmClose">Close my account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('frontend.user.user_account_close') }}" method="POST">
        {{ csrf_field() }}
        <div class="modal fade" id="confirmClose" tabindex="-1" aria-labelledby="confirmCloseLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Do you want to close your account?</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn text-white w-25" data-bs-dismiss="modal" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
                        <button type="submit" class="btn text-white w-25" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close my account</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection