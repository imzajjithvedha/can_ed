@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Businesses - search results')

@push('after-styles')
    <link href="{{ url('css/search.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 business">

        <h4 class="fw-bolder futura">Businesses - search results</h4>
        <hr>

        <div class="mt-5">

            @if(count($filteredBusinesses) == 0)
                        @include('frontend.includes.not_found_title',[
                            'not_found_title' => 'Search results not found!',
                            'not_found_description' => 'Please check with another keyword.'
                        ])
            @else

                @if($featuredCount > 0)
                    @foreach($filteredBusinesses as $business)

                        @if($business->package == 'featured')

                            <div class="row justify-content-between border mb-4 py-3 mx-0">
                                <div class="col-5 text-center">
                                    @if($business->image != null)
                                        <img src="{{ url('images/businesses', $business->image) }}" class="card-img-top img-fluid w-100" style="height: 15rem; object-fir: cover;" alt="...">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                    @endif

                                    <!-- <a href="" type="button" class="btn text-white advanced-btn mt-3 w-50">Contact us</a> -->
                                </div>

                                <div class="col-7">
                                    <h4 class="fw-bolder futura">{{ $business->name }}</h4>
                                    <p class="gray mt-2" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{{ $business->description }}</p>

                                    <p class="gray mt-2">Contact person : {{ $business->contact_name }}</p>

                                    <div class="row align-end mt-4 justify-content-end">
                                        <div class="col-4 text-end">
                                            <a href="{{ route('frontend.single_business', $business->id) }}" type="button" class="btn text-white advanced-btn w-75">Continue reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                        
                    @endforeach

                    <hr class="my-5 separate-line">

                @endif


                @if($premiumCount > 0)
                    @foreach($filteredBusinesses as $business)

                        @if($business->package == 'premium')

                            <div class="row justify-content-between border mb-4 py-3 mx-0">
                                <div class="col-5 text-center">
                                    @if($business->image != null)
                                        <img src="{{ url('images/businesses', $business->image) }}" class="card-img-top img-fluid w-100" style="height: 15rem; object-fir: cover;" alt="...">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                    @endif

                                    <!-- <a href="" type="button" class="btn text-white advanced-btn mt-3 w-50">Contact us</a> -->
                                </div>

                                <div class="col-7">
                                    <h4 class="fw-bolder futura">{{ $business->name }}</h4>
                                    <p class="gray mt-2" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{{ $business->description }}</p>

                                    <p class="gray mt-2">Contact person : {{ $business->contact_name }}</p>

                                    <div class="row align-end mt-4 justify-content-end">
                                        <div class="col-4 text-end">
                                            <a href="{{ route('frontend.single_business', $business->id) }}" type="button" class="btn text-white advanced-btn w-75">Continue reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                        
                    @endforeach

                    <hr class="my-5 separate-line">

                @endif


                @if($basicCount > 0)
                    @foreach($filteredBusinesses as $business)

                        @if($business->package == 'basic')

                            <div class="row justify-content-between border mb-4 py-3 mx-0">
                                <div class="col-5 text-center">
                                    @if($business->image != null)
                                        <img src="{{ url('images/businesses', $business->image) }}" class="card-img-top img-fluid w-100" style="height: 15rem; object-fir: cover;" alt="...">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                    @endif

                                    <!-- <a href="" type="button" class="btn text-white advanced-btn mt-3 w-50">Contact us</a> -->
                                </div>

                                <div class="col-7">
                                    <h4 class="fw-bolder futura">{{ $business->name }}</h4>
                                    <p class="gray mt-2" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{{ $business->description }}</p>

                                    <p class="gray mt-2">Contact person : {{ $business->contact_name }}</p>

                                    <div class="row align-end mt-4 justify-content-end">
                                        <div class="col-4 text-end">
                                            <a href="{{ route('frontend.single_business', $business->id) }}" type="button" class="btn text-white advanced-btn w-75">Continue reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                        
                    @endforeach

                @endif

            @endif
        </div>
    </div>
@endsection
