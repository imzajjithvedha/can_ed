@extends('frontend.layouts.app')

@section('title', 'School: '.$school->name)

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 single-school">

        <div class="row">
            <div class="col-3 pt-5">
                <h5 class="fw-bolder">Related Articles</h5>
                <hr>

                <div class="row align-items-center">
                    @foreach($articles as $article)
                        <div class="col-12 mb-3">
                            <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                                <div class="card">
                                    @if($article->image != null)
                                        <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
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

            <div class="col-9">
                <div class="row align-items-center">
                    <div class="col-10">
                        <h5 class="fw-bolder">{{ $school->name }}</h5>
                    </div>
                    @auth
                        @if(is_favorite_school( $school->id, auth()->user()->id))
                            <div class="col-2 text-end">
                                <form action="{{ route('frontend.favorite_school') }}" method="POST">
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $school->id }}">
                                    <input type="hidden" name='favorite' value="favorite">
                                    <button type="submit" class="fas fa-heart favorite-heart text-decoration-none"></button>
                                </form>
                            </div>
                        @else
                            <div class="col-2 text-end">
                                <form action="{{ route('frontend.favorite_school') }}" method="POST">
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $school->id }}">
                                    <input type="hidden" name='favorite' value="non-favorite">
                                    <button type="submit" class="far fa-heart favorite-heart text-decoration-none"></button>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="col-2 text-end">
                            <a href="{{ route('frontend.auth.login') }}" class="far fa-heart favorite-heart text-decoration-none"></a>
                        </div>
                    @endauth
                </div>
                
                <hr>

                <div class="row mb-3">
                    <div class="col-9">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ url('images/schools', $image) }}" alt="" class="img-fluid w-100" style="height: 20rem;width: 100%; object-fit: cover;">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>

                    <div class="col-3 ps-0 text">
                        <h6 class="text-white p-2" style="background-color: #800000">{{$school->name}} web links</h6>

                        <div class="row">
                            <div class="col-6">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-tabs justify-content-between mb-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="quick-facts-tab" data-bs-toggle="tab" data-bs-target="#quick-facts" type="button" role="tab" aria-controls="quick-facts" aria-selected="true">Quick Facts</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="false">Overview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="programs-tab" data-bs-toggle="tab" data-bs-target="#programs" type="button" role="tab" aria-controls="programs" aria-selected="false">Programs</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="admissions-tab" data-bs-toggle="tab" data-bs-target="#admissions" type="button" role="tab" aria-controls="admissions" aria-selected="false">Admissions</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="financial-tab" data-bs-toggle="tab" data-bs-target="#financial" type="button" role="tab" aria-controls="financial" aria-selected="false">Financial</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#tab-scholarships" class="nav-link" id="scholarships-tab" data-bs-toggle="tab" data-bs-target="#scholarships" type="button" role="tab" aria-controls="scholarships" aria-selected="false">Scholarships</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="quick-facts" role="tabpanel" aria-labelledby="quick-facts-tab">
                                <div class="row mb-5">
                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Location</h6>
                                            <p class="gray">{{ $school->location }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">School type</h6>
                                            <p class="gray">{{ App\Models\SchoolTypes::where('id', $school->school_type)->first()->name }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Language</h6>
                                            <p class="gray">{{ $school->language }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Undergraduates</h6>
                                            <p class="gray">{{ $school->undergraduates }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Entrance dates</h6>
                                            <p class="gray">{{ $school->entrance_dates }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Canadian tuition</h6>
                                            <p class="gray">${{ $school->canadian_tuition_fee }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Minimum GPA</h6>
                                            <p class="gray">{{ $school->minimum_gpa }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Email</h6>
                                            <p class="gray">{{ $school->school_email }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Phone</h6>
                                            <p class="gray">{{ $school->school_phone }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Fax</h6>
                                            <p class="gray">{{ $school->fax }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Address</h6>
                                            <p class="gray">{{ $school->address }}</p>
                                        </div>
                                    </div>

                                    <div class="col-3 mb-4">
                                        <div class="single-fact text-center p-3">
                                            <h6 class="fw-bold mb-1">Country</h6>
                                            <p class="gray">{{ $school->country }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->quick_facts_title_1 }}</h5>

                                        <div class="gray">
                                            {!! $school->quick_facts_title_1_paragraph !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->quick_facts_title_2 }}</h5>

                                        <div class="row align-items-center">
                                            <div class="col-6 position-relative">
                                                <img src="{{ url('images/schools', $school->quick_facts_title_2_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; width: 100%; object-fit: cover;">

                                                <p class="text-white fw-bold position-absolute" style="bottom: 0.5rem; left: 2rem;">{{ $school->quick_facts_title_2_image_name }}</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->quick_facts_title_2_sub_title }}</h5>

                                                <p class="gray mb-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{{ $school->quick_facts_title_2_paragraph }}</p>

                                                <a href="{{ $school->quick_facts_title_2_link }}" class="btn red-btn text-white">{{ $school->quick_facts_title_2_button }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">Related articles</h5>

                                        <div class="row align-items-center">
                                            @foreach($articles as $article)
                                                <div class="col-4">
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
                                </div>

                                <div class="row justify-content-center mb-5">
                                    <div class="col-7 text-center">
                                        <a href="" class="btn text-white red-btn w-100 py-3">Need help planning your career?</a>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="row rounded">
                                            <div class="col-1 red-btn py-3"></div>
                                            <div class="col-3 text-white bg-primary py-3">
                                                <h6 class="fw-bold">Good to go?</h6>
                                            </div>
                                            <div class="col-7 text-white red-btn py-3">
                                                <h6 class="fw-bold">Let's apply</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_1 }}</h5>

                                        <div class="gray">
                                            {!! $school->overview_title_1_paragraph !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="gray p-3" style="background-color: #f2f4f8;">
                                            {!! $school->overview_text_content_1 !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-3" style="color: #384058">{{ $school->overview_title_2 }}</h5>

                                        <div>
                                            @foreach(json_decode($school->overview_title_2_bullets) as $bullet)
                                                @if($bullet != null)
                                                    
                                                    <p class="gray mb-3"><i class="fas fa-stop me-3" style="transform: rotate(45deg); color: #01468f; font-size: 0.8rem;"></i>{{ $bullet }}</p>
                                                        
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">

                                        <div class="row align-items-center">
                                            <div class="col-7 position-relative">
                                                <img src="{{ url('images/schools', $school->overview_title_3_image) }}" alt="" class="img-fluid w-100" style="height: 18rem; object-fit: cover;">

                                                <p class="text-white fw-bold position-absolute" style="bottom: 0.5rem; left: 2rem;">{{ $school->overview_title_3_image_name }}</p>
                                            </div>
                                            <div class="col-5">
                                                <h5 class="fw-bold mb-2" style="color: #384058">{{$school->overview_title_3_sub_title }}</h5>

                                                <p class="gray mb-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{{ $school->overview_title_3_paragraph }}</p>

                                                <p class="gray mb-3">{{ $school->overview_title_3_date }}</p>

                                                <div class="row justify-content-end">
                                                    <div class="col-1 text-end">
                                                        <a href="{{ $school->overview_title_3_link }}" class="gray"><i class="fas fa-long-arrow-alt-right"></i></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_4 }}</h5>

                                        <div class="gray mb-2">
                                            {!! $school->overview_title_4_paragraph !!}
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <img src="{{ url('images/schools', $school->overview_title_4_image) }}" alt="" class="img-fluid w-100" style="height: 18rem; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_5 }}</h5>

                                        <div class="gray mb-2">
                                            {!! $school->overview_title_5_paragraph !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_6 }}</h5>

                                        <div class="gray mb-2">
                                            {!! $school->overview_title_6_paragraph !!}
                                        </div>

                                        <div>
                                            <a href="{{ $school->overview_title_6_link }}" class="text-decoration-none fw-bold" style="font-size: 0.8rem"><span style="color: red;">{{ $school->overview_title_6_button }}</span><i class="fas fa-long-arrow-alt-right gray ms-3"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="row rounded">
                                            <div class="col-1 red-btn py-3"></div>
                                            <div class="col-3 text-white bg-primary py-3">
                                                <h6 class="fw-bold">Good to go?</h6>
                                            </div>
                                            <div class="col-7 text-white red-btn py-3">
                                                <h6 class="fw-bold">Let's apply</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_7 }}</h5>

                                        <div class="gray mb-2">
                                            {!! $school->overview_title_7_paragraph !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-5">
                                                <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_8 }}</h5>
                                            </div>
                                            <div class="col-7">
                                                <div class="gray mb-2">
                                                    {!! $school->overview_title_8_paragraph !!}
                                                </div>

                                                <div class="row justify-content-end">
                                                    <div class="col-3 text-end">
                                                        <a href="{{ $school->overview_title_8_link }}" class="text-decoration-none fw-bold" style="font-size: 0.8rem; color: red;">Read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_9 }}</h5>

                                        <div class="row align-items-center">
                                            <div class="col-6 position-relative">
                                                <img src="{{ url('images/schools', $school->overview_title_9_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; width: 100%; object-fit: cover;">

                                                <p class="text-white fw-bold position-absolute" style="bottom: 0.5rem; left: 2rem;">{{ $school->overview_title_9_image_name }}</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_9_sub_title }}</h5>

                                                <p class="gray mb-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{{ $school->overview_title_9_paragraph }}</p>

                                                <a href="{{ $school->overview_title_9_link }}" class="btn red-btn text-white">{{ $school->overview_title_9_button }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-3" style="background-color: #f2f4f8;">
                                            <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_10 }}</h5>

                                            <div class="gray mb-2">
                                                {!! $school->overview_title_10_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Program name</th>
                                                    <th scope="col" class="text-center">Length</th>
                                                    <th scope="col" class="text-center">Tuition, Canadian student</th>
                                                    <th scope="col">Tuition, international student</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(json_decode($school->overview_related_programs) as $related)
                                                    <tr style="font-size: 0.95rem;">
                                                        <td><i class="fas fa-chevron-right me-2" style="color: #384058"></i>{{ $related->name }}</td>
                                                        <td class="text-center">{{ $related->length }}</td>
                                                        <td class="text-center fw-bold">${{ $related->canadian }}</td>
                                                        <td class="text-center fw-bold">${{ $related->international }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_11 }}</h5>

                                        <div class="gray">
                                            {!! $school->overview_title_11_paragraph !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-3" style="color: #384058">{{ $school->overview_title_12 }}</h5>

                                        <div>
                                            @foreach(json_decode($school->overview_title_12_bullets) as $bullet)
                                                @if($bullet != null)
                                                    
                                                    <p class="gray mb-3"><i class="fas fa-stop me-3" style="transform: rotate(45deg); color: #01468f; font-size: 0.8rem;"></i>{{ $bullet }}</p>
                                                        
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_13 }}</h5>

                                        <div class="gray">
                                            {!! $school->overview_title_13_paragraph !!}
                                        </div>
                                    </div>
                                </div>

                                @if(count($overview_faqs) != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h5 class="fw-bold mb-2" style="color: #384058">Frequently asked questions</h5>

                                            <div class="accordion" id="accordionExample">
                                                @foreach($overview_faqs as $overview_faq)
                                                    <div class="accordion-item mb-3 rounded-0 border-0">
                                                        <h2 class="accordion-header border" id="heading-{{ $overview_faq->id }}">
                                                            <button class="accordion-button collapsed rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $overview_faq->id }}" aria-expanded="true" aria-controls="collapse-{{ $overview_faq->id }}" style="color: #384058; font-weight: 700">
                                                                {{ $overview_faq->question }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse-{{ $overview_faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $overview_faq->id }}" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body gray">
                                                                <p class="gray">{{ $overview_faq->answer }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row justify-content-center mb-5">
                                    <div class="col-7 text-center">
                                        <a href="" class="btn text-white red-btn w-100 py-3">Need help planning your career?</a>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">Related articles</h5>

                                        <div class="row align-items-center">
                                            @foreach($articles as $article)
                                                <div class="col-4">
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
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="row rounded">
                                            <div class="col-1 red-btn py-3"></div>
                                            <div class="col-3 text-white bg-primary py-3">
                                                <h6 class="fw-bold">Good to go?</h6>
                                            </div>
                                            <div class="col-7 text-white red-btn py-3">
                                                <h6 class="fw-bold">Let's apply</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="tab-pane fade" id="programs" role="tabpanel" aria-labelledby="programs-tab">
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->programs_title_1 }}</h5>
                                        <p class="gray">{{ $school->programs_page_paragraph }}</p>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                @if(count($high_school_programs) > 0)
                                                    <tr>
                                                        <td>
                                                            <h5 class="mb-2 fw-bold" style="color: #384058">High School</h5>
                                                            @foreach($high_school_programs as $high_school_program)
                                                                <p class="gray"><i class="fas fa-chevron-right me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$high_school_program->program_id)->first()->name }}</p>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endif

                                                @if(count($language_programs) > 0)
                                                    <tr>
                                                        <td>
                                                            <h5 class="mb-2 fw-bold" style="color: #384058">Language Programs</h5>
                                                            @foreach($language_programs as $language_program)
                                                                <p class="gray"><i class="fas fa-chevron-right me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$language_program->program_id)->first()->name }}</p>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endif

                                                @if(count($certificate_programs) > 0)
                                                    <tr>
                                                        <td>
                                                            <h5 class="mb-2 fw-bold" style="color: #384058">Certificate / Short Term</h5>
                                                            @foreach($certificate_programs as $certificate_program)
                                                                <p class="gray"><i class="fas fa-chevron-right me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$certificate_program->program_id)->first()->name }}</p>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endif

                                                @if(count($summer_programs) > 0)
                                                    <tr>
                                                        <td>
                                                            <h5 class="mb-2 fw-bold" style="color: #384058">Summer</h5>
                                                            @foreach($summer_programs as $summer_program)
                                                                <p class="gray"><i class="fas fa-chevron-right me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$summer_program->program_id)->first()->name }}</p>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endif

                                                @if(count($community_programs) > 0)
                                                    <tr>
                                                        <td>
                                                            <h5 class="mb-2 fw-bold" style="color: #384058">Community College</h5>
                                                            @foreach($community_programs as $community_program)
                                                                <p class="gray"><i class="fas fa-chevron-right me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$community_program->program_id)->first()->name }}</p>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endif

                                                @if(count($bachelor_programs) > 0)
                                                    <tr>
                                                        <td>
                                                            <h5 class="mb-2 fw-bold" style="color: #384058">Bachelor Degree</h5>
                                                            @foreach($bachelor_programs as $bachelor_program)
                                                                <p class="gray"><i class="fas fa-chevron-right me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$bachelor_program->program_id)->first()->name }}</p>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endif

                                                @if(count($master_programs) > 0)
                                                    <tr>
                                                        <td>
                                                            <h5 class="mb-2 fw-bold" style="color: #384058">Masters</h5>
                                                            @foreach($master_programs as $master_program)
                                                                <p class="gray"><i class="fas fa-chevron-right me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$master_program->program_id)->first()->name }}</p>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row justify-content-center mb-5">
                                    <div class="col-7 text-center">
                                        <a href="" class="btn text-white red-btn w-100 py-3">Need help planning your career?</a>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">Related articles</h5>

                                        <div class="row align-items-center">
                                            @foreach($articles as $article)
                                                <div class="col-4">
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
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="row rounded">
                                            <div class="col-1 red-btn py-3"></div>
                                            <div class="col-3 text-white bg-primary py-3">
                                                <h6 class="fw-bold">Good to go?</h6>
                                            </div>
                                            <div class="col-7 text-white red-btn py-3">
                                                <h6 class="fw-bold">Let's apply</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="programs" role="tabpanel" aria-labelledby="programs-tab">

                            </div>

                            <div class="tab-pane fade" id="programs" role="tabpanel" aria-labelledby="programs-tab">

                            </div>

                            <div class="tab-pane fade" id="scholarships" role="tabpanel" aria-labelledby="scholarships-tab">
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->scholarships_title_1 }}</h5>

                                        <div class="gray">
                                            {!! $school->scholarships_title_1_paragraph !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        
                                        <div class="gray p-3" style="background-color: #f2f4f8;">
                                            {!! $school->scholarships_text_content_1 !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center mb-5">
                                    <div class="col-7 text-center">
                                        <a href="" class="btn text-white red-btn w-100 py-3">Need help planning your career?</a>
                                    </div>
                                </div>


                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">Search scholarships</h5>

                                        <div class="p-3" style="background-color: #f2f4f8;">
                                            <form action="{{ route('frontend.school_scholarship_search') }}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <div class="input-group">
                                                            <input type="text" name="keyword" class="form-control p-4 rounded-0 border-0 search-input" aria-label="search" placeholder="Search your keyword">
                                                            <button type="submit" class="btn rounded-0 text-white bg-white  border-start "><i class="fas fa-search" style="color: black; font-size: 25px;"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row scholarship-search">
                                                    <div class="col-4">
                                                        <select name="award" id="award" class="form-select p-2">
                                                            <option value="awards">All awards</option>
                                                            <option value="Admission">Admission</option>
                                                            <option value="Current students">Current students</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-4">
                                                        <select name="level_of_study" id="level_of_study" class="form-select p-2">
                                                            <option value="study-levels">All study levels</option>
                                                            <option value="Graduate">Graduate</option>
                                                            <option value="Undergraduate">Undergraduates</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-4">
                                                        <select name="availability" id="availability" class="form-select p-2">
                                                            <option value="availability">Available to all</option>
                                                            <option value="International students">International students</option>
                                                            <option value="Canadian students">Canadian students</option>
                                                            <option value="Provincial students">Provincial students</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="school_id" value="{{ $school->id }}">
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">Scholarships</h5>

                                        @foreach($scholarships as $scholarship)
                                            <div class="p-3 mb-4" style="background-color: #f2f4f8;">

                                                <div class="row">
                                                    <div class="col-4">
                                                        @if($scholarship->image != null)
                                                            <img src="{{ url('images/schools', $scholarship->image) }}" alt="" class="img-fluid mb-3 w-100" style="height: 10rem; object-fit: cover;">
                                                        @else
                                                            <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 mb-3" style="height: 10rem; object-fit: cover;">
                                                        @endif

                                                        <div class="text-center">
                                                            <button type="button" class="btn btn-primary py-2 w-100 text-white" id="apply_btn">Apply now</button>
                                                        </div>
                                                    </div>

                                                    <div class="col-8">
                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <p class="fw-bold">Name</p>
                                                                    </div>
                                                                    <div class="col-1 p-0">
                                                                        <p class="fw-bold">:</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-8">
                                                                <h6 class="fw-bolder">{{ $scholarship->name }}</h6>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <p class="fw-bold">Summary</p>
                                                                    </div>
                                                                    <div class="col-1 p-0">
                                                                        <p class="fw-bold">:</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-8">
                                                                <p class="gray">{{ $scholarship->summary }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <p class="fw-bold">Basic Eligibility</p>
                                                                    </div>
                                                                    <div class="col-1 p-0">
                                                                        <p class="fw-bold">:</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-8">
                                                                @foreach(json_decode($scholarship->eligibility) as $eligibility)
                                                                    <p class="gray">{{ $eligibility }}</p>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <p class="fw-bold">Award</p>
                                                                    </div>
                                                                    <div class="col-1 p-0">
                                                                        <p class="fw-bold">:</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-8">
                                                                <p class="gray">{{ $scholarship->award }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <p class="fw-bold">Action</p>
                                                                    </div>
                                                                    <div class="col-1 p-0">
                                                                        <p class="fw-bold">:</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-8">
                                                                <p class="gray">{{ $scholarship->action }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <p class="fw-bold">Deadline</p>
                                                                    </div>
                                                                    <div class="col-1 p-0">
                                                                        <p class="fw-bold">:</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-8">
                                                                <p class="gray">{{ $scholarship->deadline }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <p class="fw-bold">Level of study</p>
                                                                    </div>
                                                                    <div class="col-1 p-0">
                                                                        <p class="fw-bold">:</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-8">
                                                                <p class="gray">{{ $scholarship->level_of_study }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <p class="fw-bold">Availability</p>
                                                                    </div>
                                                                    <div class="col-1 p-0">
                                                                        <p class="fw-bold">:</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-8">
                                                                <p class="gray">{{ $scholarship->availability }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">Frequently asked questions</h5>

                                        <div class="accordion" id="accordionExample">
                                            @foreach($scholarship_faqs as $scholarship_faq)
                                                <div class="accordion-item mb-3 rounded-0 border-0">
                                                    <h2 class="accordion-header border" id="heading-{{ $scholarship_faq->id }}">
                                                        <button class="accordion-button collapsed rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $scholarship_faq->id }}" aria-expanded="true" aria-controls="collapse-{{ $scholarship_faq->id }}" style="color: #384058; font-weight: 700">
                                                            {{ $scholarship_faq->question }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse-{{ $scholarship_faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $scholarship_faq->id }}" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body gray">
                                                            <p class="gray">{{ $scholarship_faq->answer }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>



                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="row rounded">
                                            <div class="col-1 red-btn py-3"></div>
                                            <div class="col-3 text-white bg-primary py-3">
                                                <h6 class="fw-bold">Good to go?</h6>
                                            </div>
                                            <div class="col-7 text-white red-btn py-3">
                                                <h6 class="fw-bold">Let's apply</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-5">
                                    <div class="col-12">
                                        
                                        <div class="gray p-3" style="background-color: #f2f4f8;">
                                            {!! $school->scholarships_text_content_2 !!}
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->scholarships_title_2 }}</h5>

                                        <div class="row align-items-center">
                                            <div class="col-6 position-relative">
                                                <img src="{{ url('images/schools', $school->scholarships_title_2_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; width: 100%; object-fit: cover;">

                                                <p class="text-white fw-bold position-absolute" style="bottom: 0.5rem; left: 2rem;">{{ $school->scholarships_title_2_image_name }}</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->scholarships_title_2_sub_title }}</h5>

                                                <p class="gray mb-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{{ $school->scholarships_title_2_paragraph }}</p>

                                                <a href="{{ $school->quick_facts_title_2_link }}" class="btn red-btn text-white">{{ $school->scholarships_title_2_button }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->scholarships_title_3 }}</h5>

                                        <div class="gray">
                                            {!! $school->scholarships_title_3_paragraph !!}
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-5">
                                    <div class="col-12">
                                        
                                        <div class="gray p-3" style="background-color: #f2f4f8;">
                                            {!! $school->scholarships_text_content_3 !!}
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->scholarships_title_4 }}</h5>

                                        <div class="row align-items-center">
                                            <div class="col-6 position-relative">
                                                <img src="{{ url('images/schools', $school->scholarships_title_4_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; width: 100%; object-fit: cover;">

                                                <p class="text-white fw-bold position-absolute" style="bottom: 0.5rem; left: 2rem;">{{ $school->scholarships_title_4_image_name }}</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->scholarships_title_4_sub_title }}</h5>

                                                <p class="gray mb-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{{ $school->scholarships_title_4_paragraph }}</p>

                                                <a href="{{ $school->quick_facts_title_2_link }}" class="btn red-btn text-white">{{ $school->scholarships_title_4_button }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-center mb-5">
                                    <div class="col-7 text-center">
                                        <a href="" class="btn text-white red-btn w-100 py-3">Need help planning your career?</a>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2" style="color: #384058">Related articles</h5>

                                        <div class="row align-items-center">
                                            @foreach($articles as $article)
                                                <div class="col-4">
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
                                </div>


                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="row rounded">
                                            <div class="col-1 red-btn py-3"></div>
                                            <div class="col-3 text-white bg-primary py-3">
                                                <h6 class="fw-bold">Good to go?</h6>
                                            </div>
                                            <div class="col-7 text-white red-btn py-3">
                                                <h6 class="fw-bold">Let's apply</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <p class="gray">{{ $school->contacts_page_paragraph }}</p>
                                    </div>
                                </div>

                                <div class="row justify-content-center mb-5">
                                    <div class="col-7 text-center">
                                        <a href="" class="btn text-white red-btn w-100 py-3">Need help planning your career?</a>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="font-size: 1.3rem; font-weight: 800">Contact this school</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($contacts as $contact)
                                                    <tr>
                                                        <td>
                                                            <h6 class="fw-bolder mb-2" style="color: #384058">{{ $contact->name }}</h6>
                                                            <p class="gray fw-bold mb-1" style="color: #384058">{{ $contact->department }}</p>
                                                            <p class="gray fw-bold mb-1" style="color: #384058">{{ $contact->address }}</p>
                                                            <p class="gray fw-bold mb-1" style="color: #384058">{{ $contact->city_province_postal_code }}</p>
                                                            <p class="gray fw-bold mb-1" style="color: #384058">{{ $contact->country }}</p>
                                                            <p class="gray fw-bold mb-1" style="color: #384058">Tel: {{ $contact->phone }}</p>
                                                            <p class="gray fw-bold mb-1" style="color: #384058">Fax: {{ $contact->fax }}</p>
                                                            <p class="gray fw-bold mb-1" style="color: #384058">Website: <span style="color: #bd2130">{{ $contact->website }}</span></p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="row rounded">
                                            <div class="col-1 red-btn py-3"></div>
                                            <div class="col-3 text-white bg-primary py-3">
                                                <h6 class="fw-bold">Good to go?</h6>
                                            </div>
                                            <div class="col-7 text-white red-btn py-3">
                                                <h6 class="fw-bold">Let's apply</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   
        </div>
    </div>

@endsection



@push('after-scripts')
    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>



    <script type='text/javascript'>
        $(document).ready(function() {
            if (location.href.match(/#tab-scholarships/)) {
                $('#scholarships-tab').addClass('active');
                $('#quick-facts-tab').removeClass('active');

                $('#quick-facts').removeClass('active');
                $('#quick-facts').removeClass('show');
                $('#scholarships').addClass('active');
                $('#scholarships').addClass('show');
            }
        });
    </script>
@endpush