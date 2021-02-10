<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Cache::rememberForever(Post::$cacheKey, function() {
            return Post::withOutGlobalScopes()
                ->published()
                ->orderBy('publication_date', request('sort', 'desc'))
                ->paginate(5);
        });

        return view('index', compact('posts'));
    }
}
