<p>Hello {{ $details['first_name'] }} {{ $details['last_name'] }},</p>

<p style="margin-bottom: 2px;">Thank you very much for your application. School will contact you as soon as possible.</p>

@if($details['email_copy'] == 'on')

    <p>In here, you can find the copy of your contact message details.</p>

    <p><strong>First name:</strong> {{ $details['first_name'] }}</p>
    <p><strong>Last name:</strong> {{ $details['last_name'] }}</p>
    <p><strong>Date of birth:</strong> {{ $details['dob'] }}</p>
    <p><strong>Gender:</strong> {{ $details['gender'] }}</p>
    <p><strong>Email:</strong> {{ $details['email'] }}</p>
    <p><strong>Phone:</strong> {{ $details['phone'] }}</p>
    <p><strong>Can schools text:</strong> {{ $details['school_text'] }}</p>
    <p><strong>Messaging apps:</strong> {{ $details['messaging_app'] }}</p>
    <p><strong>Messaging app username:</strong> {{ $details['username'] }}</p>
    <p><strong>Study location/s:</strong> {{ $details['study_location'] }}</p>
    <p><strong>Citizenship:</strong> {{ $details['citizenship'] }}</p>
    <p><strong>Do you live in your country of citizenship:</strong> {{ $details['citizenship_live'] }}</p>

    @if($details['citizenship_live'] != 'Yes')
        <p><strong>Currently live:</strong> {{ $details['residence_country'] }}</p>
        <p><strong>Status in the country of residence:</strong> {{ $details['residence_status'] }}</p>
    @endif

    <p><strong>Mailing address:</strong> {{ $details['mailing_address'] }}</p>
    <p><strong>High school name:</strong> {{ $details['school_name'] }}</p>
    <p><strong>High school GPA:</strong> {{ $details['gpa'] }}</p>
    <p><strong>High school location - city:</strong> {{ $details['school_city'] }}</p>
    <p><strong>High school location - country:</strong> {{ $details['school_country'] }}</p>
    <p><strong>Start date:</strong> {{ $details['start_date'] }}</p>
    <p><strong>Interested in:</strong> {{ App\Models\DegreeLevels::where('id', $details['interested'])->first()->name }}</p>
    <p><strong>Like to study:</strong> {{ App\Models\Programs::where('id', $details['like_study'])->first()->name }}</p>
    <p><strong>Student type:</strong> {{ $details['student_type'] }}</p>
    <p><strong>Tuition funding source:</strong> {{ $details['funding_source'] }}</p>
    <p><strong>Tests Taken:</strong> {{ $details['tests'] }}</p>
    <p><strong>Comments:</strong> {{ $details['comments'] }}</p>
    <p><strong>Questions:</strong> {{ $details['questions'] }}</p>
    <p><strong>Transfer student currently living in Canada?:</strong> {{ $details['transfer_student'] }}</p>
    <p><strong>Already have an F-1 visa from a Canadian embassy?:</strong> {{ $details['visa'] }}</p>

@endif

<p style="margin-bottom: 2px;">Thank you</p>
<h4 style="margin-top: 0px;">Proxima Study Team</h4>