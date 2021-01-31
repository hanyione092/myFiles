@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{session('status')}}</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<form action = "{{route('login')}}" method = "POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      @csrf
      <input type="text" name = "email" value = "{{old('email')}}" class="form-control @error('email') border border-danger @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      @error('email') <small id="emailHelp" class="form-text text-warning">{{$message}}</small> @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name = "password" class="form-control" id="exampleInputPassword1" aria-describedby="passwordHelp" placeholder="Password">
      @error('password') <small id="passwordHelp" class="form-text text-warning">{{$message}}</small> @enderror
    </div>
    <div class="form-check">
        <input type="checkbox" name = "remember" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
