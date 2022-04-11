@extends('backend.layouts.app')

@section('title', __('View application | Admin'))

@section('content')
    
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            @if($master->school_id != null)
                                <div class="form-group">
                                    <label class="form-label">School name</label>
                                    <input type="text" class="form-control" value="{{ App\Models\Schools::where('id', $master->school_id)->first()->name }}" disabled>
                                </div>
                            @else
                                <div class="form-group">
                                    <label class="form-label">School name</label>
                                    <input type="text" class="form-control" value="-" disabled>
                                </div>

                            @endif

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
                                @if(json_decode($master->messaging_app) != null)
                                    @foreach(json_decode($master->messaging_app) as $messaging_app)
                                        <input type="text" class="form-control mb-2" value="{{ $messaging_app }}" disabled>
                                    @endforeach
                                @endif
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
                                <label class="form-label">Residence country</label>
                                <input type="text" class="form-control" value="{{ $master->residence_country }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status in the country of residence</label>
                                @if($master->residence_status == 'null')
                                    <input type="text" class="form-control" disabled>
                                @else
                                    @foreach(json_decode($master->residence_status) as $status)
                                        <input type="text" class="form-control mb-2" value="{{ $status }}" disabled>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Mailing address</label>
                                <input type="text" class="form-control" value="{{ $master->mailing_address }}" disabled>
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
                                <input type="text" class="form-control" value="{{ $master->student_type }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tuition funding source</label>
                                @foreach(json_decode($master->funding_source) as $student_type)
                                    <input type="text" class="form-control mb-2" value="{{ $student_type }}" disabled>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tests</label>
                                @foreach(json_decode($master->tests) as $test)
                                    <input type="text" class="form-control mb-2" value="{{ $test->test }} - {{ $test->mark }}" disabled>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label class="form-label">Comments</label>
                                <textarea rows="3" class="form-control" value="{{ $master->comments }}" disabled>{{ $master->comments }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Questions</label>
                                <textarea rows="3" class="form-control" value="{{ $master->questions }}" disabled>{{ $master->questions }}</textarea>
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