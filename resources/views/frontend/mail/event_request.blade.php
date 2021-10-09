<p>You have a new event request. Below are the details.</p>

<p><strong>Title:</strong> {{ $details['name'] }}</p>
<p><strong>Description:</strong> {{ $details['description'] }}</p>
<p><strong>City:</strong> {{ $details['city'] }}</p>
<p><strong>Country:</strong> {{ $details['country'] }}</p>
<p><strong>Date:</strong> {{ $details['date'] }}</p>
<p><strong>Time:</strong> {{ $details['time'] }}</p>
<p><strong>Type:</strong> {{ $details['type'] }}</p>
<p><strong>Organizer Email:</strong> {{ $details['organizer_email'] }}</p>
<p><strong>Organizer Phone:</strong> {{ $details['organizer_phone'] }}</p>
<p><strong>Event URL:</strong> {{ $details['url'] }}</p>


<p>Login to your <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">account</a></p>

