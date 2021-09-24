@extends('frontend.layouts.app')

@section('title', 'Businesses')

@push('after-styles')
    <link href="{{ url('css/business.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 business">

        <h5 class="fw-bolder">Businesses</h5>

        <form action="{{ route('frontend.business_search') }}"  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-6">
                    <hr>
                </div>
                <div class="col-3 input-group">
                    <input type="text" class="form-control text-center" id="search_business" aria-describedby="search_business" name="business" placeholder="Search by Business Name" value="">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>

                <div class="col-3 input-group">
                    
                    <input type="text" class="form-control text-center" id="search_article" aria-describedby="search_location" placeholder="Search by Location" name="location" value="">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="row mt-5">
            @foreach($filteredBusinesses as $business)
                <div class="col-3 mb-4">
                    <div class="card">
                        <a href="{{ route('frontend.single_business', $business->id) }}" class="text-decoration-none">
                            <img src="{{ url('images/businesses', $business->image) }}" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h6 class="card-title fw-bold gray">{{ $business->business_name }}</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
