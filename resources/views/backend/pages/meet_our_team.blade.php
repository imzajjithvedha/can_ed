@extends('backend.layouts.app')

@section('title', 'Meet Our Team | Admin')

@section('content')
    
    <form action="{{ route('admin.pages.meet_our_team_update') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" id="title" class="form-control" name="title" value="{{ $team->title }}" placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description *</label>
                                <textarea type="text" class="ckeditor form-control mt-2" name="description" value="{{ $team->description }}" required>{!! $team->description !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            @if($team->image != null)
                                <img src="{{ url('images/pages', $team->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                            @else
                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                            @endif

                            <input type="hidden" class="form-control" name="old_image" value="{{$team->image}}">

                            <div class="form-group mt-5">
                                <label for="image" class="form-label">Image</label>
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

