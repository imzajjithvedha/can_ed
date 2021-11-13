@extends('frontend.layouts.app')

@section('title', 'My Account Information')

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
                        <h4 class="fs-4 fw-bolder user-settings-head">School Settings</h4>
                        <h6 class="user-settings-sub" style="color: #5e6871">Here you can change your school settings.</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                            <div class="border text-center px-2 py-3">
                                <button type="button" class="btn rounded-pill text-light px-4 py-2 ms-2" data-bs-toggle="modal" data-bs-target="#confirmClose" style="background-color: red;">Delete my school</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('frontend.user.school_delete') }}" method="post">
        {{ csrf_field() }}
        <div class="modal fade" id="confirmClose" tabindex="-1" aria-labelledby="confirmCloseLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Do you want to delete your school completely?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn rounded text-white" style="background-color: red;">Delete my school</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection


@push('after-scripts')

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

@endpush