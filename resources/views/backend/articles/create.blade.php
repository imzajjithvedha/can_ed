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
