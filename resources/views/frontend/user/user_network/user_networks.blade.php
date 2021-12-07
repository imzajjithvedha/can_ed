@extends('frontend.layouts.app')

@section('title', 'My networks')

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
                        'not_found_title' => 'World wide networks not found',
                        'not_found_description' => 'Add your banner in world wide network page',
                        'not_found_button_caption' => 'Explore world wide network',
                        'url' => 'world-wide-network'
                    ])

                @else
                    
                    <div class="row justify-content-between">
                        <div class="col-8 p-0">
                            <h4 class="user-settings-head">My networks</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 border">
                            <div class="px-3 pt-3" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                                @foreach($networks as $network)
                                    <div class="row border py-3 mb-3 align-items-center">
                                        <div class="col-4">
                                            <img src="{{ url('images/world-wide-network', $network->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">

                                            <div class="mt-2">
                                                @if($network->status == 'Approved')
                                                    <h5><span class="badge bg-success">Approved</span></h5>
                                                @else
                                                    <h5><span class="badge bg-warning text-dark">Pending</span></h5>
                                                @endif
                                            </div>
                                            
                                        </div>

                                        <div class="col-8">
                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <div class="row align-items-center">
                                                        <div class="col-4"><p class="fw-bold">Website name</p></div>
                                                        <div class="col-1"> : </div>
                                                        <div class="col-7"><p class="gray fw-bold">{{ $network->website_name }}</p></div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <div class="col-4"><p class="fw-bold">URL</p></div>
                                                        <div class="col-1"> : </div>
                                                        <div class="col-7"><a href="{{ $network->url }}" class="gray fw-bold text-decoration-none" style="font-size: 0.9rem;">{{ $network->url }}</a>
                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <div class="col-4"><p class="fw-bold">Name</p></div>
                                                        <div class="col-1"> : </div>
                                                        <div class="col-7"><p class="gray fw-bold">{{ $network->name }}</p></div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <div class="col-4"><p class="fw-bold">Email</p></div>
                                                        <div class="col-1"> : </div>
                                                        <div class="col-7"><p class="gray fw-bold">{{ $network->email }}</p></div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <div class="col-4"><p class="fw-bold">Phone</p></div>
                                                        <div class="col-1"> : </div>
                                                        <div class="col-7"><p class="gray fw-bold">{{ $network->phone }}</p></div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <div class="col-4"><p class="fw-bold">Country</p></div>
                                                        <div class="col-1"> : </div>
                                                        <div class="col-7"><p class="gray fw-bold">{{ $network->country }}</p></div>
                                                    </div>

                                                </div>
                                            </div>
                                            

                                            <div class="row justify-content-end">
                                                <div class="col-9">
                                                    <div class="row justify-content-end">
                                                        <div class="col-3">
                                                            <a href="{{ route('frontend.user.user_network_edit', $network->id) }}" class="btn px-3 rounded-0 text-light py-1" type="button" style="background-color: #4195E1">Edit</a>
                                                        </div>
                                                        <div class="col-3 ps-2">
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


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#networkModal"></button>

        <div class="modal fade" id="networkModal" tabindex="-1" aria-labelledby="networkModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Network updated successfully.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="modal fade" id="deleteEvent" tabindex="-1" aria-labelledby="deleteEventLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete network</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this network?
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

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>
@endpush