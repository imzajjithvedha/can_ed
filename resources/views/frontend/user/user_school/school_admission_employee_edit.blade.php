@extends('frontend.layouts.app')

@section('title', 'Edit Employee' )

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
                        <h4 class="user-settings-head">Edit employee</h4>
                    </div>
                </div>

                <form action="{{ route('frontend.user.school_admission_employee_update') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-12 border py-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Employee name *</label>
                                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Employee name *" name="name" value="{{ $employee->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">Position *</label>
                                <input type="text" class="form-control" id="position" aria-describedby="position" placeholder="Position *" name="position" value="{{ $employee->position }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description *</label>
                                <textarea name="description" id="description" rows="5" class="form-control" aria-describedby="description" placeholder="Description *" value="{{ $employee->description }}" required>{{ $employee->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Telephone *</label>
                                <input type="number" class="form-control" id="phone" aria-describedby="phone" placeholder="Telephone *" name="phone" value="{{ $employee->phone }}" required>
                            </div>
            
                            <div class="mb-3">
                                <label for="more_1" class="form-label">More_1 *</label>
                                <input type="text" class="form-control" id="more_1" aria-describedby="more_1" placeholder="More_1 *" name="more_1" value="{{ $employee->more_1 }}" required>
                            </div>
            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email *" name="email" value="{{ $employee->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="more_2" class="form-label">More_2 *</label>
                                <input type="text" class="form-control" id="more_2" aria-describedby="more_2" placeholder="More_2 *" name="more_2" value="{{ $employee->more_2 }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="featured_image" class="form-label">Employee image *</label>

                                @if($employee->image != null)
                                    <div class="row justify-content-center mb-3">
                                        <div class="col-12">
                                            <img src="{{ url('images/schools', $employee->image) }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="old_image" value="{{$employee->image}}">

                                    <input type="file" class="form-control" name="featured_image">

                                @else
                                    <input type="file" class="form-control" name="featured_image">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="orders" class="form-label mb-1">Order *</label>
                                <input type="number" class="form-control" id="orders" aria-describedby="orders" placeholder="Order *" name="orders" value="{{ $employee->orders }}" required>
                            </div>

                            <!-- <div>
                                <label for="featured" class="form-label">Do you want to show this employee under meet our team? *</label>
                                <select class="form-control" name="featured" id="featured" required>
                                    <option value="Yes" {{ $employee->featured == 'Yes' ? "selected" : "" }}>Yes</option>   
                                    <option value="No" {{ $employee->featured == 'No' ? "selected" : "" }}>No</option>                               
                                </select>
                            </div> -->

                            <div class="mt-5 text-center">
                                <input type="hidden" class="form-control" value="{{ $employee->id }}" name="hidden_id">
                                <input type="submit" value="Update employee" class="btn rounded-pill text-light px-5 py-2" style="background-color: #94ca60;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    
@endpush

