<!DOCTYPE html>
<html>
<head>
    <title>Zoom Meeting Link</title>
</head>
<body>
    <h1>Hello {{ $contact->name }},</h1>
    <p>Your Zoom meeting has been scheduled. You can join the meeting using the link below:</p>
    <p><a href="{{ $zoomLink }}">{{ $zoomLink }}</a></p>
    <p>Thank you!</p>
</body>
</html>
