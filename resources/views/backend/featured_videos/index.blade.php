@extends('backend.layouts.app')

@section('title', 'Featured Videos | Admin')

@section('content')
    
    <form action="{{ route('admin.featured_videos_update') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group mb-3">
                                <input type="url" id="video1" class="form-control" name="video1" value="" placeholder="First Video" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="url" id="video2" class="form-control" name="video2" value="" placeholder="Second Video" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="url" id="video3" class="form-control" name="video3" value="" placeholder="Third Video" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="url" id="video4" class="form-control" name="video4" value="" placeholder="Fourth Video" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="text-center">
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </form>

@endsection


@push('after-scripts')
    <script>
        let app = @json($videos);
        $('#video1').val(app[0]['link']);
        $('#video2').val(app[1]['link']);
        $('#video3').val(app[2]['link']);
        $('#video4').val(app[3]['link']);
    </script>
@endpush

