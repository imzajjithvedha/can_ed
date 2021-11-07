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
                        <h4 class="fs-4 fw-bolder user-settings-head">Edit scholarship</h4>
                        
                    </div>
                    <div class="col-4 text-end">
                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3 school" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                            <form action="{{ route('frontend.user.school_scholarship_update') }}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-12 border py-3">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Scholarship Name *</label>
                                            <input type="text" class="form-control" name="name" placeholder="Scholarship Name *" value="{{ $scholarship->name }}">
                                        </div>

                                        <!-- <div class="mb-3">
                                            <input type="text" class="form-control" name="provider" placeholder="Provider *" value="{{ $scholarship->provider }}">
                                        </div> -->

                                        <div class="mb-3">
                                            <label for="summary" class="form-label">Summary *</label>
                                            <textarea name="summary" class="form-control" id="summary" rows="5" placeholder="Summary *" value="{{ $scholarship->summary }}">{{ $scholarship->summary }}</textarea>
                                        </div>

                                        <!-- <div class="mb-5">
                                            <input type="number" class="form-control" name="amount" placeholder="Amount *" value="{{ $scholarship->amount }}">
                                        </div> -->

                                        <div class="mb-3">
                                            <label for="eligibility" class="form-label">Basic Eligibility</label>
                                            @foreach(json_decode($scholarship->eligibility) as $eligibility)
                                                <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *" value="{{ $eligibility }}">
                                            @endforeach
                                        </div>

                                        <div class="mb-3">
                                            <label for="award" class="form-label">Award *</label>
                                            <select name="award" id="award" class="form-control">
                                                <option value="" selected disabled hidden>Awards *</option>
                                                <option value="Admission" {{ $scholarship->award == 'Admission' ? "selected" : "" }}>Admission</option>
                                                <option value="Current students" {{ $scholarship->award == 'Current students' ? "selected" : "" }}>Current students</option>
                                                <option value="Admission and current students" {{ $scholarship->award == 'Admission and current students' ? "selected" : "" }}>Admission and current students</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="action" class="form-label">Action *</label>
                                            <input type="text" class="form-control" name="action" placeholder="Action *" value="{{ $scholarship->action }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deadline" class="form-label">Deadline *</label>
                                            <input type="date" class="form-control" name="deadline" placeholder="Deadline *" value="{{ $scholarship->deadline }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="availability" class="form-label">Availability *</label>
                                            <select name="availability" id="availability" class="form-control">
                                                <option value="" selected disabled hidden>Availability *</option>
                                                <option value="All students" {{ $scholarship->availability == 'All students' ? "selected" : "" }}>All students</option>
                                                <option value="International students" {{ $scholarship->availability == 'International students' ? "selected" : "" }}>International students</option>
                                                <option value="Canadian students" {{ $scholarship->availability == 'Canadian students' ? "selected" : "" }}>Canadian students</option>
                                                <option value="Provincial students" {{ $scholarship->availability == 'Provincial students' ? "selected" : "" }}>Provincial students</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="summary" class="form-label">Level of Study *</label>
                                            <select name="level_of_study" id="level_of_study" class="form-control">
                                                <option value="" selected disabled hidden>Level of Study *</option>
                                                <option value="Graduate" {{ $scholarship->level_of_study == 'Graduate' ? "selected" : "" }}>Graduate</option>
                                                <option value="Undergraduate" {{ $scholarship->level_of_study == 'Undergraduate' ? "selected" : "" }}>Undergraduate</option>
                                                <option value="Graduate and undergraduate" {{ $scholarship->level_of_study == 'Graduate and undergraduate' ? "selected" : "" }}>Graduate and undergraduate</option>
                                            </select>
                                        </div>

                                        <!-- <div class="mb-3">
                                            <input type="text" class="form-control" name="school_name" placeholder="School Name *" value="{{ $scholarship->school_name }}">
                                        </div> -->

                                        <div class="mb-3">
                                            <label for="featured_image" class="form-label">Featured Image *</label>

                                            @if($scholarship->image != null)
                                                <div class="row justify-content-center mb-3">
                                                    <div class="col-12">
                                                        <img src="{{ url('images/schools', $scholarship->image) }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                                    </div>
                                                </div>

                                                <input type="hidden" class="form-control" name="old_image" value="{{$scholarship->image}}">

                                                <input type="file" class="form-control" name="featured_image">

                                            @else
                                                <input type="file" class="form-control" name="featured_image" required>
                                            @endif

                                        </div>

                                        <div class="mt-5 text-center">
                                            <input type="hidden" class="form-control" value="{{ $scholarship->id }}" name="hidden_id">
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


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Scholarship updated successfully.</h4>
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

@endpush

