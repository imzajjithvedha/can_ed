@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@push('after-styles')
    <link href="{{ url('css/contact_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container contact-us" style="margin-top: 5rem; margin-bottom: 5rem;">
        <div class="row contact mt-5">
            <div class="col-6">
                <h5 class="fw-bolder">Contact Information</h5>
                <hr>

                <p class="gray">We communicate with over 100 countries. please write to us in english. thank you for understanding and sorry for inconvenience.</p>

                <div class="row mt-4 mb-2 ps-3">
                    <div class="col-5">
                        <p class="gray">Mailing Address:</p>
                    </div>
                    <div class="col-7">
                        <p class="gray">1051 Blvd Decarie</p>
                        <p class="gray">P.O. Box: 53555 NORGATE</p>
                        <p class="gray">Montreal - Qc.</p>
                        <p class="gray">Canada</p>
                        <p class="gray">Postal Code: H4L 3M0</p>
                    </div>
                </div>

                <div class="row mb-2 ps-3">
                    <div class="col-5">
                        <p class="gray">Telephone:</p>
                    </div>
                    <div class="col-7">
                        <p class="gray">+1-514-557-7856 (From the rest of the world)</p>
                    </div>
                </div>

                <div class="row mb-2 ps-3">
                    <div class="col-5">
                        <p class="gray">Email:</p>
                    </div>
                    <div class="col-7">
                        <p class="gray">info@studyingincanada.org</p>
                    </div>
                </div>

                <div class="row mb-2 ps-3">
                    <div class="col-5">
                        <p class="gray">Website:</p>
                    </div>
                    <div class="col-7">
                        <p class="gray">www.studyingincanada.org</p>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <h5 class="fw-bolder">Get in touch</h5>
                <hr>
                    <div class="text-end">
                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                    </div>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Your name *">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" placeholder="Your email *">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="7" placeholder="Your message *"></textarea>
                        </div>

                        <div class="row mb-4 justify-content-center">
                            <div class="col-md-6 text-center">
                                <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-100" id="submit_btn" disabled>Send Message</button>
                        </div>

                        
                    </form>

            </div>
        </div>
    </div>
@endsection




@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>

@endpush