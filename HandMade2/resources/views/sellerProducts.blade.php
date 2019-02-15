@extends('master')
@section('content')
<table  class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Image</th>                
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
  @foreach($UserProducts as $val)
    <tr>
   
      <th scope="row"><img src="{{$val->img}}"></th>
      <td>{{$val->product_Name}}</td>
      <td> {{$val->price}}</td>
      <td>{{$val->details}}</td>
     
    </tr>
    @endforeach
  </tbody>
</table>


@endsection