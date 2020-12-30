@extends('layouts/admin_layout')
@section('body')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.category.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="post_cat">Thêm thể loại</label>
                        <input type="text" name="post_cat_title" id="post_cat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="post-sub_cat">Thuộc danh mục</label>
                        <select name="post_cat_id" class="custom-select" id="">
                            <option value="0">Không</option>
                            @foreach($post_cats as $item)
                            <option value="{{$item->id}}">{{$item->post_cat_title}}</option>

                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success">Thêm</button>
                </form>


            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @foreach($post_cats as $item)
                <h5><a href="{{route('admin.post.post_by_category',$item->post_cat_slug)}}">#{{$item->post_cat_title}}</a></h5>
                @foreach($item->post_sub_cats as $value)
                <h5>---------<a href="{{route('admin.post.post_by_category',[$item->post_cat_slug,$value->post_sub_cat_slug])}}">{{$value->post_sub_cat_title}}</a></h5>


                @endforeach

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection