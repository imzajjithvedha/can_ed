@extends('frontend.layouts.app')

@section('title', 'Proxima Study | My favorite scholarships')

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
                        'not_found_title' => 'Favorite scholarships not found',
                        'not_found_description' => 'Add scholarships to your favorite list',
                        'not_found_button_caption' => 'Explore scholarships',
                        'url' => 'scholarships'
                    ])

                @else

                    <div class="row justify-content-between">
                        <div class="col-8 p-0">
                            <h4 class="user-settings-head">My favorite scholarships</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 border">
                            <div class="px-3 pt-3" id="nav-articles" role="tabpanel" aria-labelledby="nav-articles-tab">
                                @foreach($scholarships as $scholarship)
                                    @if(is_favorite_scholarship($scholarship->id, auth()->user()->id))
                                        <div class="row justify-content-between border py-3 mb-3 align-items-center">
                                            <div class="col-5">
                                                @if($scholarship->image != null)
                                                    <img src="{{ url('images/schools', $scholarship->image) }}" alt="" class="img-fluid mb-3 w-100" style="height: 15rem; object-fit: cover;">
                                                @else
                                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 mb-3" style="height: 15rem; object-fit: cover;">
                                                @endif

                                                <div class="text-center">
                                                    <a href="{{ $scholarship->link }}" type="button" class="btn btn-primary py-2 w-100 text-white" id="apply_btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;" target="_blank">Apply now</a>
                                                </div>
                                            </div>

                                            <div class="col-7">
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-4">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="fw-bold">Name</p>
                                                            </div>
                                                            <div class="col-1 p-0">
                                                                <p class="fw-bold">:</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-8">
                                                        <h6 class="fw-bolder">{{ $scholarship->name }}</h6>
                                                    </div>
                                                </div>

                                                <div class="row align-items-center mb-2">
                                                    <div class="col-4">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="fw-bold">School</p>
                                                            </div>
                                                            <div class="col-1 p-0">
                                                                <p class="fw-bold">:</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-8">
                                                        <p class="gray">{{ App\Models\Schools::where('id', $scholarship->school_id)->first()->name }}</p>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-4">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="fw-bold">Summary</p>
                                                            </div>
                                                            <div class="col-1 p-0">
                                                                <p class="fw-bold">:</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-8">
                                                        <p class="gray" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{{ $scholarship->summary }}</p>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-4">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="fw-bold">Province</p>
                                                            </div>
                                                            <div class="col-1 p-0">
                                                                <p class="fw-bold">:</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-8">
                                                        <p class="gray">{{ $scholarship->province }}</p>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-4">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="fw-bold">Deadline</p>
                                                            </div>
                                                            <div class="col-1 p-0">
                                                                <p class="fw-bold">:</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-8">
                                                        <p class="gray">{{ $scholarship->deadline }}</p>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-4">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="fw-bold">Duration</p>
                                                            </div>
                                                            <div class="col-1 p-0">
                                                                <p class="fw-bold">:</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-8">
                                                        <p class="gray">{{ $scholarship->duration }}</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12">
                                                <div class="row justify-content-end">
                                                    <div class="col-9 text-end">
                                                        <div class="row justify-content-end">
                                                            <div class="col-2">
                                                                <a href="{{ route('frontend.single_scholarship', $scholarship->id) }}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</a>
                                                            </div>
                                                            <div class="col-2">
                                                                <a href="{{ route('frontend.user.favorite_scholarship_delete', $scholarship->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#deleteFavorite" style="background-color: #ff2c4b"><i class="fas fa-trash-alt" style="background-color: #ff2c4b!important; padding: 0!important"></i></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete favorite scholarship</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this scholarship from your favorite list?
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