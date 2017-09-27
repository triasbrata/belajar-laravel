<div class="form-group">
	{!! Form::label("title","Title",['class'=>'control-label'])!!}
    {!! Form::text('title',null,['placeholder'=>'Title','class'=>'form-control','id'=>'title']) !!}                    
</div>
<div class="form-group">
	{!! Form::label("slug","Slug",['class'=>'control-label'])!!}
	{!! Form::text('slug',null,['placeholder'=>'Slug','class'=>'form-control','id'=>'slug']) !!}                    
</div>
<div class="form-group">
	{!! Form::label("content","Password",['class'=>'control-label'])!!}
    {!! Form::textarea('content',null,['placeholder'=>'Password','class'=>'form-control','id'=>'content']) !!}                    
</div>
<div class="form-group">
	{!! Form::label("image","Image",['class'=>'control-label'])!!}
    {!! Form::file('image',['placeholder'=>'Password Confirmed','class'=>'form-control','id'=>'image']) !!}
</div>