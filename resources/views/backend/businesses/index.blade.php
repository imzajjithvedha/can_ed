@extends('backend.layouts.app')

@section('title', __('Businesses | Admin'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Businesses&nbsp;</strong>

                    <a href="{{ route('admin.businesses.create_business') }}" class="btn btn-primary pull-right ml-4">Create new</a>
                   
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="businesses-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Contact name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Package</th>
                                <th scope="col">Status</th>
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
                            <h5>Are you sure you want to remove this business?</h5>
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
        var table = $('#businesses-table').DataTable({
            processing: true,
            ajax: "{{route('admin.businesses.get_businesses')}}",
            serverSide: true,
            order: [[0, "asc"]],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'contact_name', name: 'contact_name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'featured', name: 'featured'},
                {data: 'package', name: 'package'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        let business_id;

        $(document).on('click', '.delete', function(){
            business_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"businesses/delete-business/" + business_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#businesses-table').DataTable().ajax.reload();
                    });
                }
            })
        });
    });

</script>

@endpush
