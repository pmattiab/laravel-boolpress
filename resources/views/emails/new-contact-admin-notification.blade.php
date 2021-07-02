<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>

    <div style="margin-top:20px;">
        Ciao Admin, hai un nuovo messaggio
    </div>

    <div style="margin-top:20px;">
        <span><b>Mittente: </b></span>
        <span>{{$contact_data["name"]}}</span>
    </div>

    <div style="margin-top:20px;">
        <span><b>Email: </b></span>
        <span>{{$contact_data["email"]}}</span>
    </div>

    <div style="margin-top:20px;">
        <span><b>Messaggio: </b></span>
        <span>{{$contact_data["message"]}}</span>
    </div>

</body>
</html>