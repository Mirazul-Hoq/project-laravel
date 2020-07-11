@extends('admin.layouts.defaults')

@section('content')
<div class="row">
	@include('admin.includes.sidebar')
	<div class="col-lg-8 w3-padding">
		<table class="table table-hover w3-card">
		    <thead>
		      	<tr>
			        <th>ID</th>
			        <th>Name</th>
			        <th>Price</th>
			        <th>Quantity</th>
			        <th>Image</th>
			        <th>Category Name</th>
			        <th>Status</th>
			        <th>Edit</th>
			        <th>Delete</th>
		      	</tr>
		    </thead>
		    <tbody>
			    @foreach($obj as $o)
					<tr>
						<td>{{ $o->id }}</td>
						<td>{{ $o->name }}</td>
						<td>{{ $o->price }}</td>
						<td>{{ $o->quantity }}</td>
						<td><img src="{{ URL::to('/upload/thumbnail/'.$o->filename) }}" alt=""></td>
						<td>{{ $o->catname }}</td>
						<td>{{ $o->status }}</td>
						<td>
							<a href="{{URL::to('admin/item/edit/'.$o->id)}}" class="w3-btn w3-khaki">Edit</a>
						</td>
						<td>
							<a href="{{URL::to('admin/item/delete/'.$o->id)}}" class="w3-btn w3-khaki">Delete</a>
						</td>
					</tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
</div>
@stop
  
