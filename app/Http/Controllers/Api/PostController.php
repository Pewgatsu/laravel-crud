<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;


class PostController extends Controller
{

    public function index () {

        return Post::when(request('search'), function ($query) {
            $query->where('title', 'like', '%' . request('search') . '%');
        })->orderBy('id')->get();
    }

    public function getUserPosts ($id) {


        $posts = Post::all()->where('user_id', $id);

        // get all the posts of a certain user
        return PostResource::collection($posts);

    }

    public function store(Request $request) {

        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id'),
        ]);

        $post->save();

        return response()->json([
            "message" => 'Post added',
            "code" => 200
        ]);
    }
}
