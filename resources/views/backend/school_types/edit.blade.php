@extends('backend.layouts.app')

@section('title', __('Edit School Type | Admin'))

@section('content')
    
    <form action="{{route('admin.types.update_school_type')}}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <input class="form-control" name="name" value="{{ $type->name }}" placeholder="School Type Name" required>
                            </div>

                            <div class="mb-3">
                                <textarea name="description" class="form-control" id="description" placeholder="Description" rows="5" value="{{ $type->description }}">{{ $type->description }}</textarea>
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
                                    <option value="Approved" {{ $type->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Pending" {{ $type->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-4 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $type->id }}"/>
                                <a href="{{ route('admin.types.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection