@extends('layouts/admin_layout')
@section('body')

<a href="{{route('admin.post.add')}}" id="btn_add" class="bg-success">Add Post</a>
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
                <a href="{{route('admin.post.edit',$item->slug)}}" class="bg-success">Edit</a>
                <a onclick="return confirm('Do you want to delete this?')" href="{{route('admin.post.delete',$item->id)}}" class="bg-danger">Delete</a>
            </td>
        </tr>
        @endforeach




    </tbody>
</table>
@endsection