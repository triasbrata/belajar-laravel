<div class="form-group">
	{!! Form::label("name","Name User",['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
	<div class="col-md-6 col-sm-6 col-xs-12">
    	{!! Form::text('name',null,['placeholder'=>'Name User','class'=>'form-control','id'=>'name']) !!}                    
	</div>
</div>
<div class="form-group">
	{!! Form::label("email","Email User",['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
	<div class="col-md-6 col-sm-6 col-xs-12">
    	{!! Form::text('email',null,['placeholder'=>'Email User','class'=>'form-control','id'=>'email']) !!}                    
	</div>
</div>
<div class="form-group">
	{!! Form::label("password","Password",['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
	<div class="col-md-6 col-sm-6 col-xs-12">
    	{!! Form::password('password',['placeholder'=>'Password','class'=>'form-control','id'=>'password']) !!}                    
	</div>
</div>
<div class="form-group">
	{!! Form::label("password_confirmation","Password Confirmed",['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
	<div class="col-md-6 col-sm-6 col-xs-12">
    	{!! Form::password('password_confirmation',['placeholder'=>'Password Confirmed','class'=>'form-control','id'=>'password_confirmation']) !!}                    
	</div>
</div>