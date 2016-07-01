<h4>Hi {{$fullName}}</h4>

<h5>
  Here is the password reset link you requested for.
</h5>

<p>
  To reset your password click <a href="http://lar-imraj.rhcloud.com/retrieve/password/{{$token}}{{password_reset_code}}">here</a> or copy this
  link to a browser http://lar-imraj.rhcloud.com/retrieve/password/{{$token}}{{$password_reset_code}}
</p>

<p>
  You are receiving this email because you initiated for
  password reset for your Trav's account. <br/>
  Ignore this email if you didn't.
</p>

<p>
  Best Regards,<br/>
  Trav's Team.
</p>
