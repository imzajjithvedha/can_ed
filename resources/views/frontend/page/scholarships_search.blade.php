@extends('frontend.layouts.app')

@section('title', 'Scholarships')

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Scholarships</h4>

        <form action="{{ route('frontend.scholarship_search') }}"  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-8">
                    <hr>
                </div>
                <div class="col-4 input-group">
                    <input type="text" class="form-control text-center" id="search_scholarship" aria-describedby="search_scholarship" name="keyword">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>

        <div class="scholarships mt-5">
            @if(count($filteredScholarships) == 0)
                @include('frontend.includes.not_found_title',[
                    'not_found_title' => 'Scholarships not found',
                    'not_found_description' => 'Please check later.'
                ])
            @else

                @foreach($filteredScholarships as $scholarship)
                    <div class="px-3">
                        <div class="row justify-content-between border py-3 px-2 mb-5">
                            <div class="col-5">
                                @if($scholarship->image != null)
                                    <img src="{{ url('images/schools', $scholarship->image) }}" alt="" class="img-fluid mb-3 w-100" style="height: 15rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 mb-3" style="height: 15rem; object-fit: cover;">
                                @endif

                                <div class="text-center">
                                    <a href="{{ $scholarship->link }}" type="button" class="btn btn-primary py-2 w-100 text-white" id="apply_btn" target="_blank">Apply now</a>
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
                                        <p class="gray">{{ $scholarship->summary }}</p>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-10">
                                                <p class="fw-bold">Basic Eligibility</p>
                                            </div>
                                            <div class="col-1 p-0">
                                                <p class="fw-bold">:</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        @foreach(json_decode($scholarship->eligibility) as $eligibility)
                                            <p class="gray">{{ $eligibility }}</p>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row mb-2">
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
                                        <p class="gray">{{ $scholarship->award }}</p>
                                    </div>
                                </div>

                                <div class="row mb-2">
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
                                        <p class="gray">{{ $scholarship->action }}</p>
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
                                                <p class="fw-bold">Level of study</p>
                                            </div>
                                            <div class="col-1 p-0">
                                                <p class="fw-bold">:</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="gray">{{ $scholarship->level_of_study }}</p>
                                    </div>
                                </div>

                                <div class="row mb-2">
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
                                        <p class="gray">{{ $scholarship->availability }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
