@extends('backend.layouts.app')

@section('title', __('Create New Contact | Admin'))

@section('content')



    <form action="{{ route('admin.directory.store_directory') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <textarea name="description (maximum 100 letters)" class="form-control" id="description" rows="5" placeholder="Description"  maxlength="100" required></textarea>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="category" aria-describedby="category" placeholder="Category" name="category" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="Phone Number" name="phone" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="email" aria-describedby="email" placeholder="Email Address" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="image" class="form-label">Image</label>
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
