@extends('frontend.layouts.app')

@section('title', 'Programs')

@push('after-styles')
    <link href="{{ url('css/programs.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h5 class="fw-bolder">Programs</h5>
        <hr>

        <div class="row mt-4">
            @foreach($programs as $program)
                <div class="col-3">
                    <p style="color: #800000;"><i class="fas fa-star"></i> {{ $program->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
