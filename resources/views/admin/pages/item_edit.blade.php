@extends('admin.layouts.defaults')

@section('content')
<div class="row">
	@include('admin.includes.sidebar')
	<div class="offset-lg-1 col-lg-5 w3-padding-32">
		<div class="w3-card-4">
		    <div class="w3-container w3-brown">
		    	<h2>Edit Item</h2>
		  	</div>
		  	<form class="w3-container" action="{{ route('update.item',$obj->id) }}" method="post" enctype="multipart/form-data">
		  		@csrf
			    <p>      
				    <label class="w3-text-brown"><b>Item Name</b></label>
				    <input class="w3-input w3-border w3-sand" name="name" type="text" value="{{$obj->name}}">
				</p>
				<p>      
				    <label class="w3-text-brown"><b>Item Description</b></label>
				    <input class="w3-input w3-border w3-sand" name="desc" type="textarea" value="{{$obj->desc}}">
				</p>
			    <p>      
				    <label class="w3-text-brown"><b>Price</b></label>
				    <input class="w3-input w3-border w3-sand" name="price" type="number" value="{{$obj->price}}">
				</p>
			    <p>      
				    <label class="w3-text-brown"><b>Quantity</b></label>
				    <input class="w3-input w3-border w3-sand" name="quantity" type="number" value="{{$obj->quantity}}">
			    <select class="w3-select" name="option">
				    <option value="" disabled selected>Choose category</option>
				    @foreach($data as $d)
				    <option value="{{$d->id}}">{{ $d->name }}</option>
				    @endforeach
				</select>
			    </p>
			    <p>
					<input class="w3-radio" type="radio" name="status" value="1" checked>
					<label>Active</label>
				</p>
				<p>
					<input class="w3-radio" type="radio" name="status" value="0">
					<label>Deactive</label>
				</p>
				
			    <p><input type="submit" name="submit" value="Edit Item" class="w3-btn w3-brown"></p>
		  	</form>
		</div>
	</div>
</div>


@stop