@extends('backend.layouts.app')

@section('title', __('Create New Sponsor | Admin'))

@section('content')



    <form action="{{ route('admin.sponsors.store_sponsor') }}" method="post" enctype="multipart/form-data">
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
                                <input type="text" id="country" class="form-control" name="country" placeholder="Country" required>
                            </div>
                            <div class="form-group">
                                <input type="url" id="url" class="form-control" name="url" placeholder="URL" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Sponsor Image</label>
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
