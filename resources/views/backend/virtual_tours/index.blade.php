@extends('backend.layouts.app')

@section('title', __('Virtual tours | Admin'))

@section('content')
    

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Virtual tours&nbsp;</strong>

                    <a href="{{ route('admin.virtual_tours.create_virtual_tour') }}" class="btn btn-primary pull-right ml-4">Create new</a>
                   
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="virtual-tours-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">School</th>
                                <th scope="col">Image</th>
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
        var table = $('#virtual-tours-table').DataTable({
            processing: true,
            ajax: "{{route('admin.virtual_tours.get_virtual_tours')}}",
            serverSide: true,
            order: [[1, "asc"]],
            columns: [
                {data: 'school', name: 'school'},
                {data: 'image', name: 'image'},
                {data: 'link', name: 'link'},
                {data: 'status', name: 'status'},
                {data: 'featured', name: 'featured'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "drawCallback": function(settings) {
                $('.status-check').change(function() {

                    let status = $(this).prop('checked') == true ? 1 : 0;
                    let id = $(this).attr('data-id');

                    $.ajax({
                        url: "{{url('/')}}/admin/schools/virtual-tours/change-status/" + id + "/" + status,
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
                        url: "{{url('/')}}/admin/schools/virtual-tours/change-featured/" + id + "/" + status,
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

        let virtual_tour_id;

        $(document).on('click', '.delete', function(){
            virtual_tour_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"delete-virtual-tour/" + virtual_tour_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#virtual-tours-table').DataTable().ajax.reload();
                    });
                }
            })
        });
    });

</script>

@endpush
