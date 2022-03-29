@extends('backend.layouts.app')

@section('title', __('Create article | Admin'))

@section('content')



    <form action="{{ route('admin.articles.store_article') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <input type="text" id="title" class="form-control" name="title" placeholder="Article title *" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description *</label>
                                <textarea name="description" class="ckeditor form-control" id="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Article image *</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="type" name="type" placeholder="Article type *" required>
                                    <option value="" selected disabled hidden>Article type *</option>
                                    <option value="basic_articles">Basic article</option>
                                    <option value="financial_help_for_international_students">Financial help for international students</option>
                                    <option value="financial_help_for_canadian_students">Financial help for Canadian students</option>
                                    <option value="work_while_studying">Work while studying</option>
                                    <option value="financial_planning">Financial planning</option>
                                    <option value="academic_help_before_applying">For students who need academic help before applying</option>
                                    <option value="financial_help_before_applying">For students who need financial help before applying</option>
                                    <option value="immigration_questions">Immigration questions/matters/concerns</option>
                                    <option value="proxima_study_in_coming_to_you">Proxima study in coming to you</option>
                                    <option value="need_more_help">Need more help?</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="featured" name="featured" placeholder="Featured? *" required>
                                    <option value="" selected disabled hidden>Do you want to show this article in the homepage? *</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-success">Create new</button>
                </div>
            </div>    
        </div>
    </form>

@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
