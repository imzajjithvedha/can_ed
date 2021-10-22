@extends('frontend.layouts.app')

@section('title', 'My Favorite Businesses')

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
                        'not_found_title' => 'Favorite businesses not found',
                        'not_found_description' => 'Add businesses to your favorite list',
                        'not_found_button_caption' => 'Explore Businesses',
                        'url' => 'business-categories'
                    ])

                @else

                    <div class="row justify-content-between">
                        <div class="col-8 p-0">
                            <h4 class="fs-4 fw-bolder user-settings-head">My Favorite Businesses</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 border">
                            <div class="px-2 py-3" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                                @foreach($businesses as $business)
                                    @if(is_favorite_business( $business->id, auth()->user()->id))
                                        <div class="row border py-3 px-2 mb-3">
                                            <div class="col-4">
                                                @if($business->image != null)
                                                    <img src="{{ url('images/businesses', $business->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                @else
                                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                @endif

                                                <p class="gray mt-4">Updated: {{ $business->updated_at }}</p>
                                            </div>

                                            <div class="col-8">
                                                <h6 class="fw-bolder">{{ $business->title }}</h6>
                                                <div class="gray mt-2" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{!! $business->description !!}</div>

                                                <p class="mt-2">By: {{ $business->contact_name }}</p>

                                                <div class="row justify-content-end">
                                                    <div class="col-9">
                                                        <div class="row justify-content-end">
                                                            <div class="col-3">
                                                                <a href="{{ route('frontend.single_business', $business->id) }}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</a>
                                                            </div>
                                                            <div class="col-3 ps-2">
                                                                <a href="{{ route('frontend.user.favorite_business_delete', $business->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#deleteFavorite" style="background-color: #ff2c4b"><i class="fas fa-trash-alt" style="background-color: #ff2c4b!important; padding: 0!important"></i></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Favorite Business</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this business from your favorite list?
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