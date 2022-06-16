@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Cookies policy')

@push('after-styles')
    <link href="{{ url('css/cookies.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container inner-parent" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">{{ $cookies->title }}</h4>
        <hr>

    @if($cookies->image != null)
        <img src="{{ url('images/pages', $cookies->image) }}" alt="about-us-banner" class="img-fluid banner">
    @else
        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="about-us-banner" class="img-fluid w-100 banner">
    @endif

        <div class="gray mt-3 mt-md-5" style="text-align: justify;">
            {!! $cookies->description !!}
        </div>
    </div>
@endsection
