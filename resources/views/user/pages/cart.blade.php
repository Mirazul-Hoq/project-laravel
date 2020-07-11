@extends('user.layouts.defaults')

@section('content')
	<div class="offset-lg-4 col-lg-4">
		<div class="w3-card w3-margin-top">
			<div class="w3-margin">
				<p class="w3-xxlarge w3-center">{{$obj->name}}</p>
				<p class="w3-center">{{$obj->desc}}</p>
				<p class="w3-center">Price: BDT {{$obj->price}}</p>
				<form action="" style="width: 40%; margin: auto;" method="post">
					@csrf
					<input type="number" name="quantity" class="w3-input" placeholder="Enter quantity">
					<input type="submit" name="submit" class="w3-btn w3-khaki w3-margin" value="Add to cart">
				</form>
			</div>
		</div>
	</div>
@stop