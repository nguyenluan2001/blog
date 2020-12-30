<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostCat;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    function post_sub_cat_ajax()
    {
        $post_sub_cats=PostCat::find(request()->post_cat_id)->post_sub_cats;
        $html="";
        foreach($post_sub_cats as $item)
        {
            $html.="<option value='$item->id'>$item->post_sub_cat_title</option>";
        }
        echo $html;
    }
}
