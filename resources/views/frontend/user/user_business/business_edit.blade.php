@extends('frontend.layouts.app')

@section('title', 'Edit business')

@push('after-styles')
    <link href="{{ url('css/profile-settings.css') }}" rel="stylesheet">
@endpush

@section('content')
 


    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">

                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <h4 class="user-settings-head">Edit business</h4>
                    </div>
                </div>

                <form action="{{ route('frontend.user.user_business_update') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-12 border py-3">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Business name *</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Business name *" value="{{ $business->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="category_1" class="form-label">Business category *</label>
                                    <select class="form-control" id="category_1" name="category_1" placeholder="Business Category" required>
                                        <option value="" selected disabled hidden></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == App\Models\Businesses::where('id', $business->id)->first()->category_1 ? "selected" : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 category_2">
                                    <label for="category_2" class="form-label">Business category *</label>
                                    <select class="form-control" id="category_2" name="category_2" placeholder="Business Category">
                                        <option value="" selected disabled hidden></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == App\Models\Businesses::where('id', $business->id)->first()->category_2 ? "selected" : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 category_3">
                                    <label for="category_3" class="form-label">Business category *</label>
                                    <select class="form-control" id="category_3" name="category_3" placeholder="Business Category">
                                        <option value="" selected disabled hidden></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == App\Models\Businesses::where('id', $business->id)->first()->category_3 ? "selected" : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Business description *</label>
                                    <textarea name="description" class="form-control" rows="7" placeholder="Business description *" value="{{ $business->description }}" id="description" required>{{ $business->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                <label for="description" class="form-label">Contact name *</label>
                                    <input type="text" class="form-control" id="contact_name" aria-describedby="contact_name" name="contact_name" placeholder="Contact name *" value="{{ $business->contact_name }}" required>
                                </div>
                                <div class="mb-3">
                                <label for="description" class="form-label">Business email *</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="email" name="email" placeholder="Business email *" value="{{ $business->email }}" required>
                                </div>
                                <div class="mb-3">
                                <label for="description" class="form-label">Business phone *</label>
                                    <input type="text" class="form-control" id="phone" aria-describedby="phone" name="phone" placeholder="Business phone *" value="{{ $business->phone }}" required>
                                </div>
                                <div class="mb-3">
                                <label for="description" class="form-label">Address *</label>
                                    <input type="text" class="form-control" id="address" aria-describedby="address" name="address" placeholder="Address *" value="{{ $business->address }}" required>
                                </div>

                                <div class="mb-3">
                                <label for="description" class="form-label">Facebook</label>
                                    <input type="url" class="form-control" id="facebook" aria-describedby="facebook" name="facebook" placeholder="Facebook" value="{{ $business->facebook }}">
                                </div>

                                <div class="mb-3">
                                <label for="description" class="form-label">Twitter</label>
                                    <input type="url" class="form-control" id="twitter" aria-describedby="twitter" name="twitter" placeholder="Twitter" value="{{ $business->twitter }}">
                                </div>

                                <div class="mb-3">
                                <label for="description" class="form-label">YouTube</label>
                                    <input type="url" class="form-control" id="you-tube" aria-describedby="you-tube" name="you_tube" placeholder="YouTube" value="{{ $business->you_tube }}">
                                </div>

                                <div class="mb-3">
                                <label for="description" class="form-label">LinkedIn</label>
                                    <input type="url" class="form-control" id="linked-in" aria-describedby="linked-in" name="linked_in" placeholder="LinkedIn" value="{{ $business->linked_in }}">
                                </div>

                                <div class="mb-3">
                                <label for="description" class="form-label">Package *</label>
                                    <input type="text" class="form-control" id="package" aria-describedby="package" name="package" placeholder="Package *" value="{{ $business->package }}" disabled>
                                </div>

                                <div>
                                    <label class="form-label">Business image *</label>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <img src="{{ url('images/businesses', $business->image) }}" alt="" class="img-fluid w-100" style="height: 23rem; object-fit: cover;">
                                            <input type="hidden" class="form-control" name="old_image" value="{{$business->image}}">
                                        </div>

                                        <div class="col-12">
                                            <input type="file" class="form-control" id="image" name="new_image" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <input type="hidden" class="form-control" value="{{$business->id}}" name="hidden_id">
                                    <input type="hidden" class="form-control" value="{{$business->status}}" name="status">
                                    <input type="submit" value="Update" class="btn rounded-pill text-light px-5 py-2" style="background-color: #94ca60;">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary invisible" id="info-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Warning</h4>
                </div>

                <div class="modal-body" style="padding: 2rem 1rem;">
                    <h6 class="mb-0 text-center text-info">If you want to update the already approved business, then we have to approve again. Please consider this before update your business.</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('#info-btn').click();
        });
    </script>

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
