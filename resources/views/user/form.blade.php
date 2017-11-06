@inject('role', 'App\Role')
<div class="form-group" id="form-name">
	{!! Form::label("name","Name User",['class'=>'control-label'])!!}
    {!! Form::text('name',null,['placeholder'=>'Name User','class'=>'form-control','id'=>'name']) !!}                    
</div>
<div class="form-group" id="form-email">
	{!! Form::label("email","Email User",['class'=>'control-label'])!!}
	{!! Form::text('email',null,['placeholder'=>'Email User','class'=>'form-control','id'=>'email']) !!}                    
</div>
<div class="form-group" id="form-password">
	{!! Form::label("password","Password",['class'=>'control-label'])!!}
    {!! Form::password('password',['placeholder'=>'Password','class'=>'form-control','id'=>'password']) !!}                    
</div>
<div class="form-group">
	{!! Form::label("password_confirmation","Password Confirmed",['class'=>'control-label'])!!}
    {!! Form::password('password_confirmation',['placeholder'=>'Password Confirmed','class'=>'form-control','id'=>'password_confirmation']) !!}
</div>
<div class="form-group" id="form-role_id">
	{!! Form::label("role_id","Role",['class'=>'control-label'])!!}
    {!! Form::select('role_id',$role->pluck('title','id'),['placeholder'=>'Password Confirmed','class'=>'form-control','id'=>'role']) !!}
</div>

@push('javascript')
<script type="text/javascript">
	function submitForm(event) {
		event.stopPropagation();
		event.preventDefault();

		var form = $('#form-user'),
			urlForm = form.attr('action'),
			method  = form.find('input[name="_method"]').length > 0 ? 'update' : 'store';
			console.log("tes");
			$.ajax({
				url:urlForm,
				method:'POST',
				data:form.serialize(),
				success:function (data) {
					if(data.type === 'success'){
						alert(data.message)
						// if(confirm(data.message)){
							window.location.href = data.url;
						// }
					}else if (data.type === 'error'){
						alert(data.message);
					}
				},
				error:function (data) {
					//netralisir form dari error
					var form_all = $('div[id^="form-"]');
					form_all.find('span.help-block').remove();
					form_all.removeClass('has-error');

					//parse error dari server ke json
					jsonErrors = JSON.parse(data.responseText);

					//featch error dari server
					$.each(jsonErrors,function (field,errors) {

						//cari field yang error
						var element = $('#form-'+field);
						//tambahkan class error
						element.addClass('has-error');
						//featch semua error dalam 1 field
						
						$.each(errors,function (i,error) {

							// tampilkan pesan error dari server didalam div per field
							var message = $('<span>',{class:'help-block'}).text(error)
							element.append(message);
						});
					});
				}

			});
	}
	$(document).on('click','.submit',submitForm);
	$(document).on('submit','#form-user',submitForm);
</script>	
@endpush