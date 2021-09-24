@extends('frontend.layouts.app')

@section('title', 'Privacy Policy')

@push('after-styles')
    <link href="{{ url('css/about_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h5 class="fw-bolder">{{ $privacy->title }}</h5>
        <hr>
        
    @if($privacy->image != null)
        <img src="{{ url('images/pages', $privacy->image) }}" alt="" class="img-fluid banner">
    @else
        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 banner">
    @endif

        <div class="gray mt-5" style="text-align: justify;">
            {!! $privacy->description !!}
        </div>
    </div>
@endsection
