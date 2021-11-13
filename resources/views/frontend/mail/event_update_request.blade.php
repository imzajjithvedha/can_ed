<p>You have an existing event's update request. Below are the details.</p>

<p><strong>Title:</strong> {{ $details['name'] }}</p>
<p><strong>Description:</strong> {{ $details['description'] }}</p>
<p><strong>City:</strong> {{ $details['city'] }}</p>
<p><strong>Country:</strong> {{ $details['country'] }}</p>
<p><strong>Date:</strong> {{ $details['date'] }}</p>
<p><strong>Time:</strong> {{ $details['time'] }}</p>
<p><strong>Type:</strong> {{ $details['type'] }}</p>
<p><strong>Organizer email:</strong> {{ $details['organizer_email'] }}</p>
<p><strong>Organizer phone:</strong> {{ $details['organizer_phone'] }}</p>

@if($details['url'] != null)
    <p><strong>Event URL:</strong> {{ $details['url'] }}</p>
@endif

<p>Login to your <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">account</a></p>

