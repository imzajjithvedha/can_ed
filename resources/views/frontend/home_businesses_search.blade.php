@extends('frontend.layouts.app')

@section('title', 'Businesses - Search results')

@push('after-styles')
    <link href="{{ url('css/search.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 business">

        <h5 class="fw-bolder">Businesses - Search Results</h5>
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
                                <img src="{{ url('images/businesses', $business->image) }}" class="card-img-top" alt="...">
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
