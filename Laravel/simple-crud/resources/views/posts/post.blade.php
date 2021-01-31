@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col">
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('status')}}</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


@if (session('deleted'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('deleted')}}</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if (session('unable'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{session('unable')}}</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


<form class = "pb-3" action = "{{route('post')}}" method = "POST" enctype="multipart/form-data">
    <div class="form-group">
        @csrf
      <label for="exampleTitle">Title</label>
      <input type="text" name = "title" value = "{{old('title')}}" class="form-control @error('title') border border-danger @enderror" id="exampleTitle" aria-describedby="TitlelHelp" placeholder="Title">
      @error('title')
      <small id="TitlelHelp" class="form-text text-warning">{{$message}}</small>
      @enderror
    </div>
    <div class="form-group">
        <label for="exampleBody">Body</label>
        <textarea name = "body" placeholder = "Enter text here ..." class="form-control @error('body') border border-danger @enderror" id="exampleBody" aria-describedby="BodyHelp" rows="3">{{old('body')}}</textarea>
        @error('body')
        <small id="TitlelHelp" class="form-text text-warning">{{$message}}</small>
        @enderror
      </div>
    <div class="form-check">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Image</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Likes</th>
        <th scope = "col">Like Button</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>Image Here</td>
        <td>{{$post->posted_by}}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</td>
        <td>
          @if (!$post->likedBy(auth()->user()))
          <form action = "{{route('posts.likes', $post)}}" method = "POST">
            @csrf
            <button type="submit" class="badge badge-dark">Like</button>
          </form>              
          @else
          <form action = "{{route('posts.likes', $post)}}" method = "POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="badge badge-dark">Unlike</button>
          </form>              
          @endif
        </td>
        <td>
          <a href="/posts/{{$post->id}}" class="badge badge-dark">Delete</a> |
          <a href="/posts/{{$post->id}}" class="badge badge-dark">Edit</a>
        </td>
      </tr>          
      @endforeach
    </tbody>
  </table>
</div>
</div>
<div class="container mt-4 mb-5">
  <div class="d-flex justify-content-center row">
      <div class="col-md-8">
          <div class="feed p-2">
              <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white border text-muted">
                  <div class="feed-text px-2">
                      <h6 class="text-black-50 mt-2">What's on your mind</h6>
                  </div>
                  <div class="feed-icon px-2"><i class="fa fa-long-arrow-up text-black-50"></i></div>
              </div>
              <div class="bg-white border mt-2">
                  <div>
                      <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                          <div class="d-flex flex-row align-items-center feed-text px-2"><img class="rounded-circle" src="https://i.imgur.com/aoKusnD.jpg" width="45">
                              <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold text-dark">Thomson ben</span><span class="text-muted time">40 minutes ago</span></div>
                          </div>
                          <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-dark"></i></div>
                      </div>
                  </div>
                  <div class="p-2 px-3 text-dark"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>
                  <div class="d-flex justify-content-end socials p-2 py-3"><i class="fa fa-thumbs-up"></i><i class="fa fa-comments-o"></i><i class="fa fa-share"></i></div>
              </div>
              <div class="bg-white border mt-2">
                  <div>
                      <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                          <div class="d-flex flex-row align-items-center feed-text px-2"><img class="rounded-circle" src="https://i.imgur.com/aoKusnD.jpg" width="45">
                              <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">Thomson ben</span><span class="text-black-50 time">40 minutes ago</span></div>
                          </div>
                          <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                      </div>
                  </div>
                  <div class="feed-image p-2 px-3"><img class="img-fluid img-responsive" src="https://i.imgur.com/aoKusnD.jpg"></div>
                  <div class="d-flex justify-content-end socials p-2 py-3"><i class="fa fa-thumbs-up"></i><i class="fa fa-comments-o"></i><i class="fa fa-share"></i></div>
              </div>
          </div>
      </div>
  </div>
</div>
  
@endsection
