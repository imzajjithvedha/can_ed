@extends('backend.layouts.app')

@section('title', __('Careers | Admin'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>All Careers&nbsp;</strong>

                    <a href="{{ route('admin.careers.create_career') }}" class="btn btn-primary pull-right ml-4">Create New</a>

                    <a href="{{ route('admin.careers.import_careers') }}" class="btn btn-primary pull-right ml-4">Import Careers</a>
                   
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="careers-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Level</th>
                                <th scope="col">Hierarchical Structure</th>
                                <th scope="col">Code</th>
                                <th scope="col" style="width:250px;">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Option</th>
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
        var table = $('#careers-table').DataTable({
            processing: true,
            ajax: "{{route('admin.careers.get_careers')}}",
            serverSide: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'level', name: 'level'},
                {data: 'hierarchical', name: 'hierarchical'},
                {data: 'code', name: 'code'},
                {data: 'title', name: 'title'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        let career_id;

        $(document).on('click', '.delete', function(){
            career_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"delete-career/" + career_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#careers-table').DataTable().ajax.reload();
                    });
                }
            })
        });
    });

</script>

@endpush
