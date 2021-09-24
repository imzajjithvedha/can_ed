@extends('backend.layouts.app')

@section('title', 'Edit Directory | Admin')

@section('content')
    
    <form action="{{route('admin.directory.update_directory')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <input class="form-control" name="name" value="{{ $directory->name }}" placeholder="Name" required>
                            </div>

                            <div class="mb-3">
                                <textarea name="description" class="form-control" id="description" rows="5" placeholder="Description" value="{{ $directory->description }}" maxlength="100" required>{{ $directory->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="category" aria-describedby="category" placeholder="Category" name="category" value="{{ $directory->category }}" required>
                            </div>

                            <div class="mb-3">
                                <input class="form-control" name="phone" value="{{ $directory->phone }}" placeholder="Phone Number" required>
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" value="{{ $directory->email }}" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group mb-3">
                                <img src="{{ url('images/directory', $directory->image) }}" alt="" class="img-fluid">
                                <input type="hidden" class="form-control" name="old_image" value="{{$directory->image}}">

                                <div class="input-group mt-4">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="new_image" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Approved" {{ $directory->status == 'Approved' ? "selected" : "" }}>Approve</option>
                                    <option value="Pending" {{ $directory->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $directory->id }}"/>
                                <a href="{{ route('admin.directory.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection