@extends('frontend.layouts.app')

@section('title', 'School: ')

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 single-school">

        <div class="row">
            <div class="col-8">
                <h5 class="fw-bolder">Royal College</h5>
                <hr>

                <div class="row">
                    <div class="col-9">
                        <img src="{{ url('img/frontend/index/school.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-3">
                        <p class="fw-bold">Social Media</p>
                        <hr class="my-2">
                        <a href="#" class="d-block border mb-2 p-2 text-center school-social text-decoration-none"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="d-block border mb-2 p-2 text-center school-social text-decoration-none"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="d-block border mb-2 p-2 text-center school-social text-decoration-none"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="d-block border mb-2 p-2 text-center school-social text-decoration-none"><i class="fab fa-youtube"></i></a>



                        <p class="fw-bold mt-3">Contact</p>
                        <hr class="my-2">
                        <p class="fw-bold" style="color: #800000;"><i class="fas fa-envelope me-2"></i>Send a message</p>

                        <p class="fw-bold mt-3">Links</p>
                        <hr class="my-2">
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-3 w-100" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active p-2" id="pills-quick-tab" data-bs-toggle="pill" data-bs-target="#pills-quick" type="button" role="tab" aria-controls="pills-quick" aria-selected="true">Quick Facts</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-2" id="pills-programs-tab" data-bs-toggle="pill" data-bs-target="#pills-programs" type="button" role="tab" aria-controls="pills-programs" aria-selected="false">Programs</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-2" id="pills-admissions-tab" data-bs-toggle="pill" data-bs-target="#pills-admissions" type="button" role="tab" aria-controls="pills-admissions" aria-selected="false">Admissions</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-2" id="pills-financial-tab" data-bs-toggle="pill" data-bs-target="#pills-financial" type="button" role="tab" aria-controls="pills-financial" aria-selected="false">Financial</button>
                            </li>
                        </ul>


                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-quick" role="tabpanel" aria-labelledby="pills-quick-tab">
                                <div class="row">
                                    <div class="col-3 border px-5">
                                        <h6>Location</h6>
                                    </div>
                                    <div class="col-3 border px-5">
                                        <h6>Location</h6>
                                    </div>
                                    <div class="col-3 border px-5">
                                        <h6>Location</h6>
                                    </div>
                                    <div class="col-3 border px-5">
                                        <h6>Location</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-programs" role="tabpanel" aria-labelledby="pills-programs-tab">
                                <h6 class="fw-bold" style="font-size: 1.1rem;">Major group 01-05 specialized middle management occupations</h6>

                                <div class="mt-2">
                                    <p class="fw-bold mb-2">011 administrative services managers</p>
                                    <p class="gray">0111 financial managers</p>
                                    <p class="gray">0112 human resources managers</p>
                                    <p class="gray">0113 purchasing managers</p>
                                    <p class="gray">0114 other administrative services managers</p>
                                </div>


                                <div class="mt-2">
                                    <p class="fw-bold mb-2">012 managers in financial and business services</p>
                                    <p class="gray">0121 insurance, real estate and financial brokerage managers</p>
                                    <p class="gray">0122 banking, credit and other investment managers</p>
                                    <p class="gray">0124 advertising, marketing and public relations managers</p>
                                    <p class="gray">0125 other business services managers</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-admissions" role="tabpanel" aria-labelledby="pills-admissions-tab">
                                <h6 class="fw-bold" style="font-size: 1.1rem;">Major group 06 middle management occupations in retail and wholesale trade and customer services</h6>

                                <div class="mt-2">
                                    <p class="fw-bold mb-2">060 corporate sales managers</p>

                                    <p class="gray">0601 corporate sales managers</p>

                                </div>

                                <div class="mt-2">
                                    <p class="fw-bold mb-2">062 retail and wholesale trade managers</p>

                                    <p class="gray">0621 retail and wholesale trade managers</p>
                                    
                                </div>

                                <div class="mt-2">
                                    <p class="fw-bold mb-2">063 managers in food service and accommodation</p>

                                    <p class="gray">0631 restaurant and food service managers</p>
                                    <p class="gray">0632 accommodation service managers</p>
                                    
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-financial" role="tabpanel" aria-labelledby="pills-financial-tab">
                                <h6 class="fw-bold" style="font-size: 1.1rem;">Major group 07-09 middle management occupations in trades, transportation, production and utilities</h6>

                                <div class="mt-2">
                                    <p class="fw-bold mb-2">071 managers in construction and facility operation and maintenance</p>
                                    <p class="gray">0711 construction managers</p>
                                    <p class="gray">0712 home building and renovation managers</p>
                                    <p class="gray">0714 facility operation and maintenance managers</p>
                                </div>


                                <div class="mt-2">
                                    <p class="fw-bold mb-2">073 managers in transportation</p>
                                    <p class="gray">0731 managers in transportation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <h5 class="fw-bolder">Helpful Articles</h5>
                <hr>

                <a href="{{ route('frontend.articles') }}" class="text-decoration-none">
                    <div class="row align-items-center border py-2" style="margin: 0 0rem; margin-bottom: 1rem;">
                        <div class="col-6">
                            <img src="{{ url('img/frontend/index/education.jpg') }}" alt="" class="img-fluid">
                        </div>

                        <div class="col-6">
                            <p class="fw-bold gray">How to become a Software Engineer</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('frontend.articles') }}" class="text-decoration-none">
                    <div class="row align-items-center border py-2" style="margin: 0 0rem; margin-bottom: 1rem;">
                        <div class="col-6">
                            <img src="{{ url('img/frontend/index/education.jpg') }}" alt="" class="img-fluid">
                        </div>

                        <div class="col-6">
                            <p class="fw-bold gray">How to become a Software Engineer</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('frontend.articles') }}" class="text-decoration-none">
                    <div class="row align-items-center border py-2" style="margin: 0 0rem; margin-bottom: 1rem;">
                        <div class="col-6">
                            <img src="{{ url('img/frontend/index/education.jpg') }}" alt="" class="img-fluid">
                        </div>

                        <div class="col-6">
                            <p class="fw-bold gray">How to become a Software Engineer</p>
                        </div>
                    </div>
                </a>
            </div>
                    
        </div>
    </div>

@endsection
