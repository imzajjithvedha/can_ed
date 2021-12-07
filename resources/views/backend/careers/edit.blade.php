@extends('backend.layouts.app')

@section('title', 'Edit career | Admin')

@section('content')
    
    <form action="{{route('admin.careers.update_career')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="mb-3">
                                <label for="level" class="form-label">Level *</label>
                                <input type="text" class="form-control" id="level" aria-describedby="level" placeholder="Level *" name="level" value="{{$career->level}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="hierarchical" class="form-label">Hierarchical structure *</label>
                                <input type="text" class="form-control" id="hierarchical" aria-describedby="hierarchical" placeholder="Hierarchical structure *" name="hierarchical" value="{{$career->hierarchical}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">Code *</label>
                                <input type="text" class="form-control" id="code" aria-describedby="code" placeholder="Code *" name="code" value="{{$career->code}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Class name *</label>
                                <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Class name *" name="title" value="{{$career->title}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="definition" class="form-label">Class definition *</label>
                                <textarea name="definition" id="definition" rows="7" class="form-control" placeholder="Class definition *" value="{{$career->definition}}" required>{{$career->definition}}</textarea>
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
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Approved" {{ $career->status == 'Approved' ? "selected" : "" }}>Approve</option>
                                    <option value="Pending" {{ $career->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $career->id }}"/>
                                <a href="{{ route('admin.careers.all_careers') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection