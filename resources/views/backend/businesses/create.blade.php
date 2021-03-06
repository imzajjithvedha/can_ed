@extends('backend.layouts.app')

@section('title', __('Create new business | Admin'))

@section('content')



    <form action="{{ route('admin.businesses.store_business') }}" method="post" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <!-- <div class="text-end">
                                <p class="mb-2 required fw-bold">* Indicates required fields</p>
                            </div> -->
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Business name *" required>
                            </div>

                            <h6 class="fw-bold mt-5 mb-4" style="font-size: 1.15rem;">Select your registration package *</h6>

                            <div class="row align-items-center mb-4">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input basic" type="radio" name="package" value="basic" required>
                                        <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                            Basic
                                        </label>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="border p-3">
                                        <p class="gray fw-bold">Standard ad, expires in 30 days - Free</p>
                                        <p class="gray fw-bold">One business category</p>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="row align-items-center mb-4">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input premium extra" type="radio" name="package" value="premium">
                                        <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                            Premium
                                        </label>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="border p-3">
                                        <p class="gray fw-bold">Up to 4x more views</p>
                                        <p class="gray fw-bold">Three business categories</p>
                                        <p class="gray fw-bold">Link to your website</p>
                                        <p class="gray fw-bold">Top ad and bump up every week</p>
                                        <p class="gray fw-bold">$9.99</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center mb-5">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input featured extra" type="radio" name="package" value="featured">
                                        <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                            Featured
                                        </label>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="border p-3">
                                        <p class="gray fw-bold">Up to 20x more views</p>
                                        <p class="gray fw-bold">Three business categories</p>
                                        <p class="gray fw-bold">Link to your website</p>
                                        <p class="gray fw-bold">Top ad and bump up every week</p>
                                        <p class="gray fw-bold">$129.99</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <select class="form-control" id="category_1" name="category_1" placeholder="Business category *" required>
                                    <option value="" selected disabled hidden>Business category *</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 category_2 d-none">
                                <select class="form-control" id="category_2" name="category_2" placeholder="Business category">
                                    <option value="" selected disabled hidden>Business category *</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 category_3 d-none">
                                <select class="form-control" id="category_3" name="category_3" placeholder="Business category">
                                    <option value="" selected disabled hidden>Business category *</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="7" placeholder="Business description *" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="contact_name" aria-describedby="contact_name" name="contact_name" placeholder="Contact name *" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" aria-describedby="email" name="email" placeholder="Business email *" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="phone" aria-describedby="phone" name="phone" placeholder="Business phone *" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="address" aria-describedby="address" name="address" placeholder="Address *" required>
                            </div>
                            <div class="mb-3">
                                <input type="url" class="form-control" id="url" aria-describedby="url" name="url" placeholder="Link">
                            </div>

                            <div class="mb-3 basic-image">
                                <label for="image" class="form-label">Basic business image *</label>
                                <input class="form-control" type="file" id="basic-image" name="single_image">
                            </div>

                            <div class="mb-3 d-none premium-images">
                                <label for="image" class="form-label">Premium business images *</label>
                                <input class="form-control" type="file" id="premium-images" name="image[]" multiple>
                            </div>

                            <div class="mb-3 d-none featured-images">
                                <label for="image" class="form-label">Featured business images *</label>
                                <input class="form-control" type="file" id="featured-images" name="image[]" multiple>
                            </div>


                            <h6 class="fw-bold mt-5 mb-4" style="font-size: 1.15rem;">Social media (optional)</h6>
                            
                            <div class="mb-3">
                                <input type="url" class="form-control" id="facebook" aria-describedby="facebook" name="facebook" placeholder="Facebook">
                            </div>

                            <div class="mb-3">
                                <input type="url" class="form-control" id="twitter" aria-describedby="twitter" name="twitter" placeholder="Twitter">
                            </div>

                            <div class="mb-3">
                                <input type="url" class="form-control" id="you-tube" aria-describedby="you-tube" name="you_tube" placeholder="YouTube">
                            </div>

                            <div class="mb-3">
                                <input type="url" class="form-control" id="linked-in" aria-describedby="linked-in" name="linked_in" placeholder="LinkedIn">
                            </div>

                            <div class="form-group">
                                <select class="form-control" id="featured" name="featured" placeholder="Featured?" required>
                                    <option value="" selected disabled hidden>Do you want to show this business in the homepage? *</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control" id="student-service" name="student_service" placeholder="Do you want to show this business under student services? *" required>
                                    <option value="" selected disabled hidden>Do you want to show this business under student services? *</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control" id="advertised" name="advertised" placeholder="Advertised? *" required>
                                    <option value="" selected disabled hidden>Do you want to redirect this business to advertiser site?*</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-success" id="submit_btn" disabled>Create new</button><br>
                </div>
            </div>    
        </div>
    </form>

@endsection


@push('after-scripts')
<script>
        $('.form-check-input').on('click', function() {
            if($(this).hasClass('extra')) {
                $('.category_2').removeClass('d-none');
                $('.category_3').removeClass('d-none');
            } else {
                $('.category_2').addClass('d-none');
                $('.category_3').addClass('d-none');
            }
        });

        $('.form-check-input').on('click', function() {
            if($(this).hasClass('premium')) {
                $('.premium-images').removeClass('d-none');
                $('.basic-image').addClass('d-none');
                $('.featured-images').addClass('d-none');
            } else if ($(this).hasClass('featured')) {
                $('.featured-images').removeClass('d-none');
                $('.basic-image').addClass('d-none');
                $('.premium-images').addClass('d-none');
            }
            else if ($(this).hasClass('basic')) {
                $('.basic-image').removeClass('d-none');
                $('.premium-images').addClass('d-none');
                $('.featured-images').addClass('d-none');
            }
        });


        $("#basic-image").on("change", function() {
            if ($("#basic-image")[0].files.length != 1) {
                $('#submit_btn').attr('disabled', 'disabled');
            } else {
                $('#submit_btn').removeAttr('disabled');
            }
                
        });


        $("#premium-images").on("change", function() {
            if ($("#premium-images")[0].files.length > 5) {
                alert("You can select only 5 images for a premium business");
                $('#submit_btn').attr('disabled', 'disabled');
            } else {
                $('#submit_btn').removeAttr('disabled');
            }
                
        });

        $("#featured-images").on("change", function() {
            if ($("#premium-images")[0].files.length > 10) {
                alert("You can select only 10 images for a featured business");
                $('#submit_btn').attr('disabled', 'disabled');
            } else {
                $('#submit_btn').removeAttr('disabled');
            }
                
        });
    </script>
@endpush
