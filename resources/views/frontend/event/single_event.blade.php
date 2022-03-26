@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Events: '.$event->title)

@push('after-styles')
    <link href="{{ url('css/events.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 single-business" style="margin-bottom: 5rem;">

        <div class="row">
            <div class="col-8">
                <!-- <h5 class="fw-bolder">{{ $event->title }}</h5>
                <hr> -->

                <div class="row">
                    <div class="col-12">
                        @if($event->image != null)
                            <img src="{{ url('images/events', $event->image) }}" alt="" class="img-fluid w-100" style="height: 25rem; object-fit: cover;">
                        @else
                            <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 banner">
                        @endif
                    </div>
                </div>

                <div class="row mt-4 justify-content-between align-items-center">
                    <div class="col-9">
                        <h4 class="fw-bold futura">{{ $event->title }}</h4>
                    </div>
                    @auth
                        @if(is_favorite_event( $event->id, auth()->user()->id))
                            <div class="col-2 text-end">
                                <form action="{{ route('frontend.favorite_event') }}" method="POST">
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $event->id }}">
                                    <input type="hidden" name='favorite' value="favorite">
                                    <button type="submit" class="fas fa-heart favorite-heart text-decoration-none"></button>
                                </form>
                            </div>
                        @else
                            <div class="col-2 text-end">
                                <form action="{{ route('frontend.favorite_event') }}" method="POST">
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $event->id }}">
                                    <input type="hidden" name='favorite' value="non-favorite">
                                    <button type="submit" class="far fa-heart favorite-heart text-decoration-none"></button>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="col-2 text-end">
                            <a href="{{ route('frontend.auth.login') }}" class="far fa-heart favorite-heart text-decoration-none"></a>
                        </div>
                    @endauth
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
                                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Event date & time</h6>
                                </div>

                                <div class="col-6">
                                    <h6 class="fw-normal gray ms-3">{{ $event->date }} - {{ $event->time }}</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Event location</h6>
                                </div>

                                <div class="col-6">
                                    <h6 class="fw-normal gray ms-3">{{ $event->city }} - {{ $event->country }}</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Event type</h6>
                                </div>

                                <div class="col-6">
                                    <h6 class="fw-normal gray ms-3">{{ $event->type }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-5">
                    @if($event->url != null)
                        <div class="col-4 text-end">
                            <a href="{{ $event->url }}" class="text-decoration-none buttons p-2 futura" type="button" target="_blank" style="font-size: 1.1rem;">Register to the event</a>
                        </div>

                        <div class="col-4 text-center">
                            <button class="text-decoration-none buttons p-2 futura" type="button" data-bs-toggle="modal" data-bs-target="#organizer" style="font-size: 1.1rem;">Contact organizer</button>
                        </div>

                        <div class="col-4 text-start">
                            <a href="{{ route('frontend.events') }}" class="text-decoration-none buttons p-2 futura" type="button" style="font-size: 1.1rem;">Add your event</a>
                        </div>

                    @else
                        <div class="col-6 text-end">
                            <button class="text-decoration-none buttons p-2 futura" type="button" data-bs-toggle="modal" data-bs-target="#organizer" style="font-size: 1.1rem;">Contact organizer</button>
                        </div>

                        <div class="col-6 text-start">
                            <a href="{{ route('frontend.events') }}" class="text-decoration-none buttons p-2 futura" type="button" style="font-size: 1.1rem;">Add your event</a>
                        </div>
                    @endif
                </div>

            </div>

            <div class="col-4">
                <h4 class="fw-bolder futura">More events</h4>
                <hr>

                @foreach($more_events as $more_event)
                    <a href="{{ route('frontend.single_event', $more_event->id) }}" class="text-decoration-none">
                        <div class="row align-items-center border py-3" style="margin: 0 0rem; margin-bottom: 1rem;">
                            <div class="col-6">
                                @if($more_event->image != null)
                                    <img src="{{ url('images/events', $more_event->image) }}" alt="" class="img-fluid w-100" style="height: 6rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 6rem; object-fit: cover;">
                                @endif
                            </div>

                            <div class="col-6">
                                <h6 class="fw-bold gray futura">{{ $more_event->title }}</h6>
                                <p class="gray" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; font-size: 0.8rem;">{{ $more_event->description }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>


    <div class="modal" id="organizer" tabindex="-1" aria-labelledby="organizer" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Event organizer contact details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold mb-3" style="color: #800f0e;">Event organizer email</h6>
                        </div>

                        <div class="col-6">
                            <h6 class="fw-normal gray ms-3">{{ $event->organizer_email }}</h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold mb-3" style="color: #800f0e;">Event organizer phone</h6>
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
