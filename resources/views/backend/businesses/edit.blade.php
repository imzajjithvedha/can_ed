@extends('backend.layouts.app')

@section('title', 'Business approval | Admin')

@section('content')
    
    <form action="{{route('admin.businesses.update_business')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card quote">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Business name *</label>
                                <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Business name *" value="{{ $business->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_1" class="form-label">Business category *</label>
                                <select class="form-control" id="category_1" name="category_1" placeholder="Business Category" required>
                                    <option value="" selected disabled hidden>Business category *</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == App\Models\Businesses::where('id', $business->id)->first()->category_1 ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 category_2">
                                <label for="category_2" class="form-label">Business category *</label>
                                <select class="form-control" id="category_2" name="category_2" placeholder="Business Category">
                                    <option value="" selected disabled hidden>Business category *</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == App\Models\Businesses::where('id', $business->id)->first()->category_2 ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 category_3">
                                <label for="category_3" class="form-label">Business category *</label>
                                <select class="form-control" id="category_3" name="category_3" placeholder="Business Category">
                                    <option value="" selected disabled hidden>Business category *</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == App\Models\Businesses::where('id', $business->id)->first()->category_3 ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description *</label>
                                <textarea name="description" class="form-control" rows="7" placeholder="Business Description *" value="{{ $business->description }}" id="description" required>{{ $business->description }}</textarea>
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
                                <label for="phone" class="form-label">Business phone *</label>
                                <input type="text" class="form-control" id="phone" aria-describedby="phone" name="phone" placeholder="Business phone" value="{{ $business->phone }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address *</label>
                                <input type="text" class="form-control" id="address" aria-describedby="address" name="address" placeholder="Address" value="{{ $business->address }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">Link</label>
                                <input type="text" class="form-control" id="url" aria-describedby="url" name="url" placeholder="Link" value="{{ $business->url }}">
                            </div>

                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="url" class="form-control" id="facebook" aria-describedby="facebook" name="facebook" placeholder="Facebook" value="{{ $business->facebook }}">
                            </div>

                            <div class="mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="url" class="form-control" id="twitter" aria-describedby="twitter" name="twitter" placeholder="Twitter" value="{{ $business->twitter }}">
                            </div>

                            <div class="mb-3">
                                <label for="you-tube" class="form-label">YouTube</label>
                                <input type="url" class="form-control" id="you-tube" aria-describedby="you-tube" name="you_tube" placeholder="YouTube" value="{{ $business->you_tube }}">
                            </div>

                            <div class="mb-3">
                                <label for="linked-in" class="form-label">LinkedIn</label>
                                <input type="url" class="form-control" id="linked-in" aria-describedby="linked-in" name="linked_in" placeholder="LinkedIn" value="{{ $business->linked_in }}">
                            </div>

                            <div class="mb-3">
                            <label for="package" class="form-label">Package *</label>
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
                                <div class="row">

                                    @if($business->image != null)
                                        @foreach(json_decode($business->image) as $index => $im)

                                        <div class="col-4 mb-3">
                                            <img src="{{ url('images/businesses', $im) }}" alt="" class="img-fluid w-100" style="height: 8rem; object-fit: cover;">
                                            
                                        </div>
                                                
                                        @endforeach
                                        <input type="hidden" class="form-control" name="old_image" value="{{$business->image}}">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 8rem; object-fit: cover;">
                                    @endif
                                </div>

                                
                                <input type="file" class="form-control" id="image" name="new_image[]" value="">
                                
                            </div>

                            <div class="form-group">
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="Approved" {{ $business->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Pending" {{ $business->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="featured" class="form-label">Do you want to show this business in the homepage? *</label>
                                <select class="form-control" name="featured" id="featured" required>
                                    <option value="Yes" {{ $business->featured == 'Yes' ? "selected" : "" }}>Yes</option>   
                                    <option value="No" {{ $business->featured == 'No' ? "selected" : "" }}>No</option>                               
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status" class="form-label">Do you want to show this business under student services? *</label>
                                <select class="form-control" name="student_service" id="student-service" required>
                                    <option value="Yes" {{ $business->student_service == 'Yes' ? "selected" : "" }}>Yes</option>   
                                    <option value="No" {{ $business->student_service == 'No' ? "selected" : "" }}>No</option>                               
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="advertised" class="form-label">Do you want to redirect this event to advertiser site?*</label>
                                <select class="form-control" name="advertised" id="advertised" required>
                                    <option value="Yes" {{ $business->advertised == 'Yes' ? "selected" : "" }}>Yes</option>   
                                    <option value="No" {{ $business->advertised == 'No' ? "selected" : "" }}>No</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $business->id }}"/>
                                <a href="{{ route('admin.businesses.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" id="update-btn" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
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



        $(document).ready(function() {
            if($('#package').val() == 'premium') {
                $('#image').attr('multiple', true);
            }
            else if($('#package').val() == 'featured') {
                $('#image').attr('multiple', true);
            }
        });
        


        $("#image").on("change", function() {

            if($('#package').val() == 'premium') {

                if ($("#image")[0].files.length > 5) {
                    alert("You can select only 5 images for a premium business");
                    $('#update-btn').attr('disabled', 'disabled');

                } else {
                
                    $('#update-btn').removeAttr('disabled');

                }
            } 

            else if ($('#package').val() == 'featured') {

                if ($("#image")[0].files.length > 10) {
                    alert("You can select only 10 images for a featured business");
                    $('#update-btn').attr('disabled', 'disabled');

                } else {

                    $('#update-btn').removeAttr('disabled');

                }
            }
            });
        
    </script>

@endpush
