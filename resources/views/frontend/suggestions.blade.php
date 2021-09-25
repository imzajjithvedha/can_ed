@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@push('after-styles')
    <link href="{{ url('css/contact_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container contact-us" style="margin-top: 5rem; margin-bottom: 5rem;">
        <div class="row contact mt-5 justify-content-center">
            <div class="col-12 mb-5">
                <h5 class="fw-bolder">Comments / Suggestions</h5>
                <hr>

                <h6 class="fw-bold mb-2" style="text-align: justify">This page is available only in english and french, the official languages of canada, because it pertains to canadian laws.</h6>

                <p class="gray">keeping in mind that (the road to success is always under construction - lily tomlin): </p>

                <p class="gray">- do you have any comments about our website or suggestions on improvements that could be made?</p>

                <p class="gray">- do you have any comments about our services or any suggestions on how to improve them?</p>

                <p class="gray mt-2">This website is designed and intended to help you find great canadian products, services and companies. We want you 100% comfortable using it, so feel free to contact us with your ideas. we would be happy to hear from you. alternatively, fill in the secure form below.</p>

                <p class="gray fw-bold mt-2">thank you</p>

                <p class="gray fw-bold">the canadian team</p>
            </div>

            <div class="col-8">

                <h5 class="fw-bolder">Feedback Form</h5>

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
                        <textarea class="form-control" rows="7" placeholder="Your comment *"></textarea>
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