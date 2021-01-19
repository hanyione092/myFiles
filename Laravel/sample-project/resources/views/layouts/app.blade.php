<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'Buconatics')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="#">Buconatics</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('posts')}}">Post</a>
                  </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                  @auth
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">{{auth()->user()->name}}</a>
                  </li>
                  <li class="nav-item">
                    <form action = "{{route('logout')}}" method = "POST">
                      @csrf
                      <button type="submit" class="nav-link btn btn-light">Logout</button>                   
                    </form>
                  </li>                    
                  @endauth
                  @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                  </li>                      
                  @endguest

                </ul>
              </div>
            </div>
          </nav>
        <div class="container pt-3">
          @yield('content')
        </div>
</body>
</html>