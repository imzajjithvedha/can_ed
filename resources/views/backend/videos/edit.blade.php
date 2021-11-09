@extends('backend.layouts.app')

@section('title', __('Edit Video | Admin'))

@section('content')
    
    <form action="{{route('admin.videos.update_video')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <label for="title" class="form-label">Video title *</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Video Title *" value="{{ $video->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="link" class="form-label">Video link *</label>
                                <input type="url" id="link" class="form-control" name="link" value="{{ $video->link }}" placeholder="Video Link *" required>
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="4" value="{{ $video->description }}" placeholder="Description">{{ $video->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured" class="form-label">Do you want to show this video in the homepage? *</label>
                                <select class="form-control" id="featured" name="featured" placeholder="Featured? *">
                                    <option value="Yes" {{ $video->featured == 'Yes' ? "selected" : "" }}>Yes</option>
                                    <option value="No" {{ $video->featured == 'No' ? "selected" : "" }}>No</option>
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
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="Approved" {{ $video->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Pending" {{ $video->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-4 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $video->id }}"/>
                                <a href="{{ route('admin.videos.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection