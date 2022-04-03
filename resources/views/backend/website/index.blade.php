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
                                <label for="name" class="form-label">Website name *</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ $information->name }}" placeholder="Website name *" required>
                            </div>
                            <div class="form-group">
                                <label for="mantra" class="form-label">Website mantra *</label>
                                <input type="text" id="mantra" class="form-control" name="mantra" value="{{ $information->mantra }}" placeholder="Website mantra *" required>
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
                                <input type="url" id="facebook" class="form-control" name="facebook" value="{{ $information->facebook }}" placeholder="Facebook link *" required>
                            </div>
                            <div class="form-group">
                                <label for="google" class="form-label">Google link *</label>
                                <input type="url" id="google" class="form-control" name="google" value="{{ $information->google }}" placeholder="Google link *" required>
                            </div>
                            <div class="form-group">
                                <label for="you-tube" class="form-label">YouTube link *</label>
                                <input type="url" id="you-tube" class="form-control" name="you_tube" value="{{ $information->you_tube }}" placeholder="YouTube link *" required>
                            </div>
                            <div class="form-group">
                                <label for="instagram" class="form-label">Instagram link *</label>
                                <input type="url" id="instagram" class="form-control" name="instagram" value="{{ $information->instagram }}" placeholder="Instagram link *" required>
                            </div>
                            <div class="form-group">
                                <label for="twitter" class="form-label">Twitter link *</label>
                                <input type="url" id="twitter" class="form-control" name="twitter" value="{{ $information->twitter }}" placeholder="Twitter link *" required>
                            </div>
                            <div class="form-group">
                                <label for="featured_schools_description" class="form-label">Featured school description *</label>
                                <textarea name="featured_schools_description" class="form-control" id="featured_schools_description" rows="3"  value="{{ $information->featured_schools_description }}" placeholder="Featured school description *" required>{{ $information->featured_schools_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="featured_businesses_description" class="form-label">Featured businesses description *</label>
                                <textarea name="featured_businesses_description" class="form-control" id="featured_businesses_description" rows="3"  value="{{ $information->featured_businesses_description }}" placeholder="Featured businesses description *" required>{{ $information->featured_businesses_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_basic_articles_description" class="form-label">Featured basic articles description *</label>
                                <textarea name="featured_basic_articles_description" class="form-control" id="featured_basic_articles_description" rows="3"  value="{{ $information->featured_basic_articles_description }}" placeholder="Featured basic articles description *" required>{{ $information->featured_basic_articles_description }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="featured_international_articles_description" class="form-label">Featured financial help for international students articles description *</label>
                                <textarea name="featured_international_articles_description" class="form-control" id="featured_international_articles_description" rows="3"  value="{{ $information->featured_international_articles_description }}" placeholder="Featured financial help for international students articles description *" required>{{ $information->featured_international_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_canadian_articles_description" class="form-label">Featured financial help for Canadian students articles description *</label>
                                <textarea name="featured_canadian_articles_description" class="form-control" id="featured_canadian_articles_description" rows="3"  value="{{ $information->featured_canadian_articles_description }}" placeholder="Featured financial help for Canadian students articles description *" required>{{ $information->featured_canadian_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_work_study_articles_description" class="form-label">Featured work while study articles description *</label>
                                <textarea name="featured_work_study_articles_description" class="form-control" id="featured_work_study_articles_description" rows="3"  value="{{ $information->featured_work_study_articles_description }}" placeholder="Featured work while study articles description *" required>{{ $information->featured_work_study_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_financial_planning_articles_description" class="form-label">Featured financial planning articles description *</label>
                                <textarea name="featured_financial_planning_articles_description" class="form-control" id="featured_financial_planning_articles_description" rows="3"  value="{{ $information->featured_financial_planning_articles_description }}" placeholder="Featured financial planning articles description *" required>{{ $information->featured_financial_planning_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_academic_help_articles_description" class="form-label">Featured for students who need academic help before applying articles description *</label>
                                <textarea name="featured_academic_help_articles_description" class="form-control" id="featured_academic_help_articles_description" rows="3"  value="{{ $information->featured_academic_help_articles_description }}" placeholder="Featured for students who need academic help before applying articles description *" required>{{ $information->featured_academic_help_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_financial_help_articles_description" class="form-label">Featured for students who need financial help before applying articles description *</label>
                                <textarea name="featured_financial_help_articles_description" class="form-control" id="featured_financial_help_articles_description" rows="3"  value="{{ $information->featured_financial_help_articles_description }}" placeholder="Featured for students who need academic help before applying articles description *" required>{{ $information->featured_financial_help_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_immigration_articles_description" class="form-label">Featured immigration questions articles description *</label>
                                <textarea name="featured_immigration_articles_description" class="form-control" id="featured_immigration_articles_description" rows="3"  value="{{ $information->featured_immigration_articles_description }}" placeholder="Featured immigration questions articles description *" required>{{ $information->featured_immigration_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_proxima_study_articles_description" class="form-label">Featured proxima study coming to you articles description *</label>
                                <textarea name="featured_proxima_study_articles_description" class="form-control" id="featured_proxima_study_articles_description" rows="3"  value="{{ $information->featured_proxima_study_articles_description }}" placeholder="Featured proxima study coming to you articles description *" required>{{ $information->featured_proxima_study_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_need_help_articles_description" class="form-label">Featured need more help articles description *</label>
                                <textarea name="featured_need_help_articles_description" class="form-control" id="featured_need_help_articles_description" rows="3"  value="{{ $information->featured_need_help_articles_description }}" placeholder="Featured need more help articles description *" required>{{ $information->featured_need_help_articles_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_events_description" class="form-label">Featured events description *</label>
                                <textarea name="featured_events_description" class="form-control" id="featured_events_description" rows="3" value="{{ $information->featured_events_description }}" placeholder="Featured events description *" required>{{ $information->featured_events_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="featured_videos_description" class="form-label">Featured videos description *</label>
                                <textarea name="featured_videos_description" class="form-control" id="featured_videos_description" rows="3" value="{{ $information->featured_videos_description }}" placeholder="Featured videos description *" required>{{ $information->featured_videos_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recent_articles_description" class="form-label">Recent articles description *</label>
                                <textarea name="recent_articles_description" class="form-control" id="recent_articles_description" rows="3"  value="{{ $information->recent_articles_description }}" placeholder="Recent articles description *" required>{{ $information->recent_articles_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="student_services_description" class="form-label">Student services description *</label>
                                <textarea name="student_services_description" class="form-control" id="student_services_description" rows="3"  value="{{ $information->student_services_description }}" placeholder="Student services description *" required>{{ $information->student_services_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="advanced_search_description" class="form-label">Advanced search description *</label>
                                <textarea name="advanced_search_description" class="form-control" id="advanced_search_description" rows="3"  value="{{ $information->advanced_search_description }}" placeholder="Advanced search  description *" required>{{ $information->advanced_search_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="featured_open_days_description" class="form-label">Featured open days description *</label>
                                <textarea name="featured_open_days_description" class="form-control" id="featured_open_days_description" rows="3" value="{{ $information->featured_open_days_description }}" placeholder="Featured open days description *" required>{{ $information->featured_open_days_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="featured_virtual_tours_description" class="form-label">Featured virtual tours description *</label>
                                <textarea name="featured_virtual_tours_description" class="form-control" id="featured_virtual_tours_description" rows="3" value="{{ $information->featured_virtual_tours_description }}" placeholder="Featured virtual tours description *" required>{{ $information->featured_virtual_tours_description }}</textarea>
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

