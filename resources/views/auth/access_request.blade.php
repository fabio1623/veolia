@extends('templates.template')

@section('content')

	<div class="container stand-page">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><img alt="Brand" src="{{ asset('/img/veolia_logo.png') }}"> Ask your access</h3>
				</div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

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

					<form class="form-horizontal" role="form" method="POST" action="{{ action('AccessController@store') }}">
						<?php echo csrf_field(); ?>

						<div class="form-group">
							<label class="col-sm-4 control-label">E-Mail Address</label>
							<div class="col-sm-4">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">Company</label>
							<div class="col-sm-4">
								<select class="form-control selectpicker" data-width="100%" data-live-search="true" name="company">
									<option></option>
									@foreach ($subsidiaries as $subsidiary)
										<option value="{{ $subsidiary->id }}">{{ $subsidiary->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-4">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-send" aria-hidden="true"></span> Send
								</button>
								<a class="btn btn-primary" href="{{ URL('/auth/login') }}" role="button">
							    	<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Back
							    </a>
							</div>
						</div>
					</form>
				</div>
		</div>
	</div>
@endsection
