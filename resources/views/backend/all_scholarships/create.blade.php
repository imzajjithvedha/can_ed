@extends('backend.layouts.app')

@section('title', __('Create new scholarship | Admin'))

@section('content')

    <form action="{{ route('admin.scholarships.store_scholarship') }}" method="POST" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">

                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Scholarship name *" required>
                            </div>

                            <div class="mb-3">
                                <select name="school" id="school" class="form-control">
                                    <option value="" selected disabled hidden>School</option>
                                    @foreach($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach
                                </select>
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
                                <label for="featured_image" class="form-label">Featured image</label>
                                <input type="file" class="form-control" name="featured_image">
                            </div>

                            <div class="mb-3">
                                <input type="url" class="form-control" name="link" placeholder="Link">
                            </div>

                            <div class="mb-3">
                                <input type="url" class="form-control" name="more_info" placeholder="More info link">
                            </div>

                            <div class="mb-3">
                                <select class="form-control" id="featured" name="featured" placeholder="Featured? *" required>
                                    <option value="" selected disabled hidden>Do you want to show this scholarship in the scholarship main page? *</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-success">Create new</button>
                </div>
            </div>
        </div>
    </form>

@endsection
