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
                                <label for="title" class="form-label">Program title *</label>
                                <input class="form-control" name="title" id="title" value="{{ $program->name }}" placeholder="Program title *" required>
                            </div>


                            <div class="mb-3">
                                <label for="degree_level" class="form-label">Degree level</label>
                                <select name="degree_level" class="form-control" id="degree_level">
                                        <option value="" selected disabled hidden>Degree level</option>
                                    @foreach($degree_levels as $degree_level)
                                        <option value="{{ $degree_level->id }}" {{ $degree_level->id == App\Models\Programs::where('id', $program->id)->first()->degree_level ? "selected" : "" }}>{{ $degree_level->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" value="{{ $program->description }}" rows="7" placeholder="Description">{{ $program->description }}</textarea>
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
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-control" name="status" id="status" required>
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