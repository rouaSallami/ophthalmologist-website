<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Appointment Status</title>
</head>
<body>
    <h2>Appointment Status Update</h2>

    <p>Hello {{ $appointment->name }},</p>

    <p>Your appointment status is:</p>

    <h3>{{ $appointment->status }}</h3>

    <p>Thank you for choosing our clinic.</p>
</body>
</html>