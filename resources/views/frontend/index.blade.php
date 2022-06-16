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
                    <div class="col-12 col-lg-7">
                        <form action="{{ route('frontend.home_search') }}"  method="POST" novalidate>
                            {{csrf_field()}}
                            <div class="search-box p-2 mb-3">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control p-3 rounded-0 border-start-0 border-top-0 border-bottom-0 border-end search-input" placeholder="Search by school name" aria-label="search">
                                    <select class="border-0 text-center search-drop border-end" name='type' style="cursor: pointer">
                                        <option value="schools" selected="selected">Schools</option>
                                        <option value="businesses">Businesses</option>
                                        <option value="programs">Programs</option>
                                        <!-- <option value="careers">Careers</option> -->
                                        <option value="articles">Articles</option>
                                        <option value="scholarships">Scholarships</option>
                                        <!-- <option value="resources">Resources</option> -->
                                    </select>
                                    <button type="submit" class="btn rounded-0 text-white bg-white border-start border-end"><i class="fas fa-search" style="color: black;"></i></button>
                                    
                                </div>
                            </div>

                            <div class="text-center advance-box">
                                <a href="{{ route('frontend.advance_search') }}" type="button" class="btn text-white advanced-search rounded-0">Advanced search</a>
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
                    <div class="col-12 col-lg-7">
                        <form action="{{ route('frontend.home_search') }}"  method="POST" novalidate>
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
                                </div>
                            </div>

                            <div class="text-center advance-box">
                                <a href="{{ route('frontend.advance_search') }}" type="button" class="btn text-white advanced-search rounded-0">Advanced search</a>
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
                <div class="row p-3 justify-content-center">
                    
                    @foreach($degree_levels as $degree)
                        <div class="col-4 col-md-3 col-lg text-center mb-4 mb-lg-0">
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


    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="gray" style="text-align: justify;">{!! $information->website_description !!}</div>
                </div>
            </div>
        </div>
    </div>
    


    @if(count($featured_schools) > 0)
        <div class="container mt-5 featured-schools red">
            <a href="{{ route('frontend.school_degree_levels') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured schools</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_schools_description }}</p>

            <div class="row mt-4">
                @foreach($featured_schools as $featured_school)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_school', [$featured_school->id, $featured_school->slug]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_school->featured_image != null)
                                    <img src="{{ uploaded_asset($featured_school->featured_image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_school->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_international_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.articles', 'financial-help-for-international-students') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Financial help for international students</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_international_articles_description }}</p>

            <div class="row mt-4">
                @foreach($featured_international_articles as $featured_international_article)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $featured_international_article->type), $featured_international_article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_international_article->image != null)
                                    <img src="{{ url('images/articles', $featured_international_article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_international_article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_canadian_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.articles', 'financial-help-for-canadian-students') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Financial help for Canadian students</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_canadian_articles_description }}</p>

            <div class="row mt-4">
                @foreach($featured_canadian_articles as $featured_canadian_article)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $featured_canadian_article->type), $featured_canadian_article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_canadian_article->image != null)
                                    <img src="{{ url('images/articles', $featured_canadian_article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_canadian_article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_work_study_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.articles', 'work-while-studying') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Work while studying</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_work_study_articles_description }}</p>

            <div class="row mt-4 align-items-center p-2" style="border: 7px solid black; border-radius: 8px;">
                @if(count($jobs_logos) > 0)
                    <div class="col-12 p-3">
                        <h4 class="fw-bolder futura text-center mb-3">Our Network</h4>
                        <div class="swiper logo-sliders p-3">
                            <div class="swiper-wrapper align-items-center">
                                @foreach($jobs_logos as $jobs_logo)
                                    <div class="swiper-slide position-relative">
                                        <a href="{{ route('frontend.jobs') }}" class="text-decoration-none">
                                            <img src="{{ url('images/logos', $jobs_logo->image) }}" alt="" class="img-fluid logo">

                                            <img src="{{ url('img/frontend/logo_frame.png') }}" alt="" class="img-fluid frame">

                                            <p class="gray">{{ $jobs_logo->name }}</p>
                                        
                                        </a>


                                    </div>
                                @endforeach
                                
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                @endif

                <!-- @foreach($featured_work_study_articles as $featured_work_study_article)
                    <div class="col-3">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $featured_work_study_article->type), $featured_work_study_article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0 mb-0">
                                @if($featured_work_study_article->image != null)
                                    <img src="{{ url('images/articles', $featured_work_study_article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_work_study_article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach -->
            </div>
        </div>
    @endif


    @if(count($featured_financial_planning_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.articles', 'financial-planning') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Financial planning</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_financial_planning_articles_description }}</p>

            <div class="row mt-4">
                @foreach($featured_financial_planning_articles as $featured_financial_planning_article)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $featured_financial_planning_article->type), $featured_financial_planning_article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_financial_planning_article->image != null)
                                    <img src="{{ url('images/articles', $featured_financial_planning_article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_financial_planning_article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_academic_help_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.articles', 'academic-help-before-applying') }}" class="fw-bolder h4 text-decoration-none text-dark futura">For students who need academic help before applying</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_academic_help_articles_description }}</p>

            <div class="row mt-4">
                @foreach($featured_academic_help_articles as $featured_academic_help_article)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $featured_academic_help_article->type), $featured_academic_help_article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_academic_help_article->image != null)
                                    <img src="{{ url('images/articles', $featured_academic_help_article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_academic_help_article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_financial_help_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.articles', 'financial-help-before-applying') }}" class="fw-bolder h4 text-decoration-none text-dark futura">For students who need financial help before applying</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_financial_help_articles_description }}</p>

            <div class="row mt-4">
                @foreach($featured_financial_help_articles as $featured_financial_help_article)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $featured_financial_help_article->type), $featured_financial_help_article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_financial_help_article->image != null)
                                    <img src="{{ url('images/articles', $featured_financial_help_article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_financial_help_article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_immigration_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.articles', 'immigration-questions') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Immigration questions</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_immigration_articles_description }}</p>

            <div class="row mt-4">
                @foreach($featured_immigration_articles as $featured_immigration_article)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $featured_immigration_article->type), $featured_immigration_article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_immigration_article->image != null)
                                    <img src="{{ url('images/articles', $featured_immigration_article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_immigration_article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_proxima_study_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.articles', 'proxima-study-in-coming-to-you') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Proxima Study is coming to you</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_proxima_study_articles_description }}</p>

            <div class="row mt-4">
                @foreach($featured_proxima_study_articles as $featured_proxima_study_article)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $featured_proxima_study_article->type), $featured_proxima_study_article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_proxima_study_article->image != null)
                                    <img src="{{ url('images/articles', $featured_proxima_study_article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_proxima_study_article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_need_help_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.articles', 'need-more-help') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Need more help?</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_need_help_articles_description }}</p>

            <div class="row mt-4">
                @foreach($featured_need_help_articles as $featured_need_help_article)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $featured_need_help_article->type), $featured_need_help_article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_need_help_article->image != null)
                                    <img src="{{ url('images/articles', $featured_need_help_article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_need_help_article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_open_days) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.all_open_days') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Open days</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_open_days_description }}</p>

            <div class="row mt-4">
                @foreach($featured_open_days as $featured_open_day)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_open_day', $featured_open_day->id) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_open_day->image != null)
                                    <img src="{{ url('images/open_days', $featured_open_day->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_open_day->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    
    @if(count($featured_virtual_tours) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.all_virtual_tours') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Virtual tours</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_virtual_tours_description }}</p>

            <div class="row mt-4">
                @foreach($featured_virtual_tours as $featured_virtual_tour)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <div class="card rounded-0 position-relative">
                            <a href="{{ $featured_virtual_tour->link }}" class="text-decoration-none" target="_blank">

                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ App\Models\Schools::where('id', $featured_virtual_tour->school_id)->first()->name }}</h6>
                                </div>

                                @if($featured_virtual_tour->image != null)
                                    <img src="{{ url('images/virtual_tours', $featured_virtual_tour->image) }}" class="w-100" alt="..." style="height: 15rem; object-fit: cover;">
                                        
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                @endif


                                <div class="position-absolute virtual-box">
                                    <p class="text-decoration-none" style="color: {{ $featured_virtual_tour->color }}">We are in {{ $featured_virtual_tour->city }}, {{ $featured_virtual_tour->province }}, {{ $featured_virtual_tour->country }}</p>
                                </div>
                                
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_businesses) > 0)
        <div class="container mt-5 featured-businesses red">
            <a href="{{ route('frontend.business_categories') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured businesses</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_businesses_description }}</p>

            
            <div class="row mt-4">
                @foreach($featured_businesses as $featured_business)
                    @if($featured_business->advertised == 'Yes' && $featured_business->url != null)
                        <div class="col-12 col-md-4 col-lg-3 mb-4">
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
                                        <h6 class="card-title futura fw-bold gray">{{ $featured_business->name }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-12 col-md-4 col-lg-3 mb-4">
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
                                        <h6 class="card-title futura fw-bold gray">{{ $featured_business->name }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_common_articles) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.all_articles') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Getting started with your Canadian education</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_common_articles_description }}</p>

            <div class="row mt-4">
                @foreach($featured_common_articles as $featured_common_article)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $featured_common_article->type), $featured_common_article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($featured_common_article->image != null)
                                    <img src="{{ url('images/articles', $featured_common_article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $featured_common_article->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($featured_events) > 0)
        <div class="container mt-5 red">
            <a href="{{ route('frontend.events') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured Events</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_events_description }}</p>

            <div class="row mt-4">
                @foreach($featured_events as $featured_event)
                    @if($featured_event->advertised == 'Yes' && $featured_event->url != null)
                        <div class="col-12 col-md-4 col-lg-3 mb-4">
                            <a href="{{ $featured_event->url }}" class="text-decoration-none" target="_blank">
                                <div class="card rounded-0">
                                    @if($featured_event->image != null)
                                        <img src="{{ url('images/events', $featured_event->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @endif
                                    <div class="card-body text-center card-padding rounded-0">
                                        <h6 class="card-title futura fw-bold gray">{{ $featured_event->title }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-12 col-md-4 col-lg-3 mb-4">
                            <a href="{{ route('frontend.single_event', $featured_event->id) }}" class="text-decoration-none">
                                <div class="card rounded-0">
                                    @if($featured_event->image != null)
                                        <img src="{{ url('images/events', $featured_event->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @endif
                                    <div class="card-body text-center card-padding rounded-0">
                                        <h6 class="card-title futura fw-bold gray">{{ $featured_event->title }}</h6>
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
                        <div class="col-12 col-md-4 col-lg-3 mb-4">
                            <a href="{{ $student_service->url }}" class="text-decoration-none" target="_blank">
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
                                        <h6 class="card-title futura fw-bold gray">{{ $student_service->name }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-12 col-md-4 col-lg-3 mb-4">
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
                                        <h6 class="card-title futura fw-bold gray">{{ $student_service->name }}</h6>
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
        <div class="container mt-5 featured-videos red">
            <a href="{{ route('frontend.videos') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Featured videos</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->featured_videos_description }}</p>

            <div class="row mt-4">
                @foreach($videos as $video)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <div class="card rounded-0">
                            <iframe width="100%" height="143" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <div class="card-body text-center card-padding rounded-0">
                                <h6 class="card-title futura gray">{{ $video->title }}</h6>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if(count($articles) > 0)
        <div class="container mt-5 recent-articles red">
            <a href="{{ route('frontend.all_articles') }}" class="fw-bolder h4 text-decoration-none text-dark futura">Recent articles</a>
            <p class="gray mt-1" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $information->recent_articles_description }}</p>

            <div class="row mt-4">
                @foreach($articles as $article)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $article->type), $article->id]) }}" class="text-decoration-none">
                            <div class="card rounded-0">
                                @if($article->image != null)
                                    <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid" style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title futura fw-bold gray">{{ $article->title }}</h6>
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
                $('.advanced-search').addClass('advanced-disabled');
                $('.search-input').attr('placeholder', '');
            } else if($(this).val() == 'programs') {
                $('.advanced-search').addClass('advanced-disabled');
                $('.search-input').attr('placeholder', '');
            } else if($(this).val() == 'articles') {
                $('.advanced-search').addClass('advanced-disabled');
                $('.search-input').attr('placeholder', '');
            } else {
                $('.advanced-search').removeClass('advanced-disabled');
                $('.search-input').attr('placeholder', 'Search by school name');
            }
        });
    </script>

    <script>
        $('.search-drop').on('change', function() {
            val = $( this ).val();

            let link = "{{ route('frontend.scholarships') }}";

            if(val == 'scholarships') {
                window.open(link, '_self');
            }
        });
    </script>


    <script>
        var swiper = new Swiper(".logo-sliders", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: 5,
            spaceBetween: 20,
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                429: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
            }
        });
    </script>
@endpush