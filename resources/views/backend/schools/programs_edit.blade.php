@extends('backend.layouts.app')

@section('title', __('Edit school | Admin'))

@section('content')


    @include('backend.includes.top_nav')
    
    <div class="row">
        <div class="col-md-12 p-1">
            <div class="card">
                <div class="card-body border">
                    <div class="border p-3">
                        <form action="{{ route('admin.schools.school_program_update') }}" method="post" enctype="multipart/form-data" novalidate>
                            {{csrf_field()}}

                            <div class="mb-3">
                                <label for="school-type" class="form-label mb-1">Degree level *</label>
                                <select class="form-control" id="degree_level" name="degree_level" placeholder="Degree level *" required>
                                    <option value="" disabled hidden></option>
                                    @foreach($degree_levels as $degree_level)
                                        <option value="{{ $degree_level->id }}" {{ $degree_level->id == $school_program->degree_level ? "selected" : "" }}>{{ $degree_level->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="school-type" class="form-label mb-1">Program name *</label>
                                <select class="form-control" id="title" name="title" placeholder="Program name *" required>
                                    <option value="" disabled hidden></option>
                                    @foreach($programs as $program)
                                        
                                        <option value="{{ $program->id }}" {{ $program->id == $school_program->program_id ? "selected" : "" }}>{{ $program->name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="sub_title" class="form-label mb-1">Description *</label>
                                <textarea name="sub_title" class="form-control" id="sub_title" rows="5" placeholder="Description *" value="{{ $school_program->sub_title }}" required>{{ $school_program->sub_title }}</textarea>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" class="form-control" value="{{ $school_program->id }}" name="hidden_id">
                                <input type="hidden" class="form-control" value="{{ $school->id }}" name="school_id">
                                <input type="submit" value="Update program" class="btn rounded-pill text-light px-5 py-2" style="background-color: #94ca60;">
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