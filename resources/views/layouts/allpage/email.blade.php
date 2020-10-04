<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>
        your deteils:
    </p>
    <div>
         <p>your name is :{{ $data['first_name'] }}</p>
         <p>your last name :{{ $data['last_name'] }}</p>
         <p>your email :{{ $data['email'] }}</p>
         <p>your phone :{{ $data['phone'] }}</p>
         <p>your password:{{ $data['password'] }}</p>
         <p>your address:{{ $data['address'] }}</p>
    </div>

</body>
</html>
