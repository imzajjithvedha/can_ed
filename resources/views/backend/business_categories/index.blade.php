@extends('backend.layouts.app')

@section('title', __('Businesses categories | Admin'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Business categories&nbsp;</strong>

                    <a href="{{ route('admin.categories.create_category') }}" class="btn btn-primary pull-right ml-4">Create new</a>

                    <a href="{{ route('admin.categories.import_categories') }}" class="btn btn-primary pull-right ml-4">Import business categories</a>
                   
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="business-categories-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
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
                            <h5>Are you sure you want to remove this business category?</h5>
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
        var table = $('#business-categories-table').DataTable({
            processing: true,
            ajax: "{{route('admin.categories.get_categories')}}",
            serverSide: true,
            order: [[0, "asc"]],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'image', name: 'image'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "drawCallback": function(settings) {
                $('.status-check').change(function() {

                    let status = $(this).prop('checked') == true ? 1 : 0;
                    let id = $(this).attr('data-id');

                    $.ajax({
                        url: "{{url('/')}}/admin/business-categories/change-status/" + id + "/" + status,
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

        let category_id;

        $(document).on('click', '.delete', function(){
            category_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"business-categories/delete-category/" + category_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#business-categories-table').DataTable().ajax.reload();
                    });
                }
            })
        });
    });

</script>

@endpush
