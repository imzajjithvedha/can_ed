@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Business categories')

@push('after-styles')
    <link href="{{ url('css/business.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container business" style="margin-top: 5rem; margin-bottom: 3rem;">

        <h4 class="fw-bolder futura">Business categories</h4>

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
            @if(count($categories) == 0)
                    @include('frontend.includes.not_found_title',[
                        'not_found_title' => 'Business categories not found',
                        'not_found_description' => 'Please check later.'
                    ])
            @else
                @foreach($categories as $category)
                    <div class="col-3 mb-4">
                        <div class="card red rounded-0 text-center">
                            <a href="{{ route('frontend.businesses', $category->id) }}" class="text-decoration-none">
                                @if($category->image != null)
                                    <img src="{{ url('images/business_categories', $category->image) }}" class="card-img-top p-3" alt="..." style="height: 13rem;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 13rem; object-fit: cover;">
                                @endif
                                
                                <div class="card-body text-center card-padding rounded-0">
                                    <h6 class="card-title fw-bold gray">{{ $category->name }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                @endforeach
            @endif
        </div>
    </div>
@endsection
