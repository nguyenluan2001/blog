<?php

namespace App;

use Carbon\Carbon;
use Carbon\Traits\Macro;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use Macro;
    use SearchableTrait;
    protected $guarded=[];
    protected $searchable=[
        'columns'=>[
            'posts.post_title'=>1,
            'posts.post_content'=>1
        ]
        ];
    function post_sub_cat()
    {
        return $this->belongsTo(PostSubCat::class);
    }
    function post_cat()
    {
        return $this->belongsTo(PostCat::class);
    }
    function getCreatedAtAttribute($value)
    {
        return  Carbon::parse($value)->format('d/m/Y');
        
    }
}
