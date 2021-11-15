@extends('backend.layouts.app')

@section('title', __('Edit School | Admin'))

@section('content')


    @include('backend.includes.top_nav')
    
    <div class="row">
        <div class="col-md-12 p-1">
            <div class="card">
                <div class="card-body border">
                    <div class="border p-3">
                        <form action="{{ route('admin.schools.school_programs_paragraph_update') }}" method="POST">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="title_1" class="form-label mb-1">Title 1</label>
                                <input type="text" class="form-control" id="title_1" aria-describedby="title_1" name="title_1" value="{{ $school->programs_title_1 }}">
                            </div>

                            <div>
                                <label for="paragraph" class="form-label mb-1">Title 1 - paragraph</label>
                                <textarea name="paragraph" class="ckeditor form-control" id="paragraph" value="{{ $school->programs_page_paragraph }}">{{ $school->programs_page_paragraph }}</textarea>
                            </div>

                            <div class="mt-5 text-end">
                                <input type="hidden" class="form-control" value="{{ $school->id }}" name="hidden_id">
                                <input type="submit" value="Update program page" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                            </div>
                        </form>

                        <hr class="my-5">

                        <div class="row justify-content-between align-items-center mb-3">
                            <div class="col-8">
                                <h5 class="fw-bold">All programs</h5>
                            </div>
                            <div class="col-4 text-end">
                                <button class="btn create-btn text-white" data-bs-toggle="modal" data-bs-target="#createProgram">Add program</button>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered" id="programs-table" style="width:100%">
                            <thead>
                                <tr class="align-items-center">
                                    <th scope="col">Degree level</th>
                                    <th scope="col">Program name</th>
                                    <th scope="col">Description</th>
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
    </div>


    <form action="{{ route('admin.schools.school_program_create') }}" method="POST">
        {{csrf_field()}}
        <div class="modal fade" id="createProgram" tabindex="-1" aria-labelledby="editQuoteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add program</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <select class="form-control" id="degree_level" name="degree_level" placeholder="Degree level *" required>
                                <option value="" selected disabled hidden>Degree level *</option>
                                @foreach($degree_levels as $degree_level)
                                    <option value="{{ $degree_level->id }}">{{ $degree_level->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <select class="form-control" id="title" name="title" placeholder="Program name *" required>
                                <option value="" selected disabled hidden>Program name *</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <textarea name="sub_title" class="form-control" id="sub_title" rows="5" placeholder="Description *" required></textarea>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $school->id }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add program</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
                            <h5>Are you sure you want to remove this program?</h5>
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
            var table = $('#programs-table').DataTable({
                processing: true,
                ajax: "{{route('admin.schools.get_school_programs', $school->id)}}",
                serverSide: true,
                order: [[1, "asc"]],
                columns: [
                    {data: 'degree_level', name: 'degree_level'},
                    {data: 'name', name: 'name'},
                    {data: 'sub_title', name: 'sub_title'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


        let program_id;
        let url;

        $(document).on('click', '.delete', function(){
            program_id = $(this).attr('id');
            $('#confirmModal').modal('show');

            url = "{{ route('admin.schools.school_program_delete', [$school->id, ':program_id']) }}";
        
            url = url.replace(':program_id', program_id);

        });

        
        $('#ok_button').click(function(){
            $.ajax({
                url:url,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#programs-table').DataTable().ajax.reload();
                    });
                }
            })
        });

    </script>

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

    <script>
        if(document.getElementById("create-program-btn")){
            $('#create-program-btn').click();
        }
    </script>

    <script>
        if(document.getElementById("paragraph-btn")){
            $('#paragraph-btn').click();
        }
    </script>

@endpush