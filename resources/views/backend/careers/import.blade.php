@extends('backend.layouts.app')

@section('title', __('Import careers | Admin'))

@section('content')



    <form action="{{ route('admin.careers.import') }}" method="post" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <label class="form-label">Excel file</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-success">Upload</button><br>
                </div>
            </div>    
        </div>
    </form>

@endsection
