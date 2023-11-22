<!DOCTYPE html>
<html>

<head>
    <title>Confirm Email</title>
</head>

<body>
    <h1>Hi {{ $testMailData['name'] }},</h1>
    <p>Thank you for registering!</p>
    <p>Please click following button to confirm your email address.</p>
    <div style="margin: 20px 0;">
        <a href="{{ $testMailData['verifyLink'] }}" target="_blank"
            style="text-decoration: none; padding: 10px 20px; background-color: #3490dc; color: white;">Confirm Email</a>
    </div>
</body>

</html>
