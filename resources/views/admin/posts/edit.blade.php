@extends('layouts/admin_layout')
@section('body')
<script>
    $(document).ready(function() {
        $('#wrapper #content #wp_add_post form select#post_cat').change(function() {
            var post_cat_id = $(this).val()
            var data = {
                post_cat_id: post_cat_id
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                'url': 'admin/ajax/post_sub_cat',
                'method': 'post',
                'data': data,
                success: function(data) {
                    $('#wrapper #content #wp_add_post form select#post_sub_cat').html(data)
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status),
                        alert(thrownError)
                }


            })
        })
    })
</script>
<div id="wp_add_post" class="container">
    <h1 class="font-black">CREATE NEW POST</h1>
    <form action="{{route('admin.post.update',$post->slug)}}" method="post" id="form_add_post" enctype="multipart/form-data">
        @csrf
        <label for="title">Tiêu đề</label>
        <input type="text" name="post_title" id="title" value="{{$post->post_title}}">
        <label for="post_desc">Mô tả</label>
        <input type="text" name="post_desc" id="post_desc" value="{{$post->post_desc}}">
        <label for="desc">Nội dung</label>
        <textarea name="post_content" id="desc" class="ckeditor mb-3">{{$post->post_content}}</textarea>
        <label for="topic">Danh mục</label><br>
        <select name="post_cat_id" id="post_cat" class="custom-select">
            <option value="">---Choose type post---</option>
            @foreach($post_cats as $item)
            <option value="{{$item->id}}" @if($item->id==$post->post_cat_id) selected="selected" @endif>{{$item->post_cat_title}}</option>

            @endforeach
        </select>
        <label for="topic">Thể loại</label><br>
        <select name="post_sub_cat_id" id="post_sub_cat" class="custom-select mb-3">
            @foreach($post->post_cat->post_sub_cats as $item)
            <option value="{{$item->id}}" @if($item->id==$post->post_sub_cat_id) selected="selected" @endif>{{$item->post_sub_cat_title}}</option>

            @endforeach
        </select>
        <div class="custom-file">
            <input type="file" id="post_img" name="post_img" class="custom-file-input">
            <label for="post_img" class="custom-file-label">Choose your image</label>
        </div>
        @if(isset($post->post_img))
        <img src="{{asset('public/uploads/posts/'.$post->post_img)}}" alt="">
        @endif
        <input type="submit" class="bg-success font-white" value="Add" name="btn_add_post">

    </form>


</div>
@endsection