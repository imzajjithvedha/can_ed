@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Online business directory')

@push('after-styles')
    <link href="{{ url('css/online_business_directory.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container inner-parent" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Online business directory</h4>
        <hr>
    

        <div class="row mt-5">
            
            <form action="{{ route('frontend.directory_search') }}" method="POST" novalidate>
            {{@csrf_field()}}
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Company name">
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
                            <button type="submit" class="btn btn-primary px-5 py-2 text-white" id="submit_btn">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
