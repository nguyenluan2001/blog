<?php

namespace App\Providers;

use App\Post;
use App\PostCat;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['*'],function($view)
        {
            $categories=PostCat::all();
            $trending_posts=Post::orderBy('view','desc')->limit(5)->get();
            $view->with(['categories'=>$categories,'trending_posts'=>$trending_posts]);
            

        });
    }
}
