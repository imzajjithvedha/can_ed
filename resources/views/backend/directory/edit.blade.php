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
                                <input type="text" class="form-control" id="address" aria-describedby="address" placeholder="Address" name="address" value="{{ $directory->address }}" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="City" name="city" value="{{ $directory->city }}" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="province" aria-describedby="province" placeholder="Province" name="province" value="{{ $directory->province }}" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="postal_code" aria-describedby="postal_code" placeholder="Postal Code" name="postal_code" value="{{ $directory->postal_code }}" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="Phone" name="phone" value="{{ $directory->phone }}" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="fax" aria-describedby="fax" placeholder="Fax" name="fax" value="{{ $directory->fax }}" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="industry" aria-describedby="industry" placeholder="Industry" name="industry" value="{{ $directory->industry }}" required>
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