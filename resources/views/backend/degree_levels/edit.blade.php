@extends('backend.layouts.app')

@section('title', __('Edit Degree Level | Admin'))

@section('content')
    
    <form action="{{route('admin.degree_levels.update_degree_level')}}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <input class="form-control" name="name" value="{{ $level->name }}" placeholder="School Type Name" required>
                            </div>

                            <div class="mb-3">
                                <textarea name="description" class="form-control" id="description" placeholder="Description" rows="5" value="{{ $level->description }}">{{ $level->description }}</textarea>
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
                                    <option value="Approved" {{ $level->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Pending" {{ $level->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-4 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $level->id }}"/>
                                <a href="{{ route('admin.degree_levels.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection