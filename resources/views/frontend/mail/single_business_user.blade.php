<p>Hello {{ $details['name'] }},</p>

<p>Thank you very much for contacting <a href="{{ route('frontend.single_business', $details['business_id']) }}" class="text-decoration-none">{{ App\Models\Businesses::where('id', $details['business_id'])->first()->name }}</a> business. That business owner will contact you as soon as possible.</p>

<p style="margin-bottom: 2px;">Thank you</p>
<h4 style="margin-top: 0px;">Study in Canada</h4>

