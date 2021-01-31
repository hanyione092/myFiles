@extends('layouts.app')

@section('content')
<form action = "{{route('register')}}" method = "POST">
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        @csrf
        <input type="text" name = "name" value = "{{old('name')}}" class="form-control @error('name') border border-danger @enderror" id="exampleInputName" aria-describedby="NameHelp" placeholder="Enter Name">
        @error('name')
        <small id="NameHelp" class="form-text text-warning">{{$message}}</small>            
        @enderror
      </div>
    <div class="form-group">
        <label for="exampleInputUser">Username</label>
        <input type="text" name = "username" value = "{{old('username')}}" class="form-control @error('username') border border-danger @enderror" id="exampleInputUser" aria-describedby="UserHelp" placeholder="Enter Username">
        @error('username')
        <small id="NameHelp" class="form-text text-warning">{{$message}}</small>            
        @enderror
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name = "email" value = "{{old('email')}}" class="form-control @error('email') border border-danger @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      @error('email')
      <small id="NameHelp" class="form-text text-warning">{{$message}}</small>            
      @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name = "password" class="form-control @error('password') border border-danger @enderror" id="exampleInputPassword1" placeholder="Password">
      @error('password')
      <small id="NameHelp" class="form-text text-warning">{{$message}}</small>            
      @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" name = "password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
