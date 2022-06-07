@extends('frontend.layouts.app')

@section('title', 'Proxima Study | School scholarships' )

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
                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <h4 class="user-settings-head">Scholarships</h4>
                    </div>
                    <!-- <div class="col-4 text-end">
                        <button class="btn create-btn text-white" data-bs-toggle="modal" data-bs-target="#createProgram">Add Scholarship</button>
                    </div> -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="school" id="nav-scholarships" role="tabpanel" aria-labelledby="nav-scholarships-tab">
                            <div class="row">
                                <div class="col-12 border py-3">

                                    <form action="{{ route('frontend.user.school_scholarships_paragraph_update') }}" class="mb-5" method="POST" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="mb-3">
                                            <label for="scholarships_title_1" class="form-label mb-1">Title 1</label>
                                            <input type="text" class="form-control" id="scholarships_title_1" aria-describedby="scholarships_title_1" name="scholarships_title_1" value="{{ $school->scholarships_title_1 }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="scholarships_title_1_paragraph" class="form-label mb-1">Title 1 - paragraph</label>
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
                                            <label for="title-2-image" class="form-label">Title 2 - image (Files must be less than 5MB, allowed file types: png, gif, jpg, jpeg)</label>

                                            @if($school->scholarships_title_2_image != null)
                                                <div class="row justify-content-center mb-3">
                                                    <div class="col-12">
                                                        <img src="{{ url('images/schools', $school->scholarships_title_2_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
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
                                            <textarea name="scholarships_title_2_paragraph" class="form-control" id="scholarships_title_2_paragraph" value="{{ $school->scholarships_title_2_paragraph }}" rows="5">{{ $school->scholarships_title_2_paragraph }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="scholarships_title_2_button" class="form-label mb-1">Title 2 - button</label>
                                            <input type="text" class="form-control" id="scholarships_title_2_button" aria-describedby="scholarships_title_2_button" name="scholarships_title_2_button" value="{{ $school->scholarships_title_2_button }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="scholarships_title_2_link" class="form-label mb-1">Title 2 - link</label>
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
                                            <label for="scholarships_title_3_paragraph" class="form-label mb-1">Title 3 - paragraph</label>
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
                                            <label for="title-4-image" class="form-label">Title 4 - image (Files must be less than 5MB, allowed file types: png, gif, jpg, jpeg)</label>

                                            @if($school->scholarships_title_4_image != null)
                                                <div class="row justify-content-center mb-3">
                                                    <div class="col-12">
                                                        <img src="{{ url('images/schools', $school->scholarships_title_4_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
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
                                            <textarea name="scholarships_title_4_paragraph" class="form-control" id="scholarships_title_4_paragraph" value="{{ $school->scholarships_title_4_paragraph }}" rows="5">{{ $school->scholarships_title_4_paragraph }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="scholarships_title_4_button" class="form-label mb-1">Title 4 - button</label>
                                            <input type="text" class="form-control" id="scholarships_title_4_button" aria-describedby="scholarships_title_4_button" name="scholarships_title_4_button" value="{{ $school->scholarships_title_4_button }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="scholarships_title_4_link" class="form-label mb-1">Title 4 - link</label>
                                            <input type="url" class="form-control" id="scholarships_title_4_link" aria-describedby="scholarships_title_4_link" name="scholarships_title_4_link" value="{{ $school->scholarships_title_4_link }}">
                                        </div>

                                        <div>
                                            <label for="scholarships_title_4_image_name" class="form-label mb-1">Title 4 - image name</label>
                                            <input type="text" class="form-control" id="scholarships_title_4_image_name" aria-describedby="scholarships_title_4_image_name" name="scholarships_title_4_image_name" value="{{ $school->scholarships_title_4_image_name }}">
                                        </div>

                                        <div class="mt-5 text-end">
                                            <input type="hidden" class="form-control" value="{{ $school->id }}" name="hidden_id">
                                            <input type="submit" value="Update scholarships details" class="btn text-white px-5 py-2" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">
                                        </div>
                                    </form>

                                    <hr class="my-5">

                                    <div class="row justify-content-between align-items-center mb-3">
                                        <div class="col-8">
                                            <h5 class="fw-bold">All scholarships</h5>
                                        </div>
                                        <div class="col-4 text-end">
                                            <button class="btn create-btn text-white" data-bs-toggle="modal" data-bs-target="#createProgram">Add scholarship</button>
                                        </div>
                                    </div>

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
                </div>
            </div>
        </div>
    </div>


    <form action="{{ route('frontend.user.school_scholarship_create') }}" method="POST" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        <div class="modal fade" id="createProgram" tabindex="-1" aria-labelledby="editQuoteLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add scholarship</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Scholarship name *" required>
                        </div>

                        <div class="mb-3">
                            <select name="province" id="province" class="form-control" required>
                                <option value="" selected disabled>Province *</option>
                                <option value="Alberta">Alberta</option>
                                <option value="British Columbia">British Columbia</option>
                                <option value="Manitoba">Manitoba</option>
                                <option value="New Brunswick">New Brunswick</option>
                                <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                <option value="Nova Scotia">Nova Scotia</option>
                                <option value="Ontario">Ontario</option>
                                <option value="Prince Edward Island">Prince Edward Island</option>
                                <option value="Quebec">Quebec</option>
                                <option value="Saskatchewan">Saskatchewan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <select name="award" id="award" class="form-control" required>
                                <option value="" selected disabled hidden>Awards *</option>
                                <option value="Admission">Admission</option>
                                <option value="Current students">Current students</option>
                                <option value="Admission and current students">Admission and current students</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <textarea name="summary" class="form-control" id="summary" rows="5" placeholder="Summary *" required></textarea>
                        </div>

                        <div class="mb-3">
                            <input type="number" class="form-control" name="amount" placeholder="Scholarship amount">
                        </div>

                        <div class="mb-3">
                            <label for="eligibility" class="form-label">Basic eligibility *</label>
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria *" required>
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria">
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria">
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria">
                            <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Criteria">
                        </div>
                        
                        <div class="mb-3">
                            <input type="text" class="form-control" name="action" placeholder="Action *" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_posted" class="form-label">Date posted</label>
                            <input type="date" class="form-control" name="date_posted" placeholder="Date posted">
                        </div>

                        <div class="mb-3">
                            <label for="expiry_date" class="form-label">Expiry date</label>
                            <input type="date" class="form-control" name="expiry_date" placeholder="Expiry date">
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input type="date" class="form-control" name="deadline" placeholder="Deadline">
                        </div>
                        
                        <div class="mb-3">
                            <select name="availability" id="availability" class="form-control" required>
                                <option value="" selected disabled hidden>Availability *</option>
                                <option value="All students">All students</option>
                                <option value="International students">International students</option>
                                <option value="Canadian students">Canadian students</option>
                                <option value="Provincial students">Provincial students</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <select name="level_of_study" id="level_of_study" class="form-control" required>
                                <option value="" selected disabled hidden>Level of study *</option>
                                <option value="Graduate">Graduate</option>
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Graduate and Undergraduate">Graduate and undergraduate</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <select name="duration" id="duration" class="form-control" required>
                                <option value="" selected disabled>Duration *</option>
                                <option value="Full time">Full time</option>
                                <option value="Part time">Part time</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="featured_image" class="form-label">Featured image *</label>
                            <input type="file" class="form-control" name="featured_image">
                        </div>

                        <div class="mb-3">
                            <input type="url" class="form-control" name="link" placeholder="Link *">
                        </div>

                        <div class="mb-3">
                            <input type="url" class="form-control" name="more_info" placeholder="More info link *">
                        </div>

                        <div class="mb-3">
                            <select class="form-control" id="featured" name="featured" placeholder="Featured? *" required>
                                <option value="" selected disabled hidden>Do you want to show this scholarship in the scholarship main page? *</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $school->id }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add scholarship</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    
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


    @if(\Session::has('paragraph'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="paragraph-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Scholarships details updated successfully.</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn text-white w-25" data-bs-dismiss="modal" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
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
        if(document.getElementById("create-scholarship-btn")){
            $('#create-scholarship-btn').click();
        }
    </script>

    <script>
        if(document.getElementById("paragraph-btn")){
            $('#paragraph-btn').click();
        }
    </script>
    
@endpush

