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
                        <h4 class="fs-4 fw-bolder user-settings-head">Edit Scholarship</h4>
                        
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
                                            <input type="text" class="form-control" name="name" placeholder="Scholarship Name *" value="{{ $scholarship->name }}">
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="provider" placeholder="Provider *" value="{{ $scholarship->provider }}">
                                        </div>

                                        <div class="mb-3">
                                            <textarea name="summary" class="form-control" id="summary" rows="5" placeholder="Summary *" value="{{ $scholarship->summary }}">{{ $scholarship->summary }}</textarea>
                                        </div>

                                        <div class="mb-5">
                                            <input type="number" class="form-control" name="amount" placeholder="Amount *" value="{{ $scholarship->amount }}">
                                        </div>

                                        <div class="mb-5">
                                            <label for="eligibility">Basic Eligibility</label>
                                            @foreach(json_decode($scholarship->eligibility) as $eligibility)
                                                <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *" value="{{ $eligibility }}">
                                            @endforeach
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="award" placeholder="Award *" value="{{ $scholarship->award }}">
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="action" placeholder="Action *" value="{{ $scholarship->action }}">
                                        </div>
                                        <div class="mb-3">
                                            <input type="date" class="form-control" name="deadline" placeholder="Deadline *" value="{{ $scholarship->deadline }}">
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="availability" placeholder="Availability *" value="{{ $scholarship->availability }}">
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="level_of_study" placeholder="Level of Study *" value="{{ $scholarship->level_of_study }}">
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="school_name" placeholder="School Name *" value="{{ $scholarship->school_name }}">
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

@endsection

@push('after-scripts')
    
@endpush

