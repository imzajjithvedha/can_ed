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
                        <h4 class="user-settings-head">School settings</h4>
                        <h6 class="user-settings-sub" style="color: #5e6871">Here you can find your school settings.</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="py-3" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
                            <div class="border p-3">
                                <div class="row align-items-center mb-5">
                                    <div class="col-4">
                                        <h5 class="fw-bold">School status : </h5>
                                    </div>
                                    <div class="col-8">
                                        @if($school->status == 'Approved')
                                            <h5><span class="badge bg-success p-3" style="font-size: 1.1rem;">Approved</span></h5>
                                        @else
                                            <h5><span class="badge bg-warning text-dark p-3" style="font-size: 1.1rem;">Pending</span></h5>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button type="button" class="btn rounded-pill text-light px-5 py-2" data-bs-toggle="modal" data-bs-target="#confirmClose" style="background-color: red;">Delete my school</button>
                                </div>
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