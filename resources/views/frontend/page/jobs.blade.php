@extends('frontend.layouts.app')

@section('title', 'Jobs')

@push('after-styles')
    <link href="{{ url('css/jobs.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Jobs in Canada</h4>
        <hr>

        <p class="gray">We follow the canadian national occupational classification (noc) developed by employment and social development canada <a href="https://noc.esdc.gc.ca/Home/AboutTheNoc/be5dedb6d2cb44b48b41662382fb28ab" class="text-decoration-none">read more about the noc</a></p>

        <div class="row justify-content-between mt-5 align-items-center">
            <div class="col-6">
                <form action="">
                    <div class="row align-items-center">
                        <div class="col-8 input-group">
                            <input type="text" class="form-control" id="search_article" aria-describedby="search_article" placeholder="Job title, location, skills">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4 text-end">
                <button class="btn text-white add-btn" data-bs-toggle="modal" data-bs-target="#add-job-alert">Add a job alert</button>
            </div>
        </div>
    </div>


    <!-- <div class="container jobs">
        <p class="bg-info text-white p-2">This section will update after we discussed about jobs dynamic section.</p>
    </div> -->


    <!-- Modal -->
    <form action="">
        <div class="modal fade" id="add-job-alert" tabindex="-1" aria-labelledby="post-quote-label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Post your Job</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3 justify-content-center">
                            
                            <div class="mb-3">
                                <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Job title *" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="City *" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email address *" required>
                            </div>

                            <div class="col-md-6 text-center mt-3">
                                <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn text-white" id="submit_btn" disabled>Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection



@push('after-scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>
@endpush
