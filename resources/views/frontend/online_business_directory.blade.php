@extends('frontend.layouts.app')

@section('title', 'Online Business Directory')

@push('after-styles')
    <link href="{{ url('css/online_business_directory.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h5 class="fw-bolder">Online Business Directory</h5>
        <hr>
    

        <div class="row mt-5">
            
            <form action="{{ route('frontend.directory_search') }}" method="POST">
            {{@csrf_field()}}
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Company Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="city" aria-describedby="city" name="city" placeholder="City">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="province" aria-describedby="province" name="province" placeholder="Province">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="industry" aria-describedby="industry" name="industry" placeholder="Industry">
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-5 py-3 text-white" id="submit_btn">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
