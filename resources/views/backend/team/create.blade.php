@extends('backend.layouts.app')

@section('title', __('Create new team member | Admin'))

@section('content')

    <form action="{{ route('admin.team.store_team') }}" method="post" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" name="name" placeholder="Name *" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="title" class="form-control" name="title" placeholder="Title *" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="7" placeholder="Description *" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">Member image *</label>
                                <input type="file" class="form-control" id="image" name="image" required>
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
