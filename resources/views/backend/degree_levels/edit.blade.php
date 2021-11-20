@extends('backend.layouts.app')

@section('title', __('Edit Degree Level | Admin'))

@section('content')
    
    <form action="{{route('admin.degree_levels.update_degree_level')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">School type name *</label>
                                <input class="form-control" name="name" id="name" value="{{ $level->name }}" placeholder="School type name *" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" placeholder="Description" rows="5" value="{{ $level->description }}">{{ $level->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="orders" class="form-label mb-1">Order *</label>
                                <input type="number" class="form-control" id="orders" aria-describedby="orders" placeholder="Order *" name="orders" value="{{ $level->orders }}" required>
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
                                @if($level->icon != null)
                                    <div class="text-center mb-5">
                                        <img src="{{ url('images/degree_levels', $level->icon) }}" alt="" class="img-fluid w-25 mx-auto" style="height: 6rem;">
                                        <input type="hidden" class="form-control" name="old_image" value="{{$level->icon}}">
                                    </div>
                                @endif
                            
                                <div class="form-group">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="new_image" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-control" name="status" id="status" required>
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