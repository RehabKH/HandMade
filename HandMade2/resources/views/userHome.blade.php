@extends('layouts.app')
@section('content')
    <div><a href="card"><button class="btn btn-primary">Card</button></a></div>
    <div>
    
    @foreach($AllProducts as $key)
        <span>{{$key->product_Name}} , <span>
        <span>{{$key-> details}} , </span>
        <span>{{$key-> price}} , </span>
        <img src="upload/products/{{$key->img}}" width="100" height="100" >
        <a href="/buy/{{ $key->id }}"><input class="btn btn-primary" type="submit" value="Buy"></a>
        </div>
        <br><br><br>
    @endforeach

@endsection