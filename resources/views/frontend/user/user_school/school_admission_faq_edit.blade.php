@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Edit admission FAQ' )

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
                        <h4 class="user-settings-head">Edit admission FAQ</h4>
                        
                    </div>
                    <!-- <div class="col-4 text-end">
                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                    </div> -->
                </div>

                <div class="row">
                    <div class="col-12 border py-3">
                        <form action="{{ route('frontend.user.school_admission_faq_update') }}" method="post" enctype="multipart/form-data" novalidate>
                            {{csrf_field()}}

                            <div class="mb-3">
                                <label for="question" class="form-label">Question *</label>
                                <input type="text" class="form-control" id="question" aria-describedby="question" placeholder="Question *" name="question" value="{{ $faq->question }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="question" class="form-label">Answer *</label>
                                <textarea id="answer" rows="5" class="form-control" aria-describedby="answer" placeholder="Answer *" name="answer" value="{{ $faq->answer }}" required>{{ $faq->answer }}</textarea>
                            </div>

                            <div>
                                <label for="orders" class="form-label mb-1">Order *</label>
                                <input type="number" class="form-control" id="orders" aria-describedby="orders" placeholder="Order *" name="orders" value="{{ $faq->orders }}" required>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" class="form-control" value="{{ $faq->id }}" name="hidden_id">
                                <input type="submit" value="Update FAQ" class="btn rounded-pill text-light px-5 py-2" style="background-color: #94ca60;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    
@endpush

