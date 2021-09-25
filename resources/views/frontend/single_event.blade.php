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
                        @if($event->image != null)
                            <img src="{{ url('images/events', $event->image) }}" alt="" class="img-fluid w-100" style="height: 25rem; object-fit: cover;">
                        @else
                            <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 banner">
                        @endif
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-12">
                        <p class="gray" style="text-align: justify;">{{ $event->description }}</p>
                    </div>
                </div>

                <div class="details mt-4">

                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Event date & time: </h6>
                                </div>

                                <div class="col-6">
                                    <h6 class="fw-normal gray ms-3">{{ $event->date }} - {{ $event->time }}</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Event location: </h6>
                                </div>

                                <div class="col-6">
                                    <h6 class="fw-normal gray ms-3">{{ $event->city }} - {{ $event->country }}</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Event type:</h6>
                                </div>

                                <div class="col-6">
                                    <h6 class="fw-normal gray ms-3">{{ $event->type }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-5">
                    <div class="col-6 text-end">
                        @if($event->url != null)
                            <a href="{{ $event->url }}" class="text-decoration-none buttons p-2" type="button" target="_blank">Register to the event</a>
                        @else
                            <button class="text-decoration-none buttons p-2" type="button" data-bs-toggle="modal" data-bs-target="#organizer">Contact Organizer</button>
                        @endif
                    </div>

                    <div class="col-6 text-start">
                        <a href="{{ route('frontend.events') }}" class="text-decoration-none buttons p-2" type="button">Add your event</a>
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


    <div class="modal" id="organizer" tabindex="-1" aria-labelledby="organizer" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Event organizer contact details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold mb-3" style="color: #800f0e;">Event organizer email: </h6>
                        </div>

                        <div class="col-6">
                            <h6 class="fw-normal gray ms-3">{{ $event->organizer_email }}</h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold mb-3" style="color: #800f0e;">Event organizer phone: </h6>
                        </div>

                        <div class="col-6">
                            <h6 class="fw-normal gray ms-3">{{ $event->organizer_phone }}</h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
