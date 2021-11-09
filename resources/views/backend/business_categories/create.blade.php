@extends('backend.layouts.app')

@section('title', __('Create New Business Category | Admin'))

@section('content')



    <form action="{{ route('admin.categories.store_category') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Business category name *" name="name" required>
                            </div>

                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="7" placeholder="Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image" class="form-label">Business category image *</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-success">Create new</button><br>
                </div>
            </div>    
        </div>
    </form>

@endsection
