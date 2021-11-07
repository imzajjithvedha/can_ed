@extends('backend.layouts.app')

@section('title', __('Edit School | Admin'))

@section('content')


    @include('backend.includes.top_nav')
    
    <div class="row">
        <div class="col-md-12 p-1">
            <div class="card">
                <div class="card-body border">
                    <div class="border p-3">
                        <form action="{{ route('admin.schools.school_program_update') }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-12py-3">
                                    <div class="mb-3">
                                        <label for="school-type" class="form-label mb-1">Degree Level</label>
                                        <select class="form-control" id="degree_level" name="degree_level" placeholder="Degree Level" required>
                                            <option value="" selected disabled hidden>Degree Level *</option>
                                            @foreach($degree_levels as $degree_level)
                                                <option value="{{ $degree_level->id }}" {{ $degree_level->id == $school_program->degree_level ? "selected" : "" }}>{{ $degree_level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="school-type" class="form-label mb-1">Program Name</label>
                                        <select class="form-control" id="title" name="title" placeholder="Program Name *" required>
                                            <option value="" selected disabled hidden>Program Name *</option>
                                            @foreach($programs as $program)
                                                
                                                <option value="{{ $program->id }}" {{ $program->id == $school_program->program_id ? "selected" : "" }}>{{ $program->name }}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="school-type" class="form-label mb-1">Sub Title</label>
                                        <input type="text" class="form-control" id="sub_title" aria-describedby="sub_title" name="sub_title" placeholder="Sub Title *" value="{{ $school_program->sub_title }}" required>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <input type="hidden" class="form-control" value="{{ $school_program->id }}" name="hidden_id">
                                        <input type="hidden" class="form-control" value="{{ $school->id }}" name="school_id">
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


@endsection


@push('after-scripts')


@endpush