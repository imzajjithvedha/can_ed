@extends('frontend.layouts.app')

@section('title', 'Welcome to Study in Canada')

@push('after-styles')
    <link href="{{ url('css/index.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid main-banner">
        <div class="container" style="margin-top: -12rem;">
            <div class="row justify-content-center search-bar">
                <div class="col-6">
                    <form action="{{ route('frontend.home_search') }}"  method="POST">
                        {{csrf_field()}}
                        <div class="search-box p-2">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control p-3 rounded-0 border-start-0 border-top-0 border-bottom-0 border-end search-input" aria-label="search" placeholder="Search your keyword">
                                <select class="border-0 text-center search-drop border-end" name='type'>
                                    <option value="schools" selected="selected">Schools</option>
                                    <option value="businesses">Businesses</option>
                                    <option value="programs">Programs</option>
                                    <!-- <option value="careers">Careers</option> -->
                                    <option value="articles">Articles</option>
                                    <!-- <option value="resources">Resources</option> -->
                                </select>
                                <button type="submit" class="btn rounded-0 text-white me-2 bg-white border-start border-end"><i class="fas fa-search" style="color: black;"></i></button>
                                <button type="button" class="btn text-white advanced-search" data-bs-toggle="modal" data-bs-target="#advanced-search-modal">ADVANCED SEARCH</button>
                            </div>
                        </div>
                    </form>

                    <!-- <div class="advanced-search text-center">
                        <button class="btn text-white w-100" data-bs-toggle="modal" data-bs-target="#advanced-search-modal">Advanced Search</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    @if(count($degree_levels) > 0)
        <div class="container-fluid index-categories">
            <div class="container">
                <div class="row p-3">
                    
                    @foreach($degree_levels as $degree)
                        <div class="col text-center">
                            <a href="{{ route('frontend.language_programs') }}" class="text-decoration-none">
                                @if($degree->icon != null)
                                    <img src="{{ url('images/degree_levels', $degree->icon) }}" alt="" class="img-fluid" style="filter: contrast(200%) brightness(45%);">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid">
                                @endif

                                <p class="gray mt-2">{{ $degree->name }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif



    @if(count($featured_schools) > 0)
        <div class="container mt-5 featured-schools">
            <a href="{{ route('frontend.schools') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured schools</a>

            <div class="row mt-4">
                @foreach($featured_schools as $featured_school)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_school', [$featured_school->id, $featured_school->slug]) }}" class="text-decoration-none">
                            <div class="card">
                                @if($featured_school->featured_image != null)
                                    <img src="{{ uploaded_asset($featured_school->featured_image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center">
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
        <div class="container mt-5 featured-businesses">
            <a href="{{ route('frontend.business_categories') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured businesses</a>

            
            <div class="row mt-4">
                @foreach($featured_businesses as $featured_business)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_business', $featured_business->id) }}" class="text-decoration-none">
                            <div class="card">
                                @if($featured_business->image != null)
                                    <img src="{{ url('images/businesses', $featured_business->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center">
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
        <div class="container mt-5 us-education">
            <a href="{{ route('frontend.articles') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Getting started with your u.s. education</a>

            <div class="row mt-4">
                @foreach($featured_articles as $article)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                            <div class="card">
                                @if($article->image != null)
                                    <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold gray">{{ $article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    


    @if(count($videos) > 0)
        <div class="container mt-5 featured-videos">
            <a href="{{ route('frontend.videos') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured videos</a>

            <div class="row mt-4">
                @foreach($videos as $video)
                    <div class="col-3 mb-4">
                        <div class="card">
                            <iframe width="100%" height="200" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <p class="gray fw-bolder m-3 text-center">{{ $video->title }}</p>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($articles) > 0)
        <div class="container mt-5 recent-articles">
            <a href="{{ route('frontend.articles') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Recent articles</a>

            <div class="row mt-4">
                @foreach($articles as $article)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                            <div class="card">
                                @if($article->image != null)
                                    <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold gray">{{ $article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif



    <div class="modal fade" id="advanced-search-modal" tabindex="-1" aria-labelledby="advanced-search-modal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Advanced search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Degree level:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                @foreach($degree_levels as $degree_level)
                                    <option value="{{ $degree_level->name }}">{{ $degree_level->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Field of study:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">When are you planning to start:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All, I am not sure</option>
                                <option value="fall">Fall</option>
                                <option value="winter">Winter</option>
                                <option value="summer">Summer</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Online / distance education:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">I want to become:</label>
                            <input type="text" name="keyword" class="form-control" placeholder="" data-bs-toggle="tooltip" data-bs-placement="top" title="What do you want to become after you graduate?">
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">School type:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                @foreach($school_types as $school_type)
                                    <option value="{{ $school_type->name }}">{{ $school_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Min. GPA accepted:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Equivalent to 50%</option>
                                <option value="60%">Equivalent to 60%</option>
                                <option value="70%">Equivalent to 70%</option>
                                <option value="80%">Equivalent to 80%</option>
                                <option value="90%">Equivalent to 90%</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Conditional admission available:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Yes</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Program type, graduate:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Thesis</option>
                                <option value="50%">Non-Thesis</option>
                                <option value="50%">Co-op</option>
                                <option value="50%">Internship</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Program type, undergraduate:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Co-op</option>
                                <option value="60%">Honours</option>
                                <option value="70%">Interdisciplinary</option>
                                <option value="80%">Major</option>
                                <option value="90%">Minor</option>
                                <option value="90%">Specialization</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">I am interested in:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Full-time</option>
                                <option value="50%">Part-time</option>
                                <option value="50%">Continuing education</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Delivery mode:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Day</option>
                                <option value="50%">Evening</option>
                                <option value="50%">Day and evening</option>
                                <option value="50%">Weekends</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Location:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">City</option>
                                <option value="60%">Province</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Tuition range:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="all">Below $10,000</option>
                                <option value="50%">$10,001 to $20,000</option>
                                <option value="50%">$20,001 to $30,000</option>
                                <option value="50%">$30,001 to $40,000</option>
                                <option value="50%">$40,001 to $50,000</option>
                                <option value="50%">Above $50,000</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Housing / accommodation:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Private</option>
                                <option value="50%">School-managed</option>
                                <option value="50%">School-owned</option>
                                <option value="50%">Shared accommodation</option>
                                <option value="50%">Nearby</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Work-study program (work on campus):</label>
                            <select name="degree_level" class="form-select" data-bs-toggle="tooltip" data-bs-placement="top" title="Offers you access to clerical, research, technical, library or other jobs on campus and/or in school-affiliated entities. It helps you financially, and can develop your career-related skills and experience">
                                <option value="all">All</option>
                                <option value="50%">Yes</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Work during holidays:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="all">Summer</option>
                                <option value="50%">Winter</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Internship:</label>
                            <select name="degree_level" class="form-select" data-bs-toggle="tooltip" data-bs-placement="top" title="Refers to a one-term work assignment, May be full- or part-time, paid or unpaid">
                                <option value="all">All</option>
                                <option value="50%">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Co-op education:</label>
                            <select name="degree_level" class="form-select" data-bs-toggle="tooltip" data-bs-placement="top" title="Full-time paid positions in an industry related to your field. You may alternate / combine terms (semesters) of schooling with terms of work">
                                <option value="all">All</option>
                                <option value="50%">Yes</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Job placement:</label>
                            <select name="degree_level" class="form-select" data-bs-toggle="tooltip" data-bs-placement="top" title="The school helps the student look for a full-time or part-time job within, or related to, your field of study. If the employer likes you, he might keep you">
                                <option value="all">All</option>
                                <option value="all">Yes</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Financial aid programs, for domestic students:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Bursaries / grants</option>
                                <option value="50%">Scholarships</option>
                                <option value="50%">Student loans</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Financial aid programs, for international students:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Bursaries / grants</option>
                                <option value="50%">Scholarships</option>
                                <option value="50%">Student loans with co-signer</option>
                                <option value="50%">Student loans without co-signer</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Teaching languages:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="all">English</option>
                                <option value="all">French</option>
                                <option value="all">Spanish</option>
                                <option value="all">Other</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Research and dissertation:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Exchange programs:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Yes</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Degree modifier:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="all">Apprenticeship</option>
                                <option value="all">Co-op</option>
                                <option value="all">Distance</option>
                                <option value="all">Honor</option>
                                <option value="all">Online</option>
                                <option value="all">University transfer</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Daycare, for students with kids:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Yes, school-owned</option>
                                <option value="50%">Yes, school-managed</option>
                                <option value="50%">Yes, private, neighbouring</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Elementary school for students with kids:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="50%">Yes, school-owned</option>
                                <option value="50%">Yes, school-managed</option>
                                <option value="50%">Yes, private, neighbouring</option>
                                <option value="50%">Yes, public, neighbouring</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Immigration office on campus:</label>
                            <select name="degree_level" class="form-select" data-bs-toggle="tooltip" data-bs-placement="top" title="Immigration guidance and advice provided">
                                <option value="all">All</option>
                                <option value="all">Yes</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Career planning / development services:</label>
                            <select name="degree_level" class="form-select" data-bs-toggle="tooltip" data-bs-placement="top" title="Assists students in their career development and search for jobs (permanent, part-time, summer, or internships. School offers workshops, individual advising, a job posting service, and a Career Resource Centre">
                                <option value="all">All</option>
                                <option value="all">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Pathway programs:</label>
                            <select name="degree_level" class="form-select" data-bs-toggle="tooltip" data-html="true" data-bs-placement="top" title="For international students who need additional language or academic preparation before enrolling in a degree program. Benefits: &#010;• Preparation provided by the school itself&#010;• Guaranteed progression to a university&#010;• Adjust to a new culture and gain necessary skill set" style="white-space: pre-line;">
                                <option value="all">All</option>
                                <option value="50%">Yes, graduate</option>
                                <option value="50%">Yes, undergraduate</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Employment rates (after graduation):</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="all">Above 90%</option>
                                <option value="all">Above 80%</option>
                                <option value="all">Above 70%</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Class size, undergraduate:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="all">Under 10</option>
                                <option value="all">Under 20</option>
                                <option value="all">Under 30</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="" class="form-label">Class size, Masters:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="all">Under 10</option>
                                <option value="all">Under 20</option>
                                <option value="all">Under 30</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Service and guidance to new students:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="all">Yes</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Service and guidance to new arrivals in Canada:</label>
                            <select name="degree_level" class="form-select">
                                <option value="all">All</option>
                                <option value="all">Yes, school staff</option>
                                <option value="all">Yes, volunteers</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-5 mb-2 justify-content-center">
                        <div class="col-md-6 text-center">
                            <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit_btn">Search</button>
                </div>
            </div>
        </div>
    </div>



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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>

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
@endpush