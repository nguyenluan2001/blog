@extends('layouts/admin_layout')
@section('body')
<div class="bread_crumb">
    @if($hasPostSubCat==0)
    <span>{{$posts[0]->post_cat->post_cat_title}}</span>
    @else
    <a href="{{route('admin.post.post_by_category',$posts[0]->post_cat->post_cat_slug)}}">{{$posts[0]->post_cat->post_cat_title}}</a>
    <span>></span>
    <span>{{$posts[0]->post_sub_cat->post_sub_cat_title}}</span>
    @endif
  

</div>
<table class="text-center">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Topic</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $key=>$item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->post_title}}</td>
            <td>{{$item->post_sub_cat->post_sub_cat_title}}</td>
            <td>
                <a href="" class="bg-success">Edit</a>
                <a onclick="return confirm('Do you want to delete this?')" href="" class="bg-danger">Delete</a>
            </td>
        </tr>
        @endforeach




    </tbody>
</table>
@endsection