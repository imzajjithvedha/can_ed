@extends('backend.layouts.app')

@section('title', __('Edit School | Admin'))

@section('content')


    @include('backend.includes.top_nav')
    
    <div class="row">
        <div class="col-md-12 p-1">
            <div class="card">
                <div class="card-body border">
                    <div class="border p-3">
                        <form action="{{ route('admin.schools.school_scholarships_paragraph_update') }}" class="mb-5" method="POST" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="scholarships_title_1" class="form-label mb-1">Title 1</label>
                                <input type="text" class="form-control" id="scholarships_title_1" aria-describedby="scholarships_title_1" name="scholarships_title_1" value="{{ $school->scholarships_title_1 }}">
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_1_paragraph" class="form-label mb-1">Paragraphs for title 1</label>
                                <textarea name="scholarships_title_1_paragraph" class="ckeditor form-control" id="scholarships_title_1_paragraph" value="{{ $school->scholarships_title_1_paragraph }}">{{ $school->scholarships_title_1_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_text_content_1" class="form-label mb-1">Text content 1</label>
                                <textarea name="scholarships_text_content_1" class="ckeditor form-control" id="scholarships_text_content_1" value="{{ $school->scholarships_text_content_1 }}">{{ $school->scholarships_text_content_1 }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_text_content_2" class="form-label mb-1">Text content 2</label>
                                <textarea name="scholarships_text_content_2" class="ckeditor form-control" id="scholarships_text_content_2" value="{{ $school->scholarships_text_content_2 }}">{{ $school->scholarships_text_content_2 }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_2" class="form-label mb-1">Title 2</label>
                                <input type="text" class="form-control" id="scholarships_title_2" aria-describedby="scholarships_title_2" name="scholarships_title_2" value="{{ $school->scholarships_title_2 }}">
                            </div>
                            <div class="mb-3">
                                <label for="title-2-image" class="form-label">Title 2 Image</label>

                                @if($school->scholarships_title_2_image != null)
                                    <div class="row justify-content-center mb-3">
                                        <div class="col-12">
                                            <img src="{{ url('images/schools', $school->scholarships_title_2_image) }}" alt="" class="img-fluid w-100" style="height: 20rem; object-fit: cover;">
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="scholarships_title_2_old_image" value="{{$school->scholarships_title_2_image}}">

                                    <input type="file" class="form-control" name="scholarships_title_2_image">

                                @else
                                    <input type="file" class="form-control" name="scholarships_title_2_image">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="scholarships_title_2_sub_title" class="form-label mb-1">Title 2 - sub title</label>
                                <input type="text" class="form-control" id="scholarships_title_2_sub_title" aria-describedby="scholarships_title_2_sub_title" name="scholarships_title_2_sub_title" value="{{ $school->scholarships_title_2_sub_title }}">
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_2_paragraph" class="form-label mb-1">Title 2 - paragraph</label>
                                <textarea name="scholarships_title_2_paragraph" class="form-control" id="scholarships_title_2_paragraph" rows="5" value="{{ $school->scholarships_title_2_paragraph }}">{{ $school->scholarships_title_2_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_2_button" class="form-label mb-1">Title 2 - button</label>
                                <input type="text" class="form-control" id="scholarships_title_2_button" aria-describedby="scholarships_title_2_button" name="scholarships_title_2_button" value="{{ $school->scholarships_title_2_button }}">
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_2_link" class="form-label mb-1">Title 2 - Link</label>
                                <input type="url" class="form-control" id="scholarships_title_2_link" aria-describedby="scholarships_title_2_link" name="scholarships_title_2_link" value="{{ $school->scholarships_title_2_link }}">
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_2_image_name" class="form-label mb-1">Title 2 - image name</label>
                                <input type="text" class="form-control" id="scholarships_title_2_image_name" aria-describedby="scholarships_title_2_image_name" name="scholarships_title_2_image_name" value="{{ $school->scholarships_title_2_image_name }}">
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_3" class="form-label mb-1">Title 3</label>
                                <input type="text" class="form-control" id="scholarships_title_3" aria-describedby="scholarships_title_3" name="scholarships_title_3" value="{{ $school->scholarships_title_3 }}">
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_3_paragraph" class="form-label mb-1">Paragraphs for title 3</label>
                                <textarea name="scholarships_title_3_paragraph" class="ckeditor form-control" id="scholarships_title_3_paragraph" value="{{ $school->scholarships_title_3_paragraph }}">{{ $school->scholarships_title_3_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_text_content_3" class="form-label mb-1">Text content 3</label>
                                <textarea name="scholarships_text_content_3" class="ckeditor form-control" id="scholarships_text_content_3" value="{{ $school->scholarships_text_content_3 }}">{{ $school->scholarships_text_content_3 }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_4" class="form-label mb-1">Title 4</label>
                                <input type="text" class="form-control" id="scholarships_title_4" aria-describedby="scholarships_title_4" name="scholarships_title_4" value="{{ $school->scholarships_title_4 }}">
                            </div>
                            <div class="mb-3">
                                <label for="title-4-image" class="form-label">Title 4 Image</label>

                                @if($school->scholarships_title_4_image != null)
                                    <div class="row justify-content-center mb-3">
                                        <div class="col-12">
                                            <img src="{{ url('images/schools', $school->scholarships_title_4_image) }}" alt="" class="img-fluid w-100" style="height: 20rem; object-fit: cover;">
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="scholarships_title_4_old_image" value="{{$school->scholarships_title_4_image}}">

                                    <input type="file" class="form-control" name="scholarships_title_4_image">

                                @else
                                    <input type="file" class="form-control" name="scholarships_title_4_image">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="scholarships_title_4_sub_title" class="form-label mb-1">Title 4 - sub title</label>
                                <input type="text" class="form-control" id="scholarships_title_4_sub_title" aria-describedby="scholarships_title_4_sub_title" name="scholarships_title_4_sub_title" value="{{ $school->scholarships_title_4_sub_title }}">
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_4_paragraph" class="form-label mb-1">Title 4 - paragraph</label>
                                <textarea name="scholarships_title_4_paragraph" class="form-control" id="scholarships_title_4_paragraph" rows="5" value="{{ $school->scholarships_title_4_paragraph }}">{{ $school->scholarships_title_4_paragraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_4_button" class="form-label mb-1">Title 4 - button</label>
                                <input type="text" class="form-control" id="scholarships_title_4_button" aria-describedby="scholarships_title_4_button" name="scholarships_title_4_button" value="{{ $school->scholarships_title_4_button }}">
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_4_link" class="form-label mb-1">Title 4 - Link</label>
                                <input type="url" class="form-control" id="scholarships_title_4_link" aria-describedby="scholarships_title_4_link" name="scholarships_title_4_link" value="{{ $school->scholarships_title_4_link }}">
                            </div>

                            <div class="mb-3">
                                <label for="scholarships_title_4_image_name" class="form-label mb-1">Title 4 - image name</label>
                                <input type="text" class="form-control" id="scholarships_title_4_image_name" aria-describedby="scholarships_title_4_image_name" name="scholarships_title_4_image_name" value="{{ $school->scholarships_title_4_image_name }}">
                            </div>

                            <div class="text-end">
                                <input type="hidden" class="form-control" value="{{ $school->id }}" name="hidden_id">
                                <input type="submit" value="Update scholarships details" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                            </div>
                        </form>

                        <div class="row justify-content-between align-items-center mb-3">
                            <div class="col-8">
                                <h4 class="fs-4 fw-bolder user-settings-head">All Scholarships</h4>
                            </div>
                            <div class="col-4 text-end">
                                <button class="btn create_btn text-white" data-bs-toggle="modal" data-bs-target="#createProgram">Add Scholarship</button>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered" id="scholarships-table" style="width:100%">
                            <thead>
                                <tr class="align-items-center">
                                    <th scope="col">Name</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Level of study</th>
                                    <th scope="col">Deadline</th>
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


    <form action="{{ route('admin.schools.school_scholarship_create') }}" method="POST" enctype="multipart/form-data">
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

                        <!-- <div class="mb-3">
                            <input type="text" class="form-control" name="provider" placeholder="Provider *">
                        </div> -->

                        <div class="mb-3">
                            <textarea name="summary" class="form-control" id="summary" rows="5" placeholder="Summary *"></textarea>
                        </div>

                        <!-- <div class="mb-5">
                            <input type="number" class="form-control" name="amount" placeholder="Amount *">
                        </div> -->

                        <div class="mb-3">
                            <label for="eligibility" class="form-label">Basic Eligibility</label>
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *" required>
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *">
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *">
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *">
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *">
                        </div>

                        <div class="mb-3">
                            <select name="award" id="award" class="form-control">
                                <option value="" selected disabled hidden>Awards *</option>
                                <option value="Admission">Admission</option>
                                <option value="Current students">Current students</option>
                                <option value="Admission and current students">Admission and current students</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="action" placeholder="Action *">
                        </div>
                        <div class="mb-3">
                            <label for="eligibility" class="form-label">Deadline *</label>
                            <input type="date" class="form-control" name="deadline" placeholder="Deadline *">
                        </div>

                        <div class="mb-3">
                            <select name="availability" id="availability" class="form-control">
                                <option value="" selected disabled hidden>Availability *</option>
                                <option value="All students">All students</option>
                                <option value="International students">International students</option>
                                <option value="Canadian students">Canadian students</option>
                                <option value="Provincial students">Provincial students</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <select name="level_of_study" id="level_of_study" class="form-control">
                                <option value="" selected disabled hidden>Level of Study *</option>
                                <option value="Graduate">Graduate</option>
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Graduate and Undergraduate">Graduate and undergraduate</option>
                            </select>
                        </div>

                        <!-- <div class="mb-3">
                            <input type="text" class="form-control" name="school_name" placeholder="School Name *">
                        </div> -->

                        <div class="mb-3">
                            <label for="featured_image" class="form-label">Featured Image</label>
                            <input type="file" class="form-control" name="featured_image" required>
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
                ajax: "{{route('admin.schools.get_school_scholarships', $school->id)}}",
                serverSide: true,
                order: [[0, "asc"]],
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'availability', name: 'availability'},
                    {data: 'level_of_study', name: 'level_of_study'},
                    {data: 'deadline', name: 'deadline'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


        let scholarship_id;
        let url;

        $(document).on('click', '.delete', function(){
            scholarship_id = $(this).attr('id');
            $('#confirmModal').modal('show');

            url = "{{ route('admin.schools.school_scholarship_delete', [$school->id, ':scholarship_id']) }}";
        
            url = url.replace(':scholarship_id', scholarship_id);
        });

        $('#ok_button').click(function(){
            $.ajax({
                url: url,
        
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