@extends('frontend.layouts.app')

@section('title', 'School degree levels')

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container" style="margin-top: 5rem; margin-bottom: 3rem;">

        <h4 class="fw-bolder futura">School degree levels</h4>

        <form action="{{ route('frontend.school_search') }}" method="POST">
            {{ csrf_field() }}
            <div class="row align-items-center">
                <div class="col-8">
                    <hr>
                </div>
                <div class="col-4 input-group">
                    <input type="text" class="form-control text-center" id="search_schools" aria-describedby="search_schools" placeholder="Search schools" name="keyword">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>


        <div class="row mt-5">
            @if(count($degrees) == 0)
                    @include('frontend.includes.not_found_title',[
                        'not_found_title' => 'Degree levels not found',
                        'not_found_description' => 'Please check later.'
                    ])
            @else
                @foreach($degrees as $degree)
                    <div class="col-3 mb-4">
                        <div class="card red">
                            <a href="{{ route('frontend.schools', $degree->id) }}" class="text-decoration-none">
                                @if($degree->icon != null)
                                    <img src="{{ url('images/degree_levels', $degree->icon) }}" class="card-img-top img-fluid w-100" style="height: 10rem; object-fir: cover;" alt="...">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ $degree->name }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
