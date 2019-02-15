@extends('layouts.app')
@section('content')

<div>
        @foreach($allProducts as $key)
        <div> {{$key->product_Name}}
        <a href="/deleteProduct/{{ $key->id }}"><input class="btn btn-primary" type="submit" value="Delete"></a>
        </div><br>
        @endforeach
       
    </div>
@endsection