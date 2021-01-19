@extends('layouts.app')

@section('content')

    <h1>Register</h1>

    <form action = "{{route('register')}}" method = "POST">
        <div class="form-group">
            @csrf
            <label for="exampleInputName">Your Name</label>
            <input type="text" name = "name" value = "{{old('name')}}" class="form-control @error('name') border border-danger @enderror" id="exampleInputName" aria-describedby="errorName"
                placeholder="Your Name">
                @error('name')
                <small id="errorName" class="form-text text-muted">{{$message}}</small>                    
                @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputUserName">Username</label>
            <input type="text" name = "username" value = "{{old('username')}}" class="form-control  @error('username') border border-danger @enderror" id="exampleInputUserName" aria-describedby="errorUserName"
                placeholder="Username">
                @error('username')
                <small id="errorName" class="form-text text-muted">{{$message}}</small>                    
                @enderror
        </div>
        <div class="form-group">
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
        <div class="form-group">
            <label for="examplePassword2">Confirm Password</label>
            <input type="password" name = "password_confirmation" class="form-control" id="examplePassword2" aria-describedby="errorPassword2"
                placeholder="Confirm Password">
            <small id="errorPassword1" class="form-text text-muted"></small>
        </div>
        <div class="form-check">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
