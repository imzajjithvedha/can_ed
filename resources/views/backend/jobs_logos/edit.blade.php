@extends('backend.layouts.app')

@section('title', __('Edit jobs logo | Admin'))

@section('content')
    
    <form action="{{route('admin.logos.update_logo')}}" method="POST" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">

                            <div class="form-group">
                                <label for="name" class="form-label">Name *</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name *" value="{{ $logo->name }}" required>
                            </div>

                            <div class="form-group">
                                <img src="{{ url('images/logos', $logo->image) }}" alt="" class="img-fluid w-25" style="height: 13rem; object-fit: cover;">
                                <input type="hidden" class="form-control" name="old_image" value="{{$logo->image}}">

                                <div class="form-group mt-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="new_image" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="orders" class="form-label mb-1">Order *</label>
                                <input type="number" class="form-control" id="orders" aria-describedby="orders" placeholder="Order *" name="orders" value="{{ $logo->orders }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="Approved" {{ $logo->status == 'Approved' ? "selected" : "" }}>Approve<d/option>   
                                    <option value="Pending" {{ $logo->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-4 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $logo->id }}"/>
                                <a href="{{ route('admin.logos.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection