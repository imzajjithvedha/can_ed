@extends('backend.layouts.app')

@section('title', 'Edit Program | Admin')

@section('content')
    
    <form action="{{route('admin.programs.update_program')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <select name="degree_level" class="form-control">
                                        <option value="" selected disabled hidden>Degree Level</option>
                                    @foreach($degree_levels as $degree_level)
                                        <option value="{{ $degree_level->id }}" {{ $degree_level->name == App\Models\Programs::where('id', $program->id)->first()->degree_level ? "selected" : "" }}>{{ $degree_level->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <input class="form-control" name="title" value="{{ $program->name }}" placeholder="Program Title" required>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control" name="description" value="{{ $program->description }}" rows="7">{{ $program->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Approved" {{ $program->status == 'Approved' ? "selected" : "" }}>Approve</option>
                                    <option value="Pending" {{ $program->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $program->id }}"/>
                                <a href="{{ route('admin.programs.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection