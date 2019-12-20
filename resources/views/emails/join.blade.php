<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<div>
    From : {{ $email }}
</div>


<div>
    Name : {{ $name }}
</div>

<div>
    Phone Number : {{ $phoneNumber }}
</div>

<div>
    Level : {{ $classLevel }}
</div>

@if($classType)
<div>
    Class Type : {{ $classType }}
</div>
@endif

@if($className)
    <div>
        Class : {{ $className }}
    </div>
@endif

<div>
    Email :
    <br>
    {{ $body }}
</div>

</body>
</html>