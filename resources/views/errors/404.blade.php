@extends('frontend.layouts.app')

@section('title', 'Page not found')

@push('after-styles')
    <link href="{{ url('css/page_not_found.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid text-center">
        <img src="{{ url('img/frontend/page_not_found.png') }}" alt="" class="img-fluid" style="height: 30rem;">
    </div>
@endsection
