@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Articles')

@push('after-styles')
    <link href="{{ url('css/articles.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container inner-parent" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Articles: to the students</h4>

        <form action="{{ route('frontend.article_search') }}"  method="POST" novalidate>
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-12 col-md-7 col-lg-9">
                    <hr>
                </div>
                <div class="col-12 col-md-5 col-lg-3 input-group">
                    <input type="text" class="form-control text-center" id="keyword" name="keyword" aria-describedby="search_article" placeholder="Search articles">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>


        <div class="articles mt-5">
            @if(count($articles) == 0)
                @include('frontend.includes.not_found_title',[
                    'not_found_title' => 'Articles not found',
                    'not_found_description' => 'Please check later.'
                ])
            @else
                @foreach($articles as $article)
                    <div class="row justify-content-between border py-3 mb-3 mx-0">
                        <div class="col-12 col-md-4">
                            @if($article->image != null)
                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid" style="height: 14rem; object-fit: cover;">
                            @else
                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 14rem; object-fit: cover;">
                            @endif

                            <p class="gray mt-3">Updated: {{ $article->updated_at }}</p>
                        </div>

                        <div class="col-12 col-md-8">
                            <h5 class="fw-bolder futura">{{ $article->title }}</h5>
                            <div class="gray mt-2" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{!! $article->description !!}</div>

                            <p class="mt-2">By: Admin</p>

                            <div class="row align-end mt-3 justify-content-end">
                                <div class="col-7 col-md-4 text-end">
                                    <a href="{{ route('frontend.single_article', [str_replace('_', '-', $article->type), $article->id]) }}" type="button" class="btn text-white continue-article-btn">Continue reading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $articles->links() }}
            @endif
        </div>
    </div>
@endsection
