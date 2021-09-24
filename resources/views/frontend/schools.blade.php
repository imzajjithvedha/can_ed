@extends('frontend.layouts.app')

@section('title', 'Schools')

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 schools">

        <h5 class="fw-bolder">Schools</h5>

        <form action="">
            <div class="row align-items-center">
                <div class="col-9">
                    <hr>
                </div>
                <div class="col-3 input-group">
                    <input type="text" class="form-control text-center" id="search_article" aria-describedby="search_article" placeholder="Search articles">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="row mt-4">
            <div class="col-3 mb-4">
                <div class="card">
                    <a href="{{ route('frontend.single_school') }}" class="text-decoration-none">
                        <img src="{{ url('img/frontend/index/school.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold gray">Royal College</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
