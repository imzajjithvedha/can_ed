@extends('frontend.layouts.app')

@section('title', 'School Programs' )

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

@section('content')

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between align-items-center mb-3">
                    <div class="col-8 p-0">
                        <h4 class="fs-4 fw-bolder user-settings-head">All Programs</h4>
                    </div>
                    <div class="col-4 text-end">
                        <button class="btn create_btn text-white" data-bs-toggle="modal" data-bs-target="#createProgram">Add Program</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3 school" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                            <div class="row">
                                <div class="col-12 border py-3">
                                    <table class="table table-striped table-bordered" id="programs-table" style="width:100%">
                                        <thead>
                                            <tr class="align-items-center">
                                                <th scope="col">Program Category</th>
                                                <th scope="col">Program Name</th>
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
            </div>
        </div>
    </div>


    <form action="{{ route('frontend.user.school_program_create') }}" method="POST">
    {{csrf_field()}}
        <div class="modal fade" id="createProgram" tabindex="-1" aria-labelledby="editQuoteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Program</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <select class="form-control" id="program_category" name="program_category" placeholder="Program Category" required>
                                <option value="" selected disabled hidden>Program Category *</option>
                                @foreach($program_categories as $program_category)
                                    <option value="{{ $program_category->id }}">{{ $program_category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <select class="form-control" id="title" name="title" placeholder="Program Name" required>
                                <option value="" selected disabled hidden>Program Name *</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="sub_title" aria-describedby="sub_title" placeholder="Description" name="sub_title" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $school->id }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Program</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Program updated successfully.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if(\Session::has('created'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="create-program-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Program added successfully.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


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
                ajax: "{{route('frontend.user.get_school_programs')}}",
                serverSide: true,
                order: [[1, "asc"]],
                columns: [
                    {data: 'program_category', name: 'program_category'},
                    {data: 'name', name: 'name'},
                    {data: 'sub_title', name: 'sub_title'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


        let program_id;

        $(document).on('click', '.delete', function(){
            program_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"school-programs/delete/" + program_id,
        
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
    
@endpush

