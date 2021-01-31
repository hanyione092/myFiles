<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h2>{{$details['title']}}</h2>
    <p>Hi {{$details['name']}}!, thank you for using our web application.</p>
    <a href="{{$details['body']}}" class="badge badge-primary">back to original page</a>
    <p>CCAT Dev. Team</p>
</body>
</html>