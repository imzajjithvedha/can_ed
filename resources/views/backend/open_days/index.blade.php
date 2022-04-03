@extends('backend.layouts.app')

@section('title', __('Open days | Admin'))

@section('content')
    

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Open days&nbsp;</strong>

                    <a href="{{ route('admin.open_days.create_open_day') }}" class="btn btn-primary pull-right ml-4">Create new</a>
                   
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="open-days-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">School</th>
                                <th scope="col">Title</th>
                                <th scope="col">Date</th>
                                <th scope="col">Link</th>
                                <th scope="col">Status</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Option</th>
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
        var table = $('#open-days-table').DataTable({
            processing: true,
            ajax: "{{route('admin.open_days.get_open_days')}}",
            serverSide: true,
            order: [[1, "asc"]],
            columns: [
                {data: 'school', name: 'school'},
                {data: 'title', name: 'title'},
                {data: 'date', name: 'date'},
                {data: 'url', name: 'url'},
                {data: 'status', name: 'status'},
                {data: 'featured', name: 'featured'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        let open_day_id;

        $(document).on('click', '.delete', function(){
            open_day_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"delete-open-day/" + open_day_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#open-days-table').DataTable().ajax.reload();
                    });
                }
            })
        });
    });

</script>

@endpush
