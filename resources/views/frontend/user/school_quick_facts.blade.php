@extends('frontend.layouts.app')

@section('title', 'Edit School' )

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
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
                        <h4 class="fs-4 fw-bolder user-settings-head">Edit Information</h4>
                        
                    </div>
                    <div class="col-4 text-end">
                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3 school" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                            <form action="{{ route('frontend.user.school_quick_facts_update') }}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-12 border py-3">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="location" aria-describedby="location" name="location" placeholder="School Location *" value="{{ $school->location }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <select class="form-control" id="school-type" name="school_type" placeholder="School Type" required>
                                                <option value="" selected disabled hidden>School Type *</option>
                                                @foreach($school_types as $school_type)
                                                    @if($school->school_type != null)
                                                        <option value="{{ $school_type->id }}" {{ $school_type->id == $school->school_type ? "selected" : "" }}>{{ $school_type->name }}</option>
                                                    @else
                                                        <option value="{{ $school_type->id }}">{{ $school_type->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="language" aria-describedby="language" name="language" placeholder="Language *" value="{{ $school->language }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="undergraduates" aria-describedby="undergraduates" name="undergraduates" placeholder="Total Undergraduates *" value="{{ $school->undergraduates }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="entrance" aria-describedby="entrance" name="entrance_dates" placeholder="Entrance Dates *" value="{{ $school->entrance_dates }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="canadian_fee" aria-describedby="canadian_fee" name="canadian_tuition_fee" placeholder="Canadian Tuition Fee (in CAD) *" value="{{ $school->canadian_tuition_fee }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="international_fee" aria-describedby="international_fee" name="international_tuition_fee" placeholder="International Tuition Fee (in CAD) *" value="{{ $school->international_tuition_fee }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="telephone" aria-describedby="telephone" name="telephone" placeholder="Telephone *" value="{{ $school->school_phone }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="fax" aria-describedby="fax" name="fax" placeholder="Fax" value="{{ $school->fax }}">
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="address" aria-describedby="address" name="address" placeholder="Address *" value="{{ $school->address }}" required>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <input type="hidden" class="form-control" value="{{$school->id}}" name="hidden_id">
                                            <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                    <h6 class="mb-0 text-center text-info">If you want to update the already approved school, then we have to approve again. Please consider this before update your school.</h6>
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

