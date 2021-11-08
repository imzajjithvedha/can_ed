@extends('frontend.layouts.app')

@section('title', 'Edit Suggested Program')

@push('after-styles')
    <link href="{{ url('css/profile-settings.css') }}" rel="stylesheet">
@endpush

@section('content')
 


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
                        <h4 class="fs-4 fw-bolder user-settings-head">Edit Suggested Program</h4>
                    </div>
                </div>

                <form action="{{ route('frontend.user.suggested_program_update') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-12 border py-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Program Name" name="name" value="{{$program->name}}" required>
                            </div>

                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="7" placeholder="Description" value="{{$program->description}}">{{$program->description}}</textarea>
                            </div>

                        
                            <div class="mt-5 text-center">
                                <input type="hidden" class="form-control" value="{{$program->id}}" name="hidden_id">
                                <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary invisible" id="info-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Warning</h4>
                </div>

                <div class="modal-body" style="padding: 2rem 1rem;">
                    <h6 class="mb-0 text-center text-info">If you want to update the already approved program, then we have to approve again. Please consider this before update your suggested program.</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('#info-btn').click();
        });
    </script>
@endpush