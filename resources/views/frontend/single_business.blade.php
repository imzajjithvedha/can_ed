@extends('frontend.layouts.app')

@section('title', 'Business: '.$business->name)

@push('after-styles')
    <link href="{{ url('css/business.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 single-business">

        <div class="row">
            <div class="col-8">
                <h5 class="fw-bolder">{{ $business->business_name }}</h5>
                <hr>

                <div class="row">
                    <div class="col-9">
                        <img src="{{ url('images/businesses', $business->image) }}" alt="" class="img-fluid">
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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item border" role="presentation" style="width:25%!important; margin: auto!important;">
                                <button class="nav-link m-auto" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Quick Facts</button>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                </div>

            </div>

            <div class="col-3">
                <h5 class="fw-bolder">Related Businesses</h5>
                <hr>

                <div class="card">
                    <a href="#" class="text-decoration-none">
                        <img src="{{ url('img/frontend/index/business.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold gray">Manager</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
