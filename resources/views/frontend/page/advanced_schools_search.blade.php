@extends('frontend.layouts.app')

@section('title', 'Schools')

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 business" style="margin-top: 5rem; margin-bottom: 3rem;">

        <h4 class="fw-bolder futura">Advanced search results - Schools</h4>

        <hr>

        <div class="row mt-5">
            @if(count($filteredSchools) == 0)
                    @include('frontend.includes.not_found_title',[
                        'not_found_title' => 'Schools not found',
                        'not_found_description' => 'Please check later.'
                    ])
            @else
                @foreach($filteredSchools as $school)
                    <div class="col-3 mb-4">
                        <div class="card">
                            <a href="{{ route('frontend.single_school', [$school->id, $school->slug]) }}" class="text-decoration-none">
                                @if($school->featured_image != null)
                                    <img src="{{ uploaded_asset($school->featured_image) }}" class="card-img-top img-fluid w-100" style="height: 10rem; object-fir: cover;" alt="...">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
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
