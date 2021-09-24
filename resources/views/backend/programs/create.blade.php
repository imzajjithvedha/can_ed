@extends('backend.layouts.app')

@section('title', __('Create New Program | Admin'))

@section('content')



    <form action="{{ route('admin.programs.store_program') }}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Program Title" name="title" required>
                            </div>

                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="7" placeholder="Description"></textarea>
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
