@extends('frontend.layouts.app')

@section('title', 'Schools - search results')

@push('after-styles')
    <link href="{{ url('css/search.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 business">

        <h4 class="fw-bolder futura">Schools - search results</h4>

        <hr>

        <div class="mt-5">

            @if(count($filteredSchools) == 0)
                        @include('frontend.includes.not_found_title',[
                            'not_found_title' => 'Search results not found!',
                            'not_found_description' => 'Please check with another keyword.'
                        ])
            @else
                @foreach($filteredSchools as $school)
                    <div class="row justify-content-between border mb-4 py-3 mx-0">
                        <div class="col-5 text-center">
                            @if($school->featured_image != null)
                                <img src="{{ uploaded_asset($school->featured_image) }}" class="card-img-top img-fluid w-100" style="height: 15rem; object-fir: cover;" alt="...">
                            @else
                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                            @endif

                            <a href="{{ route('frontend.single_school', [$school->id, $school->slug, '#tab-contact']) }}" type="button" class="btn text-white advanced-btn mt-3 w-50">Contact us</a>
                        </div>

                        <div class="col-7">
                            <h4 class="fw-bolder futura">{{ $school->name }}</h4>
                            <div class="gray mt-2" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 9; -webkit-box-orient: vertical;">{!! $school->quick_facts_title_1_paragraph !!}</div>

                            <div class="row align-end mt-4 justify-content-end">
                                <div class="col-4 text-end">
                                    @if($school->main_button_title != null)
                                        @if($school->main_button_link != null)
                                            <a href="{{ $school->main_button_link }}" type="button" class="btn text-white continue-article-btn w-75">Apply Now</a>
                                        @else
                                            <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" type="button" class="btn text-white advanced-btn w-75">Apply Now</a>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-4 text-end">
                                    <a href="{{ route('frontend.single_school', [$school->id, $school->slug]) }}" type="button" class="btn text-white advanced-btn w-75">Continue reading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
