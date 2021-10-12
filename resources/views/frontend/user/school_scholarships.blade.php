@extends('frontend.layouts.app')

@section('title', 'School Scholarships' )

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
                        <h4 class="fs-4 fw-bolder user-settings-head">All Scholarships</h4>
                    </div>
                    <div class="col-4 text-end">
                        <button class="btn create_btn text-white" data-bs-toggle="modal" data-bs-target="#createProgram">Add Scholarship</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3 school" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                            <div class="row">
                                <div class="col-12 border py-3">
                                    <table class="table table-striped table-bordered" id="scholarships-table" style="width:100%">
                                        <thead>
                                            <tr class="align-items-center">
                                                <th scope="col">Name</th>
                                                <th scope="col">Provider</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Deadline</th>
                                                <th scope="col" style="max-width: 180px;">Options</th>
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


    <form action="{{ route('frontend.user.school_scholarship_create') }}" method="POST">
    {{csrf_field()}}
        <div class="modal fade" id="createProgram" tabindex="-1" aria-labelledby="editQuoteLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Scholarship</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-end">
                            <p class="mb-2 required fw-bold">* Indicates required fields</p>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Scholarship Name *">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="provider" placeholder="Provider *">
                        </div>

                        <div class="mb-3">
                            <textarea name="summary" class="form-control" id="summary" rows="5" placeholder="Summary *"></textarea>
                        </div>

                        <div class="mb-5">
                            <input type="number" class="form-control" name="amount" placeholder="Amount *">
                        </div>

                        <div class="mb-5">
                            <label for="eligibility">Basic Eligibility</label>
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *" required>
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *">
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *">
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *">
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="award" placeholder="Award *">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="action" placeholder="Action *">
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control" name="deadline" placeholder="Deadline *">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="availability" placeholder="Availability *">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="level_of_study" placeholder="Level of Study *">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="school_name" placeholder="School Name *">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $school->id }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Scholarship</button>
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
                        <h4 class="mb-0 text-center">Scholarship updated successfully.</h4>
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
        <button type="button" class="btn btn-primary invisible" id="create-scholarship-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Scholarship added successfully.</h4>
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
                ajax: "{{route('frontend.user.get_school_scholarships')}}",
                serverSide: true,
                order: [[0, "asc"]],
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'provider', name: 'provider'},
                    {data: 'amount', name: 'amount'},
                    {data: 'deadline', name: 'deadline'},
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
                url:"school-scholarships/delete/" + scholarship_id,
        
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

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

    <script>
        if(document.getElementById("create-scholarship-btn")){
            $('#create-scholarship-btn').click();
        }
    </script>
    
@endpush

