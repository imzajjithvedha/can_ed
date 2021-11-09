@extends('backend.layouts.app')

@section('title', __('Create New Degree Level | Admin'))

@section('content')



    <form action="{{ route('admin.degree_levels.store_degree_level') }}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" name="name" placeholder="Degree level name *" required>
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control" id="description" placeholder="Description" rows="5"></textarea>
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


