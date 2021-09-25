@extends('frontend.layouts.app')

@section('title', 'Meet Our Team')

@push('after-styles')
    <link href="{{ url('css/about_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h5 class="fw-bolder">{{ $team->title }}</h5>
        <hr>

        @if($team->image != null)
            <img src="{{ url('images/pages', $team->image) }}" alt="" class="img-fluid banner">
        @else
            <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 banner">
        @endif

        <div class="gray mt-5" style="text-align: justify;">
            {!! $team->description !!}
        </div>


        <div class="row mt-5">
            @foreach($members as $member)
                <div class="col-3">
                    <div class="card">
                        @if($member->image != null)
                            <img src="{{ url('images/our_team', $member->image) }}" class="card-img-top" alt="..." style="height: 15rem; object-fit:cover;">
                        @else
                            <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit:cover;">
                        @endif
                        <div class="card-body text-center">
                            <h6 class="fw-bold">{{ $member->name }}</h6>
                            <p class="gray">{{ $member->title }}</p>
                            <p class="gray mt-2" style="font-size: 0.85rem;">{{ $member->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
