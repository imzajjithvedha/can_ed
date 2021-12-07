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

        <!-- <div class="row justify-content-between mt-5 align-items-center">
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
        </div> -->

        <div class="row mt-5">
            @if(count($articles) > 0)
                <div class="col-3 more-articles">
                    <h6 class="fw-bold related-articles futura mb-4">Helpful articles</h6>
                    
                    <div class="row align-items-center">

                        @foreach($articles as $article)
                        
                            @if($article->color == 'blue')

                                <div class="col-12 mb-3">
                                    <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                                        <div class="card border-0">
                                            @if($article->image != null)
                                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                            @else
                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                            @endif
                                            <div class="card-body text-center p-3 article-blue rounded-0">
                                                <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @elseif($article->color == 'red')

                                <div class="col-12 mb-3">
                                    <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                                        <div class="card border-0">
                                            @if($article->image != null)
                                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                            @else
                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                            @endif
                                            <div class="card-body text-center p-3 article-red rounded-0">
                                                <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @elseif($article->color == 'gray')

                                <div class="col-12 mb-3">
                                    <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                                        <div class="card border-0">
                                            @if($article->image != null)
                                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                            @else
                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                            @endif
                                            <div class="card-body text-center p-3 article-gray rounded-0">
                                                <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="col-8">

                
            </div>
        </div>
    </div>

@endsection



@push('after-scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>
@endpush
