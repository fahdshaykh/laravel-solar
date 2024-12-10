<!DOCTYPE html>
<html>
<head>
    <title>Holiogt- Booking Status Email</title>
</head>
<body>
    <header>
            <strong>Holiogt</strong>
     
    </header>

    <main>
        <!-- Your email content goes here -->
        <p><strong>Dear {{$booking->user->first_name.' '.$booking->user->last_name}}</strong></p>
        <p>We are glad to inform you that booking you make on {{$booking->created_at}} is <strong>Accepted</strong> by our speaker {{$booking->speaker->first_name.' '.$booking->speaker->last_name}}.</p>
        <p>You can check status from our portal too. <a href="{{URL('/')}}">Holiogt Portal My Dasboard</a></p>
        <p>If you have any issue please feel free to contact us on given email or number. Thanks</p>
        <p>We are looking forward to listen from you soon. Thanks</p>
        
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