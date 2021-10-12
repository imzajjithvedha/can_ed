@extends('frontend.layouts.app')

@section('title', 'Schools - Search Results')

@push('after-styles')
    <link href="{{ url('css/search.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 business">

        <h5 class="fw-bolder">Schools - Search Results</h5>
        <hr>

        <div class="row mt-5">

            @if(count($filteredSchools) == 0)
                        @include('frontend.includes.not_found_title',[
                            'not_found_title' => 'Search results not found!',
                            'not_found_description' => 'Please check with another keyword.'
                        ])
            @else
                @foreach($filteredSchools as $school)
                    <div class="col-3 mb-4">
                        <div class="card">
                            <a href="{{ route('frontend.single_school', $school->id) }}" class="text-decoration-none">
                                <img src="{{ url('images/schools', $school->image) }}" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold gray">{{ $school->name }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
