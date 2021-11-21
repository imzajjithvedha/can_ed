@extends('backend.layouts.app')

@section('title', __('Create new program | Admin'))

@section('content')



    <form action="{{ route('admin.programs.store_program') }}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">

                            <div class="mb-3">
                                <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Program title *" name="title" required>
                            </div>

                            <div class="mb-3">
                                <select name="degree_level" class="form-control">
                                    <option value="" selected disabled hidden>Degree level</option>
                                    @foreach($degree_levels as $degree_level)
                                        <option value="{{ $degree_level->id }}">{{ $degree_level->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="7" placeholder="Description"></textarea>
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
