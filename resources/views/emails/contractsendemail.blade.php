<!DOCTYPE html>
<html>
<head>
    <title>Holiogt- Your contract</title>
</head>
<body>
    <header>
            <strong>Holiogt: Your New Contract</strong>
     
    </header>

    <main>
        
        <p><strong>Dear {{$name}}</strong></p>
        <p>hello dear, here is your new contract ready.</p>
        <p>Please click . <a href="{{ url('signAuth') }}" style="background-color:green; border:1px solid green; border-radius:5px; padding:5px; color:white !important; text-decoration:none !important">Contract Link</a>.</p>
        <p>more content of email bla bla bla. Thanks</p>
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