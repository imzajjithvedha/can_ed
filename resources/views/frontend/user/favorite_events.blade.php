@extends('frontend.layouts.app')

@section('title', 'My favorite events')

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                @if(count($favorite) == 0)
                    @include('frontend.includes.not_found',[
                        'not_found_title' => 'Favorite events not found',
                        'not_found_description' => 'Add events to your favorite list',
                        'not_found_button_caption' => 'Explore events',
                        'url' => 'events'
                    ])

                @else

                    <div class="row justify-content-between">
                        <div class="col-8 p-0">
                            <h4 class="user-settings-head">My favorite events</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 border">
                            <div class="px-3 pt-3" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
                                @foreach($events as $event)
                                    @if(is_favorite_event($event->id, auth()->user()->id))
                                        <div class="row border py-3 mb-3">
                                            <div class="col-4 text-center">
                                                <img src="{{ url('images/events', $event->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">

                                                <p class="gray mt-2">Updated: {{ $event->updated_at }}</p>
                                            </div>

                                            <div class="col-8">
                                                <h6 class="fw-bolder">{{ $event->title }}</h6>
                                                <p class="gray my-2" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $event->description }}</p>

                                                <p class="fw-bold mb-2">Location : <span class="p gray fw-normal">{{ $event->city }}, {{ $event->country }}</span></p>
                                                <p class="fw-bold mb-2">Date & Time : <span class="p gray fw-normal">{{ $event->date }} - {{ $event->time }}</span></p>


                                                <div class="row justify-content-end">
                                                    <div class="col-9">
                                                        <div class="row justify-content-end">
                                                            <div class="col-3">
                                                                <a href="{{ route('frontend.single_event', $event->id) }}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</a>
                                                            </div>
                                                            <div class="col-3 ps-2">
                                                                <a href="{{ route('frontend.user.favorite_event_delete', $event->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#deleteFavorite" style="background-color: #ff2c4b"><i class="fas fa-trash-alt" style="background-color: #ff2c4b!important; padding: 0!important"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteFavorite" tabindex="-1" aria-labelledby="deleteFavoriteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete favorite event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this event from your favorite list?
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn text-white w-25" data-bs-dismiss="modal" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
                    <a href="" class="btn text-white w-25" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Delete</a>
                </div>
            </div>
        </div>
    </div>       

@endsection

@push('after-scripts')
    <script>
        $('.delete').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
@endpush