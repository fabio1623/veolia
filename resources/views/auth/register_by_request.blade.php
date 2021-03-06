@extends('templates.template')

@section('content')

	<div class="container stand-page">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">New Account</h3>
				</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ action('UserController@store_by_request') }}">
						<?php echo csrf_field(); ?>

						<div class="form-group hidden">
							<label class="col-sm-4 control-label">Username</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="firstName" name="username" value="{{ $username }}" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">E-Mail Address</label>
							<div class="col-sm-6">
								<input type="email" class="form-control" name="email" value="{{ $request->email }}" readonly>
							</div>
						</div>

						<div class="form-group hidden">
							<label class="col-sm-4 control-label">Password</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" name="password" value="{{ $default_password }}" readonly>
							</div>
						</div>

						<div class="form-group">
							<label for="subsidiary" class="col-sm-4 control-label">Subsidiary</label>
							<div class="col-sm-6">
								<select class="form-control selectpicker" id="subsidiary" name="subsidiary">
									<option></option>
									@foreach ($subsidiaries as $subsidiary)
										@if(strtolower($subsidiary->id) == $request->subsidiary_id)
											<option value="{{ $subsidiary->id }}" selected>{{ $subsidiary->name }}</option>
										@else
											<option value="{{ $subsidiary->id }}">{{ $subsidiary->name }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group">
						  	<label for="profile_type" class="col-sm-4 control-label">Profile</label>
						  	<div class="col-sm-6">
							  	<select class="form-control selectpicker" id="profile_type" name="profile">
							  		<option></option>
							  		@foreach ($profiles as $profile)
							  			<option value="{{ $profile->id }}">{{ $profile->name }}</option>	
							  		@endforeach
							  	</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-4">
								<button type="submit" class="btn btn-primary btn-sm">
									<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Create
								</button>
								<a class="btn btn-primary btn-sm" href="{{ URL::previous() }}" role="button">	<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Back
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
	</div>
<script>
	$('#firstName').bind('keypress keyup blur', function() {
		if($('#lastName').val() != ""){
    		$('#user_name').val($(this).val() + "." + $('#lastName').val());	
    	}
    	else{
    		$('#user_name').val($(this).val());	
    	}
	});
	$('#lastName').bind('keypress keyup blur', function() {
		if($('#firstName').val() != ""){
    		$('#user_name').val($('#firstName').val() + "." + $(this).val());
    	}
    	else{
    		$('#user_name').val($(this).val());		
    	}
	});
</script>
@endsection
