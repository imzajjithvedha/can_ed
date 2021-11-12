@extends('backend.layouts.app')

@section('title', __('Edit School | Admin'))

@section('content')


    @include('backend.includes.top_nav')
    
    <div class="row">
        <div class="col-md-12 p-1">
            <div class="card">
                <div class="card-body border">
                    <div class="p-3">
                        <div class="row justify-content-between align-items-center mb-3">
                            <div class="col-8 p-0">
                                <h4 class="fs-4 fw-bolder user-settings-head">Overview FAQ's</h4>
                            </div>
                            <div class="col-4 text-end p-0">
                                <button class="btn create_btn text-white" data-bs-toggle="modal" data-bs-target="#createScholarshipFAQ">Add FAQ</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="school" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                                    <div class="row">
                                        <div class="col-12 border py-3">

                                            <!-- <div class="row justify-content-between align-items-center mb-3">
                                                <div class="col-8">
                                                    <h4 class="fs-4 fw-bolder user-settings-head">Scholarship FAQ's</h4>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn create_btn text-white" data-bs-toggle="modal" data-bs-target="#createScholarshipFAQ">Add FAQ</button>
                                                </div>
                                            </div> -->

                                            <table class="table table-striped table-bordered" id="faq-table" style="width:100%">
                                                <thead>
                                                    <tr class="align-items-center">
                                                        <th scope="col">Question</th>
                                                        <th scope="col">Answer</th>
                                                        <th scope="col">Order</th>
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
        </div>
    </div>


    <form action="{{ route('admin.schools.school_overview_faq_create') }}" method="POST">
        {{csrf_field()}}
        <div class="modal fade" id="createScholarshipFAQ" tabindex="-1" aria-labelledby="editQuoteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add FAQ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="question" aria-describedby="question" placeholder="Question *" name="question" required>
                        </div>

                        <div class="mb-3">
                            <textarea name="answer" id="answer" rows="5" class="form-control" aria-describedby="answer" placeholder="Answer *" name="answer" required></textarea>
                        </div>

                        <div class="mb-3">
                            <input type="number" class="form-control" id="orders" aria-describedby="orders" placeholder="Order *" name="orders" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $school->id }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add FAQ</button>
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
                            <h5>Are you sure you want to remove this FAQ?</h5>
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
            var table = $('#faq-table').DataTable({
                processing: true,
                ajax: "{{route('admin.schools.get_school_overview_faq', $school->id)}}",
                serverSide: true,
                order: [[2, "asc"]],
                columns: [
                    {data: 'question', name: 'question'},
                    {data: 'answer', name: 'answer'},
                    {data: 'orders', name: 'orders'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


        let faq_id;
        let url;

        $(document).on('click', '.delete', function(){
            faq_id = $(this).attr('id');
            $('#confirmModal').modal('show');

            url = "{{ route('admin.schools.school_overview_faq_delete', [$school->id, ':faq_id']) }}";
        
            url = url.replace(':faq_id', faq_id);
        });

        $('#ok_button').click(function(){
            $.ajax({
                url: url,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#faq-table').DataTable().ajax.reload();
                    });
                }
            })
        });

    </script>

@endpush