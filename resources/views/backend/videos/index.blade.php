@extends('backend.layouts.app')

@section('title', __('Videos | Admin'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Videos&nbsp;</strong>

                    <button class="btn btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#createVideo">Create new</button>
                   
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="videos-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Link</th>
                                <th scope="col" style="max-width: 100px;">Featured</th>
                                <th scope="col" style="max-width: 100px;">Status</th>
                                <th scope="col" style="max-width: 200px;">Options</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <form action="{{ route('admin.videos.store_video') }}" method="POST">
    {{csrf_field()}}
        <div class="modal fade" id="createVideo" tabindex="-1" aria-labelledby="editQuoteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" id="title" class="form-control" name="title" placeholder="Video title *" required>
                        </div>

                        <div class="form-group">
                            <input type="url" id="link" class="form-control" name="link" placeholder="Video link *" required>
                        </div>

                        <div class="form-group">
                            <textarea name="description" class="form-control" rows="4" placeholder="Description"></textarea>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="featured" name="featured" placeholder="Featured? *" required>
                                <option value="" selected disabled hidden>Do you want to show this video in the homepage? *</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Create video</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    

     <!-- Modal delete -->
     <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this video?</h5>
                        </div>                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete</button>
                       
                    </div>
                </form>

            </div>
        </div>
    </div>
    
@endsection


@push('after-scripts')
<script type="text/javascript">
    $(function () {
        var table = $('#videos-table').DataTable({
            processing: true,
            ajax: "{{route('admin.videos.get_videos')}}",
            serverSide: true,
            order: [[0, "asc"]],
            columns: [
                {data: 'title', name: 'title'},
                {data: 'link', name: 'link'},
                {data: 'featured', name: 'featured'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        let video_id;

        $(document).on('click', '.delete', function(){
            video_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"videos/delete-video/" + video_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#videos-table').DataTable().ajax.reload();
                    });
                }
            })
        });
    });

</script>

@endpush
