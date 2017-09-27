@extends('layouts.app')
@section('content')
	{!! Form::open(['route'=>"admin.{$module}.store",'method'=>'post','class'=>'form-horizontal','files'=>true]) !!}
		@include("{$module}.form")
		<div class="row">
			<div class="col-md-12 text-right">
				<button class="btn btn-primary" type="submit">Create</button>
				<button class="btn btn-danger" type="reset">Reset</button>
			</div>
		</div>
	{!! Form::close() !!}
@endsection