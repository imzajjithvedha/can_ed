@extends('backend.layouts.app')

@section('title', __('Edit School | Admin'))

@section('content')


    @include('backend.includes.top_nav')
    
    <div class="row">
        <div class="col-md-12 p-1">
            <div class="card">
                <div class="card-body border">
                    <div class="p-3">
                        <div class="row justify-content-between">
                            <div class="col-8 p-0">
                                <h4 class="fs-4 fw-bolder user-settings-head">Edit scholarship FAQ</h4>
                                
                            </div>
                            <!-- <div class="col-4 text-end">
                                <p class="mb-2 required fw-bold">* Indicates required fields</p>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-12 border">
                                <div class="px-2 py-3 school" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                                    <form action="{{ route('admin.schools.school_scholarship_faq_update') }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-12 py-3">
                                                <div class="mb-3">
                                                    <label for="question" class="form-label">Question *</label>
                                                    <input type="text" class="form-control" id="question" aria-describedby="question" placeholder="Question *" name="question" value="{{ $faq->question }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="question" class="form-label">Answer *</label>
                                                    <textarea id="answer" rows="5" class="form-control" aria-describedby="answer" placeholder="Answer *" name="answer" value="{{ $faq->answer }}" required>{{ $faq->answer }}</textarea>
                                                </div>

                                                <div class="mt-5 text-center">
                                                    <input type="hidden" class="form-control" value="{{ $faq->id }}" name="hidden_id">
                                                    <input type="hidden" class="form-control" value="{{ $school->id }}" name="school_id">
                                                    <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                                </div>
                                            </div>
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


@endsection


@push('after-scripts')


@endpush