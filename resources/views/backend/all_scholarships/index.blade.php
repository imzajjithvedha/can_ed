@extends('backend.layouts.app')

@section('title', __('All scholarships | Admin'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>All scholarships&nbsp;</strong>

                    <a href="{{ route('admin.scholarships.create_scholarship') }}" class="btn btn-primary pull-right ml-4">Create new</a>

                    <a href="{{ route('admin.scholarships.import_scholarships') }}" class="btn btn-primary pull-right ml-4">Import all scholarships</a>
                   
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="scholarships-table" style="width:100%">
                        <thead>
                            <tr class="align-items-center">
                                <th scope="col">Name</th>
                                <th scope="col">Level of study</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Featured</th>
                                <th scope="col" style="max-width: 130px;">Options</th>
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalDeleteLabel">Delete</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this scholarship?</h5>
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
    <script>
        $(function () {
            var table = $('#scholarships-table').DataTable({
                processing: true,
                ajax: "{{ route('admin.scholarships.get_scholarships') }}",
                serverSide: true,
                order: [[0, "asc"]],
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'level_of_study', name: 'level_of_study'},
                    {data: 'deadline', name: 'deadline'},
                    {data: 'featured', name: 'featured'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


        let scholarship_id;

        $(document).on('click', '.delete', function(){
            scholarship_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"all-scholarships/delete-scholarship/" + scholarship_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#scholarships-table').DataTable().ajax.reload();
                    });
                }
            })
        });

    </script>


@endpush