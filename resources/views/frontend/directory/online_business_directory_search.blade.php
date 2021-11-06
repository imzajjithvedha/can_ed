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

        
        <div class="row mt-5">
            @if(count($filteredDirectory) == 0)
                @include('frontend.includes.not_found_title',[
                    'not_found_title' => 'Directory not found',
                    'not_found_description' => 'Please check later.'
                ])
            @else
               
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width:235px;">Name</th>
                                <th scope="col" style="width:210px;">Address</th>
                                <th scope="col" style="width:150px;">City</th>
                                <th scope="col" style="width:100px;">Province</th>
                                <th scope="col" style="width:170px;">Postal Code</th>
                                <th scope="col" style="width:175px;">Phone</th>
                                <th scope="col" style="width:180px;">Fax</th>
                                <th scope="col" style="width:200px;">Industry</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($filteredDirectory as $directory)
                                <tr>
                                    <th scope="row">{{ $directory->name}}</th>
                                    <td>{{ $directory->address}}</td>
                                    <td>{{ $directory->city}}</td>
                                    <td>{{ $directory->province}}</td>
                                    <td>{{ $directory->postal_code}}</td>
                                    <td>{{ $directory->phone}}</td>
                                    <td>{{ $directory->fax}}</td>
                                    <td>{{ $directory->industry}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
