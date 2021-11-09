@extends('backend.layouts.app')

@section('title', 'Business Category Edit | Admin')

@section('content')
    
    <form action="{{route('admin.categories.update_category')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card quote">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Business category name *</label>
                                <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Business category name *" value="{{ $category->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="7" placeholder="Description" value="{{ $category->description }}">{{ $category->description }}</textarea>
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
                                @if($category->image != null)
                                    <img src="{{ url('images/business_categories', $category->image) }}" alt="" class="img-fluid w-100" style="height: 13rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 13rem; object-fit: cover;">
                                @endif

                                <input type="hidden" class="form-control" name="old_image" value="{{$category->image}}">

                                <div class="form-group mt-5">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="new_image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="Approved" {{ $category->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Pending" {{ $category->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $category->id }}"/>
                                <a href="{{ route('admin.categories.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


@push('after-scripts')

@endpush
