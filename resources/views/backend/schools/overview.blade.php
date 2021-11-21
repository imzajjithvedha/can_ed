@extends('backend.layouts.app')

@section('title', __('Edit school | Admin'))

@section('content')


    @include('backend.includes.top_nav')
    
    <div class="row overview">
        <div class="col-md-12 p-1">
            <div class="card">
                <div class="card-body border">
                    <div class="border p-3">
                        <form action="{{ route('admin.schools.school_overview_update') }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="overview_title_1" class="form-label mb-1">Title 1</label>
                                <input type="text" class="form-control" id="overview_title_1" aria-describedby="overview_title_1" name="overview_title_1" value="{{ $school->overview_title_1 }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_1_paragraph" class="form-label mb-1">Paragraphs for title 1</label>
                                <textarea name="overview_title_1_paragraph" class="ckeditor form-control" id="overview_title_1_paragraph" value="{{ $school->overview_title_1_paragraph }}">{{ $school->overview_title_1_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="overview_text_content_1" class="form-label mb-1">Text content 1</label>
                                <textarea name="overview_text_content_1" class="ckeditor form-control" id="overview_text_content_1" value="{{ $school->overview_text_content_1 }}">{{ $school->overview_text_content_1 }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_2" class="form-label mb-1">Title 2</label>
                                <input type="text" class="form-control" id="overview_title_2" aria-describedby="overview_title_2" name="overview_title_2" value="{{ $school->overview_title_2 }}">
                            </div>

                            <div class="mb-3">
                                <div>
                                    <label class="form-label mb-1">Title 2 bullet points</label>
                                    @foreach(json_decode($school->overview_title_2_bullets) as $overview_title_2_bullet)
                                        <div class="mb-4">
                                            <input type="text" class="form-control mb-2" id="link_1_name" aria-describedby="link_1" name="overview_title_2_bullets[]" value="{{ $overview_title_2_bullet }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="title-3-image" class="form-label">Title 3 - image</label>

                                @if($school->overview_title_3_image != null)
                                    <div class="row justify-content-center mb-3">
                                        <div class="col-12">
                                            <img src="{{ url('images/schools', $school->overview_title_3_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="overview_title_3_old_image" value="{{$school->overview_title_3_image}}">

                                    <input type="file" class="form-control" name="overview_title_3_image">

                                @else
                                    <input type="file" class="form-control" name="overview_title_3_image">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_3_sub_title" class="form-label mb-1">Title 3 - sub title</label>
                                <input type="text" class="form-control" id="overview_title_3_sub_title" aria-describedby="overview_title_3_sub_title" name="overview_title_3_sub_title" value="{{ $school->overview_title_3_sub_title }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_3_paragraph" class="form-label mb-1">Title 3 - paragraph</label>
                                <textarea name="overview_title_3_paragraph" class="ckeditor form-control" id="overview_title_3_paragraph" value="{{ $school->overview_title_3_paragraph }}">{{ $school->overview_title_3_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_3_link" class="form-label mb-1">Title 3 - link</label>
                                <input type="url" class="form-control" id="overview_title_3_link" aria-describedby="overview_title_3_link" name="overview_title_3_link" value="{{ $school->overview_title_3_link }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_3_image_name" class="form-label mb-1">Title 3 - image name</label>
                                <input type="text" class="form-control" id="overview_title_3_image_name" aria-describedby="overview_title_3_image_name" name="overview_title_3_image_name" value="{{ $school->overview_title_3_image_name }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_3_date" class="form-label mb-1">Title 3 - date</label>
                                <input type="text" class="form-control" id="overview_title_3_date" aria-describedby="overview_title_3_date" name="overview_title_3_date" value="{{ $school->overview_title_3_date }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_4" class="form-label mb-1">Title 4</label>
                                <input type="text" class="form-control" id="overview_title_4" aria-describedby="overview_title_4" name="overview_title_4" value="{{ $school->overview_title_4 }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_4_paragraph" class="form-label mb-1">Title 4 - paragraph</label>
                                <textarea name="overview_title_4_paragraph" class="ckeditor form-control" id="overview_title_4_paragraph" value="{{ $school->overview_title_4_paragraph }}">{{ $school->overview_title_4_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="title-4-image" class="form-label">Title 4 - image</label>

                                @if($school->overview_title_4_image != null)
                                    <div class="row justify-content-center mb-3">
                                        <div class="col-12">
                                            <img src="{{ url('images/schools', $school->overview_title_4_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="overview_title_4_old_image" value="{{$school->overview_title_4_image}}">

                                    <input type="file" class="form-control" name="overview_title_4_image">

                                @else
                                    <input type="file" class="form-control" name="overview_title_4_image">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_5" class="form-label mb-1">Title 5</label>
                                <input type="text" class="form-control" id="overview_title_5" aria-describedby="overview_title_5" name="overview_title_5" value="{{ $school->overview_title_5 }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_5_paragraph" class="form-label mb-1">Title 5 - paragraph</label>
                                <textarea name="overview_title_5_paragraph" class="ckeditor form-control" id="overview_title_5_paragraph" value="{{ $school->overview_title_5_paragraph }}">{{ $school->overview_title_5_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_6" class="form-label mb-1">Title 6</label>
                                <input type="text" class="form-control" id="overview_title_6" aria-describedby="overview_title_6" name="overview_title_6" value="{{ $school->overview_title_6 }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_6_paragraph" class="form-label mb-1">Title 6 - paragraph</label>
                                <textarea name="overview_title_6_paragraph" class="ckeditor form-control" id="overview_title_6_paragraph" value="{{ $school->overview_title_6_paragraph }}">{{ $school->overview_title_6_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_6_button" class="form-label mb-1">Title 6 - button</label>
                                <input type="text" class="form-control" id="overview_title_6_button" aria-describedby="overview_title_6_button" name="overview_title_6_button" value="{{ $school->overview_title_6_button }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_6_link" class="form-label mb-1">Title 6 - link</label>
                                <input type="url" class="form-control" id="overview_title_6_link" aria-describedby="overview_title_6_link" name="overview_title_6_link" value="{{ $school->overview_title_6_link }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_7" class="form-label mb-1">Title 7</label>
                                <input type="text" class="form-control" id="overview_title_7" aria-describedby="overview_title_7" name="overview_title_7" value="{{ $school->overview_title_7 }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_7_paragraph" class="form-label mb-1">Title 7 - paragraph</label>
                                <textarea name="overview_title_7_paragraph" class="ckeditor form-control" id="overview_title_7_paragraph" value="{{ $school->overview_title_7_paragraph }}">{{ $school->overview_title_7_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_8" class="form-label mb-1">Title 8</label>
                                <input type="text" class="form-control" id="overview_title_8" aria-describedby="overview_title_8" name="overview_title_8" value="{{ $school->overview_title_8 }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_8_paragraph" class="form-label mb-1">Title 8 - paragraph</label>
                                <textarea name="overview_title_8_paragraph" class="ckeditor form-control" id="overview_title_8_paragraph" value="{{ $school->overview_title_8_paragraph }}">{{ $school->overview_title_8_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_8_link" class="form-label mb-1">Title 8 - link</label>
                                <input type="url" class="form-control" id="overview_title_8_link" aria-describedby="overview_title_8_link" name="overview_title_8_link" value="{{ $school->overview_title_8_link }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_9" class="form-label mb-1">Title 9</label>
                                <input type="text" class="form-control" id="overview_title_9" aria-describedby="overview_title_9" name="overview_title_9" value="{{ $school->overview_title_9 }}">
                            </div>

                            <div class="mb-3">
                                
                                @if($school->overview_title_9_image != null)
                                    <div class="row justify-content-center mb-3">
                                        <div class="col-12">
                                            <img src="{{ url('images/schools', $school->overview_title_9_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="overview_title_9_old_image" value="{{$school->overview_title_4_image}}">

                                    <input type="file" class="form-control" name="overview_title_9_image">

                                @else
                                    <label for="title-9-image" class="form-label">Title 9 - image</label>
                                    <input type="file" class="form-control" name="overview_title_9_image">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_9_sub_title" class="form-label mb-1">Title 9 - sub title</label>
                                <input type="text" class="form-control" id="overview_title_9_sub_title" aria-describedby="overview_title_9_sub_title" name="overview_title_9_sub_title" value="{{ $school->overview_title_9_sub_title }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_9_paragraph" class="form-label mb-1">Title 9 - paragraph</label>
                                <textarea name="overview_title_9_paragraph" class="ckeditor form-control" id="overview_title_9_paragraph" value="{{ $school->overview_title_9_paragraph }}">{{ $school->overview_title_9_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_9_button" class="form-label mb-1">Title 9 - button</label>
                                <input type="text" class="form-control" id="overview_title_9_button" aria-describedby="overview_title_9_button" name="overview_title_9_button" value="{{ $school->overview_title_9_button }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_9_link" class="form-label mb-1">Title 9 - link</label>
                                <input type="url" class="form-control" id="overview_title_9_link" aria-describedby="overview_title_9_link" name="overview_title_9_link" value="{{ $school->overview_title_9_link }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_9_image_name" class="form-label mb-1">Title 9 - image name</label>
                                <input type="text" class="form-control" id="overview_title_9_image_name" aria-describedby="overview_title_9_image_name" name="overview_title_9_image_name" value="{{ $school->overview_title_9_image_name }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_10" class="form-label mb-1">Title 10</label>
                                <input type="text" class="form-control" id="overview_title_10" aria-describedby="overview_title_10" name="overview_title_10" value="{{ $school->overview_title_10 }}">
                            </div>

                            <div class="mb-5">
                                <label for="overview_title_10_paragraph" class="form-label mb-1">Title 10 - paragraph</label>
                                <textarea name="overview_title_10_paragraph" class="ckeditor form-control" id="overview_title_10_paragraph" value="{{ $school->overview_title_10_paragraph }}">{{ $school->overview_title_10_paragraph }}</textarea>
                            </div>

                            <div class="mb-5 related-programs">
                                <div class="row align-items-center mb-3">
                                    <div class="col-8">
                                        <h6 class="fs-5 fw-bolder user-settings-head">Related programs</h6>
                                    </div>
                                    <div class="col-4 text-end">
                                        <button type="button" class="btn create-btn text-white" data-bs-toggle="modal" data-bs-target="#addProgram">Add program</button>
                                    </div>
                                </div>

                                @if($school->overview_related_programs != null)
                                    @foreach(json_decode($school->overview_related_programs) as $overview_related_program)
                                        <div class="mb-3 single-program border p-3">
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-10">
                                                    <label for="program-name" class="form-label mb-0">Program name</label>
                                                </div>

                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn"><i class="fas fa-trash delete"></i></button>
                                                </div>
                                            </div>
                                            
                                            <input type="text" class="form-control mb-2" name="programs[]" placeholder="Program Name" value="{{$overview_related_program->name}}" required>

                                            <label for="program-length" class="form-label">Length</label>
                                            <input type="text" class="form-control mb-2" name="length[]" placeholder="Length" value="{{$overview_related_program->length}}" required>

                                            <label for="program-canadian-fee" class="form-label">Tuition, Canadian student</label>
                                            <input type="text" class="form-control mb-2" name="canadian[]" placeholder="Tuition, Canadian student" value="{{$overview_related_program->canadian}}" required>

                                            <label for="program-international-fee" class="form-label">Tuition, international student</label>
                                            <input type="text" class="form-control mb-2" name="international[]" placeholder="Tuition, international student" value="{{$overview_related_program->international}}" required>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_11" class="form-label mb-1">Title 11</label>
                                <input type="text" class="form-control" id="overview_title_11" aria-describedby="overview_title_11" name="overview_title_11" value="{{ $school->overview_title_11 }}">
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_11_paragraph" class="form-label mb-1">Title 11 - paragraph</label>
                                <textarea name="overview_title_11_paragraph" class="ckeditor form-control" id="overview_title_11_paragraph" value="{{ $school->overview_title_11_paragraph }}">{{ $school->overview_title_11_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="overview_title_12" class="form-label mb-1">Title 12</label>
                                <input type="text" class="form-control" id="overview_title_12" aria-describedby="overview_title_12" name="overview_title_12" value="{{ $school->overview_title_12 }}">
                            </div>

                            <div class="mb-3">
                                <div>
                                    <label class="form-label mb-1">Title 12 bullet points</label>
                                    @foreach(json_decode($school->overview_title_12_bullets) as $overview_title_12_bullet)
                                        <div class="mb-4">
                                            <input type="text" class="form-control mb-2" id="link_1_name" aria-describedby="link_1" name="overview_title_12_bullets[]" value="{{ $overview_title_12_bullet }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="overview_title_13" class="form-label mb-1">Title 13</label>
                                <input type="text" class="form-control" id="overview_title_13" aria-describedby="overview_title_13" name="overview_title_13" value="{{ $school->overview_title_13 }}">
                            </div>

                            <div>
                                <label for="overview_title_13_paragraph" class="form-label mb-1">Title 13 - paragraph</label>
                                <textarea name="overview_title_13_paragraph" class="ckeditor form-control" id="overview_title_13_paragraph" value="{{ $school->overview_title_13_paragraph }}">{{ $school->overview_title_13_paragraph }}</textarea>
                            </div>

                            <div class="mt-5 text-end">
                                <input type="hidden" class="form-control" value="{{ $school->id }}" name="hidden_id">
                                <input type="submit" value="Update overview" class="btn rounded-pill text-light px-5 py-2" style="background-color: #94ca60;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form action="" class="related-program-form">
        <div class="modal fade" id="addProgram" tabindex="-1" aria-labelledby="addProgramLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add related program</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <input type="text" class="form-control mb-2" id="program-name" name="programs[]" placeholder="Program name *" required>

                            <input type="text" class="form-control mb-2" id="program-length" name="length[]" placeholder="Length *" required>

                            <input type="text" class="form-control mb-2" id="program-canadian-fee" name="canadian[]" placeholder="Tuition, Canadian student *" required>

                            <input type="text" class="form-control mb-2" id="program-international-fee" name="international[]" placeholder="Tuition, international student *" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="add-program">Add program</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection


@push('after-scripts')

    <script>
        let template = ``;

        $('#add-program').on('click', function() {
            let name = $('#program-name').val();
            let length = $('#program-length').val();
            let canadian = $('#program-canadian-fee').val();
            let international = $('#program-international-fee').val();

            template = `<div class="mb-3 single-program border p-3">
                            <div class="row mb-3 align-items-center">
                                <div class="col-10">
                                    <label for="program-name" class="form-label mb-0">Program name *</label>
                                </div>

                                <div class="col-2 text-end">
                                    <button type="button" class="btn"><i class="fas fa-trash delete"></i></button>
                                </div>
                            </div>
                            
                            <input type="text" class="form-control mb-2" name="programs[]" placeholder="Program name *" value="${name}" required>

                            <label for="program-length" class="form-label">Length *</label>
                            <input type="text" class="form-control mb-2" name="length[]" placeholder="Length *" value="${length}" required>

                            <label for="program-canadian-fee" class="form-label">Tuition, Canadian students fee *</label>
                            <input type="text" class="form-control mb-2" name="canadian[]" placeholder="Tuition, Canadian students fee *" value="${canadian}" required>

                            <label for="program-international-fee" class="form-label">Tuition, international students fee *</label>
                            <input type="text" class="form-control mb-2" name="international[]" placeholder="Tuition, international students fee *" value="${international}" required>
                        </div>`

            $('.related-programs').append(template);
            $('.related-program-form').trigger("reset");

            $('.delete').on('click', function() {
                $(this).parents('.single-program').remove();
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.delete').on('click', function() {
                $(this).parents('.single-program').remove();
            });
        });
    </script>


@endpush