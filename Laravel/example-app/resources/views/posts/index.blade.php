@extends('layouts.app')

@section('content')


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Gender</th>
        <th scope="col">Password</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row"><a href = "/posts/{{$user->user_id}}">{{$user->user_id}}</a></th>
            <td>{{$user->username}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->status}}</td>
          </tr>            
        @endforeach
    </tbody>
  </table>

@endsection