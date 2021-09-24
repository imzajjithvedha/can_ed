@extends('frontend.layouts.app')

@section('title', 'Business Categories')

@push('after-styles')
    <link href="{{ url('css/business.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 business">

        <h5 class="fw-bolder">Business Categories</h5>

        <form action=""  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-8">
                    <hr>
                </div>
                <div class="col-4 input-group">
                    <input type="text" class="form-control text-center" id="search_business" aria-describedby="search_business" name="business" placeholder="Search by Business Category" value="">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>
        
        <div class="row mt-5">
            @foreach($categories as $category)
                <div class="col-3 mb-4">
                    <div class="card">
                        <a href="{{ route('frontend.businesses', $category->id) }}" class="text-decoration-none">
                            <img src="{{ url('images/business_categories', $category->image) }}" class="card-img-top" alt="..." style="height: 10rem;">
                            <div class="card-body text-center">
                                <h6 class="card-title fw-bold gray">{{ $category->name }}</h6>
                            </div>
                        </a>
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
@endsection
