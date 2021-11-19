@extends('frontend.layouts.app')

@section('title', 'Schools: '.$type)

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">{{ $type }}</h4>

        <form action="{{ route('frontend.school_search') }}"  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-8">
                    <hr>
                </div>
                <div class="col-4 input-group">
                    <input type="text" class="form-control text-center" id="search_schools" aria-describedby="search_schools" name="keyword" placeholder="Search Schools" value="">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>


        <div class="articles mt-5">
            @if(count($schools) == 0)
                @include('frontend.includes.not_found_title',[
                    'not_found_title' => 'School not found',
                    'not_found_description' => 'Please check later.'
                ])
            @else
                @foreach($schools as $school)
                    <div class="row justify-content-between border py-3 px-2 mb-3">
                        <div class="col-4">
                            <img src="{{ url('images/schools', $school->featured_image) }}" alt="" class="img-fluid" style="height: 14rem; object-fit: cover;">

                            <p class="gray mt-4">Country: {{ $school->country }}</p>
                        </div>

                        <div class="col-8">
                            <h6 class="fw-bolder">{{ $school->name }}</h6>
                            

                            <p class="mt-2">By: Admin</p>

                            <div class="row align-end mt-3 justify-content-end">
                                <div class="col-4 text-end">
                                    <a href="{{ route('frontend.single_article', $school->id) }}" type="button" class="btn text-white continue-article-btn">Continue Reading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
