{{-- Mail inviata a Mailtrap --}}
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>  
    <p>{{ __('ui.da') }}<strong>{{ $contact['email'] }}</strong></p>  
    <p>{{ __('ui.utente') }}<strong>{{ $contact['name'] }}</strong> {{ __('ui.messaggio_email') }}</p>
    <p> {{ $contact['message'] }}</p>
</body>
</html>