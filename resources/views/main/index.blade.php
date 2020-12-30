@extends('layouts/main')
@section('trendy_post')
@parent
@endsection
@section('content')
<div id="recent_post">
    <h2>RECENT POSTS</h2>
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
            <!-- <a href="{{route('post.show',$item->slug)}}" class="read_more font-black">Read more</a> -->
        </div>
    </div>
    @endforeach



</div>



@endsection

@section('sidebar')
@parent
@endsection