@extends('templates.template')

@section('content')

	<div class="container stand-page">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<div class="row">
							<div class="col-sm-6">
								New Manager	
							</div>
							<div class="col-sm-6">
								<div class="btn-group pull-right" role="group" aria-label="...">
								  <button form="form_save" type="submit" class="btn btn-default btn-sm">
								  	<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
								  </button>
								  <button form="form_back" type="submit" class="btn btn-default btn-sm">
								  	<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
								  </button>
								</div>
							</div>
						</div>
					</h3>
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

					<form id="form_back" action="{{ action('ZoneController@edit', [$subsidiary_id, $zone_id]) }}" method="GET">
					</form>

					<form id="form_save" class="form-horizontal" role="form" method="POST" action="{{ action('ContributorController@store', [$subsidiary_id, $zone_id]) }}">
						<?php echo csrf_field(); ?>

						<div class="form-group">
							<label for="manager" class="col-sm-4 control-label">Manager</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="manager" name="name" value="{{ old('name') }}">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
