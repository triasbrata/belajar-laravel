@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-md-12 text-right">
			<a href="{{ route("admin.{$module}.create") }}" class="btn btn-primary">Tambah</a>
		</div>
	</div>
	<br>
	<table class="table table-bordered">
	<thead>
		<tr>
			<th>Title</th>
			<th>Created By</th>
			<th>Created At</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($items as $item)
			<tr>
				<td>{{ $item->title }}</td>
				<td>{{ $item->user->name }}</td>
				<td>{{ $item->created_at->format('d F Y') }}</td>
				<td>
					{!! Form::open(['route'=>["admin.{$module}.destroy",$item->id],'method'=>'delete']) !!}
						<div class="btn-group">	
							<a class="btn btn-xs btn-info" href="{{ route("admin.{$module}.edit",$item->id) }}">Edit</a>
							<a class="btn btn-xs btn-warning" href="{{ route("admin.{$module}.show",$item->id) }}">View</a>	
							<button class="btn btn-xs btn-danger" type="submit"> Delete</button>
						</div>
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</tbody>

</table>
@endsection