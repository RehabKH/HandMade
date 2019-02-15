@extends('layouts.app')
@section('content')

<form action="/admin" method="post" enctype="multipart/form-data">
{!! csrf_field() !!}
    
    <div>
        <input type="text" placeholder="Category Name" name="cat_name" required >
    </div>
    <div>
        <input type="file" placeholder="Category image" name="cat_img" required >
    </div>
    
    <div>
        <input class="btn btn-primary" type="submit"  value="Add" >
    </div>
</form>
@endsection