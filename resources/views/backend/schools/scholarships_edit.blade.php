@extends('backend.layouts.app')

@section('title', __('Edit School | Admin'))

@section('content')


    @include('backend.includes.top_nav')
    
    <div class="row">
        <div class="col-md-12 p-1">
            <div class="card">
                <div class="card-body border">
                    <div class="border p-3">
                        <form action="{{ route('admin.schools.school_scholarship_update') }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-12 py-3">
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
                                        <input type="hidden" class="form-control" value="{{ $school->id }}" name="school_id">
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

@endsection


@push('after-scripts')


@endpush