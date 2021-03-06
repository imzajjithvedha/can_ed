@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Videos')

@push('after-styles')
    <link href="{{ url('css/videos.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container videos inner-parent" style="margin-top: 5rem; margin-bottom: 3rem;">

        <h4 class="fw-bolder futura">Videos</h4>
        <hr>


        <div class="row mt-5">
            @if(count($videos) == 0)
                    @include('frontend.includes.not_found_title',[
                        'not_found_title' => 'Videos not found',
                        'not_found_description' => 'Please check later.'
                    ])
            @else
                @foreach($videos as $video)
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card red" style="height: 25rem;">
                            <iframe width="100%" height="100%" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <!-- <p class="gray fw-bolder m-3 text-center" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $video->title }}</p> -->

                            <div class="card-body text-center rounded-0">
                                <h6 class="card-title fw-bold gray" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $video->title }}</h6>
                            </div>
                        </div>
                        
                    </div>
                    
                @endforeach
            @endif
        </div>
    </div>
@endsection