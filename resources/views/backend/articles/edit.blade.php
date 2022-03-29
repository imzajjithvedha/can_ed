@extends('backend.layouts.app')

@section('title', __('Edit article | Admin'))

@section('content')
    
    <form action="{{route('admin.articles.update_article')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <label for="title" class="form-label">Article title *</label>
                                <input class="form-control" name="title" id="title" value="{{ $article->title }}" placeholder="Title" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description *</label>
                                <textarea class="ckeditor form-control" name="description" id="description" value="{{ $article->description }}">{{ $article->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="type" class="form-label">Article type *</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="basic_article" {{ $article->type == 'basic_article' ? "selected" : "" }}>Basic article</option>
                                    <option value="financial_help_for_international_students" {{ $article->type == 'financial_help_for_international_students' ? "selected" : "" }}>Financial help for international students</option>
                                    <option value="financial_help_for_canadian_students" {{ $article->type == 'financial_help_for_canadian_students' ? "selected" : "" }}>Financial help for Canadian students</option>
                                    <option value="work_while_studying" {{ $article->type == 'work_while_studying' ? "selected" : "" }}>Work while studying</option>
                                    <option value="financial_planning" {{ $article->type == 'financial_planning' ? "selected" : "" }}>Financial planning</option>
                                    <option value="academic_help_before_applying" {{ $article->type == 'academic_help_before_applying' ? "selected" : "" }}>For students who need academic help before applying</option>
                                    <option value="financial_help_before_applying" {{ $article->type == 'financial_help_before_applying' ? "selected" : "" }}>For students who need financial help before applying</option>
                                    <option value="immigration_questions" {{ $article->type == 'immigration_questions' ? "selected" : "" }}>Immigration questions/matters/concerns</option>
                                    <option value="proxima_study_in_coming_to_you" {{ $article->type == 'proxima_study_in_coming_to_you' ? "selected" : "" }}>Proxima Study in coming to you</option>
                                    <option value="need_more_help" {{ $article->type == 'need_more_help' ? "selected" : "" }}>Need more help?</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="featured-article" class="form-label">Do you want to show this article in the homepage? *</label>
                                <select class="form-control" name="featured" id="featured-article" required>
                                    <option value="Yes" {{ $article->featured == 'Yes' ? "selected" : "" }}>Yes</option>   
                                    <option value="No" {{ $article->featured == 'No' ? "selected" : "" }}>No</option>                               
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 13rem; object-fit: cover;">
                                <input type="hidden" class="form-control" name="old_image" value="{{$article->image}}">

                                <div class="form-group mt-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="new_image" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="Approved" {{ $article->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Pending" {{ $article->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-4 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $article->id }}"/>
                                <a href="{{ route('admin.articles.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
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