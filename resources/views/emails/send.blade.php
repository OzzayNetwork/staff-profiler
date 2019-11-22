<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
  </head>
  <body >
        <div class="header-content">
            <div class="inner">
                <p style="font-family: Montserrat">Hello {{$name}}, <br> You have successfully been added as a member of the Nouveta Family Network. Log in to the website to meet the rest of the team and update your details.</p>
                <p style="font-family: Montserrat">Your current password is: {{$password}} . Visit <a href="{{url('password/reset')}}">this link</a> to reset your password.</p>
                <p style="font-family: Montserrat">If you wish to login in immediately, click <a href="{{url('login')}}" >here.</a></p>
				<p style="font-family: Montserrat">Regards, <br>Nouveta admin</p>                
            </div>
        </div>

  </body>
</html>