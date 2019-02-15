@extends('layouts.app')
@section('content')
<div class="container">
@foreach($allCategory as $key)
<form action="update" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
   
    <div>
        <input type="text" placeholder="Category Name" name="cat_name" value="{{$key->cat_name}}" required >
    </div>
    <div>
        <input type="file" placeholder="Category image" name="cat_img"  required >
    </div>
  
    <div>
   <input class="btn btn-primary" type="submit" value="Update">
    </div>
   
</form>
@endforeach
</div>
@endsection