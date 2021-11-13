<p>You have an existing suggested program's update request. Below are the details.</p>

<p><strong>Name:</strong> {{ $details['name'] }}</p>


@if($details['degree_level'] != null)
    <p><strong>Degree level:</strong> {{ App\Models\DegreeLevels::where('id', $details['degree_level'])->first()->name }}</p>
@else
    <p><strong>Degree level:</strong> <i>Not provided by user.</i></p>
@endif


@if($details['description'] != null)
    <p><strong>Description:</strong> {{ $details['description'] }}</p>
@else
    <p><strong>Description:</strong> <i>Not provided by user.</i></p>
@endif


<p>Login to your <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">account</a></p>

