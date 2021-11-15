<p>You have an existing business update request. Below are the details.</p>

<p><strong>Business name:</strong> {{ $details['name'] }}</p>

@if(($details['category_2'] != null) && ($details['category_3'] != null))
    <p><strong>Category:</strong> {{ App\Models\BusinessCategories::where('id', $details['category_1'])->first()->name }}, {{ App\Models\BusinessCategories::where('id', $details['category_2'])->first()->name }} & {{ App\Models\BusinessCategories::where('id', $details['category_3'])->first()->name }}</p>

@elseif(($details['category_2'] != null) && ($details['category_3'] == null))
    <p><strong>Category:</strong> {{ App\Models\BusinessCategories::where('id', $details['category_1'])->first()->name }} & {{ App\Models\BusinessCategories::where('id', $details['category_2'])->first()->name }}</p>

@elseif(($details['category_2'] == null) && ($details['category_3'] != null))
    <p><strong>Category:</strong> {{ App\Models\BusinessCategories::where('id', $details['category_1'])->first()->name }} & {{ App\Models\BusinessCategories::where('id', $details['category_3'])->first()->name }}</p>

@else
    <p><strong>Category:</strong> {{ App\Models\BusinessCategories::where('id', $details['category_1'])->first()->name }}</p>

@endif

<p><strong>Description:</strong> {{ $details['description'] }}</p>
<p><strong>Contact name:</strong> {{ $details['contact_name'] }}</p>
<p><strong>Email:</strong> {{ $details['email'] }}</p>
<p><strong>Phone:</strong> {{ $details['phone'] }}</p>
<p><strong>Address:</strong> {{ $details['address'] }}</p>
<p><strong>Facebook:</strong> {{ $details['facebook'] }}</p>
<p><strong>Twitter:</strong> {{ $details['twitter'] }}</p>
<p><strong>YouTube:</strong> {{ $details['you_tube'] }}</p>
<p><strong>LinkedIn:</strong> {{ $details['linked_in'] }}</p>
<p><strong>Package:</strong> {{ ucfirst($details['package']) }}</p>


<p>Login to your <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">account</a></p>

