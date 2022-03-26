@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Your future begins here')

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
                                    <select class="border-0 text-center search-drop border-end" name='type' style="cursor: pointer">
                                        <option value="schools" selected="selected">Schools</option>
                                        <option value="businesses">Businesses</option>
                                        <option value="programs">Programs</option>
                                        <!-- <option value="careers">Careers</option> -->
                                        <option value="articles">Articles</option>
                                        <!-- <option value="resources">Resources</option> -->
                                    </select>
                                    <button type="submit" class="btn rounded-0 text-white me-2 bg-white border-start border-end"><i class="fas fa-search" style="color: black;"></i></button>
                                    <a href="{{ route('frontend.advance_search') }}" type="button" class="btn text-white advanced-search rounded-0">Advanced search</a>
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
                                    <select class="border-0 text-center search-drop border-end" name='type' style="cursor: pointer">
                                        <option value="schools" selected="selected">Schools</option>
                                        <option value="businesses">Businesses</option>
                                        <option value="programs">Programs</option>
                                        <!-- <option value="careers">Careers</option> -->
                                        <option value="articles">Articles</option>
                                        <!-- <option value="resources">Resources</option> -->
                                    </select>
                                    <button type="submit" class="btn rounded-0 text-white me-2 bg-white border-start border-end"><i class="fas fa-search" style="color: black;"></i></button>
                                    <a href="{{ route('frontend.advance_search') }}" type="button" class="btn text-white advanced-search rounded-0">Advanced search</a>
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
                    @if($featured_business->advertised == 'Yes' && $featured_business->url != null)
                        <div class="col-3 mb-4">
                            <a href="{{ $featured_business->url }}" class="text-decoration-none" target="_blank">
                                <div class="card rounded-0">
                                    @if($featured_business->image != null)
                                        @foreach(json_decode($featured_business->image) as $index => $im)

                                            @if ($index == 0)
                                                <img src="{{ url('images/businesses', $im) }}" class="w-100" alt="..." style="height: 10rem; object-fit: cover;">
                                            @endif
                                            
                                        @endforeach
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @endif
                                    <div class="card-body text-center card-padding rounded-0">
                                        <h6 class="card-title fw-bold gray">{{ $featured_business->name }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-3 mb-4">
                            <a href="{{ route('frontend.single_business', $featured_business->id) }}" class="text-decoration-none">
                                <div class="card rounded-0">
                                    @if($featured_business->image != null)
                                        @foreach(json_decode($featured_business->image) as $index => $im)

                                            @if ($index == 0)
                                                <img src="{{ url('images/businesses', $im) }}" class="w-100" alt="..." style="height: 10rem; object-fit: cover;">
                                            @endif
                                            
                                        @endforeach
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @endif
                                    <div class="card-body text-center card-padding rounded-0">
                                        <h6 class="card-title fw-bold gray">{{ $featured_business->name }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
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
                @foreach($featured_events as $featured_event)
                    @if($featured_event->advertised == 'Yes' && $featured_event->url != null)
                        <div class="col-3 mb-4">
                            <a href="{{ $featured_event->url }}" class="text-decoration-none" target="_blank">
                                <div class="card rounded-0">
                                    @if($featured_event->image != null)
                                        <img src="{{ url('images/events', $featured_event->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @endif
                                    <div class="card-body text-center card-padding rounded-0">
                                        <h6 class="card-title fw-bold gray">{{ $featured_event->title }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-3 mb-4">
                            <a href="{{ route('frontend.single_event', $featured_event->id) }}" class="text-decoration-none">
                                <div class="card rounded-0">
                                    @if($featured_event->image != null)
                                        <img src="{{ url('images/events', $featured_event->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @endif
                                    <div class="card-body text-center card-padding rounded-0">
                                        <h6 class="card-title fw-bold gray">{{ $featured_event->title }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
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
                    @if($student_service->advertised == 'Yes' && $student_service->url != null)
                        <div class="col-3 mb-4">
                            <a href="{{ $student_service->url }}" class="text-decoration-none">
                                <div class="card rounded-0">
                                    @if($student_service->image != null)
                                        @foreach(json_decode($student_service->image) as $index => $im)

                                            @if ($index == 0)
                                                <img src="{{ url('images/businesses', $im) }}" class="w-100" alt="..." style="height: 10rem; object-fit: cover;">
                                            @endif
                                            
                                        @endforeach
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @endif

                                    <div class="card-body text-center card-padding rounded-0">
                                        <h6 class="card-title fw-bold gray">{{ $student_service->name }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-3 mb-4">
                            <a href="{{ route('frontend.single_business', $student_service->id) }}" class="text-decoration-none">
                                <div class="card rounded-0">
                                    @if($student_service->image != null)
                                        @foreach(json_decode($student_service->image) as $index => $im)

                                            @if ($index == 0)
                                                <img src="{{ url('images/businesses', $im) }}" class="w-100" alt="..." style="height: 10rem; object-fit: cover;">
                                            @endif
                                            
                                        @endforeach
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @endif

                                    <div class="card-body text-center card-padding rounded-0">
                                        <h6 class="card-title fw-bold gray">{{ $student_service->name }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
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

    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you for your school request. We will contact you as soon as possible.</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a href="{{ route('frontend.index') }}" class="btn text-white w-25" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Refresh</a>
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

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-0 text-center">Your account successfully deleted.</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn text-white w-25" data-bs-dismiss="modal"  style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
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

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-0 text-center">Your school successfully deleted.</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn text-white w-25" data-bs-dismiss="modal"  style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
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