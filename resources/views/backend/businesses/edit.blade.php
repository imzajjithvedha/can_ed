@extends('backend.layouts.app')

@section('title', 'Business Approval | Admin')

@section('content')
    
    <form action="{{route('admin.businesses.update_business')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card quote">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Business Name" value="{{ $business->name }}" required>
                            </div>
                            <div class="mb-3">
                                <select class="form-control" id="category_1" name="category_1" placeholder="Business Category" required>
                                    <option value="" selected disabled hidden>Business Category *</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == App\Models\Businesses::where('id', $business->id)->first()->category_1 ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 category_2">
                                <select class="form-control" id="category_2" name="category_2" placeholder="Business Category">
                                    <option value="" selected disabled hidden>Business Category *</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == App\Models\Businesses::where('id', $business->id)->first()->category_2 ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 category_3">
                                <select class="form-control" id="category_3" name="category_3" placeholder="Business Category">
                                    <option value="" selected disabled hidden>Business Category *</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == App\Models\Businesses::where('id', $business->id)->first()->category_3 ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="7" placeholder="Business Description" value="{{ $business->description }}" name="description" required>{{ $business->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="contact_name" aria-describedby="contact_name" name="contact_name" placeholder="Contact Name" value="{{ $business->contact_name }}" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" aria-describedby="email" name="email" placeholder="Business Email" value="{{ $business->email }}" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="phone" aria-describedby="phone" name="phone" placeholder="Business Phone" value="{{ $business->phone }}" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="address" aria-describedby="address" name="address" placeholder="Address" value="{{ $business->address }}" required>
                            </div>

                            <div class="mb-3">
                                <input type="url" class="form-control" id="facebook" aria-describedby="facebook" name="facebook" placeholder="Facebook" value="{{ $business->facebook }}">
                            </div>

                            <div class="mb-3">
                                <input type="url" class="form-control" id="twitter" aria-describedby="twitter" name="twitter" placeholder="Twitter" value="{{ $business->twitter }}">
                            </div>

                            <div class="mb-3">
                                <input type="url" class="form-control" id="you-tube" aria-describedby="you-tube" name="you_tube" placeholder="YouTube" value="{{ $business->you_tube }}">
                            </div>

                            <div class="mb-3">
                                <input type="url" class="form-control" id="linked-in" aria-describedby="linked-in" name="linked_in" placeholder="LinkedIn" value="{{ $business->linked_in }}">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="package" aria-describedby="package" name="package" id="package" placeholder="Package" value="{{ $business->package }}" disabled>
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
                                <img src="{{ url('images/businesses', $business->image) }}" alt="" class="img-fluid">
                                <input type="hidden" class="form-control" name="old_image" value="{{$business->image}}">

                                <div class="input-group mt-4">
                                    <input type="file" class="form-control" id="image" name="new_image">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Featured</label>
                                <select class="form-control" name="featured" required>
                                    <option value="Yes" {{ $business->featured == 'Yes' ? "selected" : "" }}>Yes</option>   
                                    <option value="No" {{ $business->featured == 'No' ? "selected" : "" }}>No</option>                               
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Approved" {{ $business->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Pending" {{ $business->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $business->id }}"/>
                                <a href="{{ route('admin.businesses.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
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

    <script>
        $(document).ready(function() {
            if($('#package').val() == 'featured' || $('#package').val() == 'premium') {
                $('.category_2').removeClass('d-none');
                $('.category_3').removeClass('d-none');
            } else {
                $('.category_2').addClass('d-none');
                $('.category_3').addClass('d-none');
            }
        });
        
    </script>

@endpush
