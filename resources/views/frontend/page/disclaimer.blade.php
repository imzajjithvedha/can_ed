@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Disclaimer')

@push('after-styles')
    <link href="{{ url('css/about_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">{{ $disclaimer->title }}</h4>
        <hr>

    @if($disclaimer->image != null)
        <img src="{{ url('images/pages', $disclaimer->image) }}" alt="" class="img-fluid banner">
    @else
        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 banner">
    @endif

        <div class="gray mt-5" style="text-align: justify;">
            {!! $disclaimer->description !!}
        </div>
    </div>
@endsection
