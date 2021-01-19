@extends('layouts.app')

@section('content')
{{-- remember the @csfr, form post won't work if it's missing --}}
<form action = "{{route('posts')}}" method = "POST">
    <div class="form-group">
      <label for="exampleFormControlTextarea1">POST</label>
      @csrf
      <textarea name = "body" class="form-control @error('body') border border-danger @enderror" id="exampleFormControlTextarea1" rows="3"></textarea>
      @error('body')
      <small id="errorName" class="form-text text-muted">{{$message}}</small>                    
      @enderror
    </div>
    <div class="form-check">
        {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label> --}}
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
