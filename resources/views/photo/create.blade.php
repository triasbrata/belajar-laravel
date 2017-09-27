{!! Form::open(['url'=>"user/create",'method'=>'POST']) !!}
	@include('user.form')
	<button class="btn" type="submit">Create</button>
	<button class="btn" type="reset">Reset</button>
{!! Form::close() !!}