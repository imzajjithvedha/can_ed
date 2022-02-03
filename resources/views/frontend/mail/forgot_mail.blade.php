<p>Hello {{ $details['name'] }},</p>

<p style="margin-bottom: 2px;">Please click the <a href="{{ route('frontend.auth.password.reset', $details['email'] ) }}">password reset button</a> to reset your password <br><br><br>

<a href="{{ route('frontend.auth.password.reset', $details['email'] ) }}" style="background-image: linear-gradient(to bottom, #CF0411, #660000); border: none; color: white; padding: 1rem; text-decoration: none; border-radius: 0.25rem; font-family: Futura; font-size: 1rem;">Reset password</a></p><br>

<p style="margin-bottom: 2px;">Thank you</p>
<h4 style="margin-top: 0px;">Proxima Study Team</h4>