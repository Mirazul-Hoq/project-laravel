@extends('admin.layouts.defaults')

@section('content')
<div class="row">
	@include('admin.includes.sidebar')
	<div class="col-lg-8 w3-padding">
		<table class="table table-dark table-hover">
		    <thead>
		      	<tr>
			        <th>ID</th>
			        <th>Category Name</th>
			        <th>Parent Category ID</th>
			        <th>Delete</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	@foreach($obj as $o)
					<tr>
						<td>{{ $o->id }}</td>
						<td>{{ $o->name }}</td>
						<td>{{ $o->category_id }}</td>
						<td>
							<form action="{{ route('category.delete',$o->id) }}" method="post">
								@csrf
								<input type="submit" name="submit" class="btn btn-light" value="Delete">
							</form>
						</td>
					</tr>
		    	@endforeach
		    </tbody>
		</table>
	</div>
</div>
@stop
  
