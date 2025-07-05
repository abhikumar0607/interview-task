<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\WPPost;

class WpPostController extends Controller
{
    //function for store wp post
    public function store(){
        $url = 'https://learn.circuit.rocks/wp-json/wp/v2/posts';
            $response = Http::get($url);
            $posts = $response->json();
            //echo "<pre>";print_r($posts);exit;
            foreach($posts as $post){
                $craete_post = WPPost::updateOrCreate(
                ['post_id' => $post['id']],
                [
                    'post_id' => $post['id'],
                    'modified_date' => $post['modified'],
                    'slug' => $post['slug'],
                    'status' => $post['status'],
                    'type' => $post['type'],
                    'link' => $post['link'],
                    'title' => $post['title']['rendered'],
                    'content' => $post['content']['rendered'],
                    'excerpt' => $post['excerpt']['rendered'],
                    'featured_image_full' => $post['uagb_featured_image_src']['full'][0],
                    'featured_image_thumbnail' => $post['uagb_featured_image_src']['thumbnail'][0],
                    'featured_image_medium' => $post['uagb_featured_image_src']['medium'][0],                               
                    'featured_image_medium_large' => $post['uagb_featured_image_src']['medium_large'][0],
                    'author_name' => $post['uagb_author_info']['display_name'],
                    'author_link' => $post['uagb_author_info']['author_link']
                ]
                );
            }
              if($craete_post){
               echo 'submitted successfully';
              }
    }

    //function for listing
    public function listing(){
        $posts = WPPost::all();
        return view('list-post', compact('posts'));
    }

    //function for edit
    public function edit($id){
        $post = WPPost::where('id',$id)->first();
        return view('edit-post', compact('post'));
    }

    //function for update
    public function update_post(Request $request, $id){
        //echo $id;exit;
        $post = WPPost::where('id',$id)->update([
                'modified_date' => $request['modified'],
                'slug' => $request['slug'],
                'status' => $request['status'],
                'type' => $request['type'],
                'link' => $request['link'],
                'title' => $request['title'],
                'content' => $request['content'],
                'excerpt' => $request['excerpt'],
                'featured_image_full' => $request['featured_image_full'],
                'featured_image_thumbnail' => $request['featured_image_thumbnail'],
                'featured_image_medium' => $request['featured_image_medium'],                               
                'featured_image_medium_large' => $request['featured_image_medium_large'],
                'author_name' => $request['author_name'],
                'author_link' => $request['author_link']
        ]);
        if($post){
          return redirect()->back()->with('success', 'Post updated successfully!');
       }
    }

    //function for delete
    public function delete($id){
       $post = WPPost::find($id)->delete();
       if($post){
         return redirect()->route('wp-posts.index')->with('success', 'Post updated successfully!');
       }
    }

    //function for create
    public function create(){
        return view('add-post');
    }

    //function for create
    public function add_new(Request $request){
               $post = WPPost::create([
                'post_id' => $request['post_id'],
                'modified_date' => $request['modified'],
                'slug' => $request['slug'],
                'status' => $request['status'],
                'type' => $request['type'],
                'link' => $request['link'],
                'title' => $request['title'],
                'content' => $request['content'],
                'excerpt' => $request['excerpt'],
                'featured_image_full' => $request['featured_image_full'],
                'featured_image_thumbnail' => $request['featured_image_thumbnail'],
                'featured_image_medium' => $request['featured_image_medium'],                               
                'featured_image_medium_large' => $request['featured_image_medium_large'],
                'author_name' => $request['author_name'],
                'author_link' => $request['author_link']
        ]);
        if($post){
          return redirect()->back()->with('success', 'Post craeted successfully!');
       }
    }

}
