@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Register a business')

@push('after-styles')
    <link href="{{ url('css/business.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Register a business</h4>
        <hr>

        <form class="mt-5" action="{{ route('frontend.business_register_request') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="text-end">
                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                    </div>
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
                                <ul class="gray fw-bold mb-0" style="font-size: 0.9rem">
                                    <li>Standard ad, expires in 30 days - Free</li>
                                    <li>One business category</li>
                                </ul>
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
                                <ul class="gray fw-bold mb-0" style="font-size: 0.9rem">
                                    <li>Up to 4x more views</li>
                                    <li>Three business categories</li>
                                    <li>Link to your website</li>
                                    <li>Top ad and bump up every month</li>
                                    <li>$9.99</li>
                                </ul>
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
                                <ul class="gray fw-bold mb-0" style="font-size: 0.9rem">
                                    <li>Up to 20x more views</li>
                                    <li>Three business categories</li>
                                    <li>Link to your website</li>
                                    <li>Top ad and bump up every week</li>
                                    <li>You ad appears on the home page</li>
                                    <li>$129.99</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <select class="form-control form-select" id="category_1" name="category_1" placeholder="Business category" required>
                            <option value="" selected disabled hidden>Business category 1 *</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 category_2 d-none">
                        <select class="form-control form-select" id="category_2" name="category_2" placeholder="Business category">
                            <option value="" selected disabled hidden>Business category 2</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 category_3 d-none">
                        <select class="form-control form-select" id="category_3" name="category_3" placeholder="Business category">
                            <option value="" selected disabled hidden>Business category 3</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <textarea name="description" class="form-control" rows="7" placeholder="Description *" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="contact_name" aria-describedby="contact_name" name="contact_name" placeholder="Contact name *" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" aria-describedby="email" name="email" placeholder="Email *" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="phone" aria-describedby="phone" name="phone" placeholder="Phone *" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="address" aria-describedby="address" name="address" placeholder="Address *" required>
                    </div>

                    <div class="mb-3">
                        <h6 class="fw-bold mt-4 mb-3" style="font-size: 1rem;">Media (optional)</h6>
                        <input type="url" class="form-control" id="url" aria-describedby="url" name="url" placeholder="Website URL">
                    </div>

                    <div class="mb-3 basic-image">
                        <label for="image" class="form-label">Basic business image * (Files must be less than 5MB, allowed file types: png, gif, jpg, jpeg)</label>
                        <input class="form-control" type="file" id="basic-image" name="single_image">
                    </div>

                    <div class="mb-3 d-none premium-images">
                        <label for="image" class="form-label">Premium business images * (Files must be less than 5MB, allowed file types: png, gif, jpg, jpeg)</label>
                        <input class="form-control" type="file" id="premium-images" name="image[]" multiple>
                    </div>

                    <div class="mb-3 d-none featured-images">
                        <label for="image" class="form-label">Featured business images * (Files must be less than 5MB, allowed file types: png, gif, jpg, jpeg)</label>
                        <input class="form-control" type="file" id="featured-images" name="image[]" multiple>
                    </div>


                    <h6 class="fw-bold mt-5 mb-4" style="font-size: 1rem;">Social media (optional)</h6>
                    
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

                    <div class="mb-4 border p-3">
                        <p class="gray fw-bold">Based on our analysis, compared to the basic package. We do not guarantee any number of visitors, views, impressions, replies, conversion or bounce rats.</p>
                    </div>

                    <div class="mb-5 border p-3">
                        <p class="gray fw-bold">By clicking (Submit) below, you are agreeing to our <a href="{{ route('frontend.disclaimer') }}" class="text-decoration-none">Disclaimer</a> and <a href="{{ route('frontend.privacy_policy') }}" class="text-decoration-none">Privacy policy</a></p>
                    </div>

                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-8 text-center">
                            <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5 py-3 text-white w-50" id="submit_btn" disabled>Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you for your request. We will check and approve as soon as possible.</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a href="{{ route('frontend.index') }}" class="btn text-white w-25" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Refresh</a>
                    </div>
                </div>
            </div>
        </div>
    @endif



    @auth
        
    @else
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#warningModal"></button>

        <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body" style="padding: 4rem 1rem;">
                        <h4 class="mb-0 text-center">You must be logged in to register a business</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a href="{{ URL::previous() }}" class="btn text-white w-25" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Back</a>
                        <a href="{{ route('frontend.auth.register') }}" class="btn text-white w-25" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Create a new account</a>
                        <a href="{{ route('frontend.auth.login') }}" class="btn text-white w-25" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    @endauth

@endsection


@push('after-scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            if($("#basic-image")[0].files.length < 2 || $("#premium-images")[0].files.length < 6 || $("#featured-images")[0].files.length < 11) {
                $('#submit_btn').removeAttr('disabled');
            }

            // $('#submit_btn').removeAttr('disabled');
        };
    </script>

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

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



        $("#premium-images").on("change", function() {
            if ($("#premium-images")[0].files.length > 5) {
                alert("You can select only 5 images for a premium business");
                $('#submit_btn').attr('disabled', 'disabled');
            } else {
                
                if(grecaptcha && grecaptcha.getResponse().length !== 0){
                    $('#submit_btn').removeAttr('disabled');
                }
            }
                
        });

        $("#featured-images").on("change", function() {
            if ($("#premium-images")[0].files.length > 10) {
                alert("You can select only 10 images for a featured business");
                $('#submit_btn').attr('disabled', 'disabled');
            } else {
                
                if(grecaptcha && grecaptcha.getResponse().length !== 0){
                    $('#submit_btn').removeAttr('disabled');
                }
            }
                
        });
    </script>
@endpush
