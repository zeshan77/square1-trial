<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id',auth()->user()->id)
            ->orderBy('published_date', 'desc')
            ->get();

            //dd($posts);

        return view('dashboard',[
        	"posts"=>  $posts
        ]);
    }

    // Add post view
    public function create()
    {
        return view('posts.add');
    }

    // Store Post
    public function store(StorePostRequest $request)
    {
        auth()->user()->posts()->create($request->validated());

        return redirect()
               ->route('create.post')
               ->with('message','New post is saved');
    }

    // post details
    public function show(Post $post)
    {
        return view('posts.show', [
        	"post"=> $post
        ]);
    }
}
