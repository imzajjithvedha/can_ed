@extends('backend.layouts.app')

@section('title', 'FAQ | Admin')

@section('content')
    
    <form action="{{ route('admin.pages.faq_update') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <input type="text" id="title" class="form-control" name="title" value="{{ $faq->title }}" placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="ckeditor form-control mt-2" name="description" value="{{ $faq->description }}" required>{!! $faq->description !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">

                            @if($faq->image != null)
                                <img src="{{ url('images/pages', $faq->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                            @else
                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                            @endif

                            <input type="hidden" class="form-control" name="old_image" value="{{$faq->image}}">

                            <div class="input-group mt-5">
                                <input type="file" class="form-control" id="inputGroupFile02" name="new_image">
                            </div>

                            <div class="text-center mt-4">
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

