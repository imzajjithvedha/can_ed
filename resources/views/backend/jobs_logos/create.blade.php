@extends('backend.layouts.app')

@section('title', __('Create jobs logo | Admin'))

@section('content')

    <form action="{{ route('admin.logos.store_logo') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <label class="form-label">Jobs logo image *</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" id="orders" aria-describedby="orders" placeholder="Order *" name="orders" required>
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
