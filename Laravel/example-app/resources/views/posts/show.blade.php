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
        <tr>
            <th scope="row"></th>
            <td>{{print_r($shows)}}</td>
          </tr>            
    </tbody>
  </table>

@endsection