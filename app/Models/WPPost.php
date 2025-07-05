<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WPPost extends Model
{
    //
    protected $table = '_wp_posts';
    protected $fillable = ['post_id','modified_date','slug','status','type','link','title','content','excerpt','featured_image_full',
                          'featured_image_thumbnail','featured_image_medium','featured_image_medium_large','author_name','author_link'];
}
