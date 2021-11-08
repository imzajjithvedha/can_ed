<div class="row text-center mb-3 school-top-nav">
    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_admission', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'admission' ? 'active' : null }}">Admission</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_admission_faq', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'admission-faq' ? 'active' : null }}">Admission FAQ</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_contacts', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'contacts' ? 'active' : null }}">Contacts</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_financial', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'financial' ? 'active' : null }}">Financial</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_financial_faq', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'financial-faq' ? 'active' : null }}">Financial FAQ</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_information', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'information' ? 'active' : null }}">Information</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_overview', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'overview' ? 'active' : null }}">Overview</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_overview_faq', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'overview-faq' ? 'active' : null }}">Overview FAQ</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_programs', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'programs' ? 'active' : null }}">Programs</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_quick_facts', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'quick-facts' ? 'active' : null }}">Quick Facts</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_scholarships', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'scholarships' ? 'active' : null }}">Scholarships</a>
        </div>
    </div>

    <div class="col-3 p-1 mb-2">
        <div class="card mb-0">
            <a href="{{ route('admin.schools.school_scholarships_faq', $school->id) }}" class="text-decoration-none p-2 {{ Request::segment(5) == 'scholarships-faq' ? 'active' : null }}">Scholarships FAQ</a>
        </div>
    </div>

</div>