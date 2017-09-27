@inject('role', 'App\Role')
<div class="form-group">
	{!! Form::label("name","Name User",['class'=>'control-label'])!!}
    {!! Form::text('name',null,['placeholder'=>'Name User','class'=>'form-control','id'=>'name']) !!}                    
</div>
<div class="form-group">
	{!! Form::label("email","Email User",['class'=>'control-label'])!!}
	{!! Form::text('email',null,['placeholder'=>'Email User','class'=>'form-control','id'=>'email']) !!}                    
</div>
<div class="form-group">
	{!! Form::label("password","Password",['class'=>'control-label'])!!}
    {!! Form::password('password',['placeholder'=>'Password','class'=>'form-control','id'=>'password']) !!}                    
</div>
<div class="form-group">
	{!! Form::label("password_confirmation","Password Confirmed",['class'=>'control-label'])!!}
    {!! Form::password('password_confirmation',['placeholder'=>'Password Confirmed','class'=>'form-control','id'=>'password_confirmation']) !!}
</div>
<div class="form-group">
	{!! Form::label("role_id","Role",['class'=>'control-label'])!!}
    {!! Form::select('role_id',$role->pluck('title','id'),['placeholder'=>'Password Confirmed','class'=>'form-control','id'=>'role']) !!}
</div>