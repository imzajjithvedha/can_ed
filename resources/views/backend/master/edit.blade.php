@extends('backend.layouts.app')

@section('title', __('View application | Admin'))

@section('content')
    
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <label class="form-label">School name</label>
                                <input type="text" class="form-control" value="{{ App\Models\Schools::where('id', $master->school_id)->first()->name }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">First name</label>
                                <input type="text" class="form-control" value="{{ $master->first_name }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Last name</label>
                                <input type="text" class="form-control" value="{{ $master->last_name }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Date of birth</label>
                                <input type="text" class="form-control" value="{{ $master->dob }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <input type="text" class="form-control" value="{{ $master->gender }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" value="{{ $master->email }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Phone number</label>
                                <input type="text" class="form-control" value="{{ $master->phone }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Schools can text</label>
                                <input type="text" class="form-control" value="{{ $master->school_text }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Messaging apps</label>
                                @foreach(json_decode($master->messaging_app) as $messaging_app)
                                    <input type="text" class="form-control" value="{{ $messaging_app }}" disabled>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label class="form-label">Messaging app username</label>
                                <input type="text" class="form-control" value="{{ $master->username }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Citizenship</label>
                                <input type="text" class="form-control" value="{{ $master->citizenship }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Live in country of citizenship</label>
                                <input type="text" class="form-control" value="{{ $master->citizenship_live }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" value="{{ $master->country }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status in the country of residence</label>
                                @foreach(json_decode($master->status) as $status)
                                    <input type="text" class="form-control" value="{{ $status }}" disabled>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label class="form-label">Citizenship country</label>
                                <input type="text" class="form-control" value="{{ $master->citizenship_country }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Citizenship country postal code</label>
                                <input type="text" class="form-control" value="{{ $master->citizenship_postal }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Residence country</label>
                                <input type="text" class="form-control" value="{{ $master->residence_country }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Residence country postal code</label>
                                <input type="text" class="form-control" value="{{ $master->residence_postal }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Message</label>
                                <input type="text" class="form-control" value="{{ $master->message }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">High school name</label>
                                <input type="text" class="form-control" value="{{ $master->school_name }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">High school GPA</label>
                                <input type="text" class="form-control" value="{{ $master->gpa }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">High school city</label>
                                <input type="text" class="form-control" value="{{ $master->school_city }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">High school country</label>
                                <input type="text" class="form-control" value="{{ $master->school_country }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Start date</label>
                                <input type="text" class="form-control" value="{{ $master->start_date }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Interested</label>
                                <input type="text" class="form-control" value="{{ App\Models\DegreeLevels::where('id', $master->interested)->first()->name }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Like to study</label>
                                <input type="text" class="form-control" value="{{ App\Models\Programs::where('id', $master->like_study)->first()->name }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Student type</label>
                                <input type="text" class="form-control" value="{{ $master->student_type_1 }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Student type</label>
                                @foreach(json_decode($master->student_type_2) as $student_type)
                                    <input type="text" class="form-control" value="{{ $student_type }}" disabled>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tests</label>
                                @foreach(json_decode($master->tests) as $test)
                                    <input type="text" class="form-control" value="{{ $test->test }} - {{ $test->mark }}" disabled>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label class="form-label">Comments</label>
                                <input type="text" class="form-control" value="{{ $master->comments }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Questions</label>
                                <input type="text" class="form-control" value="{{ $master->questions }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Transfer student currently living in Canada</label>
                                <input type="text" class="form-control" value="{{ $master->transfer_student }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Already have an F-1 visa</label>
                                <input type="text" class="form-control" value="{{ $master->visa }}" disabled>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="text-center">
                                <a href="{{ route('admin.master.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection