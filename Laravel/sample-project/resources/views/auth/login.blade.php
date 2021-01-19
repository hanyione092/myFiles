@extends('layouts.app')

@section('content')

    <h1>Login</h1> 
    @if (session('status'))
        <div class="alert alert-danger" role="alert">
           {{session('status')}}
        </div>        
    @endif

    <form action = "{{route('login')}}" method = "POST">
        <div class="form-group">
            @csrf
            <label for="exampleInputEmail">Email</label>
            <input type="text" name = "email" value = "{{old('email')}}" class="form-control  @error('email') border border-danger @enderror" id="exampleInputEmail" aria-describedby="errorEmail"
                placeholder="Username">
                @error('email')
                <small id="errorName" class="form-text text-muted">{{$message}}</small>                    
                @enderror
        </div>
        <div class="form-group">
            <label for="examplePassword1">Password</label>
            <input type="password" name = "password" value = "{{old('password')}}" class="form-control  @error('password') border border-danger @enderror" id="examplePassword1" aria-describedby="errorPassword1"
                placeholder="Password">
                @error('password')
                <small id="errorName" class="form-text text-muted">{{$message}}</small>                    
                @enderror
        </div>
        <div class="form-check">
            <input type="checkbox" name = "remember" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

@endsection
