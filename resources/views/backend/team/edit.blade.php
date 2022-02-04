@extends('backend.layouts.app')

@section('title', __('Edit team member | Admin'))

@section('content')
    
    <form action="{{route('admin.team.update_team')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name *</label>
                                <input class="form-control" name="name" value="{{ $member->name }}" placeholder="Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input class="form-control" name="title" value="{{ $member->title }}" placeholder="Title" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description *</label>
                                <textarea name="description" class="form-control" value="{{ $member->description }}" rows="7" placeholder="Description" required>{{ $member->description }}</textarea>
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
                                <img src="{{ url('images/our_team', $member->image) }}" alt="" class="img-fluid w-100" style="height: 13rem; object-fit:cover;">
                                <input type="hidden" class="form-control" name="old_image" value="{{$member->image}}">

                                <div class="form-group mt-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="new_image">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="Approved" {{ $member->status == 'Approved' ? "selected" : "" }}>Approve</option>
                                    <option value="Pending" {{ $member->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-4 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $member->id }}"/>
                                <a href="{{ route('admin.team.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection