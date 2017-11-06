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
<div class="form-group">
	{!! Form::label("parent_id","Parent Label",['class'=>'control-label'])!!}
    {!! Form::select('parent_id',$parent_tags,isset($parent_id) ? $parent_id : null,['class'=>'form-control','id'=>'parent_id','data-url'=> route('get_label')]) !!}
</div>
<div class="form-group">
	{!! Form::label("tag_id","Label",['class'=>'control-label'])!!}
    {!! Form::select('tag_id',isset($tags) ? $tags : [],null,['class'=>'form-control','id'=>'tag_id']) !!}
</div>

@push('javascript')
	<script type="text/javascript">

		$(document).on('change','select#parent_id',function () {
			var element = $(this),
				val = element.val();
			$.ajax({
				'url': element.data('url'),
				'method' : 'GET',
				'dataType' : 'json',
				'data' : {'parent_id':val},
				'success':function (data) {
					var option = $('<option>',{'class':'option-ajax'}),
						target = $('select#tag_id');
						target.find('.option-ajax').remove();
					$.each(data,function (index,value) {
						option.clone().attr('value',index).text(value).appendTo(target);
					});
				}
			});
		})
	</script>
@endpush