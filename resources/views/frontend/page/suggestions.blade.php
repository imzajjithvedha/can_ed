@extends('frontend.layouts.app')

@section('title', 'Comments/ suggestions')

@push('after-styles')
    <link href="{{ url('css/contact_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container contact-us" style="margin-top: 5rem; margin-bottom: 5rem;">
        <div class="row contact mt-5 justify-content-center">
            <div class="col-12 mb-5">
                <h4 class="fw-bolder futura">Comments / suggestions</h4>
                <hr>

                <h6 class="fw-bold mb-2" style="text-align: justify">This page is available only in English and French, the official languages of Canada, because it pertains to Canadian laws.</h6>

                <p class="gray">keeping in mind that (the road to success is always under construction - Lily Tomlin): </p>

                <p class="gray">- do you have any comments about our website or suggestions on improvements that could be made?</p>

                <p class="gray">- do you have any comments about our services or any suggestions on how to improve them?</p>

                <p class="gray mt-2">This website is designed and intended to help you find great Canadian products, services and companies. We want you 100% comfortable using it, so feel free to contact us with your ideas. We would be happy to hear from you. alternatively, fill in the secure form below.</p>

                <p class="gray fw-bold mt-2">Thank you</p>

                <p class="gray fw-bold">The Canadian team</p>
            </div>

            <div class="col-8">

                <h4 class="fw-bolder futura">Feedback form</h4>

                <hr>

                <div class="text-end">
                    <p class="mb-2 required fw-bold">* Indicates required fields</p>
                </div>

                <form action="{{ route('frontend.suggestion_send') }}" method="POST">
                {{csrf_field()}}
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Your name *" name="name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Your email *" name="email" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="7" placeholder="Your comment *" name="message" required></textarea>
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
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#successModal"></button>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you very much for your feedback about our website. We will consider your suggestion and do the changes as soon as possible.</h4>
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