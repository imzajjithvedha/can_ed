@extends('frontend.layouts.app')

@section('title', 'Articles')

@push('after-styles')
    <link href="{{ url('css/articles.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h5 class="fw-bolder">Articles: to the students</h5>

        <form action="{{ route('frontend.article_search') }}"  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-7">
                    <hr>
                </div>
                <div class="col-2 input-group">
                    <a href="{{ route('frontend.articles') }}" type="text" class="form-control text-center text-decoration-none" style="font-size: 0.95rem">All articles</a>
                </div>
                <div class="col-3 input-group">
                    <input type="text" class="form-control text-center" id="keyword" name="keyword" aria-describedby="search_article" placeholder="Search articles">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>


        <div class="articles mt-5">
            @if(count($filteredArticles) == 0)
                @include('frontend.includes.not_found_title',[
                    'not_found_title' => 'Article not found',
                    'not_found_description' => 'Please check later.'
                ])
            @else
                @foreach($filteredArticles as $article)
                    <div class="row justify-content-between border py-3 px-2 mb-3">
                        <div class="col-4">
                            @if($article->image != null)
                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid" style="height: 14rem; object-fit: cover;">
                            @else
                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 14rem; object-fit: cover;">
                            @endif

                            <p class="gray mt-4">Updated: {{ $article->updated_at }}</p>
                        </div>

                        <div class="col-8">
                            <h6 class="fw-bolder">{{ $article->title }}</h6>
                            <div class="gray mt-2" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{!! $article->description !!}</div>

                            <p class="mt-2">By: Admin</p>

                            <div class="row align-end mt-3 justify-content-end">
                                <div class="col-4 text-end">
                                    <a href="{{ route('frontend.single_article', $article->id) }}" type="button" class="btn text-white continue-article-btn">Continue Reading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
