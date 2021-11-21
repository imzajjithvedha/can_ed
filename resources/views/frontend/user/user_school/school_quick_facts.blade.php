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
                        <h4 class="user-settings-head">Quick facts</h4>
                    </div>
                    <!-- <div class="col-4 text-end">
                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                    </div> -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="school" role="tabpanel" id="nav-quick" role="tabpanel" aria-labelledby="nav-quick-tab">
                            <div class="row">
                                <div class="col-12 border py-3">
                                    <form action="{{ route('frontend.user.school_quick_facts_paragraphs_update') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="mb-3">
                                            <label for="quick_facts_title_1" class="form-label mb-1">Title 1</label>
                                            <input type="text" class="form-control" id="quick_facts_title_1" aria-describedby="quick_facts_title_1" name="quick_facts_title_1" value="{{ $school->quick_facts_title_1 }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="quick_facts_title_1_paragraph" class="form-label mb-1">Title 1 - paragraph</label>
                                            <textarea name="quick_facts_title_1_paragraph" class="ckeditor form-control" id="quick_facts_title_1_paragraph" value="{{ $school->quick_facts_title_1_paragraph }}">{{ $school->quick_facts_title_1_paragraph }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="quick_facts_title_2" class="form-label mb-1">Title 2</label>
                                            <input type="text" class="form-control" id="quick_facts_title_2" aria-describedby="quick_facts_title_2" name="quick_facts_title_2" value="{{ $school->quick_facts_title_2 }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="title-2-image" class="form-label">Title 2 - image</label>

                                            @if($school->quick_facts_title_2_image != null)
                                                <div class="row justify-content-center mb-3">
                                                    <div class="col-12">
                                                        <img src="{{ url('images/schools', $school->quick_facts_title_2_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                                    </div>
                                                </div>

                                                <input type="hidden" class="form-control" name="old_image" value="{{$school->quick_facts_title_2_image}}">

                                                <input type="file" class="form-control" name="quick_facts_title_2_image">

                                            @else
                                                <input type="file" class="form-control" name="quick_facts_title_2_image">
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="quick_facts_title_2_sub_title" class="form-label mb-1">Title 2 - sub title</label>
                                            <input type="text" class="form-control" id="quick_facts_title_2_sub_title" aria-describedby="quick_facts_title_2_sub_title" name="quick_facts_title_2_sub_title" value="{{ $school->quick_facts_title_2_sub_title }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="quick_facts_title_2_paragraph" class="form-label mb-1">Title 2 - paragraph</label>
                                            <textarea name="quick_facts_title_2_paragraph" class="ckeditor form-control" id="quick_facts_title_2_paragraph" value="{{ $school->quick_facts_title_2_paragraph }}">{{ $school->quick_facts_title_2_paragraph }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="quick_facts_title_2_button" class="form-label mb-1">Title 2 - button</label>
                                            <input type="text" class="form-control" id="quick_facts_title_2_button" aria-describedby="quick_facts_title_2_button" name="quick_facts_title_2_button" value="{{ $school->quick_facts_title_2_button }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="quick_facts_title_2_link" class="form-label mb-1">Title 2 - link</label>
                                            <input type="url" class="form-control" id="quick_facts_title_2_link" aria-describedby="quick_facts_title_2_link" name="quick_facts_title_2_link" value="{{ $school->quick_facts_title_2_link }}">
                                        </div>

                                        <div>
                                            <label for="quick_facts_title_2_image_name" class="form-label mb-1">Title 2 - image name</label>
                                            <input type="text" class="form-control" id="quick_facts_title_2_image_name" aria-describedby="quick_facts_title_2_image_name" name="quick_facts_title_2_image_name" value="{{ $school->quick_facts_title_2_image_name }}">
                                        </div>

                                        <div class="mt-5 text-end">
                                            <input type="hidden" class="form-control" value="{{ $school->id }}" name="hidden_id">
                                            <input type="submit" value="Update quick facts details" class="btn rounded-pill text-light px-45 py-2" style="background-color: #94ca60;">
                                        </div>
                                    </form>

                                    <hr class="my-5">


                                    <form action="{{ route('frontend.user.school_quick_facts_update') }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="mb-3">
                                            <label for="location" class="form-label mb-1">School Location</label>
                                            <input type="text" class="form-control" id="location" aria-describedby="location" name="location" value="{{ $school->location }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="school-type" class="form-label mb-1">School Type</label>
                                            <select class="form-control" id="school-type" name="school_type" placeholder="School Type">
                                                <option value="" selected disabled hidden></option>
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
                                            <label for="language" class="form-label mb-1">Languages (Separate by comma)</label>
                                            <input type="text" class="form-control" id="language" aria-describedby="language" name="language" value="{{ $school->language }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="undergraduates" class="form-label mb-1">Total undergraduates</label>
                                            <input type="number" class="form-control" id="undergraduates" aria-describedby="undergraduates" name="undergraduates" value="{{ $school->undergraduates }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="entrance" class="form-label mb-1">Entrance Dates (Separate by comma)</label>
                                            <input type="text" class="form-control" id="entrance" aria-describedby="entrance" name="entrance_dates" value="{{ $school->entrance_dates }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="canadian_fee" class="form-label mb-1">Canadian tuition fee (in CAD)</label>
                                            <input type="number" class="form-control" id="canadian_fee" aria-describedby="canadian_fee" name="canadian_tuition_fee" value="{{ $school->canadian_tuition_fee }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="international_fee" class="form-label mb-1">International tuition fee (in CAD)</label>
                                            <input type="number" class="form-control" id="international_fee" aria-describedby="international_fee" name="international_tuition_fee" value="{{ $school->international_tuition_fee }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="telephone" class="form-label mb-1">Telephone</label>
                                            <input type="text" class="form-control" id="telephone" aria-describedby="telephone" name="telephone" value="{{ $school->school_phone }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="fax" class="form-label mb-1">Fax</label>
                                            <input type="text" class="form-control" id="fax" aria-describedby="fax" name="fax" value="{{ $school->fax }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label mb-1">School address</label>
                                            <input type="text" class="form-control" id="address" aria-describedby="address" name="address" value="{{ $school->address }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="start-date" class="form-label mb-1">Start Date</label>
                                            <select class="form-control" id="start-date" name="start_date">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->start_date == 'all' ? "selected" : "" }}>All</option>
                                                <option value="fall" {{ $school->start_date == 'fall' ? "selected" : "" }}>Fall</option>
                                                <option value="winter" {{ $school->start_date == 'winter' ? "selected" : "" }}>Winter</option>
                                                <option value="summer" {{ $school->start_date == 'summer' ? "selected" : "" }}>Summer</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="online-distance-education" class="form-label mb-1">Online / distance education</label>
                                            <select class="form-control" id="online-distance-education" name="online_distance_education">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->online_distance_education == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->online_distance_education == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="minimum-gpa" class="form-label mb-1">Minimum GPA</label>
                                            <select class="form-control" id="minimum-gpa" name="minimum_gpa">
                                                <option value="" selected disabled hidden></option>
                                                <option value="50" {{ $school->minimum_gpa == '50' ? "selected" : "" }}>Equivalent to 50%</option>
                                                <option value="60" {{ $school->minimum_gpa == '60' ? "selected" : "" }}>Equivalent to 60%</option>
                                                <option value="70" {{ $school->minimum_gpa == '70' ? "selected" : "" }}>Equivalent to 70%</option>
                                                <option value="80" {{ $school->minimum_gpa == '80' ? "selected" : "" }}>Equivalent to 80%</option>
                                                <option value="90" {{ $school->minimum_gpa == '90' ? "selected" : "" }}>Equivalent to 90%</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="conditional-admission" class="form-label mb-1">Conditional admission</label>
                                            <select class="form-control" id="conditional-admission" name="conditional_admission">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->conditional_admission == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->conditional_admission == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="graduate-program-type" class="form-label mb-1">Graduate program type</label>
                                            <select class="form-control" id="graduate-program-type" name="graduate_program_type">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->graduate_program_type == 'all' ? "selected" : "" }}>All</option>
                                                <option value="thesis" {{ $school->graduate_program_type == 'thesis' ? "selected" : "" }}>Thesis</option>
                                                <option value="non-thesis" {{ $school->graduate_program_type == 'non-thesis' ? "selected" : "" }}>Non-thesis</option>
                                                <option value="co-op" {{ $school->graduate_program_type == 'co-op' ? "selected" : "" }}>Co-op</option>
                                                <option value="internship" {{ $school->graduate_program_type == 'internship' ? "selected" : "" }}>Internship</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="under-graduate-program-type" class="form-label mb-1">Undergraduate program type</label>
                                            <select class="form-control" id="under-graduate-program-type" name="under_graduate_program_type">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->under_graduate_program_type == 'all' ? "selected" : "" }}>All</option>
                                                <option value="co-op" {{ $school->under_graduate_program_type == 'co-op' ? "selected" : "" }}>Co-op</option>
                                                <option value="honours" {{ $school->under_graduate_program_type == 'honours' ? "selected" : "" }}>Honours</option>
                                                <option value="interdisciplinary" {{ $school->under_graduate_program_type == 'interdisciplinary' ? "selected" : "" }}>Interdisciplinary</option>
                                                <option value="major" {{ $school->under_graduate_program_type == 'major' ? "selected" : "" }}>Major</option>
                                                <option value="minor" {{ $school->under_graduate_program_type == 'minor' ? "selected" : "" }}>Minor</option>
                                                <option value="specialization" {{ $school->under_graduate_program_type == 'specialization' ? "selected" : "" }}>Specialization</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="study-method" class="form-label mb-1">Study method</label>
                                            <select class="form-control" id="study-method" name="study_method" placeholder="Study Method">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->study_method == 'all' ? "selected" : "" }}>All</option>
                                                <option value="full-time" {{ $school->study_method == 'full-time' ? "selected" : "" }}>Full-time</option>
                                                <option value="part-time" {{ $school->study_method == 'part-time' ? "selected" : "" }}>Part-time</option>
                                                <option value="continuing-education" {{ $school->study_method == 'continuing-education' ? "selected" : "" }}>Continuing education</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="delivery-mode" class="form-label mb-1">Delivery mode</label>
                                            <select class="form-control" id="delivery-mode" name="delivery_mode">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->delivery_mode == 'all' ? "selected" : "" }}>All</option>
                                                <option value="day" {{ $school->delivery_mode == 'day' ? "selected" : "" }}>Day</option>
                                                <option value="evening" {{ $school->delivery_mode == 'evening' ? "selected" : "" }}>Evening</option>
                                                <option value="day-and-evening" {{ $school->delivery_mode == 'day-and-evening' ? "selected" : "" }}>Day and Evening</option>
                                                <option value="weekends" {{ $school->delivery_mode == 'weekends' ? "selected" : "" }}>Weekends</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tuition-range" class="form-label mb-1">Tuition range</label>
                                            <select class="form-control" id="tuition-range" name="tuition_range">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->tuition_range == 'all' ? "selected" : "" }}>All</option>
                                                <option value="10,000" {{ $school->tuition_range == '10,000' ? "selected" : "" }}>Below $10,000</option>
                                                <option value="10,001" {{ $school->tuition_range == '10,001' ? "selected" : "" }}>$10,001 to $20,000</option>
                                                <option value="20,001" {{ $school->tuition_range == '20,001' ? "selected" : "" }}>$20,001 to $30,000</option>
                                                <option value="30,001" {{ $school->tuition_range == '30,001' ? "selected" : "" }}>$30,001 to $40,000</option>
                                                <option value="40,001" {{ $school->tuition_range == '40,001' ? "selected" : "" }}>$40,001 to $50,000</option>
                                                <option value="50,000" {{ $school->tuition_range == '50,000' ? "selected" : "" }}>Above $50,001</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="accommodation" class="form-label mb-1">Accommodation</label>
                                            <select class="form-control" id="accommodation" name="accommodation">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->accommodation == 'all' ? "selected" : "" }}>All</option>
                                                <option value="private" {{ $school->accommodation == 'private' ? "selected" : "" }}>Private</option>accommodation
                                                <option value="school-managed" {{ $school->accommodation == 'school-managed' ? "selected" : "" }}>School managed</option>
                                                <option value="school-owned" {{ $school->accommodation == 'school-owned' ? "selected" : "" }}>School owned</option>
                                                <option value="shared" {{ $school->accommodation == 'shared' ? "selected" : "" }}>Shared accommodation</option>
                                                <option value="nearby" {{ $school->accommodation == 'nearby' ? "selected" : "" }}>Nearby</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="work-on-campus" class="form-label mb-1">Work on campus</label>
                                            <select class="form-control" id="work-on-campus" name="work_on_campus">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->work_on_campus == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->work_on_campus == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="work-during-holidays" class="form-label mb-1">Work during holidays</label>
                                            <select class="form-control" id="work-during-holidays" name="work_during_holidays">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->work_during_holidays == 'all' ? "selected" : "" }}>All</option>
                                                <option value="summer" {{ $school->work_during_holidays == 'summer' ? "selected" : "" }}>Summer</option>
                                                <option value="winter" {{ $school->work_during_holidays == 'winter' ? "selected" : "" }}>Winter</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="internship" class="form-label mb-1">Internship</label>
                                            <select class="form-control" id="internship" name="internship">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->internship == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->internship == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="co-op-education" class="form-label mb-1">Co-op education</label>
                                            <select class="form-control" id="co-op-education" name="co_op_education">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->co_op_education == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->co_op_education == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="job-placement" class="form-label mb-1">Job placement</label>
                                            <select class="form-control" id="job-placement" name="job_placement">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->job_placement == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->job_placement == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="financial-aid-domestic" class="form-label mb-1">Financial aid programs, for domestic students</label>
                                            <select class="form-control" id="financial-aid-domestic" name="financial_aid_domestic">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->financial_aid_domestic == 'all' ? "selected" : "" }}>All</option>
                                                <option value="bursaries" {{ $school->financial_aid_domestic == 'bursaries' ? "selected" : "" }}>Bursaries / grants</option>
                                                <option value="scholarships" {{ $school->financial_aid_domestic == 'scholarships' ? "selected" : "" }}>Scholarships</option>
                                                <option value="student-loans" {{ $school->financial_aid_domestic == 'student-loans' ? "selected" : "" }}>Student loans</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="financial-aid-international" class="form-label mb-1">Financial aid programs, for international students</label>
                                            <select class="form-control" id="financial-aid-international" name="financial_aid_international">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->financial_aid_international == 'all' ? "selected" : "" }}>All</option>
                                                <option value="bursaries" {{ $school->financial_aid_international == 'bursaries' ? "selected" : "" }}>Bursaries / grants</option>
                                                <option value="scholarships" {{ $school->financial_aid_international == 'scholarships' ? "selected" : "" }}>Scholarships</option>
                                                <option value="student-loans-co-signer" {{ $school->financial_aid_international == 'student-loans-co-signer' ? "selected" : "" }}>Student loans with co-signer</option>
                                                <option value="student-loans-without-co-signer" {{ $school->financial_aid_international == 'student-loans-without-co-signer' ? "selected" : "" }}>Student loans without co-signer</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="research" class="form-label mb-1">Research and dissertation</label>
                                            <select class="form-control" id="research" name="research">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->research == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->research == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exchange-programs" class="form-label mb-1">Exchange programs</label>
                                            <select class="form-control" id="exchange-programs" name="exchange_programs">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->exchange_programs == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->exchange_programs == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="degree-modifier" class="form-label mb-1">Degree modifier</label>
                                            <select class="form-control" id="degree-modifier" name="degree_modifier">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->degree_modifier == 'all' ? "selected" : "" }}>All</option>
                                                <option value="apprenticeship" {{ $school->degree_modifier == 'apprenticeship' ? "selected" : "" }}>Apprenticeship</option>
                                                <option value="co-op" {{ $school->degree_modifier == 'co-op' ? "selected" : "" }}>Co-op</option>
                                                <option value="distance" {{ $school->degree_modifier == 'distance' ? "selected" : "" }}>Distance</option>
                                                <option value="honor" {{ $school->degree_modifier == 'honor' ? "selected" : "" }}>Honor</option>
                                                <option value="online" {{ $school->degree_modifier == 'online' ? "selected" : "" }}>Online</option>
                                                <option value="university-transfer" {{ $school->degree_modifier == 'university-transfer' ? "selected" : "" }}>University transfer</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="day-care" class="form-label mb-1">Daycare, for students with kids</label>
                                            <select class="form-control" id="day-care" name="day_care">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->day_care == 'all' ? "selected" : "" }}>All</option>
                                                <option value="school-owned" {{ $school->day_care == 'school-owned' ? "selected" : "" }}>school owned</option>
                                                <option value="school-managed" {{ $school->day_care == 'school-managed' ? "selected" : "" }}>School managed</option>
                                                <option value="private-neighbor" {{ $school->day_care == 'private-neighbor' ? "selected" : "" }}>Private, Neighboring</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="elementary-school" class="form-label mb-1">Elementary School for students with kids</label>
                                            <select class="form-control" id="elementary-school" name="elementary_school">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->elementary_school == 'all' ? "selected" : "" }}>All</option>
                                                <option value="school-owned" {{ $school->elementary_school == 'school-owned' ? "selected" : "" }}>school owned</option>
                                                <option value="school-managed" {{ $school->elementary_school == 'school-managed' ? "selected" : "" }}>School managed</option>
                                                <option value="private-neighbor" {{ $school->elementary_school == 'private-neighbor' ? "selected" : "" }}>Private, Neighboring</option>
                                                <option value="public-neighbor" {{ $school->elementary_school == 'public-neighbor' ? "selected" : "" }}>Public, Neighboring</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="immigration-office" class="form-label mb-1">Immigration office on campus</label>
                                            <select class="form-control" id="immigration-office" name="immigration_office">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->immigration_office == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->immigration_office == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="career-planning" class="form-label mb-1">Career planning / development services</label>
                                            <select class="form-control" id="career-planning" name="career_planning" placeholder="Career planning / development services">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->career_planning == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->career_planning == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="pathway-programs" class="form-label mb-1">Pathway programs</label>
                                            <select class="form-control" id="pathway-programs" name="pathway_programs">
                                                <option value="" selected disabled hidden></option>
                                                <option value="all" {{ $school->pathway_programs == 'all' ? "selected" : "" }}>All</option>
                                                <option value="graduate" {{ $school->pathway_programs == 'graduate' ? "selected" : "" }}>Yes, graduate</option>
                                                <option value="undergraduate" {{ $school->pathway_programs == 'undergraduate' ? "selected" : "" }}>Yes, undergraduate</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="employment-rates" class="form-label mb-1">Employment rates (after-graduation)</label>
                                            <select class="form-control" id="employment-rates" name="employment_rates">
                                                <option value="" selected disabled hidden></option>
                                                <option value="90" {{ $school->employment_rates == '90' ? "selected" : "" }}>Above 90%</option>
                                                <option value="80" {{ $school->employment_rates == '80' ? "selected" : "" }}>Above 80%</option>
                                                <option value="70" {{ $school->employment_rates == '70' ? "selected" : "" }}>Above 70%</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="class-size-undergraduate" class="form-label mb-1">Class size, undergraduate</label>
                                            <select class="form-control" id="class-size-undergraduate" name="class_size_undergraduate">
                                                <option value="" selected disabled hidden></option>
                                                <option value="10" {{ $school->class_size_undergraduate == '10' ? "selected" : "" }}>Under 10</option>
                                                <option value="20" {{ $school->class_size_undergraduate == '20' ? "selected" : "" }}>Under 20</option>
                                                <option value="30" {{ $school->class_size_undergraduate == '30' ? "selected" : "" }}>Under 30</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="class-size-masters" class="form-label mb-1">Class size, masters</label>
                                            <select class="form-control" id="class-size-masters" name="class_size_masters">
                                                <option value="" selected disabled hidden></option>
                                                <option value="10" {{ $school->class_size_masters == '10' ? "selected" : "" }}>Under 10</option>
                                                <option value="20" {{ $school->class_size_masters == '20' ? "selected" : "" }}>Under 20</option>
                                                <option value="30" {{ $school->class_size_masters == '30' ? "selected" : "" }}>Under 30</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="service-and-guidance-new-students" class="form-label mb-1">Service and guidance to new students</label>
                                            <select class="form-control" id="service-and-guidance-new-students" name="service_and_guidance_new_students">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->service_and_guidance_new_students == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->service_and_guidance_new_students == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="service-and-guidance-new-arrivals" class="form-label mb-1">Service and guidance to new arrivals in Canada</label>
                                            <select class="form-control" id="service-and-guidance-new-arrivals" name="service_and_guidance_new_arrivals">
                                                <option value="" selected disabled hidden></option>
                                                <option value="yes" {{ $school->service_and_guidance_new_arrivals == 'yes' ? "selected" : "" }}>Yes</option>
                                                <option value="no" {{ $school->service_and_guidance_new_arrivals == 'no' ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <input type="hidden" class="form-control" value="{{$school->id}}" name="hidden_id">
                                            <input type="submit" value="Update quick facts" class="btn rounded-pill text-light px-5 py-2" style="background-color: #94ca60;">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(\Session::has('paragraph'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="paragraph-btn" data-bs-toggle="modal" data-bs-target="#paragraphModal"></button>

        <div class="modal fade" id="paragraphModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Quick facts details updated successfully.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#successModal"></button>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Quick facts updated successfully.</h4>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

    <script>
        if(document.getElementById("paragraph-btn")){
            $('#paragraph-btn').click();
        }
    </script>

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>
@endpush

