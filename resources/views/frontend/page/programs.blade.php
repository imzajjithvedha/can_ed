@extends('frontend.layouts.app')

@section('title', 'Programs')

@push('after-styles')
    <link href="{{ url('css/programs.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Programs</h4>

        <div class="row align-items-center">
            <div class="col-10 pe-0">
                <hr>
            </div>
            <div class="col-2 text-end ps-0">
                @auth
                    <button class="btn text-white post-btn" data-bs-toggle="modal" data-bs-target="#suggest-program">Suggest a program</button>
                @else
                    <a href="{{ route('frontend.auth.login') }}" type="button" class="btn text-white post-btn">Suggest a program</a>
                @endauth
            </div>
        </div>

        <div class="gray mt-4" style="text-align: justify;">
            {!! $paragraph->description !!}
        </div>

        <div class="row mt-5">
            @if(count($programs) == 0)
                @include('frontend.includes.not_found_title',[
                    'not_found_title' => 'Programs not found',
                    'not_found_description' => 'If you want you can suggest a program here.'
                ])
            @else
                @foreach($programs as $program)
                    <div class="col-3 mb-2">
                        <!-- <p style="color: #800000;"><i class="fas fa-star"></i> {{ $program->name }}</p> -->
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-star" style="color: #800000;"></i>
                            </div>
                            <div class="col-10">
                                <p style="color: #800000;">{{ $program->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <!-- Modal -->
    <form action="{{ route('frontend.program_request') }}" method="POST">
    {{csrf_field()}}
        <div class="modal fade" id="suggest-program" tabindex="-1" aria-labelledby="suggest-program-label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Program suggestion form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="text-end">
                                <p class="mb-2 required fw-bold">* Indicates required fields</p>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name" aria-describedby="program_name" name="name" placeholder="Program name *" required>
                                </div>

                                <div class="mb-3">
                                    <select name="degree_level" class="form-control">
                                        <option value="" selected disabled hidden>Degree level</option>
                                        @foreach($degree_levels as $degree_level)
                                            <option value="{{ $degree_level->id }}">{{ $degree_level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <textarea class="form-control" rows="7" name="description" placeholder="Description"></textarea>
                                </div>
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
                        <h4 class="mb-0 text-center">Thank you for your program suggestion. It will appear here once approved</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('frontend.programs') }}" class="btn text-white" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Refresh</a>
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
