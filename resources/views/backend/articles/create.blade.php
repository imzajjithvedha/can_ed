@extends('backend.layouts.app')

@section('title', __('Create New Article | Admin'))

@section('content')



    <form action="{{ route('admin.articles.store_article') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <input type="text" id="title" class="form-control" name="title" placeholder="Article Title" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Content</label>
                                <textarea name="description" class="ckeditor form-control" id="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Article Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-success">Create New</button><br>
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
