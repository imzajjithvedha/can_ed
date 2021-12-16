@extends('frontend.layouts.app')

@section('title', 'Terms of use')

@push('after-styles')
    <link href="{{ url('css/about_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">{{ $terms_of_use->title }}</h4>
        <hr>

    @if($terms_of_use->image != null)
        <img src="{{ url('images/pages', $terms_of_use->image) }}" alt="about-us-banner" class="img-fluid banner">
    @else
        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="about-us-banner" class="img-fluid w-100 banner">
    @endif

        <div class="gray mt-5" style="text-align: justify;">
            {!! $terms_of_use->description !!}
        </div>
    </div>
@endsection
