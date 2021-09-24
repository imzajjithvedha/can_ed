@extends('frontend.layouts.app')

@section('title', 'Events: '.$event->title)

@push('after-styles')
    <link href="{{ url('css/single_event.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 single-business">

        <div class="row">
            <div class="col-8">
                <h5 class="fw-bolder">{{ $event->title }}</h5>
                <hr>

                <div class="row">
                    <div class="col-12">
                        <img src="{{ url('images/events', $event->image) }}" alt="" class="img-fluid">
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-12">
                        <p class="gray" style="text-align: justify;">{{ $event->description }}</p>
                    </div>
                </div>

                <div class="details mt-4">
                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Event Date & Time: <span class="fw-normal gray ms-3">{{ $event->date }} - {{ $event->time }}</span></h6>

                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Event Location: <span class="fw-normal gray ms-3">{{ $event->city }} - {{ $event->country }}</span></h6>

                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Event Type: <span class="fw-normal gray ms-3">{{ $event->type }}</span></h6>
                </div>


                <div class="row mt-5">
                    <div class="col-6 text-end">
                        <a href="{{ $event->url }}" class="text-decoration-none buttons p-2" type="button" target="_blank">Register to the event</a>
                    </div>

                    <div class="col-6 text-start">
                        <a href="{{ route('frontend.events') }}" class="text-decoration-none buttons p-2" type="button">Add Your Event</a>
                    </div>
                </div>

            </div>

            <div class="col-4">
                <h5 class="fw-bolder">More Events</h5>
                <hr>

                @foreach($more_events as $event)
                    <a href="{{ route('frontend.single_event', $event->id) }}" class="text-decoration-none">
                        <div class="row align-items-center border py-2" style="margin: 0 0rem; margin-bottom: 1rem;">
                            <div class="col-6">
                                <img src="{{ url('images/events', $event->image) }}" alt="" class="img-fluid">
                            </div>

                            <div class="col-6">
                                <p class="fw-bold gray">{{ $event->title }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
