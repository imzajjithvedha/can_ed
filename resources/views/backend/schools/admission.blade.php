@extends('backend.layouts.app')

@section('title', __('Edit school | Admin'))

@section('content')


    @include('backend.includes.top_nav')
    
    <div class="row">
        <div class="col-md-12 p-1">
            <div class="card">
                <div class="card-body border">
                    <div class="border p-3">
                        <form action="{{ route('admin.schools.school_admission_paragraph_update') }}" method="POST" novalidate>
                            {{csrf_field()}}
                                <div class="mb-3">
                                    <label for="admission_paragraph" class="form-label mb-1">Main paragraph</label>
                                    <textarea name="admission_paragraph" class="ckeditor form-control" id="admission_paragraph" value="{{ $school->admission_paragraph }}">{{ $school->admission_paragraph }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="admission_title_1" class="form-label mb-1">Title 1</label>
                                    <input type="text" class="form-control" id="admission_title_1" aria-describedby="admission_title_1" name="admission_title_1" value="{{ $school->admission_title_1 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="admission_title_1_paragraph" class="form-label mb-1">Paragraphs for title 1</label>
                                    <textarea name="admission_title_1_paragraph" class="ckeditor form-control" id="admission_title_1_paragraph" value="{{ $school->admission_title_1_paragraph }}">{{ $school->admission_title_1_paragraph }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="admission_text_content_1" class="form-label mb-1">Text content 1</label>
                                    <textarea name="admission_text_content_1" class="ckeditor form-control" id="admission_text_content_1" value="{{ $school->admission_text_content_1 }}">{{ $school->admission_text_content_1 }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="admission_title_2" class="form-label mb-1">Title 2</label>
                                    <input type="text" class="form-control" id="admission_title_2" aria-describedby="admission_title_2" name="admission_title_2" value="{{ $school->admission_title_2 }}">
                                </div>

                                <div class="mb-3">
                                    <div>
                                        <label class="form-label mb-1">Title 2 bullet points</label>
                                        @foreach(json_decode($school->admission_title_2_bullets) as $admission_title_2_bullet)
                                            <div class="mb-4">
                                                <input type="text" class="form-control mb-2" id="link_1_name" aria-describedby="link_1" name="admission_title_2_bullets[]" value="{{ $admission_title_2_bullet }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="admission_title_3" class="form-label mb-1">Title 3</label>
                                    <input type="text" class="form-control" id="admission_title_3" aria-describedby="admission_title_3" name="admission_title_3" value="{{ $school->admission_title_3 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="admission_title_3_paragraph" class="form-label mb-1">Paragraphs for title 3</label>
                                    <textarea name="admission_title_3_paragraph" class="ckeditor form-control" id="admission_title_3_paragraph" value="{{ $school->admission_title_3_paragraph }}">{{ $school->admission_title_3_paragraph }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="admission_title_4" class="form-label mb-1">Title 4</label>
                                    <input type="text" class="form-control" id="admission_title_4" aria-describedby="admission_title_4" name="admission_title_4" value="{{ $school->admission_title_4 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="admission_title_4_paragraph" class="form-label mb-1">Paragraphs for title 4</label>
                                    <textarea name="admission_title_4_paragraph" class="ckeditor form-control" id="admission_title_4_paragraph" value="{{ $school->admission_title_4_paragraph }}">{{ $school->admission_title_4_paragraph }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="admission_title_5" class="form-label mb-1">Title 5</label>
                                    <input type="text" class="form-control" id="admission_title_5" aria-describedby="admission_title_5" name="admission_title_5" value="{{ $school->admission_title_5 }}">
                                </div>

                                <div>
                                    <label for="admission_title_5_paragraph" class="form-label mb-1">Paragraphs for title 5</label>
                                    <textarea name="admission_title_5_paragraph" class="ckeditor form-control" id="admission_title_5_paragraph" value="{{ $school->admission_title_5_paragraph }}">{{ $school->admission_title_5_paragraph }}</textarea>
                                </div>

                                <!-- <div class="mb-3">
                                    <label for="admission_title_6" class="form-label mb-1">Title 6</label>
                                    <input type="text" class="form-control" id="admission_title_6" aria-describedby="admission_title_6" name="admission_title_6" value="{{ $school->admission_title_6 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="admission_title_6_paragraph" class="form-label mb-1">Paragraphs for title 6</label>
                                    <textarea name="admission_title_6_paragraph" class="ckeditor form-control" id="admission_title_6_paragraph" value="{{ $school->admission_title_6_paragraph }}">{{ $school->admission_title_6_paragraph }}</textarea>
                                </div> -->

                                <div class="mt-5 text-end">
                                    <input type="hidden" class="form-control" value="{{ $school->id }}" name="hidden_id">
                                    <input type="submit" value="Update admission details" class="btn rounded-pill text-light px-5 py-2" style="background-color: #94ca60;">
                                </div>
                        </form>

                        <hr class="my-5">

                        <div class="row justify-content-between align-items-center mb-3">
                            <div class="col-8">
                                <h5 class="fw-bold">All admission department employees</h5>
                            </div>
                            <div class="col-4 text-end">
                                <button class="btn create-btn text-white" data-bs-toggle="modal" data-bs-target="#createEmployee">Add employee</button>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered" id="employee-table" style="width:100%">
                            <thead>
                                <tr class="align-items-center">
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <!-- <th scope="col">Featured</th> -->
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


    <form action="{{ route('admin.schools.school_admission_create') }}" method="POST" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        <div class="modal fade" id="createEmployee" tabindex="-1" aria-labelledby="editQuoteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Employee name *" name="name" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="position" aria-describedby="position" placeholder="Position *" name="position" required>
                        </div>

                        <div class="mb-3">
                            <textarea name="description" id="description" rows="5" class="form-control" aria-describedby="description" placeholder="Description *" required></textarea>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="Telephone *" name="phone" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="more_1" aria-describedby="more_1" placeholder="More_1 *" name="more_1">
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email *" name="email" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="more_2" aria-describedby="more_2" placeholder="More_2 *" name="more_2">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Employee image *</label>
                            <input type="file" class="form-control" name="featured_image" required>
                        </div>

                        <div class="mb-3">
                            <input type="number" class="form-control" id="orders" aria-describedby="orders" placeholder="Order *" name="orders" required>
                        </div>

                        <!-- <div class="mb-3">
                            <select class="form-control" id="featured" name="featured" placeholder="Featured?" required>
                                <option value="" selected disabled hidden>Do you want to show this employee under meet our team? </option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div> -->

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $school->id }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add employee</button>
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
                            <h5>Are you sure you want to remove this employee?</h5>
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

            var table = $('#employee-table').DataTable({
                processing: true,
                ajax: "{{route('admin.schools.get_school_admission', $school->id)}}",
                serverSide: true,
                order: [[4, "asc"]],
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'email', name: 'email'},
                    // {data: 'featured', name: 'featured'},
                    {data: 'orders', name: 'orders'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


        let employee_id;
        let url;

        $(document).on('click', '.delete', function(){
            employee_id = $(this).attr('id');
            $('#confirmModal').modal('show');

            url = "{{ route('admin.schools.school_admission_delete', [$school->id, ':employee_id']) }}";
        
            url = url.replace(':employee_id', employee_id);
        });

        $('#ok_button').click(function(){
            $.ajax({
                url: url,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#employee-table').DataTable().ajax.reload();
                    });
                }
            })
        });

    </script>

    <script>
        if(document.getElementById("create-btn")){
            $('#create-btn').click();
        }
    </script>

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>
@endpush