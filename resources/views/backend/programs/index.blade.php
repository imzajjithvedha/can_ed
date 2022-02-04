@extends('backend.layouts.app')

@section('title', __('Programs | Admin'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Programs</strong>
                </div>

                <div class="card-body">
                    <div class="border p-3">
                        <form action="{{ route('admin.pages.programs_paragraph_update') }}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="description" class="form-label">Description *</label>
                                <textarea type="text" class="ckeditor form-control mt-2" name="description" value="{{ $paragraph->description }}" required>{!! $paragraph->description !!}</textarea>
                            </div>

                            <div class="text-end">
                                <input type="submit" value="Update paragraph" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                            </div>
                        </form>
                    </div>

                    <hr class="my-5">

                    <div class="text-end mb-4">
                        <a href="{{ route('admin.programs.create_program') }}" class="btn btn-primary pull-right me-4">Create new</a>

                        <a href="{{ route('admin.programs.import_programs') }}" class="btn btn-primary pull-right">Import programs</a>
                    </div>

                    

                    <table class="table table-striped table-bordered" id="programs-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <!-- <th scope="col">Degree level</th> -->
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
        var table = $('#programs-table').DataTable({
            processing: true,
            ajax: "{{route('admin.programs.get_programs')}}",
            serverSide: true,
            order: [[0, "asc"]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                // {data: 'degree_level', name: 'degree_level'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        let program_id;

        $(document).on('click', '.delete', function(){
            program_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"programs/delete-program/" + program_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#programs-table').DataTable().ajax.reload();
                    });
                }
            })
        });
    });

</script>

@endpush
