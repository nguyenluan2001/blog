@extends('layouts/main')
@section('trendy_post')
@parent
@endsection
@section('content')
<div id="recent_post">
    @if($posts->count()>0)
    <div class="bread_crumb">
        <a href="{{route('post_by_category',$posts[0]->post_cat->post_cat_slug)}}">{{$posts[0]->post_cat->post_cat_title}}</a>
        @if($hasPostSubCat==1)
        <span>></span>
        <span>{{$posts[0]->post_sub_cat->post_sub_cat_title}}</span>
        @endif

    </div>  
    @foreach($posts as $item)
    <div class="item">
        <div class="wp_img">
            <img src="{{asset('public/uploads/posts/'.$item->post_img)}}" alt="">

        </div>
        <div class="item_content">
            <h2><a href="{{route('post.show',$item->slug)}}" class="title">{{$item->post_title}}</a></h2>
            <span class="author"><i class="fas fa-user"></i>luannguyen</span>
            <span class="date"><i class="fas fa-clock text-dark"></i>{{$item->created_at}}</span>
            <span class="view"><i class="fas fa-eye"></i>{{$item->view}}</span>
            <p class="item_desc">{{$item->post_desc}}</p>
            <a href="{{route('post.show',$item->slug)}}" class="read_more font-black">Read more</a>
        </div>
    </div>
    @endforeach



    @else
    <h5>Hiện chưa có bài viết</h5>
    @endif
    
</div>



@endsection

@section('sidebar')
@parent
@endsection