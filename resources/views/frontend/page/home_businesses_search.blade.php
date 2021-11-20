@extends('frontend.layouts.app')

@section('title', 'Businesses - search results')

@push('after-styles')
    <link href="{{ url('css/search.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 business">

        <h4 class="fw-bolder futura">Businesses - search results</h4>
        <hr>

        <div class="row mt-5">

            @if(count($filteredBusinesses) == 0)
                        @include('frontend.includes.not_found_title',[
                            'not_found_title' => 'Search results not found!',
                            'not_found_description' => 'Please check with another keyword.'
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
