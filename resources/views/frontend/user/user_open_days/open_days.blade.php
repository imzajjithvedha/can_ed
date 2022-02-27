@extends('frontend.layouts.app')

@section('title', 'Open days')

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
                @if(count($open_days) == 0)
                    @include('frontend.includes.not_found',[
                        'not_found_title' => 'Open days not found',
                        'not_found_description' => 'You can request open days here',
                        'not_found_button_caption' => 'Add new open day',
                        'url' => 'open-days/create-open-day'
                    ])

                @else

                    <div class="row justify-content-between align-items-center mb-3">
                        <div class="col-8 p-0">
                            <h4 class="user-settings-head">Open days</h4>
                        </div>
                        <div class="col-4 p-0 text-end">
                            <a href="{{ route('frontend.user.create_open_day') }}" class="btn btn-primary" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Create new</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 border">
                            <div class="px-3 pt-3" id="nav-businesses" role="tabpanel" aria-labelledby="nav-businesses-tab">
                                @foreach($open_days as $open_day)
                                    <div class="row border py-3 mb-3">
                                        <div class="col-4 text-center">

                                            @if($open_day->image != null)
                                                <img src="{{ url('images/open_days', $open_day->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                            @else
                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                            @endif
                                            

                                            <div class="mt-2">
                                                @if($open_day->status == 'Approved')
                                                    <h5><span class="badge bg-success">Approved</span></h5>
                                                @else
                                                    <h5><span class="badge bg-warning text-dark">Pending</span></h5>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h6 class="fw-bolder">{{ $open_day->title }}</h6>
                                            <p class="gray my-2" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical;">{{ $open_day-> description}}</p>

                                            <p class="gray my-2">Address : {{ $open_day->address }}</p>
                                            <p class="gray my-2">Date & time : {{ $open_day->date }} - {{ $open_day->time }}</p>
                                            <a href="{{ $open_day->url }}" class="gray my-2" style="font-size: 0.9rem;">Link : {{ $open_day->url }}</a>

                                            <div class="row justify-content-end">
                                                <div class="col-9">
                                                    <div class="row justify-content-end">
                                                        <div class="col-3">
                                                            <a href="{{ route('frontend.user.user_business_edit', $open_day->id) }}" class="btn px-3 rounded-0 text-light py-1" type="button" style="background-color: #4195E1">Edit</a>
                                                        </div>
                                                        <div class="col-3 ps-2">
                                                            <a href="{{ route('frontend.user.user_business_delete', $open_day->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#deleteBusiness" style="background-color: #ff2c4b"><i class="fas fa-trash-alt" style="background-color: #ff2c4b!important; padding: 0!important"></i></a>
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


    @if(\Session::has('created'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="create-modal-btn" data-bs-toggle="modal" data-bs-target="#createModal"></button>

        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-0 text-center">Open day created successfully</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn text-white w-25" data-bs-dismiss="modal" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    
    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#EditModal"></button>

        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-0 text-center">Suggested program updated successfully.</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn text-white w-25" data-bs-dismiss="modal" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="modal fade" id="deleteSuggestedProgram" tabindex="-1" aria-labelledby="deleteFavoriteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete suggested program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this program from program list?
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

        if(document.getElementById("create-modal-btn")){
            $('#modal-btn').click();
        }

        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>
@endpush