@extends('layouts.app')
@section('content')

<form action="allProducts" method="post" enctype="multipart/form-data">
{!! csrf_field() !!}
					
     <select name="catName">
    @foreach($allCategory as $key)
    <option>{{$key->cat_name}}</option>
    @endforeach
    </select>
    
    <div>
        <input  type="text" placeholder="اسم المنتج" name="product_Name" required >
                                @if ($errors->has('product_Name'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('product_Name') }}</strong>
                                    </span>
                                @endif
    </div>
    <div>
        <input type="text" placeholder="التفاصيل" name="details" required >
        @if ($errors->has('details'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('details') }}</strong>
            </span>
        @endif
    </div>
    <div>
        <input type="number" placeholder="السعر" name="price" required>
        @if ($errors->has('price'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
    <div>
        <input type="file" placeholder="Product Image" name="img" required>
        @if ($errors->has('img'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('img') }}</strong>
            </span>
        @endif
    </div>
    <div>
        <input class="btn btn-primary" type="submit"  value="Add" >
    </div> 
</form>
@endsection