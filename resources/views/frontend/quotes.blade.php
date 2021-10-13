@extends('frontend.layouts.app')

@section('title', 'Quotes')

@push('after-styles')
    <link href="{{ url('css/quotes.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h5 class="fw-bolder">Quotes</h5>

        <div class="row align-items-center">
            <div class="col-10 pe-0">
                <hr>
            </div>
            <div class="col-2 text-end ps-0">
                @auth
                    <button class="btn text-white post-btn" data-bs-toggle="modal" data-bs-target="#post-quote">Post your quote</button>
                @else
                    <a href="{{ route('frontend.auth.login') }}" type="button" class="btn text-white post-btn">Post your quote</a>
                @endauth
            </div>
        </div>
    </div>


    <div class="container quotes">
        @if(count($quotes) == 0)
                    @include('frontend.includes.not_found_title',[
                        'not_found_title' => 'Quotes not found',
                        'not_found_description' => 'If you want you can post your quote here.'
                    ])
        @else
            <div class="row">
                @foreach($quotes as $quote)
                    <div class="col-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="fw-bolder mb-2 text-center" style="text-align:justify;">{{ $quote->quote}}</p>
                                <p class="card-text gray text-center">{{ App\Models\Auth\User::where('id', $quote->user_id)->first()->first_name}} {{ App\Models\Auth\User::where('id', $quote->user_id)->first()->last_name}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>


    <!-- Modal -->
    <form action="{{ route('frontend.quote_request') }}" method="POST">
    {{csrf_field()}}
        <div class="modal fade" id="post-quote" tabindex="-1" aria-labelledby="post-quote-label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Quote Submission Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-end">
                            <p class="mb-2 required fw-bold">* Indicates required fields</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <textarea class="form-control" rows="7" name="quote" placeholder="Write your quote here *" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-center">
                            <div class="col-md-6 text-center">
                                <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white" id="submit_btn" disabled>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you for your quote. It will appear here once approved</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('frontend.quotes') }}" class="btn text-white" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</a>
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
