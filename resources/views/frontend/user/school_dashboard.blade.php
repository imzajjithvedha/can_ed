@extends('frontend.layouts.app')

@section('title', 'School Dashboard' )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem;">
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
                        <h4 class="fs-4 fw-bolder user-settings-head">All Schools</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                            @foreach($schools as $school)
                                <div class="row justify-content-between align-items-center border py-3 mb-3">
                                    <div class="col-5">
                                        @if($school->featured_image != null)
                                            <img src="{{ url('images/schools', $school->featured_image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                        @else
                                            <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                        @endif

                                        <div class="badge mt-2 p-0">
                                            @if($school->status == 'Approved')
                                                <h5><span class="badge bg-success">Approved</span></h5>
                                            @else
                                                <h5><span class="badge bg-warning text-dark">Pending</span></h5>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <h5 class="fw-bold mb-2">{{ $school->name }}</h5>
                                        <p class="fw-bold mb-2">Website : <span class="p gray fw-normal">{{ $school->website }}</span></p>
                                        <p class="fw-bold">Country : <span class="p gray fw-normal">{{ $school->country }}</span></p>

                                        <div class="row justify-content-end">
                                            <div class="col-9">
                                                <div class="row justify-content-end">
                                                    <div class="col-3">
                                                        <a href="{{ route('frontend.user.user_school_edit', $school->id) }}" class="btn px-3 rounded-0 text-light py-1" type="button" style="background-color: #4195E1">Edit</a>
                                                    </div>
                                                    <div class="col-3 ps-2">
                                                        <a href="{{ route('frontend.user.user_business_delete', $school->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#deleteBusiness" style="background-color: #ff2c4b"><i class="fas fa-trash-alt" style="background-color: #ff2c4b!important; padding: 0!important"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
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
                        <h4 class="mb-0 text-center">School updated successfully.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="modal fade" id="deleteBusiness" tabindex="-1" aria-labelledby="deleteFavoriteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Business</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this business?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>      

@endsection

@push('after-scripts')
    <script>
        $('.delete').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>
@endpush

