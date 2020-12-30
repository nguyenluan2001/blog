<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Post;
use App\PostCat;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function show($post_slug)
    {
        $post=Post::whereSlug($post_slug)->get()[0];
        $post->view=$post->view+1;
        $post->save();
        return view('main/detail_post',compact('post'));
    }
    function post_by_category($post_cat_slug,$post_sub_cat_slug="")
    {
        $posts=[];
        $hasPostSubCat=0;
        if($post_sub_cat_slug==="")
        {
            $posts=PostCat::wherePostCatSlug($post_cat_slug)->get()[0]->posts;

        }
        else
        {
            $posts=PostCat::wherePostCatSlug($post_cat_slug)->get()[0]->post_sub_cats()->wherePostSubCatSlug($post_sub_cat_slug)->get()[0]->posts;
            $hasPostSubCat=1;

        }

        return view('main/post_by_category',compact('posts','hasPostSubCat'));

    }
    function search()
    {
        $posts=Post::search(request()->key_word)->get();
        return view('main.search',compact('posts'));
    }
}
