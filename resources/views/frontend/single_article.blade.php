@extends('frontend.layouts.app')

@section('title', 'Article: '.$article->title)

@push('after-styles')
    <link href="{{ url('css/articles.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">

        <div class="row">
            <div class="col-8">
                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100">

                <div class="row mt-4 justify-content-between align-items-center">
                    <div class="col-9">
                        <h5 class="fw-bold">{{ $article->title }}</h5>
                    </div>
                    @auth
                        @if(is_favorite( $article->id, auth()->user()->id))
                            <div class="col-2 text-end">
                                <form action="{{ route('frontend.favorite_article') }}" method="POST">
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $article->id }}">
                                    <input type="hidden" name='favorite' value="favorite">
                                    <button type="submit" class="fas fa-heart favorite-heart text-decoration-none"></button>
                                </form>
                            </div>
                        @else
                            <div class="col-2 text-end">
                                <form action="{{ route('frontend.favorite_article') }}" method="POST">
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $article->id }}">
                                    <input type="hidden" name='favorite' value="non-favorite">
                                    <button type="submit" class="far fa-heart favorite-heart text-decoration-none"></button>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="col-2 text-end">
                            <a href="{{ route('frontend.auth.login') }}" class="far fa-heart favorite-heart text-decoration-none"></a>
                        </div>
                    @endauth
                </div>

                <div class="row mt-3">
                    <div class="gray" style="text-align: justify;">{!! $article->description !!}</div>
                </div>
            </div>

            <div class="col-4">
                <h5 class="fw-bolder">More Articles</h5>
                <hr>

                @foreach($more_articles as $article)
                    <a href="{{ route('frontend.single_article', $article->id) }}" class="text-decoration-none">
                        <div class="row align-items-center border py-2" style="margin: 0 0rem; margin-bottom: 1rem;">
                            <div class="col-6">
                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid" style="height: 6rem; object-fit: cover;">
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
