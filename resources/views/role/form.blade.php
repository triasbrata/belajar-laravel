@inject('role', 'App\Role')
<div class="form-group">
	{!! Form::label("title","Label Role",['class'=>'control-label'])!!}
    {!! Form::text('title',null,['placeholder'=>'Label Role','class'=>'form-control','id'=>'title']) !!}                    
</div>