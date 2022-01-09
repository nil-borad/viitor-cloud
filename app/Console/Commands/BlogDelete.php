<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;

class BlogDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Blog Older than 30 Days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $blogs = Blog::whereDate('created_at', '<=', now()->subDays(30)->setTime(0, 0, 0)->toDateTimeString())->delete();
        $this->info($blogs->count().' Deleted');
    }
}
