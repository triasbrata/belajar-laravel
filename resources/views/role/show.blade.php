@extends('layouts.app')
@section('content')
	<a class="pull-right btn btn-default" href="{{ route("admin.{$module}.index") }}">Back</a>
	<br>
	<br>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td>Label Role</td>
				<td>:</td>
				<td>{{ $item->title }}</td>
			</tr>
			<tr>
				<td>dibuat tanggal</td>
				<td>:</td>
				<td>{{ $item->created_at->format('m F y') }}</td>
			</tr>
		</tbody>
	</table>
@endsection