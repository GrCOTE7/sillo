<?php

namespace App\Console\Commands;

use App\Models\{ Post, Page };
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Manually create sitemap
        $sitemap = Sitemap::create();

        // Home page
        $sitemap->add('/');

        // Static pages
        $pages = Page::select('slug')->get();
        foreach ($pages as $page) {
            $sitemap->add("/posts/{$page->slug}");
        }

        // Dynamic pages
        $posts = Post::select('slug')->whereActive(true)->get();
        foreach ($posts as $post) {
            $sitemap->add("/posts/{$post->slug}");
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
