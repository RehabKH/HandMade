@extends('layouts.app')
@section('content')

<div>
        @foreach($allUsers as $key)
        <div> {{$key->name}}
        <a href="/deleteUser/{{ $key->id }}"><input class="btn btn-primary" type="submit" value="Delete"></a>
        </div><br>
        @endforeach
       
    </div>
@endsection