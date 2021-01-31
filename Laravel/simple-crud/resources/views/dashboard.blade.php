@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('status')}}</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<div class="jumbotron jumbotron-fluid bg-dark">
    <div class="container">
        @auth
        <h1 class="display-4">Hi, {{auth()->user()->username}}!</h1>
        <p class="lead">{{auth()->user()->email}}</p>
        @endauth
        @guest
        <h1 class="display-4">Dashboard</h1>
        <p class="lead">Sample text</p>            
        @endguest
    </div>
  </div>
@endsection
