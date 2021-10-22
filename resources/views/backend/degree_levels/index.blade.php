@extends('backend.layouts.app')

@section('title', __('Degree Levels | Admin'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Degree Levels&nbsp;</strong>

                    <a href="{{ route('admin.degree_levels.create_degree_level') }}" class="btn btn-primary ms-4">Create New</a>

                    <a href="{{ route('admin.degree_levels.import_degree_levels') }}" class="btn btn-primary pull-right ml-4">Import Degree Levels</a>
                   
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="degree-levels-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
    

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
        var table = $('#degree-levels-table').DataTable({
            processing: true,
            ajax: "{{route('admin.degree_levels.get_degree_levels')}}",
            serverSide: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'title'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        let degree_level_id;

        $(document).on('click', '.delete', function(){
            degree_level_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"degree-levels/delete-degree-level/" + degree_level_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#degree-levels-table').DataTable().ajax.reload();
                    });
                }
            })
        });
    });

</script>

@endpush
