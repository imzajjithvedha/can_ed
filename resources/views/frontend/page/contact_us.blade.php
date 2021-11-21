@extends('frontend.layouts.app')

@section('title', 'Contact us')

@push('after-styles')
    <link href="{{ url('css/contact_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container contact-us" style="margin-top: 5rem; margin-bottom: 5rem;">
        <div class="row contact mt-5">
            <div class="col-6">
                <h4 class="fw-bolder futura">Contact information</h4>
                <hr>

                <p class="gray">We communicate with over 100 countries. please write to us in english. thank you for understanding and sorry for inconvenience.</p>

                <div class="row mt-4 mb-2 ps-3">
                    <div class="col-5">
                        <p class="gray">Mailing Address:</p>
                    </div>
                    <div class="col-7">
                        <p class="gray">{{ $information->address_1 }}</p>
                        <p class="gray">{{ $information->address_2 }}</p>
                        <p class="gray">{{ $information->address_3 }}</p>
                        <p class="gray">{{ $information->address_4 }}</p>
                        <p class="gray">{{ $information->address_5 }}</p>
                    </div>
                </div>

                <div class="row mb-2 ps-3">
                    <div class="col-5">
                        <p class="gray">Telephone:</p>
                    </div>
                    <div class="col-7">
                        <p class="gray">{{ $information->telephone }}</p>
                    </div>
                </div>

                <div class="row mb-2 ps-3">
                    <div class="col-5">
                        <p class="gray">Email:</p>
                    </div>
                    <div class="col-7">
                        <p class="gray">{{ $information->email }}</p>
                    </div>
                </div>

                <div class="row mb-2 ps-3">
                    <div class="col-5">
                        <p class="gray">Website:</p>
                    </div>
                    <div class="col-7">
                        <p class="gray">{{ $information->website_url }}</p>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <h4 class="fw-bolder futura">Get in touch</h4>
                <hr>
                <div class="text-end">
                    <p class="mb-2 required fw-bold">* Indicates required fields</p>
                </div>
                <form action="{{ route('frontend.contact_send') }}" method="POST">
                {{csrf_field()}}
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Your name *" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your email *" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="7" placeholder="Your message *" name="message" required></textarea>
                    </div>

                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-6 text-center">
                            <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-100" id="submit_btn" disabled>Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(\Session::has('success'))
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you very much for contacting us. We will reply you as soon as possible.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


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

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

@endpush