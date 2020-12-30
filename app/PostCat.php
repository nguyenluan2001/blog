<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCat extends Model
{
    protected $guarded=[];
    function post_sub_cats()
    {
        return $this->hasMany(PostSubCat::class);
    }
    function posts()
    {
        return $this->hasMany(Post::class);
    }
}
