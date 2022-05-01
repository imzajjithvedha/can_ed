@extends('backend.layouts.app')

@section('title', 'Website information | Admin')

@section('content')
    
    <form action="{{ route('admin.information.update') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                @if($information->logo != null)
                                    <img src="{{ url('images/home', $information->logo) }}" alt="" class="img-fluid w-100" style="height: 20rem; object-fit: cover; background-color: black; padding: 40px;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 13rem; object-fit: cover;">
                                @endif

                                <input type="hidden" class="form-control" name="old_logo" value="{{$information->logo}}">

                                <div class="form-group mt-3">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="logo" name="new_logo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-label">Contact page description *</label>
                                <textarea name="description" class="form-control" id="description" rows="3"  value="{{ $information->description }}" placeholder="Contact page description *" required>{{ $information->description }}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label">Mailing address *</label>
                                <input type="text" class="form-control mb-2" name="address_1" value="{{ $information->address_1 }}" placeholder="1051 Blvd Decarie" required>
                                <input type="text" class="form-control mb-2" name="address_2" value="{{ $information->address_2 }}" placeholder="P.O. Box: 53555 NORGATE" required>
                                <input type="text" class="form-control mb-2" name="address_3" value="{{ $information->address_3 }}" placeholder="Montreal - Qc." required>
                                <input type="text" class="form-control mb-2" name="address_4" value="{{ $information->address_4 }}" placeholder="Canada" required>
                                <input type="text" class="form-control mb-2" name="address_5" value="{{ $information->address_5 }}" placeholder="Postal Code: H4L 3M0" required>
                            </div>
                            <div class="form-group">
                                <label for="toll_free" class="form-label">Toll free *</label>
                                <input type="text" id="toll_free" class="form-control" name="toll_free" value="{{ $information->toll_free }}" placeholder="Toll free *" required>
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="form-label">Telephone *</label>
                                <input type="text" id="telephone" class="form-control" name="telephone" value="{{ $information->telephone }}" placeholder="Telephone *" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" id="email" class="form-control" name="email" value="{{ $information->email }}" placeholder="Email *" required>
                            </div>
                            <div class="form-group">
                                <label for="website_url" class="form-label">Website URL *</label>
                                <input type="url" id="website_url" class="form-control" name="website_url" value="{{ $information->website_url }}" placeholder="Website URL *" required>
                            </div>
                            <div class="form-group">
                                <label for="facebook" class="form-label">Facebook link *</label>
                                <input type="url" id="facebook" class="form-control" name="facebook" value="{{ $information->facebook }}" placeholder="Facebook link *">
                            </div>
                            <div class="form-group">
                                <label for="linked_in" class="form-label">Linkedin link *</label>
                                <input type="url" id="linked_in" class="form-control" name="linked_in" value="{{ $information->linked_in }}" placeholder="Linkedin link *">
                            </div>
                            <div class="form-group">
                                <label for="you-tube" class="form-label">YouTube link *</label>
                                <input type="url" id="you-tube" class="form-control" name="you_tube" value="{{ $information->you_tube }}" placeholder="YouTube link *">
                            </div>
                            <div class="form-group">
                                <label for="instagram" class="form-label">Instagram link *</label>
                                <input type="url" id="instagram" class="form-control" name="instagram" value="{{ $information->instagram }}" placeholder="Instagram link *">
                            </div>
                            <div class="form-group">
                                <label for="twitter" class="form-label">Twitter link *</label>
                                <input type="url" id="twitter" class="form-control" name="twitter" value="{{ $information->twitter }}" placeholder="Twitter link *">
                            </div>

                            <div class="form-group">
                                <label for="featured_schools_description" class="form-label">Featured schools *</label>
                                <textarea name="featured_schools_description" class="form-control" id="featured_schools_description" rows="3"  value="{{ $information->featured_schools_description }}" placeholder="Featured school *" required>{{ $information->featured_schools_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_international_articles_description" class="form-label">Financial help for international students *</label>
                                <textarea name="featured_international_articles_description" class="form-control" id="featured_international_articles_description" rows="3"  value="{{ $information->featured_international_articles_description }}" placeholder="Financial help for international students *" required>{{ $information->featured_international_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_canadian_articles_description" class="form-label">Financial help for Canadian students *</label>
                                <textarea name="featured_canadian_articles_description" class="form-control" id="featured_canadian_articles_description" rows="3"  value="{{ $information->featured_canadian_articles_description }}" placeholder="Financial help for Canadian students *" required>{{ $information->featured_canadian_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_work_study_articles_description" class="form-label">Work while studying *</label>
                                <textarea name="featured_work_study_articles_description" class="form-control" id="featured_work_study_articles_description" rows="3"  value="{{ $information->featured_work_study_articles_description }}" placeholder="Work while studying *" required>{{ $information->featured_work_study_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_financial_planning_articles_description" class="form-label">Financial planning *</label>
                                <textarea name="featured_financial_planning_articles_description" class="form-control" id="featured_financial_planning_articles_description" rows="3"  value="{{ $information->featured_financial_planning_articles_description }}" placeholder="Financial planning *" required>{{ $information->featured_financial_planning_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_academic_help_articles_description" class="form-label">For students who need academic help before applying *</label>
                                <textarea name="featured_academic_help_articles_description" class="form-control" id="featured_academic_help_articles_description" rows="3"  value="{{ $information->featured_academic_help_articles_description }}" placeholder="For students who need academic help before applying *" required>{{ $information->featured_academic_help_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_financial_help_articles_description" class="form-label">For students who need financial help before applying *</label>
                                <textarea name="featured_financial_help_articles_description" class="form-control" id="featured_financial_help_articles_description" rows="3"  value="{{ $information->featured_financial_help_articles_description }}" placeholder="For students who need financial help before applying *" required>{{ $information->featured_financial_help_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_immigration_articles_description" class="form-label">Immigration questions *</label>
                                <textarea name="featured_immigration_articles_description" class="form-control" id="featured_immigration_articles_description" rows="3"  value="{{ $information->featured_immigration_articles_description }}" placeholder="Immigration questions *" required>{{ $information->featured_immigration_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_proxima_study_articles_description" class="form-label">Proxima Study is coming to you *</label>
                                <textarea name="featured_proxima_study_articles_description" class="form-control" id="featured_proxima_study_articles_description" rows="3"  value="{{ $information->featured_proxima_study_articles_description }}" placeholder="Proxima Study is coming to you *" required>{{ $information->featured_proxima_study_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_need_help_articles_description" class="form-label">Need more help? *</label>
                                <textarea name="featured_need_help_articles_description" class="form-control" id="featured_need_help_articles_description" rows="3"  value="{{ $information->featured_need_help_articles_description }}" placeholder="Need more help? *" required>{{ $information->featured_need_help_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_open_days_description" class="form-label">Featured open days *</label>
                                <textarea name="featured_open_days_description" class="form-control" id="featured_open_days_description" rows="3" value="{{ $information->featured_open_days_description }}" placeholder="Featured open days *" required>{{ $information->featured_open_days_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_virtual_tours_description" class="form-label">Virtual tours *</label>
                                <textarea name="featured_virtual_tours_description" class="form-control" id="featured_virtual_tours_description" rows="3" value="{{ $information->featured_virtual_tours_description }}" placeholder="Virtual tours *" required>{{ $information->featured_virtual_tours_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_businesses_description" class="form-label">Featured businesses *</label>
                                <textarea name="featured_businesses_description" class="form-control" id="featured_businesses_description" rows="3"  value="{{ $information->featured_businesses_description }}" placeholder="Featured businesses *" required>{{ $information->featured_businesses_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_basic_articles_description" class="form-label">Getting started with your Canadian education description *</label>
                                <textarea name="featured_basic_articles_description" class="form-control" id="featured_basic_articles_description" rows="3"  value="{{ $information->featured_basic_articles_description }}" placeholder="Getting started with your Canadian education description *" required>{{ $information->featured_basic_articles_description }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="featured_events_description" class="form-label">Featured events *</label>
                                <textarea name="featured_events_description" class="form-control" id="featured_events_description" rows="3" value="{{ $information->featured_events_description }}" placeholder="Featured events *" required>{{ $information->featured_events_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="student_services_description" class="form-label">Student services *</label>
                                <textarea name="student_services_description" class="form-control" id="student_services_description" rows="3"  value="{{ $information->student_services_description }}" placeholder="Student services *" required>{{ $information->student_services_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_videos_description" class="form-label">Featured videos *</label>
                                <textarea name="featured_videos_description" class="form-control" id="featured_videos_description" rows="3" value="{{ $information->featured_videos_description }}" placeholder="Featured videos *" required>{{ $information->featured_videos_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="recent_articles_description" class="form-label">Recent articles *</label>
                                <textarea name="recent_articles_description" class="form-control" id="recent_articles_description" rows="3"  value="{{ $information->recent_articles_description }}" placeholder="Recent articles *" required>{{ $information->recent_articles_description }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="advanced_search_description" class="form-label">Advanced search *</label>
                                <textarea name="advanced_search_description" class="form-control" id="advanced_search_description" rows="3"  value="{{ $information->advanced_search_description }}" placeholder="Advanced search *" required>{{ $information->advanced_search_description }}</textarea>
                            </div>
                            

                            <div class="form-group">
                                <label for="master_application_description" class="form-label">Master application *</label>
                                <textarea name="master_application_description" class="form-control" id="master_application_description" rows="3" value="{{ $information->master_application_description }}" placeholder="Master application *" required>{{ $information->master_application_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">

                            <div class="form-group">
                                @if($information->main_banner != null)
                                    <img src="{{ url('images/home', $information->main_banner) }}" alt="" class="img-fluid w-100" style="height: 13rem; object-fit: cover;">
                                @else
                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 13rem; object-fit: cover;">
                                @endif

                                <input type="hidden" class="form-control" name="old_image" value="{{$information->main_banner}}">

                                <div class="form-group mt-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="new_image">
                                </div>
                            </div>

                            <div class="mt-5 text-center">
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


@push('after-scripts')
    
@endpush

