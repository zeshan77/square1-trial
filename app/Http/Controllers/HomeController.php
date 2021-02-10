<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $sessionKey = $request->session()->getId() . '-sort';
        if(request('sort', 'desc') != $request->session()->get($sessionKey)) {
            Cache::forget(Post::$cacheKey);
        }

        $request->session()->put($sessionKey, $request->get('sort', 'desc'));
        $request->session()->save();

        $posts = Cache::rememberForever(Post::$cacheKey, function() {
            return Post::withOutGlobalScopes()
                ->published()
                ->orderBy('publication_date', request('sort', 'desc'))
                ->paginate(10);
        });

        return view('index', compact('posts'));
    }
}
