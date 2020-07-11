@extends('customer.layouts.defaults')
@section('content')
	<div class="offset-lg-2 col-lg-8">
		<div class="w3-card w3-margin-top w3-padding w3-margin-bottom">
			<p class="w3-xxxlarge">Your order cart</p>
			<!-- <p>You currently have </p> -->
			<table class="table table-hover">
		    <thead>
		      	<tr>
			        <th>Item</th>
			        <th></th>
			        <th>Quantity</th>
			        <th>Unit Price</th>
			        <th>Sub Total</th>
			        <th>Delete</th>
		      	</tr>
		    </thead>
		    <tbody>
			    @foreach($obj as $o)
					<tr>
						<td><img src="{{ URL::to('/upload/thumbnail/'.$o->filename) }}" alt=""></td>
						<td>{{ $o->name }} <br>
							{{$o->desc}}
						</td>
						<td>{{ $o->quantity }}</td>
						<td>{{ $o->price }}</td>
						<td>{{ $o->subtotal }}</td>
						<td>
							<form action="{{URL::to('cart/store/delete/'.$o->id)}}" method="post">
							@csrf
								<input type="submit" name="submit" class="w3-btn w3-khaki" value="Delete">
							</form>
						</td>
					</tr>
			    @endforeach
		    </tbody>
		    
		</table>
		</div>
	</div>
@stop