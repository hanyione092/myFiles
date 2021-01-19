@extends('layouts.app')

@section('content')

{{-- @for ($i = 0; $i < count($adviser); $i++)
<p class = "h5">{{$adviser['name'][$i]}}: {{$adviser['affiliation'][$i]}}</p>  
@endfor
@for ($i = 0; $i < count($critic); $i++)
<p class = "h5">{{$critic['name'][$i]}}: {{$critic['affiliation'][$i]}}</p>  
@endfor

<h4>{{print_r($adviser['name'][1], true)}}</h4>
<h3>{{implode(", ", $students)}}</h3> --}}

<p class="h5">{{print_r($data['critic']['name']['0'], true)}}</p>


<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Patrick</td>
        <td>Buco</td>
        <td>jpbuco@cvsu.edu.ph</td>
    </tr>

  </table>

@endsection