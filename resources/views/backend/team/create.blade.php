@extends('backend.layouts.app')

@section('title', __('Create New Team Member | Admin'))

@section('content')



    <form action="{{ route('admin.team.store_team') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="title" class="form-control" name="title" placeholder="Title" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="7" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Member Image</label>
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

@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
