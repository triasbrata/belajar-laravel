@extends('layouts.app')
@section('content')
	<a class="pull-right btn btn-default" href="{{ route("admin.{$module}.index") }}">Back</a>
	<br>
	<br>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td>User Name</td>
				<td>:</td>
				<td>{{ $item->name }}</td>
			</tr>
			<tr>
				<td>User Email</td>
				<td>:</td>
				<td>{{ $item->email }}</td>
			</tr>
			<tr>
				<td>User Role</td>
				<td>:</td>
				<td>{{ $item->role->title	 }}</td>
			</tr>
			<tr>
				<td>dibuat tanggal</td>
				<td>:</td>
				<td>{{ $item->created_at->format('m F y') }}</td>
			</tr>
		</tbody>
	</table>
@endsection