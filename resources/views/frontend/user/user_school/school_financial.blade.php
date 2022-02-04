@extends('frontend.layouts.app')

@section('title', 'School financial' )

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

@section('content')

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <h4 class="user-settings-head">Financial</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="school" id="nav-financial" role="tabpanel" aria-labelledby="nav-financial-tab">
                            <div class="row">
                                <div class="col-12 border py-3">

                                    <form action="{{ route('frontend.user.school_financial_update') }}" method="POST" onsubmit="return FinancialValForm();">
                                        {{csrf_field()}}
                                            <div class="mb-3">
                                                <label for="financial_title_1" class="form-label mb-1">Title 1</label>
                                                <input type="text" class="form-control" id="financial_title_1" aria-describedby="financial_title_1" name="financial_title_1" value="{{ $school->financial_title_1 }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="financial_title_1_paragraph" class="form-label mb-1">Title 1 - paragraph</label>
                                                <textarea name="financial_title_1_paragraph" class="ckeditor form-control" id="financial_title_1_paragraph" value="{{ $school->financial_title_1_paragraph }}">{{ $school->financial_title_1_paragraph }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="financial_title_2" class="form-label mb-1">Title 2</label>
                                                <input type="text" class="form-control" id="financial_title_2" aria-describedby="financial_title_2" name="financial_title_2" value="{{ $school->financial_title_2 }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="financial_title_2_tab_1" class="form-label mb-1">Tab 1</label>
                                                <input type="text" class="form-control" id="financial_title_2_tab_1" aria-describedby="financial_title_2_tab_1" name="financial_title_2_tab_1" value="{{ $school->financial_title_2_tab_1 }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="financial_title_2_tab_2" class="form-label mb-1">Tab 2</label>
                                                <input type="text" class="form-control" id="financial_title_2_tab_2" aria-describedby="financial_title_2_tab_2" name="financial_title_2_tab_2" value="{{ $school->financial_title_2_tab_2 }}">
                                            </div>

                                            <div class="mb-5">
                                                <label for="financial_title_2_tab_3" class="form-label mb-1">Tab 3</label>
                                                <input type="text" class="form-control" id="financial_title_2_tab_3" aria-describedby="financial_title_2_tab_3" name="financial_title_2_tab_3" value="{{ $school->financial_title_2_tab_3 }}">
                                            </div>


                                            <div class="mb-5 border p-3">
                                                <ul class="nav nav-pills mb-3 justify-content-evenly" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="pills-tab-tab1" data-bs-toggle="pill" data-bs-target="#pills-tab1" type="button" role="tab" aria-controls="pills-tab1" aria-selected="true">Tab 1</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-tab-tab2" data-bs-toggle="pill" data-bs-target="#pills-tab2" type="button" role="tab" aria-controls="pills-tab2" aria-selected="false">Tab 2</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-tab-tab3" data-bs-toggle="pill" data-bs-target="#pills-tab3" type="button" role="tab" aria-controls="pills-tab3" aria-selected="false">Tab 3</button>
                                                    </li>
                                                </ul>

                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-tab1" role="tabpanel" aria-labelledby="pills-tab-tab1">

                                                        <div class="mb-3">
                                                            <label for="financial_tab_1_sub_title_1" class="form-label mb-1">Sub title 1</label>
                                                            <input type="text" class="form-control" id="financial_tab_1_sub_title_1" aria-describedby="financial_tab_1_sub_title_1" name="financial_tab_1_sub_title_1" value="{{ $school->financial_tab_1_sub_title_1 }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 1 bullet point</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_1_sub_title_1_bullet" value="{{ $school->financial_tab_1_sub_title_1_bullet }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 1 bullet point price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_1_sub_title_1_bullet_price" value="{{ $school->financial_tab_1_sub_title_1_bullet_price }}">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_1_sub_title_2" class="form-label mb-1">Sub title 2</label>
                                                            <input type="text" class="form-control" id="financial_tab_1_sub_title_2" aria-describedby="financial_tab_1_sub_title_2" name="financial_tab_1_sub_title_2" value="{{ $school->financial_tab_1_sub_title_2 }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_1_sub_title_2_paragraph" class="form-label mb-1">Sub title 2 paragraphs</label>
                                                            <textarea name="financial_tab_1_sub_title_2_paragraph" class="ckeditor form-control" id="financial_tab_1_sub_title_2_paragraph" value="{{ $school->financial_tab_1_sub_title_2_paragraph }}">{{ $school->financial_tab_1_sub_title_2_paragraph }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_1_sub_title_3" class="form-label mb-1">Sub title 3</label>
                                                            <input type="text" class="form-control" id="financial_tab_1_sub_title_3" aria-describedby="financial_tab_1_sub_title_3" name="financial_tab_1_sub_title_3" value="{{ $school->financial_tab_1_sub_title_3 }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 1</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_1_sub_title_3_bullet_1" value="{{ $school->financial_tab_1_sub_title_3_bullet_1 }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 1 price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_1_sub_title_3_bullet_1_price" value="{{ $school->financial_tab_1_sub_title_3_bullet_1_price }}">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 2</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_1_sub_title_3_bullet_2" value="{{ $school->financial_tab_1_sub_title_3_bullet_2 }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 2 price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_1_sub_title_3_bullet_2_price" value="{{ $school->financial_tab_1_sub_title_3_bullet_2_price }}">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 3</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_1_sub_title_3_bullet_3" value="{{ $school->financial_tab_1_sub_title_3_bullet_3 }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 3 price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_1_sub_title_3_bullet_3_price" value="{{ $school->financial_tab_1_sub_title_3_bullet_3_price }}">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_1_sub_title_3_paragraph" class="form-label mb-1">Sub title 3 paragraphs</label>
                                                            <textarea name="financial_tab_1_sub_title_3_paragraph" class="ckeditor form-control" id="financial_tab_1_sub_title_3_paragraph" value="{{ $school->financial_tab_1_sub_title_3_paragraph }}">{{ $school->financial_tab_1_sub_title_3_paragraph }}</textarea>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane fade" id="pills-tab2" role="tabpanel" aria-labelledby="pills-tab-tab2">

                                                        <div class="mb-3">
                                                            <label for="financial_tab_2_sub_title_1" class="form-label mb-1">Sub title 1</label>
                                                            <input type="text" class="form-control" id="financial_tab_2_sub_title_1" aria-describedby="financial_tab_2_sub_title_1" name="financial_tab_2_sub_title_1" value="{{ $school->financial_tab_2_sub_title_1 }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 1 bullet point</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_2_sub_title_1_bullet" value="{{ $school->financial_tab_2_sub_title_1_bullet }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 1 bullet point price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_2_sub_title_1_bullet_price" value="{{ $school->financial_tab_2_sub_title_1_bullet_price }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_2_sub_title_2" class="form-label mb-1">Sub title 2</label>
                                                            <input type="text" class="form-control" id="financial_tab_2_sub_title_2" aria-describedby="financial_tab_2_sub_title_2" name="financial_tab_2_sub_title_2" value="{{ $school->financial_tab_2_sub_title_2 }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_2_sub_title_2_paragraph" class="form-label mb-1">Sub title 2 paragraphs</label>
                                                            <textarea name="financial_tab_2_sub_title_2_paragraph" class="ckeditor form-control" id="financial_tab_2_sub_title_2_paragraph" value="{{ $school->financial_tab_2_sub_title_2_paragraph }}">{{ $school->financial_tab_2_sub_title_2_paragraph }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_2_sub_title_3" class="form-label mb-1">Sub title 3</label>
                                                            <input type="text" class="form-control" id="financial_tab_2_sub_title_3" aria-describedby="financial_tab_2_sub_title_3" name="financial_tab_2_sub_title_3" value="{{ $school->financial_tab_2_sub_title_3 }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 1</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_2_sub_title_3_bullet_1" value="{{ $school->financial_tab_2_sub_title_3_bullet_1 }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 1 price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_2_sub_title_3_bullet_1_price" value="{{ $school->financial_tab_2_sub_title_3_bullet_1_price }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 2</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_2_sub_title_3_bullet_2" value="{{ $school->financial_tab_2_sub_title_3_bullet_2 }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 2 price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_2_sub_title_3_bullet_2_price" value="{{ $school->financial_tab_2_sub_title_3_bullet_2_price }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 3</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_2_sub_title_3_bullet_3" value="{{ $school->financial_tab_2_sub_title_3_bullet_3 }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 3 price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_2_sub_title_3_bullet_3_price" value="{{ $school->financial_tab_2_sub_title_3_bullet_3_price }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_2_sub_title_3_paragraph" class="form-label mb-1">Sub title 3 paragraphs</label>
                                                            <textarea name="financial_tab_2_sub_title_3_paragraph" class="ckeditor form-control" id="financial_tab_2_sub_title_3_paragraph" value="{{ $school->financial_tab_2_sub_title_3_paragraph }}">{{ $school->financial_tab_2_sub_title_3_paragraph }}</textarea>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane fade" id="pills-tab3" role="tabpanel" aria-labelledby="pills-tab-tab3">

                                                        <div class="mb-3">
                                                            <label for="financial_tab_3_sub_title_1" class="form-label mb-1">Sub title 1</label>
                                                            <input type="text" class="form-control" id="financial_tab_3_sub_title_1" aria-describedby="financial_tab_3_sub_title_1" name="financial_tab_3_sub_title_1" value="{{ $school->financial_tab_3_sub_title_1 }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 1 bullet point</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_3_sub_title_1_bullet" value="{{ $school->financial_tab_3_sub_title_1_bullet }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 1 bullet point price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_3_sub_title_1_bullet_price" value="{{ $school->financial_tab_3_sub_title_1_bullet_price }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_3_sub_title_2" class="form-label mb-1">Sub title 2</label>
                                                            <input type="text" class="form-control" id="financial_tab_3_sub_title_2" aria-describedby="financial_tab_3_sub_title_2" name="financial_tab_3_sub_title_2" value="{{ $school->financial_tab_3_sub_title_2 }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_3_sub_title_2_paragraph" class="form-label mb-1">Sub title 2 paragraphs</label>
                                                            <textarea name="financial_tab_3_sub_title_2_paragraph" class="ckeditor form-control" id="financial_tab_3_sub_title_2_paragraph" value="{{ $school->financial_tab_3_sub_title_2_paragraph }}">{{ $school->financial_tab_3_sub_title_2_paragraph }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_3_sub_title_3" class="form-label mb-1">Sub title 3</label>
                                                            <input type="text" class="form-control" id="financial_tab_3_sub_title_3" aria-describedby="financial_tab_3_sub_title_3" name="financial_tab_3_sub_title_3" value="{{ $school->financial_tab_3_sub_title_3 }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 1</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_3_sub_title_3_bullet_1" value="{{ $school->financial_tab_3_sub_title_3_bullet_1 }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 1 price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_3_sub_title_3_bullet_1_price" value="{{ $school->financial_tab_3_sub_title_3_bullet_1_price }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 2</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_3_sub_title_3_bullet_2" value="{{ $school->financial_tab_3_sub_title_3_bullet_2 }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 2 price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_3_sub_title_3_bullet_2_price" value="{{ $school->financial_tab_3_sub_title_3_bullet_2_price }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 3</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_3_sub_title_3_bullet_3" value="{{ $school->financial_tab_3_sub_title_3_bullet_3 }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label mb-1">Sub title 3 bullet point 3 price</label>
                                                                    <input type="text" class="form-control mb-2" name="financial_tab_3_sub_title_3_bullet_3_price" value="{{ $school->financial_tab_3_sub_title_3_bullet_3_price }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="financial_tab_3_sub_title_3_paragraph" class="form-label mb-1">Sub title 3 paragraphs</label>
                                                            <textarea name="financial_tab_3_sub_title_3_paragraph" class="ckeditor form-control" id="financial_tab_3_sub_title_3_paragraph" value="{{ $school->financial_tab_3_sub_title_3_paragraph }}">{{ $school->financial_tab_3_sub_title_3_paragraph }}</textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="mb-3">
                                                <label for="financial_title_3" class="form-label mb-1">Title 3</label>
                                                <input type="text" class="form-control" id="financial_title_3" aria-describedby="financial_title_3" name="financial_title_3" value="{{ $school->financial_title_3 }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="financial_title_3_paragraph" class="form-label mb-1">Paragraphs for title 3</label>
                                                <textarea name="financial_title_3_paragraph" class="ckeditor form-control" id="financial_title_3_paragraph" value="{{ $school->financial_title_3_paragraph }}">{{ $school->financial_title_3_paragraph }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="financial_title_4" class="form-label mb-1">Title 4</label>
                                                <input type="text" class="form-control" id="financial_title_4" aria-describedby="financial_title_4" name="financial_title_4" value="{{ $school->financial_title_4 }}">
                                            </div>

                                            <div class="mb-5">
                                                <label for="financial_title_4_paragraph" class="form-label mb-1">Paragraphs for title 4</label>
                                                <textarea name="financial_title_4_paragraph" class="ckeditor form-control" id="financial_title_4_paragraph" value="{{ $school->financial_title_4_paragraph }}">{{ $school->financial_title_4_paragraph }}</textarea>
                                            </div>

                                            <div class="mb-5 related-programs-4">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-8">
                                                        <h6 class="fs-5 fw-bolder user-settings-head">Related programs</h6>
                                                    </div>
                                                    <div class="col-4 text-end">
                                                        <button type="button" class="btn create-btn text-white" data-bs-toggle="modal" data-bs-target="#addProgram4">Add program</button>
                                                    </div>
                                                </div>

                                                @if($school->financial_related_programs_4 != null)
                                                    @foreach(json_decode($school->financial_related_programs_4) as $financial_related_program_4)
                                                        <div class="mb-3 single-program border p-3">
                                                            <div class="row mb-3 align-items-center">
                                                                <div class="col-10">
                                                                    <label for="program-name" class="form-label mb-0">Program name</label>
                                                                </div>

                                                                <div class="col-2 text-end">
                                                                    <button type="button" class="btn"><i class="fas fa-trash delete"></i></button>
                                                                </div>
                                                            </div>
                                                            
                                                            <input type="text" class="form-control mb-2" id="program-name" name="programs4[]" placeholder="Program name *" value="{{$financial_related_program_4->name}}" required>

                                                            <label for="program-length" class="form-label">Length *</label>
                                                            <input type="text" class="form-control mb-2" id="program-length" name="length4[]" placeholder="Length *" value="{{$financial_related_program_4->length}}" required>

                                                            <label for="program-international-fee" class="form-label">Tuition, International students *</label>
                                                            <input type="text" class="form-control mb-2" id="program-international-fee" name="international4[]" placeholder="Tuition, international students *" value="{{$financial_related_program_4->international}}" required>

                                                            <label for="program-canadian-fee" class="form-label">Tuition Canadian Students *</label>
                                                            <input type="text" class="form-control mb-2" id="program-canadian-fee" name="canadian4[]" placeholder="Tuition, Canadian students *" value="{{$financial_related_program_4->canadian}}" required>

                                                            <label for="program-provincial-fee" class="form-label">Tuition Provincial students *</label>
                                                            <input type="text" class="form-control mb-2" id="program-canadian-fee" name="provincial4[]" placeholder="Tuition, Canadian students *" value="{{$financial_related_program_4->provincial}}" required>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <div class="mb-3">
                                                <label for="financial_title_5" class="form-label mb-1">Title 5</label>
                                                <input type="text" class="form-control" id="financial_title_5" aria-describedby="financial_title_5" name="financial_title_5" value="{{ $school->financial_title_5 }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="financial_title_5_paragraph" class="form-label mb-1">Paragraphs for title 5</label>
                                                <textarea name="financial_title_5_paragraph" class="ckeditor form-control" id="financial_title_5_paragraph" value="{{ $school->financial_title_5_paragraph }}">{{ $school->financial_title_5_paragraph }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="financial_title_6" class="form-label mb-1">Title 6</label>
                                                <input type="text" class="form-control" id="financial_title_6" aria-describedby="financial_title_6" name="financial_title_6" value="{{ $school->financial_title_6 }}">
                                            </div>

                                            <div class="mb-5">
                                                <label for="financial_title_6_paragraph" class="form-label mb-1">Paragraphs for title 6</label>
                                                <textarea name="financial_title_6_paragraph" class="ckeditor form-control" id="financial_title_6_paragraph" value="{{ $school->financial_title_6_paragraph }}">{{ $school->financial_title_6_paragraph }}</textarea>
                                            </div>

                                            <!-- <div class="mb-5 related-programs-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-8">
                                                        <h6 class="fs-5 fw-bolder user-settings-head">Related programs</h6>
                                                    </div>
                                                    <div class="col-4 text-end">
                                                        <button type="button" class="btn create-btn text-white" data-bs-toggle="modal" data-bs-target="#addProgram6">Add program</button>
                                                    </div>
                                                </div>

                                                @if($school->financial_related_programs_6 != null)
                                                    @foreach(json_decode($school->financial_related_programs_6) as $financial_related_program_6)
                                                        <div class="mb-3 single-program border p-3">
                                                            <div class="row mb-3 align-items-center">
                                                                <div class="col-10">
                                                                    <label for="program-name" class="form-label mb-0">Program name *</label>
                                                                </div>

                                                                <div class="col-2 text-end">
                                                                    <button type="button" class="btn"><i class="fas fa-trash delete"></i></button>
                                                                </div>
                                                            </div>
                                                            
                                                            <input type="text" class="form-control mb-2" id="program-name" name="programs6[]" placeholder="Program name *" value="{{$financial_related_program_6->name}}" required>

                                                            <label for="program-length" class="form-label">Length *</label>
                                                            <input type="text" class="form-control mb-2" id="program-length" name="length6[]" placeholder="Length *" value="{{$financial_related_program_6->length}}" required>

                                                            <label for="program-canadian-fee" class="form-label">Tuition, Canadian students *</label>
                                                            <input type="text" class="form-control mb-2" id="program-canadian-fee" name="canadian6[]" placeholder="Tuition, Canadian students *" value="{{$financial_related_program_6->canadian}}" required>

                                                            <label for="program-international-fee" class="form-label">Tuition, international students *</label>
                                                            <input type="text" class="form-control mb-2" id="program-international-fee" name="international6[]" placeholder="Tuition, international students *" value="{{$financial_related_program_6->international}}" required>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div> -->

                                            <div>
                                                <label for="financial_text_content_1" class="form-label mb-1">Text content 1</label>
                                                <textarea name="financial_text_content_1" class="ckeditor form-control" id="financial_text_content_1" value="{{ $school->financial_text_content_1 }}">{{ $school->financial_text_content_1 }}</textarea>
                                            </div>
                                            

                                            <div class="mt-5 text-end">
                                                <input type="hidden" class="form-control" value="{{ $school->id }}" name="hidden_id">
                                                <input type="submit" value="Update financial details" class="btn text-white px-5 py-2" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(\Session::has('financial'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="financial-btn" data-bs-toggle="modal" data-bs-target="#financialModal"></button>

        <div class="modal fade" id="financialModal" tabindex="-1" aria-labelledby="financialModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Financial details updated successfully.</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn text-white w-25" data-bs-dismiss="modal" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <form action="" class="related-program-form">
        <div class="modal fade" id="addProgram4" tabindex="-1" aria-labelledby="addProgramLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add related program</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <input type="text" class="form-control mb-2" id="program-name4" name="programs4[]" placeholder="Program name *" required>

                            <input type="text" class="form-control mb-2" id="program-length4" name="length4[]" placeholder="Length *" required>

                            <input type="text" class="form-control mb-2" id="program-international-fee4" name="international4[]" placeholder="Tuition, International students fee *" required>

                            <input type="text" class="form-control mb-2" id="program-canadian-fee4" name="canadian4[]" placeholder="Tuition, Canadian students fee *" required>

                            <input type="text" class="form-control mb-2" id="program-provincial-fee4" name="provincial4[]" placeholder="Tuition, Provincial students" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="add-program4">Add program</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- <form action="" class="related-program-form">
        <div class="modal fade" id="addProgram6" tabindex="-1" aria-labelledby="addProgramLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add related program</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <input type="text" class="form-control mb-2" id="program-name6" name="programs6[]" placeholder="Program Name" required>

                            <input type="text" class="form-control mb-2" id="program-length6" name="length6[]" placeholder="Length" required>

                            <input type="text" class="form-control mb-2" id="program-international-fee6" name="international6[]" placeholder="Tuition, International student" required>

                            <input type="text" class="form-control mb-2" id="program-canadian-fee6" name="canadian6[]" placeholder="Tuition, Canadian student" required>

                            <input type="text" class="form-control mb-2" id="program-provincial-fee6" name="provincial[]" placeholder="Tuition, Provincial student" required>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="add-program6">Add program</button>
                    </div>
                </div>
            </div>
        </div>
    </form> -->

@endsection

@push('after-scripts')
    
    <script>
        if(document.getElementById("financial-btn")){
            $('#financial-btn').click();
        }
    </script>

    <script>
        let template1 = ``;

        $('#add-program4').on('click', function() {
            let name4 = $('#program-name4').val();
            let length4 = $('#program-length4').val();
            let canadian4 = $('#program-canadian-fee4').val();
            let international4 = $('#program-international-fee4').val();
            let provincial4 = $('#program-provincial-fee4').val();

            template1 = `<div class="mb-3 single-program border p-3">
                            <div class="row mb-3 align-items-center">
                                <div class="col-10">
                                    <label for="program-name" class="form-label mb-0">Program name *</label>
                                </div>

                                <div class="col-2 text-end">
                                    <button type="button" class="btn"><i class="fas fa-trash delete"></i></button>
                                </div>
                            </div>
                            
                            <input type="text" class="form-control mb-2" name="programs4[]" placeholder="Program name *" value="${name4}" required>

                            <label for="program-length" class="form-label">Length *</label>
                            <input type="text" class="form-control mb-2" name="length4[]" placeholder="Length *" value="${length4}" required>

                            <label for="program-international-fee" class="form-label">Tuition, international students fee *</label>
                            <input type="text" class="form-control mb-2" name="international4[]" placeholder="Tuition, international students fee *" value="${international4}" required>

                            <label for="program-canadian-fee" class="form-label">Tuition, Canadian students fee *</label>
                            <input type="text" class="form-control mb-2" name="canadian4[]" placeholder="Tuition, Canadian students fee *" value="${canadian4}" required>

                            <label for="program-canadian-fee" class="form-label">Tuition, Canadian students fee *</label>
                            <input type="text" class="form-control mb-2" name="provincial4[]" placeholder="Tuition, Provincial students fee *" value="${provincial4}" required>

                        </div>`

            $('.related-programs-4').append(template1);
            $('.related-program-form').trigger("reset");

            $('.delete').on('click', function() {
                $(this).parents('.single-program').remove();
            });
        });
    </script>

    <!-- <script>
        let template2 = ``;

        $('#add-program6').on('click', function() {
            let name6 = $('#program-name6').val();
            let length6 = $('#program-length6').val();
            let canadian6 = $('#program-canadian-fee6').val();
            let international6 = $('#program-international-fee6').val();

            template2 = `<div class="mb-3 single-program border p-3">
                            <div class="row mb-3 align-items-center">
                                <div class="col-10">
                                    <label for="program-name" class="form-label mb-0">Program Name</label>
                                </div>

                                <div class="col-2 text-end">
                                    <button type="button" class="btn"><i class="fas fa-trash delete"></i></button>
                                </div>
                            </div>
                            
                            <input type="text" class="form-control mb-2" name="programs6[]" placeholder="Program Name" value="${name6}" required>

                            <label for="program-length" class="form-label">Length</label>
                            <input type="text" class="form-control mb-2" name="length6[]" placeholder="Length" value="${length6}" required>

                            <label for="program-canadian-fee" class="form-label">Tuition, Canadian student</label>
                            <input type="text" class="form-control mb-2" name="canadian6[]" placeholder="Tuition, Canadian student" value="${canadian6}" required>

                            <label for="program-international-fee" class="form-label">Tuition, international student</label>
                            <input type="text" class="form-control mb-2" name="international6[]" placeholder="Tuition, international student" value="${international6}" required>
                        </div>`

            $('.related-programs-6').append(template2);
            $('.related-program-form').trigger("reset");

            $('.delete').on('click', function() {
                $(this).parents('.single-program').remove();
            });
        });
    </script> -->


    <script>
        $(document).ready(function() {
            $('.delete').on('click', function() {
                $(this).parents('.single-program').remove();
            });
        });
    </script>

    <script>
        function FinancialValForm() {
            var count = $(".single-program").length;

            if( count > 5 ) { 

                alert('You are only allowed to add 5 related programs for a school.');

                call();

                return false;
            }
            else { 
                return true;
            }    
        }
    </script>

    <script>
        function call (){

            $('.delete').on('click',function() {
                $('.submit').removeAttr('disabled','disabled');
            });
        };
        
    </script>

@endpush

