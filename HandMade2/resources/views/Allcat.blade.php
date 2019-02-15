@extends('layouts.app')
@section('content')

<div>
@foreach($allCategory as $key)
<div>{{$key->cat_name}}<div>
<!-- {{$key->cat_img}} -->
<img src='upload/categories/{{$key->cat_img}}' width="100" height="100" >
<a href="/delete/{{ $key->id }}"><input class="btn btn-primary" type="submit" value="Delete"></a>
</div>

@endforeach
@endsection