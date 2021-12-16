<p>Hello {{ $details['name'] }},</p>

<p style="margin-bottom: 2px;">Please click the password reset button to reset your password <a href="{{ route('frontend.auth.password.reset', $details['email'] ) }}" style="background-image: linear-gradient(to bottom, #CF0411, #660000); border: none; color: white; padding: 0.5rem; text-decoration: none; border-radius: 15px; margin-left: 1rem;">Reset password</a></p>

<p style="margin-bottom: 2px;">Thank you</p>
<h4 style="margin-top: 0px;">Study in Canada</h4>