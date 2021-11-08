@extends('frontend.layouts.app')

@section('title', 'Business Categories')

@push('after-styles')
    <link href="{{ url('css/business.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 business" style="margin-top: 5rem; margin-bottom: 5rem;">

        <h5 class="fw-bolder">Business Categories</h5>

        <form action="{{ route('frontend.category_search') }}"  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-8">
                    <hr>
                </div>
                <div class="col-4 input-group">
                    <input type="text" class="form-control text-center" id="search_business" aria-describedby="search_business" name="keyword" placeholder="Search by Business Category" value="">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>


        <div class="row mt-5">
            @if(count($filteredCategories) == 0)
                    @include('frontend.includes.not_found_title',[
                        'not_found_title' => 'Business Categories not found',
                        'not_found_description' => 'Please check later.'
                    ])
            @else
                @foreach($filteredCategories as $category)
                    <div class="col-3 mb-4">
                        <div class="card">
                            <a href="{{ route('frontend.businesses', $category->id) }}" class="text-decoration-none">
                                @if($category->image != null)
                                    <img src="{{ url('images/business_categories', $category->image) }}" class="card-img-top w-100" alt="..." style="height: 10rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold gray">{{ $category->name }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                @endforeach
            @endif
        </div>
    </div>
@endsection