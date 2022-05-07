@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Articles')

@push('after-styles')
    <link href="{{ url('css/articles.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Careers - Search results</h4>

        <form action="{{ route('frontend.career_search') }}"  method="POST">
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-8">
                    <hr>
                </div>
                <div class="col-4 input-group">
                    <input type="text" class="form-control text-center" id="search_careers" aria-describedby="search_careers" name="keyword">
                    
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>    
        </form>


        <div class="articles mt-5">
            @if(count($filteredCareers) == 0)
                @include('frontend.includes.not_found_title',[
                    'not_found_title' => 'Careers not found',
                    'not_found_description' => 'Please check later.'
                ])
            @else
                @foreach($filteredCareers as $career)
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
                {{ $filteredCareers->links() }}
            @endif
        </div>
    </div>
@endsection
