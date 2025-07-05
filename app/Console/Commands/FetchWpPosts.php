<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\BlogPost;
use App\Models\BlogPostDetail;
class FetchWpPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-wp-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
           // Fetch from WordPress API
        $response = Http::get("https://learn.circuit.rocks/wp-json/wp/v2/posts");
        if (!$response->ok()) {
            return response()->json(['error' => 'Failed to fetch from WordPress'], 500);
        }
        $data = $response->json();
        //echo "<pre>";print_r($data);exit;
        if ($response->successful()) {
        // Store main post
        foreach ($data as $data) {
            $post = BlogPost::updateOrCreate(
                ['wp_id' => $data['id']],
                [
                    'slug' => $data['slug'] ?? null,
                    'status' => $data['status'] ?? null,
                    'type' => $data['type'] ?? null,
                    'link' => $data['link'] ?? null,
                    'title' => $data['title']['rendered'] ?? null,
                    'excerpt' => $data['excerpt']['rendered'] ?? null,
                    'date' => $data['date'] ?? null,
                    'date_gmt' => $data['date_gmt'] ?? null,
                    'modified' => $data['modified'] ?? null,
                    'modified_gmt' => $data['modified_gmt'] ?? null,
                    'comment_status' => $data['comment_status'] ?? null,
                    'ping_status' => $data['ping_status'] ?? null,
                    'sticky' => $data['sticky'] ?? false,
                    'template' => $data['template'] ?? null,
                    'format' => $data['format'] ?? null,
                    'meta' => $data['meta'] ?? null,
                    'author' => $data['author'] ?? null,
                    'featured_media' => $data['featured_media'] ?? null,
                    'categories' => $data['categories'] ?? [],
                    'tags' => $data['tags'] ?? [],
                    'acf' => $data['acf'] ?? [],
                    'uagb_featured_image_src' => $data['uagb_featured_image_src'] ?? null,
                    'uagb_author_info' => $data['uagb_author_info'] ?? null,
                    'uagb_comment_info' => $data['uagb_comment_info'] ?? null,
                    'uagb_excerpt' => $data['uagb_excerpt'] ?? null,
                    'yoast_head' => $data['yoast_head'] ?? null,
                ]
            );

            $post->details()->updateOrCreate(
                [],
                [
                    'guid' => $data['guid']['rendered'] ?? null,
                    'content' => $data['content']['rendered'] ?? null,
                    'meta' => $data['meta'] ?? null,
                    'excerpt' => $data['excerpt']['rendered'] ?? null,
                    'uagb_featured_image_src' => $data['uagb_featured_image_src'] ?? null,
                    'uagb_author_info' => $data['uagb_author_info'] ?? null,
                    'uagb_comment_info' => $data['uagb_comment_info'] ?? null,
                    'uagb_excerpt' => $data['uagb_excerpt'] ?? null,
                    'yoast_head' => $data['yoast_head'] ?? null,
                ]
            );
        }
         $this->info("Done syncing!");
        } else {
            $this->error("Failed to fetch.");
        }
    }
}
