<div class="row mb-5">
    <div class="col-12">
        <h4 class="fw-bold mb-2 futura" style="color: #384058">Search scholarships</h4>

        <div class="p-3" style="background-color: #f2f4f8;">
            <form action="{{ route('frontend.school_scholarship_search') }}" method="POST">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control p-4 rounded-0 border-0 search-input" aria-label="search" placeholder="Search">
                            <button type="submit" class="btn rounded-0 text-white bg-white border-start"><i class="fas fa-search" style="color: black; font-size: 25px;"></i></button>
                        </div>
                    </div>
                </div>

                <div class="row scholarship-search">
                    <div class="col-3">
                        <select name="award" id="award" class="form-select p-2">
                            <option value="awards">All awards</option>
                            <option value="Admission">Admission</option>
                            <option value="Current students">Current students</option>
                        </select>
                    </div>

                    <div class="col-3">
                        <select name="level_of_study" id="level_of_study" class="form-select p-2">
                            <option value="study-levels">All study levels</option>
                            <option value="Graduate">Graduate</option>
                            <option value="Undergraduate">Undergraduate</option>
                        </select>
                    </div>

                    <div class="col-3">
                        <select name="availability" id="availability" class="form-select p-2">
                            <option value="availability">Available to all</option>
                            <option value="International students">International students</option>
                            <option value="Canadian students">Canadian students</option>
                            <option value="Provincial students">Provincial students</option>
                        </select>
                    </div>

                    <div class="col-3">
                        <select name="scholarship_date" id="scholarship_date" class="form-select p-2">
                            <option value="all-scholarships">All scholarships</option>
                            <option value="expired-scholarships">Expired scholarships</option>
                            <option value="current-scholarships">Current scholarships</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="school_id" value="{{ $school->id }}">
            </form>
        </div>
    </div>
</div>