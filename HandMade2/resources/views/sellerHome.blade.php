@extends('master')
@section('content')

<a style="color:white" href="/myProducts"><button class="btn btn-info" style="float:right">  منتجاتي </button></a> 
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/th.jpg" alt="IMG" class="logoIMG">
			</div>

			<form class="contact1-form validate-form" method="post"  action="allProducts" enctype="multipart/form-data" novalidate>
			{!! csrf_field() !!}
				<span class="contact1-form-title">
					اضف منتجك
				</span>

				<div class="wrap-input1 validate-input " data-validate = "Name is required" >
						<label>   الصنف</label>
                      
					<select name="catName" class="input1 catIMG" required>
                    @foreach ($allCategory as $categrory)
					<option value="{!!$categrory->id  !!}">{!! $categrory->cat_name !!}</option>
					@endforeach	
				</select>		
				</div>
				
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<label>المنتج</label>
					<input class="input1" type="text" name="product_Name" placeholder="اسم المنتج" required>
					@if ($errors->has('product_Name'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('product_Name') }}</strong>
                                    </span>
                                @endif
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<label>السعر</label>
					<input class="input1" type="number" name="price" placeholder="السعر" required>
					@if ($errors->has('price'))
					<span class="help-block">
						<strong style="color:red">{{ $errors->first('price') }}</strong>
					</span>
				@endif
					<span class="shadow-input1"></span>
				</div>
                
				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<!-- <input class="input1" type="text" name="subject" placeholder="صوره">
					<span class="shadow-input1"></span> -->
					<label>اضف صوره لمنتجك</label>
                   
				  
					<div class="fileContainer catImg" style="font-size:15px" >
					<img src="" id="showIMG"  style="width:160px;height:130px" required>
							add image 
						<input type="file" name="img" id="upload"/>
							@if ($errors->has('img'))
								<span class="help-block">
									<strong style="color:red">{{ $errors->first('img') }}</strong>
								</span>
       						 @endif
                    </div>
				
                            <input type="file" style="visibility:hidden"/>
				<div class="wrap-input1 validate-input" data-validate = "Message is required">
                <label> اوصف منتجك</label>
					<textarea class="input1" name="details"  placeholder="وصف المنتج"></textarea>
					@if ($errors->has('details'))
					<span class="help-block">
						<strong style="color:red">{{ $errors->first('details') }}</strong>
					</span>
					@endif
					<span class="shadow-input1"></span>
				</div>
                 <div style="clear:both"></div>
				<div class="container-contact1-form-btn" type>
					<button class="contact1-form-btn" type="submit">
						<span>
							اضافه
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
			
		</div>





<!--===============================================================================================-->
	<script src='{{asset("vendor/jquery/jquery-3.2.1.min.js")}}'></script>
<!--===============================================================================================-->
	<script src='{{asset("vendor/bootstrap/js/popper.js")}}'></script>
	<script src='{{asset("vendor/bootstrap/js/bootstrap.min.js")}}'></script>
<!--===============================================================================================-->
	<script src='{{asset("vendor/select2/select2.min.js")}}'></script>
<!--===============================================================================================-->
	<script src='{{asset("vendor/tilt/tilt.jquery.min.js")}}'></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>


@endsection