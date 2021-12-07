@extends('backend.layouts.app')

@section('title', __('Create new career | Admin'))

@section('content')



    <form action="{{ route('admin.careers.store_career') }}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="level" aria-describedby="level" placeholder="Level *" name="level" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="hierarchical" aria-describedby="hierarchical" placeholder="Hierarchical structure *" name="hierarchical" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="code" aria-describedby="code" placeholder="Code *" name="code" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Class name *" name="title" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="definition" rows="7" class="form-control" placeholder="Class definition *" required></textarea>
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
