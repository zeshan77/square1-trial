<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

use App\Models\Post;

class PostController extends Controller
{
    //
    protected $userPostView = 'userspost.';

    public function index()

    {

        return view('dashboard',[

        	"allposts"=> Post::where('user_id',auth()->user()->id)->orderBy('published_date', 'desc')->get() ?? []
        ]);
    }
    
    // Add post view
    public function create_post() {


        return view($this->userPostView.'add');

    }
    
    // Store Post
    public function store_post(StorePostRequest $request) {


        if ($request->validated()) {

        	$post_saved = Post::create($request->all());
            return redirect()
                   ->route('create.post')
                   ->with('message','New post is saved');
        }

    }
    
    // post detials
    public function show_post(Post $post) {
        
        //dd($post);
        return view($this->userPostView.'show',[

        	"post"=> $post
        ]);
    }
}
