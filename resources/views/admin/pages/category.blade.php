@extends('admin.layouts.defaults')

@section('content')
<div class="row">
	@include('admin.includes.sidebar')
	<div class="offset-lg-1 col-lg-5 w3-padding-32">
		<div class="w3-card-4">
		    <div class="w3-container w3-brown">
		    	<h2>Insert Category</h2>
		  	</div>
		  	<form class="w3-container" action="{{ route('category.store') }}" method="post">
		  		@csrf
			    <p>      
			    <label class="w3-text-brown"><b>Category Name</b></label>
			    <input class="w3-input w3-border w3-sand" name="name" type="text"></p>
			    <p>
			    <select class="w3-select" name="option">
				    <option value="" disabled selected>Choose parent category</option>
				    @foreach($obj as $o)
				    <option value="{{$o->id}}">{{ $o->name }}</option>
				    @endforeach
				</select>
			    <p>
			    <input type="submit" name="submit" value="Add Category" class="w3-btn w3-brown"></p>
		  	</form>
		</div>
	</div>
</div>

@stop