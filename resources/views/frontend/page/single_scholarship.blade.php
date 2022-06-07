@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Scholarships')

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-8">
                        <h4 class="fw-bolder futura">{{ $single_scholarship->name }}</h4>
                    </div>

                    @auth
                        @if(is_favorite_scholarship( $single_scholarship->id, auth()->user()->id))
                            <div class="col-4 text-end">
                                <form action="{{ route('frontend.favorite_scholarship') }}" method="POST" novalidate>
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $single_scholarship->id }}">
                                    <input type="hidden" name='favorite' value="favorite">
                                    <button type="submit" class="fas fa-heart favorite-heart text-decoration-none"></button>
                                </form>
                            </div>
                        @else
                            <div class="col-4 text-end">
                                <form action="{{ route('frontend.favorite_scholarship') }}" method="POST" novalidate>
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $single_scholarship->id }}">
                                    <input type="hidden" name='favorite' value="non-favorite">
                                    <button type="submit" class="far fa-heart favorite-heart text-decoration-none"></button>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="col-4 text-end">
                            <a href="{{ route('frontend.auth.login') }}" class="far fa-heart favorite-heart text-decoration-none"></a>
                        </div>
                    @endauth
                </div>

                <hr>

                @if($single_scholarship->image != null)
                    <img src="{{ url('images/schools', $single_scholarship->image) }}" alt="" class="img-fluid mb-4 w-100" style="height: 25rem; object-fit: cover;">
                @endif

                <div class="row mb-3">
                    <div class="col-12">
                        <p class="gray">{{ $single_scholarship->summary }}</p>
                    </div>
                </div>

                <div class="row mb-3">
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
                        @if($single_scholarship->school_id != null)
                            <p class="gray">{{ App\Models\Schools::where('id', $single_scholarship->school_id)->first()->name }}</p>
                        @else
                            <p class="gray">{{ $single_scholarship->name }}</p>
                        @endif
                    </div>
                </div>

                @if(json_decode($single_scholarship->eligibility) != null)
                    <div class="row mb-3">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-10">
                                    <p class="fw-bold">Basic eligibility</p>
                                </div>
                                <div class="col-1 p-0">
                                    <p class="fw-bold">:</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-8">
                            @foreach(json_decode($single_scholarship->eligibility) as $eligibility)
                                <p class="gray">{{ $eligibility }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="row mb-3">
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
                        <p class="gray">{{ $single_scholarship->province }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-10">
                                <p class="fw-bold">Amount</p>
                            </div>
                            <div class="col-1 p-0">
                                <p class="fw-bold">:</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <p class="gray">{{ $single_scholarship->amount }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-10">
                                <p class="fw-bold">Award</p>
                            </div>
                            <div class="col-1 p-0">
                                <p class="fw-bold">:</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <p class="gray">{{ $single_scholarship->award }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-10">
                                <p class="fw-bold">Action</p>
                            </div>
                            <div class="col-1 p-0">
                                <p class="fw-bold">:</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <p class="gray">{{ $single_scholarship->action }}</p>
                    </div>
                </div>

                <div class="row mb-3">
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
                        <p class="gray">{{ $single_scholarship->duration }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-10">
                                <p class="fw-bold">Date Posted</p>
                            </div>
                            <div class="col-1 p-0">
                                <p class="fw-bold">:</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <p class="gray">{{ $single_scholarship->date_posted }}</p>
                    </div>
                </div>

                <div class="row mb-3">
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
                        <p class="gray">{{ $single_scholarship->deadline }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-10">
                                <p class="fw-bold">Expiry date</p>
                            </div>
                            <div class="col-1 p-0">
                                <p class="fw-bold">:</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <p class="gray">{{ $single_scholarship->expiry_date }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-10">
                                <p class="fw-bold">Level of study</p>
                            </div>
                            <div class="col-1 p-0">
                                <p class="fw-bold">:</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <p class="gray">{{ $single_scholarship->level_of_study }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-10">
                                <p class="fw-bold">Availability</p>
                            </div>
                            <div class="col-1 p-0">
                                <p class="fw-bold">:</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <p class="gray">{{ $single_scholarship->availability }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-10">
                                <p class="fw-bold">Email</p>
                            </div>
                            <div class="col-1 p-0">
                                <p class="fw-bold">:</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        @if($single_scholarship->school_id != null)
                            <p class="gray">{{ App\Models\Schools::where('id', $single_scholarship->school_id)->first()->school_email }}</p>
                        @endif
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-10">
                                <p class="fw-bold">Phone</p>
                            </div>
                            <div class="col-1 p-0">
                                <p class="fw-bold">:</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        @if($single_scholarship->school_id != null)
                            <p class="gray">{{ App\Models\Schools::where('id', $single_scholarship->school_id)->first()->school_phone }}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    @if($single_scholarship->link != null)
                        <div class="col-6 text-center">
                            <a href="{{ $single_scholarship->link }}" type="button" class="btn btn-primary py-2 w-50 text-white" id="apply_btn" target="_blank">Apply now</a>
                        </div>
                    @endif

                    @if($single_scholarship->more_info != null)
                        <div class="col-6 text-center">
                            <a href="{{ $single_scholarship->more_info }}" type="button" class="btn btn-primary py-2 w-50 text-white" id="more_info_btn" target="_blank">More info</a>
                        </div>
                    @endif
                </div>

            </div>

            <div class="col-4">
                <h4 class="fw-bolder futura">More scholarships</h4>
                <hr>

                @foreach($more_scholarships as $scholarship)
                    
                        <div class="row align-items-center border py-3" style="margin: 0 0rem; margin-bottom: 1rem;">
                            <!-- <div class="col-6">
                                <a href="{{ route('frontend.single_scholarship', $scholarship->id) }}" class="text-decoration-none">
                                    @if($scholarship->image != null)
                                        <img src="{{ url('images/schools', $scholarship->image) }}" alt="" class="img-fluid w-100" style="height: 6rem; object-fit: cover;">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 6rem; object-fit: cover;">
                                    @endif
                                </a>
                            </div> -->

                            <div class="col-12">
                                <a href="{{ route('frontend.single_scholarship', $scholarship->id) }}" class="text-decoration-none">
                                    <h6 class="fw-bold gray futura mb-2">{{ $scholarship->name }}</h6>
                                    <div class="gray description" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; font-size: 0.8rem;">{{ $scholarship->summary }}</div>
                                </a>
                            </div>
                        </div>
                    
                @endforeach
            </div>
        </div>
    </div>
@endsection
