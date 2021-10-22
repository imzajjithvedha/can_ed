@extends('frontend.layouts.app')

@section('title', 'Edit Program' )

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

@section('content')

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <h4 class="fs-4 fw-bolder user-settings-head">Edit Program</h4>
                        
                    </div>
                    <div class="col-4 text-end">
                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3 school" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                            <form action="{{ route('frontend.user.school_program_update') }}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-12 border py-3">
                                        <div class="mb-3">
                                            <select class="form-control" id="program_category" name="program_category" placeholder="Program Category" required>
                                                <option value="" selected disabled hidden>Program Category *</option>
                                                @foreach($program_categories as $program_category)
                                                    <option value="{{ $program_category->id }}" {{ $program_category->id == $school_program->program_category ? "selected" : "" }}>{{ $program_category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <select class="form-control" id="title" name="title" placeholder="Program Name *" required>
                                                <option value="" selected disabled hidden>Program Name *</option>
                                                @foreach($programs as $program)
                                                    
                                                    <option value="{{ $program->id }}" {{ $program->id == $school_program->program_id ? "selected" : "" }}>{{ $program->name }}</option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="sub_title" aria-describedby="sub_title" name="sub_title" placeholder="Sub Title *" value="{{ $school_program->sub_title }}" required>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <input type="hidden" class="form-control" value="{{ $school_program->id }}" name="hidden_id">
                                            <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    
@endpush

