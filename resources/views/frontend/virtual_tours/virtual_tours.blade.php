@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Virtual tours')

@push('after-styles')
    <link href="{{ url('css/events.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container business" style="margin-top: 5rem; margin-bottom: 3rem;">

        <h4 class="fw-bolder futura">Virtual tours</h4>

        @auth
            @if(is_school_registered(auth()->user()->id))
                <div class="row align-items-center">
                    <div class="col-10 pe-0">
                        <hr>
                    </div>
                    <div class="col-2 text-end ps-0">
                        
                        <a href="{{ route('frontend.user.virtual_tours') }}" type="button" class="btn text-white post-btn">Post your virtual tour</a>
                        
                    </div>
                </div>
            @endif
        @else
            <div class="row align-items-center">
                <div class="col-12">
                    <hr>
                </div>
            </div>
        @endauth

        

        <div class="row mt-5">

            @if(count($virtual_tours) == 0)
                @include('frontend.includes.not_found_title',[
                    'not_found_title' => 'Virtual tours not found',
                    'not_found_description' => 'Please check later.'
                ])
            @else
                @foreach($virtual_tours as $virtual_tour)
                    <div class="col-4 mb-4">
                        <div class="card red rounded-0 position-relative">
                            <a href="{{ $virtual_tour->link }}" class="text-decoration-none" target="_blank">

                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ App\Models\Schools::where('id', $virtual_tour->school_id)->first()->name }}</h6>
                                </div>

                                @if($virtual_tour->image != null)
                                    <img src="{{ url('images/virtual_tours', $virtual_tour->image) }}" class="w-100" alt="..." style="height: 15rem; object-fit: cover;">
                                        
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                @endif


                                <div class="position-absolute virtual-box">
                                    <p class="text-decoration-none" style="color: {{ $virtual_tour->color }}">We are in {{ $virtual_tour->city }}, {{ $virtual_tour->province }}, {{ $virtual_tour->country }}</p>
                                </div>
                                
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
