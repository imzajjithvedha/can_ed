@extends('backend.layouts.app')

@section('title', __('Articles | Admin'))

@section('content')
    

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Articles&nbsp;</strong>

                    <a href="{{ route('admin.articles.create_article') }}" class="btn btn-primary ms-4">Create new</a>
                   
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="articles-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Status</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

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
                            <h5>Are you sure you want to remove this?</h5>
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
        var table = $('#articles-table').DataTable({
            processing: true,
            ajax: "{{route('admin.articles.get_articles')}}",
            serverSide: true,
            order: [[0, "asc"]],
            columns: [
                {data: 'title', name: 'title'},
                {data: 'image', name: 'image'},
                {data: 'featured', name: 'featured'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "drawCallback": function(settings) {
                $('.status-check').change(function() {

                    let status = $(this).prop('checked') == true ? 1 : 0;
                    let id = $(this).attr('data-id');

                    $.ajax({
                        url: "{{url('/')}}/admin/articles/change-status/" + id + "/" + status,
                        method: "GET",
                        timeout: 0,
                        dataType: "json",
                        success: function() {
                            console.log(data.success);
                        }
                    });
                });

                $('.featured-check').change(function() {

                    let status = $(this).prop('checked') == true ? 1 : 0;
                    let id = $(this).attr('data-id');

                    $.ajax({
                        url: "{{url('/')}}/admin/articles/change-featured/" + id + "/" + status,
                        method: "GET",
                        timeout: 0,
                        dataType: "json",
                        success: function() {
                            console.log(data.success);
                        }
                    });
                });
            }
        });

        let article_id;

        $(document).on('click', '.delete', function(){
            article_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"articles/delete-article/" + article_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#articles-table').DataTable().ajax.reload();
                    });
                }
            })
        });
    });

</script>

@endpush
