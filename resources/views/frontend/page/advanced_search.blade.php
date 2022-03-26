@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Advanced search')

@push('after-styles')
    <link href="{{ url('css/advanced_search.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- Advanced search form -->
    
    <div class="container mt-5 schools">

        <h4 class="fw-bolder futura mb-2">Advanced search</h4>

        <p class="gray" style="text-align:justify;">{{ $information->advanced_search_description}}</p>

        <hr>

        <form action="{{ route('frontend.advanced_search') }}" method="POST" id="advanced-search-form">
            {{ csrf_field() }}
            
            <div class="row mb-4">
                <div class="col-6 mb-3">
                    <label for="degree_level" class="form-label">Degree level</label>
                    <select name="degree_level" id="degree_level" class="form-select">
                        <option value="all">All</option>
                        @foreach($degree_levels as $degree_level)
                            <option value="{{ $degree_level->id }}">{{ $degree_level->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="field_of_study" class="form-label">Field of study</label>
                    <select name="field_of_study" id="field_of_study" class="form-select">
                        <option value="all">All</option>
                        @foreach($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="start_date" class="form-label">When are you planning to start</label>
                    <select name="start_date" id="start_date" class="form-select">
                        <option value="all">All, I am not sure</option>
                        <option value="fall">Fall</option>
                        <option value="winter">Winter</option>
                        <option value="summer">Summer</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="online_distance_education" class="form-label">Online / distance education</label>
                    <select name="online_distance_education" id="online_distance_education" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="become" class="form-label">I want to become <i class="fas fa-question-circle ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="What do you want to become after you graduate?"></i></label>
                    <input type="text" name="become" id="become" class="form-control">
                </div>

                <div class="col-6 mb-3">
                    <label for="school_type" class="form-label">School type</label>
                    <select name="school_type" id="school_type" class="form-select">
                        <option value="all">All</option>
                        @foreach($school_types as $school_type)
                            <option value="{{ $school_type->id }}">{{ $school_type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="minimum_gpa" class="form-label">Min. GPA accepted</label>
                    <select name="minimum_gpa" id="minimum_gpa" class="form-select">
                        <option value="all">All</option>
                        <option value="50">Equivalent to 50%</option>
                        <option value="60">Equivalent to 60%</option>
                        <option value="70">Equivalent to 70%</option>
                        <option value="80">Equivalent to 80%</option>
                        <option value="90">Equivalent to 90%</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="conditional_acceptance" class="form-label">Conditional admission available</label>
                    <select name="conditional_acceptance" id="conditional_acceptance" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="graduate_program_type" class="form-label">Program type, graduate</label>
                    <select name="graduate_program_type" id="graduate_program_type" class="form-select">
                        <option value="all">All</option>
                        <option value="thesis">Thesis</option>
                        <option value="non-thesis">Non-Thesis</option>
                        <option value="co-op">Co-op</option>
                        <option value="internship">Internship</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="under_graduate_program_type" class="form-label">Program type, undergraduate</label>
                    <select name="under_graduate_program_type" id="under_graduate_program_type" class="form-select">
                        <option value="all">All</option>
                        <option value="co-op">Co-op</option>
                        <option value="honours">Honours</option>
                        <option value="interdisciplinary">Interdisciplinary</option>
                        <option value="major">Major</option>
                        <option value="minor">Minor</option>
                        <option value="specialization">Specialization</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="study_method" class="form-label">I am interested in</label>
                    <select name="study_method" id="study_method" class="form-select">
                        <option value="all">All</option>
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                        <option value="continuing-education">Continuing education</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="delivery_mode" class="form-label">Delivery mode</label>
                    <select name="delivery_mode" id="delivery_mode" class="form-select">
                        <option value="all">All</option>
                        <option value="day">Day</option>
                        <option value="evening">Evening</option>
                        <option value="day-and-evening">Day and evening</option>
                        <option value="weekends">Weekends</option>
                    </select>
                </div>

                <!-- <div class="col-6 mb-3">
                    <label for="" class="form-label">Location</label>
                    <select name="" class="form-select">
                        <option value="all">All</option>
                        <option value="50%">City</option>
                        <option value="60%">Province</option>
                    </select>
                </div> -->

                <!-- <div class="col-6 mb-3">
                    <label for="tuition_range" class="form-label">Tuition range</label>
                    <select name="tuition_range" id="tuition_range" class="form-select">
                        <option value="all">All</option>
                        <option value="10,000">Below $10,000</option>
                        <option value="10,001">$10,001 to $20,000</option>
                        <option value="20,001">$20,001 to $30,000</option>
                        <option value="30,001">$30,001 to $40,000</option>
                        <option value="40,001">$40,001 to $50,000</option>
                        <option value="50,000">Above $50,000</option>
                    </select>
                </div> -->

                <div class="col-6 mb-3">
                    <label for="accommodation" class="form-label">Housing / accommodation</label>
                    <select name="accommodation" id="accommodation" class="form-select">
                        <option value="all">All</option>
                        <option value="private">Private</option>
                        <option value="school-managed">School-managed</option>
                        <option value="school-owned">School-owned</option>
                        <option value="shared">Shared accommodation</option>
                        <option value="nearby">Nearby</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="work_on_campus" class="form-label">Work-study program (work on campus) <i class="fas fa-question-circle ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Offers you access to clerical, research, technical, library or other jobs on campus and/or in school-affiliated entities. It helps you financially, and can develop your career-related skills and experience"></i></label>
                    <select name="work_on_campus" id="work_on_campus" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                
                <div class="col-6 mb-3">
                    <label for="work_during_holidays" class="form-label">Work during holidays</label>
                    <select name="work_during_holidays" id="work_during_holidays" class="form-select">
                        <option value="all">All</option>
                        <option value="summer">Summer</option>
                        <option value="winter">Winter</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="internship" class="form-label">Internship <i class="fas fa-question-circle ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Refers to a one-term work assignment, May be full- or part-time, paid or unpaid"></i></label>
                    <select name="internship" id="internship" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="co_op_education" class="form-label">Co-op education <i class="fas fa-question-circle ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Full-time paid positions in an industry related to your field. You may alternate / combine terms (semesters) of schooling with terms of work"></i></label>
                    <select name="co_op_education" id="co_op_education" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                
                <div class="col-6 mb-3">
                    <label for="job_placement" class="form-label">Job placement <i class="fas fa-question-circle ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="The school helps the student look for a full-time or part-time job within, or related to, your field of study. If the employer likes you, he might keep you"></i></label>
                    <select name="job_placement" id="job_placement" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="financial_aid_domestic" class="form-label">Financial aid programs, for domestic students</label>
                    <select name="financial_aid_domestic" id="financial_aid_domestic" class="form-select">
                        <option value="all">All</option>
                        <option value="bursaries">Bursaries / grants</option>
                        <option value="scholarships">Scholarships</option>
                        <option value="student-loans">Student loans</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="financial_aid_international" class="form-label">Financial aid programs, for international students</label>
                    <select name="financial_aid_international" id="financial_aid_international" class="form-select">
                        <option value="all">All</option>
                        <option value="bursaries">Bursaries / grants</option>
                        <option value="scholarships">Scholarships</option>
                        <option value="student-loans-co-signer">Student loans with co-signer</option>
                        <option value="student-loans-without-co-signer">Student loans without co-signer</option>
                    </select>
                </div>
                
                <div class="col-6 mb-3">
                    <label for="teaching_language" class="form-label">Teaching languages</label>
                    <select name="teaching_language" id="teaching_language" class="form-select">
                        <option value="all">All</option>
                        <option value="english">English</option>
                        <option value="french">French</option>
                        <option value="spanish">Spanish</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="research" class="form-label">Research and dissertation</label>
                    <select name="research" id="research" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="exchange_programs" class="form-label">Exchange programs</label>
                    <select name="exchange_programs" id="exchange_programs" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                
                <div class="col-6 mb-3">
                    <label for="degree_modifier" class="form-label">Degree modifier</label>
                    <select name="degree_modifier" id="degree_modifier" class="form-select">
                        <option value="all">All</option>
                        <option value="apprenticeship">Apprenticeship</option>
                        <option value="co-op">Co-op</option>
                        <option value="distance">Distance</option>
                        <option value="honor">Honor</option>
                        <option value="online">Online</option>
                        <option value="university-transfer">University transfer</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="day_care" class="form-label">Daycare, for students with kids</label>
                    <select name="day_care" id="day_care" class="form-select">
                        <option value="all">All</option>
                        <option value="school-owned">Yes, school-owned</option>
                        <option value="school-managed">Yes, school-managed</option>
                        <option value="private-neighbor">Yes, private, neighbouring</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="elementary_school" class="form-label">Elementary school for students with kids</label>
                    <select name="elementary_school" id="elementary_school" class="form-select">
                        <option value="all">All</option>
                        <option value="school-owned">Yes, school-owned</option>
                        <option value="school-managed">Yes, school-managed</option>
                        <option value="private-neighbor">Yes, private, neighbouring</option>
                        <option value="public-neighbor">Yes, public, neighbouring</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="immigration_office" class="form-label">Immigration office on campus <i class="fas fa-question-circle ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Immigration guidance and advice provided"></i></label>
                    <select name="immigration_office" id="immigration_office" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="career_planning" class="form-label">Career planning / development services <i class="fas fa-question-circle ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Assists students in their career development and search for jobs (permanent, part-time, summer, or internships. School offers workshops, individual advising, a job posting service, and a Career Resource Centre"></i></label>
                    <select name="career_planning" id="career_planning" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="pathway_programs" class="form-label">Pathway programs <i class="fas fa-question-circle ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="For international students who need additional language or academic preparation before enrolling in a degree program. Benefits: &#010;• Preparation provided by the school itself&#010;• Guaranteed progression to a university&#010;• Adjust to a new culture and gain necessary skill set" style="white-space: pre-line;"></i></label>
                    <select name="pathway_programs" id="pathway_programs" class="form-select">
                        <option value="all">All</option>
                        <option value="graduate">Yes, graduate</option>
                        <option value="undergraduate">Yes, undergraduate</option>
                    </select>
                </div>
                
                <div class="col-6 mb-3">
                    <label for="employment_rates" class="form-label">Employment rates (after graduation)</label>
                    <select name="employment_rates" id="employment_rates" class="form-select">
                        <option value="all">All</option>
                        <option value="90">Above 90%</option>
                        <option value="80">Above 80%</option>
                        <option value="70">Above 70%</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="class_size_undergraduate" class="form-label">Class size, undergraduate</label>
                    <select name="class_size_undergraduate" id="class_size_undergraduate" class="form-select">
                        <option value="all">All</option>
                        <option value="10">Under 10</option>
                        <option value="20">Under 20</option>
                        <option value="30">Under 30</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="class_size_masters" class="form-label">Class size, Masters</label>
                    <select name="class_size_masters" id="class_size_masters" class="form-select">
                        <option value="all">All</option>
                        <option value="10">Under 10</option>
                        <option value="20">Under 20</option>
                        <option value="30">Under 30</option>
                    </select>
                </div>
                
                <div class="col-6 mb-3">
                    <label for="service_and_guidance_new_students" class="form-label">Service and guidance to new students</label>
                    <select name="service_and_guidance_new_students" id="service_and_guidance_new_students" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="service_and_guidance_new_arrivals" class="form-label">Service and guidance to new arrivals in Canada</label>
                    <select name="service_and_guidance_new_arrivals" id="service_and_guidance_new_arrivals" class="form-select">
                        <option value="all">All</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                
            </div>

            <div class="text-center">
                <button type="submit" class="btn w-25 text-white p-2" id="submit_btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Search</button>
            </div>
        </form>
    </div>
@endsection
