@extends('frontend.layouts.app')

@section('title', 'Careers')

@push('after-styles')
    <link href="{{ url('css/careers.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 careers">

        <div class="row justify-content-between align-items-center">
            <div class="col-4">
                <h5 class="fw-bolder">Careers in Canada</h5>
            </div>

            <div class="col-5">
                <form action="">
                    <div class="row align-items-center">
                        <div class="col-12 input-group">
                            <input type="text" class="form-control text-center" id="search_article" aria-describedby="search_article" placeholder="Search articles">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>

        
        <div class="row mt-3">
            <div class="col-7">
                <ul class="nav nav-pills mb-3 w-100" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active p-2" id="pills-career-tab" data-bs-toggle="pill" data-bs-target="#pills-career" type="button" role="tab" aria-controls="pills-career" aria-selected="true">How these career came about</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link p-2" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="false">All Careers</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link p-2" id="pills-hot-tab" data-bs-toggle="pill" data-bs-target="#pills-hot" type="button" role="tab" aria-controls="pills-hot" aria-selected="false">Hot Careers</button>
                    </li>
                </ul>


                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-career" role="tabpanel" aria-labelledby="pills-career-tab">
                        <h6 class="fw-bold" style="font-size: 1.1rem;">Major group 00 senior management occupations</h6>

                        <div class="mt-2">
                            <p class="fw-bold mb-2">001 legislators and senior management</p>

                            <p class="gray">0011 legislators</p>
                            <p class="gray">0012 senior government managers and officials</p>
                            <p class="gray">0013 senior managers - financial, communications and other business services</p>
                            <p class="gray">0014 senior managers - health, education, social and community services and membership organizations</p>
                            <p class="gray">0015 senior managers - trade, broadcasting and other services, n.e.c.</p>
                            <p class="gray">0016 senior managers - construction, transportation, production and utilities</p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
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

                    <div class="tab-pane fade" id="pills-hot" role="tabpanel" aria-labelledby="pills-hot-tab">
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

            <div class="col-5">
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

        <p class="bg-info text-white p-2">This section will update after we discussed about careers dynamic section.</p>
    </div>
@endsection
