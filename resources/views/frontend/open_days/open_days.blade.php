@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Open days')

@push('after-styles')
    <link href="{{ url('css/events.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container business" style="margin-top: 5rem; margin-bottom: 3rem;">

        <h4 class="fw-bolder futura">Open days</h4>

        @if(is_school_registered(auth()->user()->id))
            <div class="row align-items-center">
                <div class="col-10 pe-0">
                    <hr>
                </div>
                <div class="col-2 text-end ps-0">
                    <a href="{{ route('frontend.user.open_days') }}" type="button" class="btn text-white post-btn">Post your open day</a>
                </div>
            </div>
        @else
            <div class="row align-items-center">
                <div class="col-12">
                    <hr>
                </div>
            </div>
        @endif

        <div class="row mt-5">

            @if(count($open_days) == 0)
                @include('frontend.includes.not_found_title',[
                    'not_found_title' => 'Open days not found',
                    'not_found_description' => 'Please check later.'
                ])
            @else
                @foreach($open_days as $open_day)
                    <div class="col-3 mb-4">
                        <div class="card blue rounded-0">
                            <a href="{{ route('frontend.single_open_day', $open_day->id) }}" class="text-decoration-none">
                                @if($open_day->image != null)
                                    <img src="{{ url('images/open_days', $open_day->image) }}" class="w-100" alt="..." style="height: 13rem; object-fit: cover;">
                                        
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 13rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ $open_day->title }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
