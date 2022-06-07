@extends('backend.layouts.app')

@section('title', 'Comments / suggestions | Admin')

@section('content')
    
    <form action="{{ route('admin.pages.suggestions_update') }}" method="post" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" id="title" class="form-control" name="title" value="{{ $suggestions->title }}" placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description *</label>
                                <textarea type="text" class="ckeditor form-control mt-2" name="description" value="{{ $suggestions->description }}" required>{!! $suggestions->description !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="text-center">
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
