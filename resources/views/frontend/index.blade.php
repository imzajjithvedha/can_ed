@extends('frontend.layouts.app')

@section('title', 'Canadian schools, colleges, and universities')

@push('after-styles')
    <link href="{{ url('css/index.css') }}" rel="stylesheet">
@endpush

@section('content')

    @if($information->main_banner != null)

        <div class="container-fluid main-banner" style="background-image: url('../images/home/{{ $information->main_banner }}')">
            <div class="container" style="margin-top: -12rem;">
                <div class="row justify-content-center search-bar">
                    <div class="col-7">
                        <form action="{{ route('frontend.home_search') }}"  method="POST">
                            {{csrf_field()}}
                            <div class="search-box p-2">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control p-3 rounded-0 border-start-0 border-top-0 border-bottom-0 border-end search-input" placeholder="Search by school name" aria-label="search">
                                    <select class="border-0 text-center search-drop border-end" name='type'>
                                        <option value="schools" selected="selected">Schools</option>
                                        <option value="businesses">Businesses</option>
                                        <option value="programs">Programs</option>
                                        <!-- <option value="careers">Careers</option> -->
                                        <option value="articles">Articles</option>
                                        <!-- <option value="resources">Resources</option> -->
                                    </select>
                                    <button type="submit" class="btn rounded-0 text-white me-2 bg-white border-start border-end"><i class="fas fa-search" style="color: black;"></i></button>
                                    <button type="button" class="btn text-white advanced-search rounded-0" data-bs-toggle="modal" data-bs-target="#advanced-search-modal">Advanced search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="container-fluid main-banner" style="background-image: url('../img/frontend/no_image.jpg')">
            <div class="container" style="margin-top: -12rem;">
                <div class="row justify-content-center search-bar">
                    <div class="col-7">
                        <form action="{{ route('frontend.home_search') }}"  method="POST">
                            {{csrf_field()}}
                            <div class="search-box p-2">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control p-3 rounded-0 border-start-0 border-top-0 border-bottom-0 border-end search-input" placeholder="Search by school name" aria-label="search">
                                    <select class="border-0 text-center search-drop border-end" name='type'>
                                        <option value="schools" selected="selected">Schools</option>
                                        <option value="businesses">Businesses</option>
                                        <option value="programs">Programs</option>
                                        <!-- <option value="careers">Careers</option> -->
                                        <option value="articles">Articles</option>
                                        <!-- <option value="resources">Resources</option> -->
                                    </select>
                                    <button type="submit" class="btn rounded-0 text-white me-2 bg-white border-start border-end"><i class="fas fa-search" style="color: black;"></i></button>
                                    <button type="button" class="btn text-white advanced-search rounded-0" data-bs-toggle="modal" data-bs-target="#advanced-search-modal">Advanced search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endif

    

    @if(count($degree_levels) > 0)
        <div class="container-fluid index-categories">
            <div class="container">
                <div class="row p-3">
                    
                    @foreach($degree_levels as $degree)
                        <div class="col text-center">
                            <a href="{{ route('frontend.degree_level', [ $degree->id, $degree->slug ]) }}" class="text-decoration-none">
                                @if($degree->icon != null)
                                    <img src="{{ url('images/degree_levels', $degree->icon) }}" alt="" class="img-fluid">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid">
                                @endif

                                <p class="text-black mt-2">{{ $degree->name }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif


    @if(count($featured_schools) > 0)
        <div class="container mt-5 featured-schools red">
            <a href="{{ route('frontend.school_degree_levels') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured schools</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_schools_description }}</p>

            <div class="row mt-4">
                @foreach($featured_schools as $featured_school)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_school', [$featured_school->id, $featured_school->slug]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_school->featured_image != null)
                                    <img src="{{ uploaded_asset($featured_school->featured_image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ $featured_school->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_businesses) > 0)
        <div class="container mt-5 featured-businesses blue">
            <a href="{{ route('frontend.business_categories') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured businesses</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_businesses_description }}</p>

            
            <div class="row mt-4">
                @foreach($featured_businesses as $featured_business)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_business', $featured_business->id) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_business->image != null)
                                    <img src="{{ url('images/businesses', $featured_business->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ $featured_business->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.articles') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Getting started with your Canadian education</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_articles_description }}</p>

            <div class="row mt-4">
                @foreach($featured_articles as $article)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($article->image != null)
                                    <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ $article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if(count($featured_events) > 0)
        <div class="container mt-5 blue">
            <a href="{{ route('frontend.events') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured Events</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_events_description }}</p>

            <div class="row mt-4">
                @foreach($featured_events as $featured_events)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_event', $featured_events->id) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_events->image != null)
                                    <img src="{{ url('images/events', $featured_events->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ $featured_events->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if(count($student_services) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.business_categories') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Student services</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->student_services_description }}</p>

            <div class="row mt-4">
                @foreach($student_services as $student_service)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_business', $student_service->id) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($student_service->image != null)
                                    <img src="{{ url('images/businesses', $student_service->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ $student_service->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    

    @if(count($videos) > 0)
        <div class="container mt-5 featured-videos blue">
            <a href="{{ route('frontend.videos') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured videos</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_videos_description }}</p>

            <div class="row mt-4">
                @foreach($videos as $video)
                    <div class="col-3 mb-4">
                        <div class="card rounded-0">
                            <iframe width="100%" height="143" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <div class="card-body text-center card-padding rounded-0">
                                <h6 class="card-title fw-bold gray" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $video->title }}</h6>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($articles) > 0)
        <div class="container mt-5 recent-articles red">
            <a href="{{ route('frontend.articles') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Recent articles</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->recent_articles_description }}</p>

            <div class="row mt-4">
                @foreach($articles as $article)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($article->image != null)
                                    <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ $article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    <!-- Advanced search form -->
    <form action="{{ route('frontend.advanced_search') }}" method="POST" id="advanced-search-form">
        {{ csrf_field() }}
        <div class="modal fade" id="advanced-search-modal" tabindex="-1" aria-labelledby="advanced-search-modal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Advanced search</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-12 mb-4">
                                <p class="gray" style="text-align:justify;">{{ $information->advanced_search_description}}</p>
                            </div>
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
                                <label for="conditional_admission" class="form-label">Conditional admission available</label>
                                <select name="conditional_admission" id="conditional_admission" class="form-select">
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

                            <div class="col-6 mb-3">
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
                            </div>

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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submit_btn">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you for your school request. We will contact you as soon as possible.</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('frontend.index') }}" class="btn text-white" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Refresh</a>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if(\Session::has('account_deleted'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="delete-btn" data-bs-toggle="modal" data-bs-target="#deleteAccountModal"></button>

        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Your account successfully deleted.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if(\Session::has('school_deleted'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="delete-btn" data-bs-toggle="modal" data-bs-target="#deleteSchoolModal"></button>

        <div class="modal fade" id="deleteSchoolModal" tabindex="-1" aria-labelledby="deleteSchoolModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Your school successfully deleted.</h4>
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
        if(document.getElementById("delete-btn")){
            $('#delete-btn').click();
        }
    </script>

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

    <script>
        $('.search-drop').on('change', function() {
            if($(this).val() == 'businesses') {
                $('.advanced-search').attr('disabled', 'disabled');
                $('.search-input').attr('placeholder', '');
            } else if($(this).val() == 'programs') {
                $('.advanced-search').attr('disabled', 'disabled');
                $('.search-input').attr('placeholder', '');
            } else if($(this).val() == 'articles') {
                $('.advanced-search').attr('disabled', 'disabled');
                $('.search-input').attr('placeholder', '');
            } else {
                $('.advanced-search').removeAttr('disabled');
                $('.search-input').attr('placeholder', 'Search by school name');
            }
        });
    </script>
@endpush