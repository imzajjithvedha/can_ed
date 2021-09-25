@extends('frontend.layouts.app')

@section('title', 'My Networks')

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
                @if(count($networks) == 0)
                    @include('frontend.includes.not_found',[
                        'not_found_title' => 'World Wide Networks not found',
                        'not_found_description' => 'Add your banner in World Wide Network page',
                        'not_found_button_caption' => 'Explore World Wide Network',
                        'url' => 'networks'
                    ])

                @else
                    
                    <div class="row justify-content-between">
                        <div class="col-8 p-0">
                            <h4 class="fs-4 fw-bolder user-settings-head">My Networks</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 border">
                            <div class="px-2 py-3" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                                @foreach($networks as $network)
                                    <div class="row border py-3 px-2 mb-3 align-items-center">
                                        <div class="col-4">
                                            <img src="{{ url('images/world-wide-network', $network->image) }}" alt="" class="img-fluid w-100" style="height: 8rem; object-fit: cover;">

                                            <div class="badge mt-2 p-0">
                                                @if($network->status == 'Approved')
                                                    <h5><span class="badge bg-success">Approved</span></h5>
                                                @else
                                                    <h5><span class="badge bg-warning text-dark">Pending</span></h5>
                                                @endif
                                            </div>
                                            
                                        </div>

                                        <div class="col-8">
                                            <h6 class="fw-bolder mb-2">{{ $network->website_name }}</h6>

                                            <p class="fw-bold">URL : <a href="{{ $network->url }}" class="p gray fw-normal">{{ $network->url }}</a></p>

                                            <p class="fw-bold">Name : <span class="p gray fw-normal">{{ $network->name }}</span></p>

                                            <p class="fw-bold">Email : <span class="p gray fw-normal">{{ $network->email }}</span></p>

                                            <p class="fw-bold">Phone : <span class="p gray fw-normal">{{ $network->phone }}</span></p>

                                            <p class="fw-bold">Country : <span class="p gray fw-normal">{{ $network->country }}</span></p>
                                            

                                            <div class="row justify-content-end mt-3">
                                                <div class="col-4">
                                                    <div class="row justify-content-end">
                                                        <div class="col">
                                                            <a href="{{ route('frontend.user.user_network_edit', $network->id) }}" class="btn px-3 rounded-0 text-light py-1" type="button" style="background-color: #4195E1">Edit</a>
                                                        </div>
                                                        <div class="col ps-2">
                                                            <a href="{{ route('frontend.user.user_network_delete', $network->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#deleteEvent" style="background-color: #ff2c4b"><i class="fas fa-trash-alt" style="background-color: #ff2c4b!important; padding: 0!important"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteEvent" tabindex="-1" aria-labelledby="deleteEventLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Network</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this banner?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="" class="btn btn-danger">Delete</a>
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