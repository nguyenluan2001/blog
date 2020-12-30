<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostSubCat extends Model
{
    protected $guarded = [];
    function post_cat()
    {
        return $this->belongsTo(PostCat::class);
    }
    function posts()
    {
        return $this->hasMany(Post::class);
    }
}
