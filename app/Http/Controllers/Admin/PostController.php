<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Artisan;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('publication_date', 'desc')->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.add');
    }

    public function store(StorePostRequest $request)
    {
        auth()->user()->posts()->create($request->validated());

        Cache::forget(Post::$cacheKey);

        return redirect()
               ->route('posts.create')
               ->with('message','New post is saved');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function import()
    {
        if(! auth()->user()->posts_endpoint) {
            return redirect()
                ->back()
                ->with('error', 'You don\'t have an endpoint provided for importing posts.');
        }

        Artisan::queue('import-posts', [
            'user' => auth()->user()->id,
        ]);

        return redirect()
            ->back()
            ->with('message', 'Importing posts are running.');
    }
}
