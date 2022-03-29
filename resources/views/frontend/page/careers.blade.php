@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Careers')

@push('after-styles')
    <link href="{{ url('css/careers.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container careers" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Careers in Canada</h4>

        <hr>

        <!-- <form action="{{ route('frontend.article_search') }}"  method="POST">
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
        </form> -->

        
        <div class="row mt-5">
            @if(count($articles) > 0)
                <div class="col-3 more-articles" style="padding-top: 5rem;">
                    <h6 class="fw-bold related-articles futura mb-4">Helpful articles</h6>
                    
                    <div class="row align-items-center">

                        @foreach($articles as $key => $article)

                            <div class="col-12 mb-3">
                                <a href="{{ route('frontend.single_article', [str_replace('_', '-', $article->type), $article->id]) }}" class="text-decoration-none">
                                    <div class="card border-0">
                                        @if($article->image != null)
                                            <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                        @else
                                            <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                        @endif
                                        <div class="card-body text-center card-padding {{ $key % 2 == 0 ? 'article-red': 'article-blue' }} rounded-0">
                                            <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="col-9">
                <div class="tab-frame p-3 mb-3">
                    <ul class="nav nav-pills main-nav" id="pills-tab" role="tablist">
                        <li class="nav-item w-100" role="presentation">
                            <a href="#how-careers-came" class="nav-link active futura" id="pills-career-tab" data-bs-toggle="pill" data-bs-target="#pills-career" type="button" role="tab" aria-controls="pills-career" aria-selected="true">{{ $how_careers->title }}</a>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <a href="#all-careers" class="nav-link futura" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="false">All careers</a>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <a href="#hot-careers" class="nav-link futura" id="pills-hot-tab" data-bs-toggle="pill" data-bs-target="#pills-hot" type="button" role="tab" aria-controls="pills-hot" aria-selected="false">Hot careers</a>
                        </li>
                    </ul>
                </div>


                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-career" role="tabpanel" aria-labelledby="pills-career-tab">
                        <div class="gray mt-2" style="text-align: justify;">
                            {!! $how_careers->description !!}
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">

                        @if(count($careers) == 0)
                            @include('frontend.includes.not_found_title',[
                                'not_found_title' => 'Careers not found',
                                'not_found_description' => 'Please check later.'
                            ])
                        @else
                        
                            @foreach($careers as $career)

                                <div class="mb-3 border-bottom p-3">
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p class="fw-bold">Title</p>
                                                </div>
                                                <div class="col-1 p-0">
                                                    <p class="fw-bold">:</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <p class="gray fw-bold">{{ $career->title }}</p>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p class="fw-bold">Definition</p>
                                                </div>
                                                <div class="col-1 p-0">
                                                    <p class="fw-bold">:</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <p class="gray" style="text-align: justify">{{ $career->definition }}</p>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p class="fw-bold">Hierarchical structure</p>
                                                </div>
                                                <div class="col-1 p-0">
                                                    <p class="fw-bold">:</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <p class="gray">{{ $career->hierarchical }}</p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p class="fw-bold">Level</p>
                                                </div>
                                                <div class="col-1 p-0">
                                                    <p class="fw-bold">:</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <h6 class="gray">{{ $career->level }}</h6>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p class="fw-bold">Code</p>
                                                </div>
                                                <div class="col-1 p-0">
                                                    <p class="fw-bold">:</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <p class="gray">{{ $career->code }}</p>
                                        </div>
                                    </div>

                                </div>
                            
                            @endforeach

                        @endif

                        {{ $careers->fragment('all-careers')->links() }}
                    </div>
                        
                    <div class="tab-pane fade" id="pills-hot" role="tabpanel" aria-labelledby="pills-hot-tab">
                        @if(count($hot_careers) == 0)
                            @include('frontend.includes.not_found_title',[
                                'not_found_title' => 'Hot careers not found',
                                'not_found_description' => 'Please check later.'
                            ])
                        @else
                            @foreach($hot_careers as $hot_career)
                                <div class="mb-3 border-bottom p-3">
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p class="fw-bold">Title</p>
                                                </div>
                                                <div class="col-1 p-0">
                                                    <p class="fw-bold">:</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <p class="gray fw-bold">{{ $hot_career->title }}</p>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p class="fw-bold">Definition</p>
                                                </div>
                                                <div class="col-1 p-0">
                                                    <p class="fw-bold">:</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <p class="gray">{{ $hot_career->definition }}</p>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p class="fw-bold">Hierarchical structure</p>
                                                </div>
                                                <div class="col-1 p-0">
                                                    <p class="fw-bold">:</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <p class="gray">{{ $hot_career->hierarchical }}</p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p class="fw-bold">Level</p>
                                                </div>
                                                <div class="col-1 p-0">
                                                    <p class="fw-bold">:</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <h6 class="gray">{{ $hot_career->level }}</h6>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p class="fw-bold">Code</p>
                                                </div>
                                                <div class="col-1 p-0">
                                                    <p class="fw-bold">:</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <p class="gray">{{ $hot_career->code }}</p>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('after-scripts')
    <script type='text/javascript'>

        var hash = location.hash.replace(/^#/, '');

        if (hash) {
            $('.main-nav a[href="#' + hash + '"]').tab('show');
        } 


        $('.main-nav a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;

            // window.scrollTo({ top: 0, behavior: 'smooth' });
        
        })

        $(document).ready(function() {
            $('.main-nav').children('li').each(function () {
                if($(this).find('a').hasClass('active')) {
                    let id = $(this).find('a').attr('id');

                    $('#pills-tabContent').children('div').each(function () {
                        if($(this).attr('aria-labelledby') == id) {
                            $(this).addClass('active');
                            $(this).addClass('show')
                        }
                        else {
                            $(this).removeClass('active');
                            $(this).removeClass('show');
                        }
                    });
                }
            });
        });
        
    </script>

@endpush
