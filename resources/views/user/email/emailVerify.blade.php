<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h3>This mail from RR- Auth. please clcik the link for verify your account</h3>
    <a href="{{ route('emailVerify',[$user_id,$token]) }}">Click here</a>
</body>
</html>