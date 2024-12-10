<!DOCTYPE html>
<html>
<head>
    <title>Holiogt- New project Assigned</title>
</head>
<body>
    <header>
            <strong>Holiogt: New Project assigned</strong>
     
    </header>

    <main>
        <!-- Your email content goes here -->
        <p><strong>Dear {{$user->first_name.' '.$user->last_name}}</strong></p>
		
		
        <p>You have been assigned new project from holiogt admin.</p>
        <p>You can login to our portal . <a href="{{URL('/')}}">Holiogt Portal</a>.</p>
        <p>If you have any issue please feel free to contact us on given email or number. Thanks</p>
        <p>We are looking forward to listen from you soon. Thanks</p>
		<p><strong>Login with following username: </strong></p>
		<p><strong>Username: "{{$user->email}}" </strong></p>
		
    </main>

    <footer>
    <img src="{{ $message->embed($logoPath, 'logo') }}" alt="Holiogt Portal" width="80">

  
    <p><strong>Holiogt Portal- A name of trust.</strong></p>
        <p><strong>Email: info@Holiogt.com</strong></p>
        <p><strong>Contact: +92 6464646</strong></p>
        <p><strong>Office: Manhattan, USA</strong></p>
    </footer>
</body>
</html>