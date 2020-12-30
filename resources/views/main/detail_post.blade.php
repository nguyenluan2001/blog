@extends('layouts/main')
@section('trendy_post')
@endsection
@section('content')

<div id="detail_post">
    <a href="{{route('post_by_category',$post->post_cat->post_cat_slug)}}">{{$post->post_cat->post_cat_title}}</a>
    <span>></span>
    <a href="{{route('post_by_category',[$post->post_cat->post_cat_slug,$post->post_sub_cat->post_sub_cat_slug])}}">{{$post->post_sub_cat->post_sub_cat_title}}</a>
    <span>></span>
    <span>{{$post->post_title}}</span>
    <h2>{{$post->post_title}}</h2>
    <div class="info d-flex">
        <div class="author mr-3">
            <i class="fas fa-user text-dark"></i>
            <span>luannguyen</span>
        </div>
        <div class="created_at mr-3">
            <i class="fas fa-clock text-dark"></i>
            <span>{{$post->created_at}}</span>
        </div>
        <div class="view">
            <i class="fas fa-eye text-dark"></i>
            <span>{{$post->view}}</span>
        </div>
    </div>
    <p>{!!$post->post_content!!}</p>
</div>



@endsection
@section('sidebar')
@parent
@section('top_sidebar')
<div class="fb-page" data-href="https://www.facebook.com/CODEdocumentary/" data-tabs="" data-width="356" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
    <blockquote cite="https://www.facebook.com/CODEdocumentary/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/CODEdocumentary/">CODE</a></blockquote>
</div>
<div id="popular_post">
    <h1 class="mt-0 mb-0 font-black">POPULAR</h1>
    @foreach($trending_posts as $item)
    <div class="item">
        <a href="{{route('post.show',$item->slug)}}"><img class="w-100" src="{{asset('public/uploads/posts/'.$item->post_img)}}" alt=""></a>
        
        <a href="{{route('post.show',$item->slug)}}">{{$item->post_title}}</a>
    </div>
    @endforeach

</div>
@endsection

@endsection