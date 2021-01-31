<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $post = Post::with(['user', 'likes'])->get();
        return view('posts.post', ['posts' => $post]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        // Post::create([
        //     'title'=> $request->title,
        //     'body' => $request->body,
        //     'posted_by' => auth()->user()->username
        // ]);

        $request->user()->posts()->create([
            'title'=> $request->title,
            'body' => $request->body,
            'posted_by' => auth()->user()->username            
        ]);

        return redirect()->route('post')->with('status', 'Success!');
    }

    public function delete($id){
        $data = Post::find($id);
        $data->delete();
        return redirect()->route('post')->with('deleted', ''.$data->title.' is deleted');
    }

}
