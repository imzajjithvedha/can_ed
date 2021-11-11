@extends('frontend.layouts.app')

@section('title', 'Businesses')

@push('after-styles')
    <link href="{{ url('css/business.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 business">

        <h5 class="fw-bolder">Businesses - {{ $category->name }}</h5>

        <form action="{{ route('frontend.business_search') }}"  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-8">
                    <hr>
                </div>
                <div class="col-4 input-group">
                    <input type="text" class="form-control text-center" id="search_businesses" aria-describedby="search_businesses" name="keyword" placeholder="Search businesses" value="">
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>
        
        <div class="row mt-5">

            @if(count($filteredBusinesses) == 0)
                        @include('frontend.includes.not_found_title',[
                            'not_found_title' => 'Businesses not found for this category',
                            'not_found_description' => 'Please check later.'
                        ])
            @else
                @foreach($filteredBusinesses as $business)
                    <div class="col-3 mb-4">
                        <div class="card">
                            <a href="{{ route('frontend.single_business', $business->id) }}" class="text-decoration-none">
                                @if($business->image != null)
                                    <img src="{{ url('images/businesses', $business->image) }}" class="card-img-top w-100" alt="..." style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold gray">{{ $business->name }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
