@extends('templates.template')

@section('content')

	<div class="container stand-page">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<div class="row">
							<div class="col-sm-6">{{ $internal_service->name }}</div>
							<div class="col-sm-6">
								<form action="{{ action('ServiceController@internal_destroy', [$subsidiary->id, $internal_service->id]) }}" method="POST">
								    <?php echo method_field('DELETE'); ?>
								    <?php echo csrf_field(); ?>
								    <button type="submit" id="remove_btn" class="btn btn-danger btn-xs pull-right">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button>
								    <input type="hidden" name="hidden_field" value="{{ $internal_service->id}}">
								</form>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ action('ServiceController@internal_update', [$subsidiary->id, $internal_service->id]) }}">
						<?php echo method_field('PUT'); ?>
					    <?php echo csrf_field(); ?>

						<div class="form-group">
							<label class="col-md-4 control-label">Service Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{$internal_service->name}}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary btn-sm">
									<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Update
								</button>
								<a class="btn btn-primary btn-sm" href="{{ action('ServiceController@subsidiary_internal_services', $subsidiary->id) }}" role="button">	<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Back
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
	</div>
	<script>
		$('#remove_btn').click( function(e) {
			var confirm_box = confirm("Are you sure ?");
			if (confirm_box == false) {
				e.preventDefault();
			}
		});
	</script>
@endsection
