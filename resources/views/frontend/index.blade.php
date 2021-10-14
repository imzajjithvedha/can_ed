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
                        <div class="input-group shadow-lg">
                            <input type="text" name="keyword" class="form-control p-3 rounded-0 search border-0" aria-label="search">
                            <select class="border-0 text-center search-drop" name='type'>
                                <option value="schools" selected="selected">Schools</option>
                                <option value="businesses">Businesses</option>
                                <option value="resources">Resources</option>
                            </select>
                            <button type="submit" class="btn rounded-0 text-white"><i class="fas fa-search" style="color: black;"></i></button>
                        </div>
                    </form>

                    <div class="advanced-search text-center">
                        <button class="btn text-white w-100" data-bs-toggle="modal" data-bs-target="#advanced-search-modal">Advanced Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid index-categories">
        <div class="container">
            <div class="row p-3">
                <div class="col text-center">
                    <a href="{{ route('frontend.language_programs') }}" class="text-decoration-none">
                        <img src="{{ url('img/frontend/index/languages.png') }}" alt="" class="img-fluid">
                        <p class="gray mt-2">Language Programs</p>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="{{ route('frontend.college_programs') }}" class="text-decoration-none">
                        <img src="{{ url('img/frontend/index/community.png') }}" alt="" class="img-fluid">
                        <p class="gray mt-2">Community College</p>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="{{ route('frontend.bachelor_programs') }}" class="text-decoration-none">
                        <img src="{{ url('img/frontend/index/degree.png') }}" alt="" class="img-fluid">
                        <p class="gray mt-2">Bachelor Degree</p>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="{{ route('frontend.master_programs') }}" class="text-decoration-none">
                        <img src="{{ url('img/frontend/index/masters.png') }}" alt="" class="img-fluid">
                        <p class="gray mt-2">Masters</p>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="{{ route('frontend.certificate_programs') }}" class="text-decoration-none">
                        <img src="{{ url('img/frontend/index/certificate.png') }}" alt="" class="img-fluid">
                        <p class="gray mt-2">Certificate / short term</p>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="{{ route('frontend.summer_programs') }}" class="text-decoration-none">
                        <img src="{{ url('img/frontend/index/summer.png') }}" alt="" class="img-fluid">
                        <p class="gray mt-2">Summer</p>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="#" class="text-decoration-none">
                        <img src="{{ url('img/frontend/index/highschool.png') }}" alt="" class="img-fluid">
                        <p class="gray mt-2">High School</p>
                    </a>
                </div>
                <div class="col text-center" style="border:none;">
                    <a href="#" class="text-decoration-none">
                        <img src="{{ url('img/frontend/index/summer.png') }}" alt="" class="img-fluid">
                        <p class="gray mt-2">Online</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 featured-schools">
        <h5 class="fw-bolder">Featured Schools</h5>

        <div class="row mt-4">
            <div class="col-3 mb-4">
                <div class="card">
                    <img src="{{ url('img/frontend/index/school.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold gray">Royal College</h6>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card">
                    <img src="{{ url('img/frontend/index/school.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold gray">Royal College</h6>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card">
                    <img src="{{ url('img/frontend/index/school.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold gray">Royal College</h6>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card">
                    <img src="{{ url('img/frontend/index/school.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold gray">Royal College</h6>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card">
                    <img src="{{ url('img/frontend/index/school.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold gray">Royal College</h6>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card">
                    <img src="{{ url('img/frontend/index/school.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold gray">Royal College</h6>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card">
                    <img src="{{ url('img/frontend/index/school.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold gray">Royal College</h6>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card">
                    <img src="{{ url('img/frontend/index/school.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold gray">Royal College</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(count($businesses) > 0)
        <div class="container mt-5 featured-businesses">
            <a href="{{ route('frontend.business_categories') }}" class="fw-bolder h5 text-decoration-none text-dark">Featured Businesses</a>

            
            <div class="row mt-4">
                @foreach($businesses as $business)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_business', $business->id) }}" class="text-decoration-none">
                            <div class="card">
                                <img src="{{ url('images/businesses', $business->image) }}" class="card-img-top" alt="..." style="height: 10rem; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold gray">{{ $business->name }}</h6>
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
            <a href="{{ route('frontend.articles') }}" class="fw-bolder h5 text-decoration-none text-dark">Getting started with your u.s. education</a>

            <div class="row mt-4">
                @foreach($featured_articles as $article)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                            <div class="card">
                                <img src="{{ url('images/articles', $article->image) }}" class="card-img-top" alt="..." style="height: 10rem; object-fit: cover;">
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
            <a href="{{ route('frontend.videos') }}" class="h5 text-decoration-none text-dark fw-bolder">Featured Videos</a>

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
            <a href="{{ route('frontend.articles') }}" class="fw-bolder h5 text-decoration-none text-dark">Recent Articles</a>

            <div class="row mt-4">
                @foreach($articles as $article)
                    <div class="col-3 mb-4">
                        <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                            <div class="card">
                                <img src="{{ url('images/articles', $article->image) }}" class="card-img-top" alt="..." style="height: 10rem; object-fit: cover;">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Advanced Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter keyword" required>
                        </div>
                    </div>

                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-6 text-center">
                            <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit_btn" disabled>Search</button>
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
                        <h4 class="mb-0 text-center">Thank you for your school request. We will check and approve as soon as possible.</h4>
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

@endsection



@push('after-scripts')
    <script>
        if(document.getElementById("delete-btn")){
            $('#delete-btn').click();
        }
    </script>
@endpush