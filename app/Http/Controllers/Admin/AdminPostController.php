<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\PostCat;
use App\PostSubCat;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    function index()
    {
        $num_per_page=5;
        $posts=Post::orderBy('id','desc')->paginate($num_per_page);
       return view('admin/posts/index',compact('posts'));
    }
    function add()
    {
        $post_cats=PostCat::all();
        return view('admin/posts/add',compact('post_cats'));
    }
    function store()
    {
        $data=request()->validate(
            [
                'post_title'=>'required',
                'post_desc'=>'required',
                'post_content'=>'required',
                'post_cat_id'=>'required',
                'post_sub_cat_id'=>'required',
            ]
            );
            $data['slug']=Str::slug($data['post_title']);
            if(request()->hasFile('post_img'))
            {
                $file=request()->file('post_img');
                $data['post_img']=$file->getClientOriginalName();
                $file->move('public/uploads/posts',$data['post_img']);
                $img=Image::make('public/uploads/posts/'.$data['post_img'])->fit(300,300);
                $img->save();

            }
            Post::create($data);
            return redirect()->route('admin.post.index');


    }
    function post_by_category($post_cat_slug,$post_sub_cat_slug="")
    {
        $posts=[];
        $hasPostSubCat=0;
        if($post_sub_cat_slug=="")
        {
            $posts=PostCat::wherePostCatSlug($post_cat_slug)->get()[0]->posts;

        }
        else
        {
            $posts=PostCat::wherePostCatSlug($post_cat_slug)->get()[0]->post_sub_cats()->wherePostSubCatSlug($post_sub_cat_slug)->get()[0]->posts;
            $hasPostSubCat=1;
        }
        return view('admin.posts.post_by_category',compact('posts','hasPostSubCat'));
    }
    function edit($post_slug)
    {
        $post=Post::whereSlug($post_slug)->get()[0];
        $post_cats=PostCat::all();
        return view('admin.posts.edit',compact('post','post_cats'));
    }
    function update($post_slug)
    {
        $post=Post::whereSlug($post_slug)->get()[0];
        $data=request()->validate(
            [
                'post_title'=>'string',
                'post_desc'=>'string',
                'post_content'=>'string',
            ]
            );
            $data['slug']=Str::slug($data['post_title']);
            $data['post_cat_id']=request()->post_cat_id;
            $data['post_sub_cat_id']=request()->post_sub_cat_id;
            if(request()->hasFile('post_img'))
            {
                unlink('public/uploads/posts/'.$post->post_img);
                $file=request()->file('post_img');
                $data['post_img']=$file->getClientOriginalName();
                $file->move('public/uploads/posts',$data['post_img']);
                $img=Image::make('public/uploads/posts/'.$data['post_img'])->fit(300,300);
                $img->save();

            }
            $post->update($data);
            return back();
    }
    function delete(Post $post)
    {
        $post->delete();
        return back();
    }
}
