<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AutoImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-posts';

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

        User::whereNotNull('posts_endpoint')
            ->get()
            ->each(function($user) use ($adminUser) {
                $response = Http::get($user->posts_endpoint)->json('data');
                collect($response)->each(function($post) use ($adminUser) {
                    $adminUser->posts()->create([
                        'title' => $post['title'],
                        'description' => $post['description'],
                        'published_date' => Carbon::parse($post['publication_date'])->toDateString(),
                    ]);
                });
            });
    }
}
