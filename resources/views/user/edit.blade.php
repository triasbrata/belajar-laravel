@extends('layouts.app')
@section('content')
	{!! Form::model($item,['route'=>["admin.{$module}.update",$item->id],'method'=>'PUT','class'=>'form-horizontal', 'id'=>'form-user']) !!}
		@include("{$module}.form")
		<div class="row">
			<div class="col-md-12 text-right">
				<button class="btn btn-info submit">Update</button>
				<button class="btn btn-danger" type="reset">Reset</button>
			</div>
		</div>
	{!! Form::close() !!}
@endsection