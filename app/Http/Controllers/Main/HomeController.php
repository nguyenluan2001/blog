<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Post;
use App\PostCat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $posts=Post::orderBy('id','desc')->get();
        // $categories=PostCat::all();
        return view('main/index',compact('posts'));
    }
}
