@extends('frontend.layouts.app')

@section('title', 'Careers')

@push('after-styles')
    <link href="{{ url('css/careers.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container careers" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h5 class="fw-bolder">Careers in Canada</h5>

        <form action="{{ route('frontend.article_search') }}"  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-8">
                    <hr>
                </div>
                <div class="col-4 input-group">
                    <input type="text" class="form-control text-center" id="keyword" name="keyword" aria-describedby="search_article" placeholder="Search articles">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>

        
        <div class="row mt-5">
            <div class="col-7">
                <ul class="nav nav-pills mb-3 w-100" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active p-2" id="pills-career-tab" data-bs-toggle="pill" data-bs-target="#pills-career" type="button" role="tab" aria-controls="pills-career" aria-selected="true" style="width:206px; height: 100%;">{{ $how_careers->title }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link p-2" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="false" style="width:206px; height: 100%;">All Careers</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link p-2" id="pills-hot-tab" data-bs-toggle="pill" data-bs-target="#pills-hot" type="button" role="tab" aria-controls="pills-hot" aria-selected="false" style="width:206px; height: 100%;">{{ $hot_careers->title }}</button>
                    </li>
                </ul>


                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-career" role="tabpanel" aria-labelledby="pills-career-tab">
                        <div class="gray mt-2" style="text-align: justify;">
                            {!! $how_careers->description !!}
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">

                            <h6 class="fw-bold" style="font-size: 1.1rem;">Major group 06 middle management occupations in retail and wholesale trade and customer services</h6>

                            <div class="mt-2">
                                <p class="fw-bold mb-2">060 corporate sales managers</p>

                                <p class="gray">0601 corporate sales managers</p>

                            </div>

                            <div class="mt-2">
                                <p class="fw-bold mb-2">062 retail and wholesale trade managers</p>

                                <p class="gray">0621 retail and wholesale trade managers</p>
                                
                            </div>

                            <div class="mt-2">
                                <p class="fw-bold mb-2">063 managers in food service and accommodation</p>

                                <p class="gray">0631 restaurant and food service managers</p>
                                <p class="gray">0632 accommodation service managers</p>
                                
                            </div>

                    </div>

                    <div class="tab-pane fade" id="pills-hot" role="tabpanel" aria-labelledby="pills-hot-tab">
                        <div class="gray mt-2" style="text-align: justify;">
                            {!! $hot_careers->description !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <h5 class="fw-bolder">Helpful Articles</h5>
                <hr>

                @foreach($more_articles as $article)
                    <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                        <div class="row align-items-center border py-2" style="margin: 0 0rem; margin-bottom: 1rem;">
                            <div class="col-6">
                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 6rem; object-fit: cover;">
                            </div>

                            <div class="col-6">
                                <p class="fw-bold gray">{{ $article->title }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
