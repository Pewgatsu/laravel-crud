<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;


class PostController extends Controller
{
    //
    public function index () {
        $posts = Post::all();
        // $users = User::paginate(10);
        
        return PostResource::collection($posts);
    }

    public function retrievePosts ($id) {

        // get all the posts of a certain user

    }

    public function store(Request $request) {
     
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id')
        ]);

        $post->save();

        return response()->json([
            "message" => 'Post added',
            "code" => 200
        ]);
    }
}
