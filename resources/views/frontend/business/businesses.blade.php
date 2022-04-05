@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Businesses')

@push('after-styles')
    <link href="{{ url('css/business.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container business" style="margin-top: 5rem; margin-bottom: 3rem;">

        <h4 class="fw-bolder futura">Businesses - {{ $category->name }}</h4>

        <form action="{{ route('frontend.business_search') }}"  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-8">
                    <hr>
                </div>
                <div class="col-4 input-group">
                    <input type="text" class="form-control text-center" id="search_businesses" aria-describedby="search_businesses" name="keyword">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>
        
        <div class="row mt-5">

            @if(count($businesses) == 0)
                        @include('frontend.includes.not_found_title',[
                            'not_found_title' => 'Businesses not found for this category',
                            'not_found_description' => 'Please check later.'
                        ])
            @else
                @foreach($businesses as $business)
                    <div class="col-3 mb-4">
                        <div class="card red rounded-0">
                            <a href="{{ route('frontend.single_business', $business->id) }}" class="text-decoration-none">
                                @if($business->image != null)
                                    @foreach(json_decode($business->image) as $index => $im)

                                        @if ($index == 0)
                                            <img src="{{ url('images/businesses', $im) }}" class="w-100" alt="..." style="height: 13rem; object-fit: cover;">
                                        @endif
                                        
                                    @endforeach
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 13rem; object-fit: cover;">
                                @endif
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ $business->name }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
