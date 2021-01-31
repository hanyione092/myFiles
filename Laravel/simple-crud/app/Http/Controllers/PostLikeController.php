<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    //Post is a model, $post is variable holding a data.
    public function store(Post $post, Request $request){
        // dd($post);
        // dd($post->likedBy($request->user()));

        if($post->likedBy($request->user())){
            return response(null, 409);
        }

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        return back();
    }

    public function destroy(Post $post, Request $request){
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
