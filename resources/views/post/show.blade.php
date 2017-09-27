@extends('layouts.app')
@section('content')
	<a class="pull-right btn btn-default" href="{{ route("admin.{$module}.index") }}">Back</a>
	<br>
	<br>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td>Post title</td>
				<td>:</td>
				<td>{{ $item->title }}</td>
			</tr>
			<tr>
				<td>Post Slug</td>
				<td>:</td>
				<td>{{ $item->slug }}</td>
			</tr>
			<tr>
				<td>Post Content</td>
				<td>:</td>
				<td>{{ $item->content }}</td>
			</tr>
			<tr>
				<td>Post image</td>
				<td>:</td>
				<td><img height="100px" src="{{ asset("artikel/{$item->img}") }}"></td>
			</tr>
			<tr>
				<td>dibuat tanggal</td>
				<td>:</td>
				<td>{{ $item->created_at->format('m F y') }}</td>
			</tr>
		</tbody>
	</table>
@endsection