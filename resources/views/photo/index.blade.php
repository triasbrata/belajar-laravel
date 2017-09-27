<table>
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
					<a href="{{ url("user/{$item->id}/edit") }}">Edit</a>|
					{!! Form::open(['route'=>['user.destroy',$item->id],'method'=>'delete']) !!}
						<button class="btn" type="submit"> Delete</button>
					{!! Form::close() !!}
					<a href="{{ url("user/{$item->id}") }}">View</a>|
				</td>
			</tr>
		@endforeach
	</tbody>

</table>