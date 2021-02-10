<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class AutoImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-posts {user?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto imports blog posts via endpoints provided by users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $adminUser = User::whereEmail(User::$admin_email)->first();

        Cache::forget(Post::$cacheKey);

        User::whereNotNull('posts_endpoint')
            ->when($this->argument('user'), function($q) {
                return $q->where('id', $this->argument('user'));
            })
            ->get()
            ->each(function($user) use ($adminUser) {
                $response = Http::get($user->posts_endpoint)->json('data');
                collect($response)->each(function($post) use ($adminUser) {
                    $adminUser->posts()->create([
                        'title' => $post['title'],
                        'description' => $post['description'],
                        'publication_date' => Carbon::parse($post['publication_date'])->toDateString(),
                    ]);
                });
            });
    }
}
