@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Scholarships')

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Scholarships</h4>

        <form action="{{ route('frontend.scholarship_search') }}"  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-7">
                    <hr>
                </div>

                <div class="col-2 input-group">
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#advancedSearch" style="font-size: 0.95rem">Advanced search</button>
                </div>

                <div class="col-3 input-group">
                    <input type="text" class="form-control text-center" id="search_scholarship" aria-describedby="search_scholarship" name="keyword">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>

        <div class="scholarships mt-5">
            @if(count($scholarships) == 0)
                @include('frontend.includes.not_found_title',[
                    'not_found_title' => 'Scholarships not found',
                    'not_found_description' => 'Please check later.'
                ])
            @else

                @foreach($scholarships as $scholarship)
                    <div class="px-3">
                        <div class="row justify-content-between border py-3 px-2 mb-5 align-items-center">
                            <!-- <div class="col-5">
                                @if($scholarship->image != null)
                                    <img src="{{ url('images/schools', $scholarship->image) }}" alt="" class="img-fluid mb-3 w-100" style="height: 15rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 mb-3" style="height: 15rem; object-fit: cover;">
                                @endif

                                <div class="text-center">
                                    <a href="{{ $scholarship->link }}" type="button" class="btn btn-primary py-2 w-100 text-white" id="apply_btn" target="_blank">Apply now</a>
                                </div>
                            </div> -->

                            <div class="col-12">
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
                                        @if($scholarship->school_id != null)
                                            <p class="gray">{{ App\Models\Schools::where('id', $scholarship->school_id)->first()->name }}</p>
                                        @else
                                            <p class="gray">{{ $scholarship->name }}</p>
                                        @endif
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

                                

                                <div class="row">
                                    <div class="col-12 text-end">
                                        <a href="{{ $scholarship->link }}" type="button" class="btn btn-primary px-4 text-white me-3" id="apply_btn" target="_blank">Apply now</a>

                                        <a href="{{ route('frontend.single_scholarship', $scholarship->id) }}" class="btn btn-primary px-4" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Learn more</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $scholarships->links() }}
            @endif
        </div>
    </div>

    

    <!-- Modal -->
    <form action="{{ route('frontend.scholarships_advanced_search') }}" method="POST" id="advanced-search-form">
        {{ csrf_field() }}
        <div class="modal fade" id="advancedSearch" tabindex="-1" aria-labelledby="advancedSearch" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Advanced scholarship search</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="school" class="form-label">School</label>
                                <input type="text" name="school" id="school" class="form-control">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="province" class="form-label">Province</label>
                                <select name="province" id="province" class="form-control">
                                    <option value="" selected disabled hidden></option>
                                    <option value="Alberta">Alberta</option>
                                    <option value="British Columbia">British Columbia</option>
                                    <option value="Manitoba">Manitoba</option>
                                    <option value="New Brunswick">New Brunswick</option>
                                    <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                    <option value="Nova Scotia">Nova Scotia</option>
                                    <option value="Ontario">Ontario</option>
                                    <option value="Prince Edward Island">Prince Edward Island</option>
                                    <option value="Quebec">Quebec</option>
                                    <option value="Saskatchewan">Saskatchewan</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="award" class="form-label">Award</label>
                                <select name="award" id="award" class="form-control">
                                    <option value="" selected disabled hidden></option>
                                    <option value="Admission">Admission</option>
                                    <option value="Current students">Current students</option>
                                    <option value="Admission and current students">Admission and current students</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="action" class="form-label">Action</label>
                                <input type="text" class="form-control" name="action">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="provider" class="form-label">Provider</label>
                                <input type="text" class="form-control" name="provider">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="min_amount" class="form-label">Minimum Amount</label>
                                <input type="text" class="form-control" name="min_amount">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="max_amount" class="form-label">Maximum Amount</label>
                                <input type="text" class="form-control" name="max_amount">
                            </div>

                            <div class="col-12">
                                <label for="duration" class="form-label">Duration</label>
                                <select name="duration" id="duration" class="form-control">
                                    <option value="" selected disabled hidden></option>
                                    <option value="Full time">Full time</option>
                                    <option value="Part time">Part time</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary w-25 p-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn w-25 text-white p-2" id="submit_btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
