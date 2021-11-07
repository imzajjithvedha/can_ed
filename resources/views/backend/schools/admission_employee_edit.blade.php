@extends('backend.layouts.app')

@section('title', __('Edit Article | Admin'))

@section('content')
    
    <form action="{{route('admin.articles.update_article')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <input class="form-control" name="title" value="{{ $employee->name }}" placeholder="Title" required>
                            </div>

                            <div class="mb-3">
                                <textarea class="ckeditor form-control" name="description" value=""></textarea>
                            </div>

                            <div class="form-group">
                                <label>Featured</label>
                                <select class="form-control" name="featured" required>
                                    <option value="Yes" >Yes</option>   
                                    <option value="No" >No</option>                               
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
                                <img src="{{ url('images/articles', $employee->image) }}" alt="" class="img-fluid">
                                <input type="hidden" class="form-control" name="old_image" value="{{$employee->image}}">

                                <div class="input-group mt-4">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="new_image" value="">
                                </div>
                            </div>

                        
                            <div class="mt-4 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $employee->id }}"/>
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