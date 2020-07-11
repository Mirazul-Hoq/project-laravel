@extends('customer.layouts.defaults')

@section('content')
	<div class="w3-container w3-padding-32">
		<div class="w3-bar w3-border-top w3-border-bottom">
		  <a href="#" class="w3-bar-item w3-button w3-hover-khaki">All</a>
		  <a href="#" class="w3-bar-item w3-button w3-hover-khaki">Drinks</a>
		  <a href="#" class="w3-bar-item w3-button w3-hover-khaki">Snacks</a>
		  <a href="#" class="w3-bar-item w3-button w3-hover-khaki">Lunch</a>
		  <a href="#" class="w3-bar-item w3-button w3-hover-khaki">Dinner</a>
		</div>
	</div>
	<div class="row container">
		@foreach($obj as $o)
			<div class="col-lg-3">
				<div class="w3-card">
					<img src="{{ URL::to('/upload/thumbnail/'.$o->filename) }}" alt="" style="width: 100%;">
					<div class="row">
						<div class="w3-padding col-lg-8" style="height: 150px;">
							<p class="w3-large">{{$o->name}}</p>
							<p>BDT {{$o->price}}</p>
						</div>
						<div class="col-lg-4">
							<a href="{{ route('cart',$o->id) }}" class="w3-xxxlarge"><i class="fas fa-cart-plus"></i></a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@stop