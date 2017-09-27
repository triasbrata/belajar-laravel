@extends('layouts.app')
@section('content')
	<table class="table table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Created At</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($items as $item)
			<tr>
				<td>{{ $item->name }}</td>
				<td>{{ $item->email }}</td>
				<td>{{ $item->created_at->format('d F Y') }}</td>
				<td>
					{!! Form::open(['route'=>['admin.user.destroy',$item->id],'method'=>'delete']) !!}
						<div class="btn-group">	
							<a class="btn btn-xs btn-info" href="{{ route('admin.user.edit',$item->id) }}">Edit</a>
							<a class="btn btn-xs btn-warning" href="{{ route('admin.user.show',$item->id) }}">View</a>	
							<button class="btn btn-xs btn-danger" type="submit"> Delete</button>
						</div>
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</tbody>

</table>
@endsection