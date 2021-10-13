@extends('frontend.layouts.app')

@section('title', 'Business: '.$business->name)

@push('after-styles')
    <link href="{{ url('css/business.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 single-business">

        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-8">
                        <h5 class="fw-bolder">{{ $business->name }}</h5>
                    </div>

                    @auth
                        @if(is_favorite_business( $business->id, auth()->user()->id))
                            <div class="col-4 text-end">
                                <form action="{{ route('frontend.favorite_business') }}" method="POST">
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $business->id }}">
                                    <input type="hidden" name='favorite' value="favorite">
                                    <button type="submit" class="fas fa-heart favorite-heart text-decoration-none"></button>
                                </form>
                            </div>
                        @else
                            <div class="col-4 text-end">
                                <form action="{{ route('frontend.favorite_business') }}" method="POST">
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $business->id }}">
                                    <input type="hidden" name='favorite' value="non-favorite">
                                    <button type="submit" class="far fa-heart favorite-heart text-decoration-none"></button>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="col-4 text-end">
                            <a href="{{ route('frontend.auth.login') }}" class="far fa-heart favorite-heart text-decoration-none"></a>
                        </div>
                    @endauth
                </div>
               
                <hr>

                <div class="row">
                    <div class="col-9">
                        <img src="{{ url('images/businesses', $business->image) }}" alt="" class="img-fluid w-100" style="height: 20rem; object-fit: cover;">
                    </div>
                    <div class="col-3">
                        <p class="fw-bold">Social Media</p>
                        <hr class="my-2">
                        @if($business->facebook != null)
                            <a href="{{ $business->facebook }}" class="d-block border mb-2 p-2 text-center school-social text-decoration-none"><i class="fab fa-facebook-f"></i></a>
                        @endif

                        @if($business->twitter != null)
                            <a href="{{ $business->twitter }}" class="d-block border mb-2 p-2 text-center school-social text-decoration-none"><i class="fab fa-twitter"></i></a>
                        @endif

                        @if($business->you_tube != null)
                            <a href="{{ $business->you_tube }}" class="d-block border mb-2 p-2 text-center school-social text-decoration-none"><i class="fab fa-linkedin-in"></i></a>
                        @endif

                        @if($business->linked_in != null)
                            <a href="{{ $business->linked_in }}" class="d-block border mb-2 p-2 text-center school-social text-decoration-none"><i class="fab fa-youtube"></i></a>
                        @endif
                        

                        <p class="fw-bold mt-3">Contact</p>
                        <hr class="my-2">
                        <button type="button" class="fw-bold border-0 bg-white" data-bs-toggle="modal" data-bs-target="#exampleModal"class="fw-bold" style="color: #800000; font-size: 0.9rem"><i class="fas fa-envelope me-2"></i>Send a message</button>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="tab-button-outer">
                            <ul id="tab-button">
                                <li><a><b>Quick Facts</b></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div id="details" class="tab-contents">
                    <div class="row" style="margin-left:0px;margin-right:0px;">
                        <div class="col-md-4 tile">
                            <div class="form-group">
                                <h4 style="color:black">Business Category:</h4>
                                <p>{{ App\Models\BusinessCategories::where('id', $business->category_1)->first()->name }}</p>
                                @if($business->category_2 != null)
                                    <p>{{ App\Models\BusinessCategories::where('id', $business->category_2)->first()->name }}</p>
                                @endif
                                @if($business->category_3 != null)
                                    <p>{{ App\Models\BusinessCategories::where('id', $business->category_3)->first()->name }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-8 tile">
                            <div class="form-group">
                                <h4 style="color:black">Description:</h4>
                                <p>{{ $business->description }}</p>
                            </div>
                        </div>

                        <div class="col-lg-4 tile">
                            <div class="form-group">
                                <h4 style="color:black">Contact Person:</h4>
                                <p>{{ $business->contact_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 tile">
                            <div class="form-group">
                                <h4 style="color:black">Email:</h4>
                                <p>{{ $business->email }}</p>
                            </div>
                        </div>

                        <div class="col-lg-4 tile">
                            <div class="form-group">
                                <h4 style="color:black">Phone:</h4>
                                <p>{{ $business->phone }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12 tile">
                            <div class="form-group">
                                <h4 style="color:black">Address:</h4>
                                <p>{{ $business->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <h5 class="fw-bolder">Related Businesses</h5>
                <hr>

                @foreach($more_businesses as $business)
                    <div class="card mb-4">
                        <a href="{{ route('frontend.single_business', $business->id) }}" class="text-decoration-none">
                            <img src="{{ url('images/businesses', $business->image) }}" class="card-img-top" alt="..." style="    height: 8rem; object-fit: cover;">
                            <div class="card-body text-center">
                                <h6 class="card-title fw-bold gray">{{ $business->name }}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <!-- Modal -->
    <form>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Contact Business</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-end">
                            <p class="mb-2 required fw-bold">* Indicates required fields</p>
                        </div>
                        
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Your name *" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" placeholder="Your email *" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="7" placeholder="Your message *" required></textarea>
                        </div>

                        <div class="row mb-4 justify-content-center">
                            <div class="col-md-8 text-center">
                                <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submit_btn" disabled>Send Message</button>
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
