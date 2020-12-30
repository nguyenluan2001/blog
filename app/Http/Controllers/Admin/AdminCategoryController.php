<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostCat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class AdminCategoryController extends Controller
{
    function index()
    {
        $post_cats=PostCat::all();
        return view('admin/categories/index',compact('post_cats'));
    }
    function store()
    {
        $data=request()->validate(
            [
                'post_cat_title'=>'required'
            ]
            );
            if(request()->post_cat_id=='0')
            {
                $data['post_cat_slug']=Str::slug($data['post_cat_title']);
                PostCat::create($data);

            }
            else
            {
                $data['post_sub_cat_title']=$data['post_cat_title'];
                $data['post_sub_cat_slug']=Str::slug($data['post_sub_cat_title']);
                unset($data['post_cat_title']);
                PostCat::find(request()->post_cat_id)->post_sub_cats()->create($data);
            }
            return redirect()->route('admin.category.index');
    }
}
