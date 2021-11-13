@extends('frontend.layouts.app')

@section('title', 'Our Sponsors')

@push('after-styles')
    <link href="{{ url('css/about_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 3rem;">
        <h5 class="fw-bolder">{{ $our_sponsors->title }}</h5>
        <hr>

        @if($our_sponsors->image != null)
            <img src="{{ url('images/pages', $our_sponsors->image) }}" alt="" class="img-fluid banner">
        @else
            <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 banner">
        @endif

        <div class="gray mt-5" style="text-align: justify;">
            {!! $our_sponsors->description !!}
        </div>


        <div class="row mt-5">
            @foreach($sponsors as $sponsor)
                <div class="col-3" style="margin-bottom: 2rem;">
                    <div class="card">
                        @if($sponsor->url != null)
                            <a href="{{ $sponsor->url }}" class="text-decoration-none" target="_blank">
                                @if($sponsor->image != null)
                                    <img src="{{ url('images/our_sponsors', $sponsor->image) }}" class="card-img-top" alt="..." style="height:15rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height:15rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center p-3">
                                    <h6 class="fw-bold text-dark">{{ $sponsor->name }}</h6>
                                    <p class="gray">{{ $sponsor->country }}</p>
                                </div>
                            </a>
                        @else
                            @if($sponsor->image != null)
                                <img src="{{ url('images/our_sponsors', $sponsor->image) }}" class="card-img-top" alt="..." style="height:15rem; object-fit: cover;">
                            @else
                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height:15rem; object-fit: cover;">
                            @endif
                            <div class="card-body text-center p-3">
                                <h6 class="fw-bold text-dark">{{ $sponsor->name }}</h6>
                                <p class="gray">{{ $sponsor->country }}</p>
                            </div> style="height:15rem; object-fit: cover;"
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
