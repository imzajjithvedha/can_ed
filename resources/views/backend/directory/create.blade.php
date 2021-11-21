@extends('backend.layouts.app')

@section('title', __('Create new contact | Admin'))

@section('content')



    <form action="{{ route('admin.directory.store_directory') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Name *" name="name" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="address" aria-describedby="address" placeholder="Address *" name="address" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="City *" name="city" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="province" aria-describedby="province" placeholder="Province *" name="province" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="postal_code" aria-describedby="postal_code" placeholder="Postal code *" name="postal_code" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="Phone *" name="phone" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="fax" aria-describedby="fax" placeholder="Fax *" name="fax" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="industry" aria-describedby="industry" placeholder="Industry *" name="industry" required>
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
