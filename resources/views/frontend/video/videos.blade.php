@extends('frontend.layouts.app')

@section('title', 'Videos')

@push('after-styles')
    <link href="{{ url('css/videos.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 videos" style="margin-top: 5rem; margin-bottom: 5rem;">

        <h5 class="fw-bolder">Videos</h5>
        <hr>


        <div class="row mt-5">
            @if(count($videos) == 0)
                    @include('frontend.includes.not_found_title',[
                        'not_found_title' => 'Videos not found',
                        'not_found_description' => 'Please check later.'
                    ])
            @else
                @foreach($videos as $video)
                    <div class="col-3 mb-4">
                        <div class="card" style="height: 19rem;">
                            <iframe width="100%" height="200" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <p class="gray fw-bolder m-3 text-center" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $video->title }}</p>
                        </div>
                        
                    </div>
                    
                @endforeach
            @endif
        </div>
    </div>
@endsection