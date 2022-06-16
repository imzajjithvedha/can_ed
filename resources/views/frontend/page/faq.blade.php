@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Frequently asked questions')

@push('after-styles')
    <link href="{{ url('css/about_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container inner-parent" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">{{ $faq->title }}</h4>
        <hr>

    @if($faq->image != null)
        <img src="{{ url('images/pages', $faq->image) }}" alt="" class="img-fluid banner">
    @else
        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 banner">
    @endif

        <div class="gray mt-3 mt-md-5" style="text-align: justify;">
            {!! $faq->description !!}
        </div>
    </div>
@endsection
