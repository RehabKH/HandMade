@extends('layouts.app')
@section('content')
    <a href="ProductForm"><button class="btn btn-primary">Add Product</button><a>
    <a href="allProducts"><button class="btn btn-primary">Delete Product</button><a>
    <a href="catForm"><button class="btn btn-primary">Add Category</button><a>
    <a href="allusers"><button class="btn btn-primary">Delete User</button><a>

    <div>
@foreach($allCategory as $key)
<div>{{$key->cat_name}}<div>
<!-- {{$key->cat_img}} -->
<img src="upload/categories/{{$key->cat_img}}" width="100" height="100" >
<a href="/delete/{{ $key->id }}"><input class="btn btn-primary" type="submit" value="Delete"></a>
<a href="/admin/{{ $key->id }}/edit"><input class="btn btn-primary" type="submit" value="Update"></a>
</div>
@endforeach
@endsection