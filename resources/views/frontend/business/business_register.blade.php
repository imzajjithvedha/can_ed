@extends('frontend.layouts.app')

@section('title', 'Register a Business')

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
                                <input class="form-check-input" type="radio" name="package" value="basic" required>
                                <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                    Basic
                                </label>
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="border p-3">
                                <p class="gray fw-bold">Standard Ad, Expires in 30 days- Free</p>
                                <p class="gray fw-bold">One business category</p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row align-items-center mb-4">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input extra" type="radio" name="package" value="premium">
                                <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                    Premium
                                </label>
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="border p-3">
                                <p class="gray fw-bold">Up to 4x views</p>
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
                                <input class="form-check-input extra" type="radio" name="package" value="featured">
                                <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                    Featured
                                </label>
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="border p-3">
                                <p class="gray fw-bold">Up to 20x views</p>
                                <p class="gray fw-bold">Three business categories</p>
                                <p class="gray fw-bold">Link to your website</p>
                                <p class="gray fw-bold">Top ad and bump up every week</p>
                                <p class="gray fw-bold">$129.99</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <select class="form-control" id="category_1" name="category_1" placeholder="Business category" required>
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
                        <label for="image" class="form-label">Business image *</label>
                        <input class="form-control" type="file" id="image" name="image" required>
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

                    <div class="mb-4 border p-3">
                        <p class="gray fw-bold">Based on our analysis, compared to the basic package. We do not guarantee any number of visitors, views, impressions, replies, conversion or bounce rats.</p>
                    </div>

                    <div class="mb-5 border p-3">
                        <p class="gray fw-bold">By clicking (Submit) below, you are agreeing to our <a href="{{ route('frontend.disclaimer') }}" class="text-decoration-none">Disclaimer</a> and <a href="{{ 'frontend.privacy_policy' }}" class="text-decoration-none">Privacy Policy</a></p>
                    </div>

                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-8 text-center">
                            <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5 py-3 text-white" id="submit_btn" disabled>Submit</button>
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

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you for your request. We will check and approve as soon as possible.</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('frontend.index') }}" class="btn text-white" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Refresh</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection


@push('after-scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
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
    </script>
@endpush
