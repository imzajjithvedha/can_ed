@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Open days: '.$open_day->title)

@push('after-styles')
    <link href="{{ url('css/events.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 single-business" style="margin-bottom: 5rem;">

        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-12">
                        @if($open_day->image != null)
                            <img src="{{ url('images/open_days', $open_day->image) }}" alt="" class="img-fluid w-100" style="height: 25rem; object-fit: cover;">
                        @else
                            <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 banner">
                        @endif
                    </div>
                </div>

                <div class="row mt-4 justify-content-between align-items-center">
                    <div class="col-9">
                        <h4 class="fw-bold futura">{{ $open_day->title }}</h4>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-12">
                        <p class="gray" style="text-align: justify;">{{ $open_day->description }}</p>
                    </div>
                </div>

                <div class="details mt-4">

                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Open day date & time</h6>
                                </div>

                                <div class="col-6">
                                    <h6 class="fw-normal gray ms-3">{{ $open_day->date }} - {{ $open_day->time }}</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <h6 class="fw-bold mb-3" style="color: #800f0e;">Open day location</h6>
                                </div>

                                <div class="col-6">
                                    <h6 class="fw-normal gray ms-3">{{ $open_day->city }} - {{ $open_day->country }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-5">
                    @if($open_day->url != null)
                        <div class="col-4 text-end">
                            <a href="{{ $open_day->url }}" class="text-decoration-none buttons p-2 futura" type="button" target="_blank" style="font-size: 1.1rem;">Register to the open day</a>
                        </div>

                        <div class="col-4 text-center">
                            <button class="text-decoration-none buttons p-2 futura" type="button" data-bs-toggle="modal" data-bs-target="#organizer" style="font-size: 1.1rem;">Contact organizer</button>
                        </div>

                        <div class="col-4 text-start">
                            <a href="{{ route('frontend.all_open_days') }}" class="text-decoration-none buttons p-2 futura" type="button" style="font-size: 1.1rem;">Add your open day</a>
                        </div>

                    @else
                        <div class="col-6 text-end">
                            <button class="text-decoration-none buttons p-2 futura" type="button" data-bs-toggle="modal" data-bs-target="#organizer" style="font-size: 1.1rem;">Contact organizer</button>
                        </div>

                        <div class="col-6 text-start">
                            <a href="{{ route('frontend.all_open_days') }}" class="text-decoration-none buttons p-2 futura" type="button" style="font-size: 1.1rem;">Add your open day</a>
                        </div>
                    @endif
                </div>

            </div>

            <div class="col-4">
                <h4 class="fw-bolder futura">More open days</h4>
                <hr>

                @if(count($more_open_days) > 0)
                    @foreach($more_open_days as $more_open_day)
                        <a href="{{ route('frontend.single_open_day', $more_open_day->id) }}" class="text-decoration-none">
                            <div class="row align-items-center border py-3" style="margin: 0 0rem; margin-bottom: 1rem;">
                                <div class="col-6">
                                    @if($more_open_day->image != null)
                                        <img src="{{ url('images/open_days', $more_open_day->image) }}" alt="" class="img-fluid w-100" style="height: 6rem; object-fit: cover;">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 6rem; object-fit: cover;">
                                    @endif
                                </div>

                                <div class="col-6">
                                    <h6 class="fw-bold gray futura">{{ $more_open_day->title }}</h6>
                                    <p class="gray" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; font-size: 0.8rem;">{{ $more_open_day->description }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>


    <div class="modal" id="organizer" tabindex="-1" aria-labelledby="organizer" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Open day organizer contact details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold mb-3" style="color: #800f0e;">Open day organizer email</h6>
                        </div>

                        <div class="col-6">
                            <h6 class="fw-normal gray ms-3">{{ $open_day->school_email }}</h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold mb-3" style="color: #800f0e;">Open day organizer phone</h6>
                        </div>

                        <div class="col-6">
                            <h6 class="fw-normal gray ms-3">{{ $open_day->school_phone }}</h6>
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
