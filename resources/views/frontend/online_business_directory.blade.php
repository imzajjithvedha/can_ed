@extends('frontend.layouts.app')

@section('title', 'Online Business Directory')

@push('after-styles')
    <link href="{{ url('css/online_business_directory.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h5 class="fw-bolder">Online Business Directory</h5>
        
        <form action="">
            <div class="row align-items-center">
                <div class="col-9">
                    <hr>
                </div>
                <div class="col-3 input-group">
                    <input type="text" class="form-control text-center" id="search_directory" aria-describedby="search_directory" placeholder="Search Directory">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row mt-5">
            @if(count($directories) == 0)
                        @include('frontend.includes.not_found_title',[
                            'not_found_title' => 'There is nothing in the directory',
                            'not_found_description' => 'Please check later.'
                        ])
            @else
                @foreach($directories as $directory)
                    <div class="col-4">
                        <div class="row align-items-center">
                            <!-- <div class="col-5">

                                @if($directory->image != null)
                                    <img src="{{ url('images/directory', $directory->image) }}" alt="" class="img-fluid" style="height: 7rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 7rem; object-fit: cover;">
                                @endif
                            </div> -->

                            <div class="col-12">
                                <h6 class="mb-1 fw-bold" style="color: rgb(128, 0, 0);">{{ $directory->name }}</h6>
                                <p class="gray mb-2" style="line-height: 1rem;">{{ $directory->description }}</p>

                                <p class="gray mb-1"><i class="fas fa-tasks me-2" style="color: rgb(128, 0, 0);"></i>{{ $directory->category }}</p>

                                <p class="gray mb-1"><i class="fas fa-phone-alt me-2" style="color: rgb(128, 0, 0);"></i>{{ $directory->phone }}</p>

                                <p class="gray"><i class="fas fa-envelope me-2" style="color: rgb(128, 0, 0);"></i></i>{{ $directory->email }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
