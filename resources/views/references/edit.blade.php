@extends('templates.template')

@section('content')
<div class="container stand-page">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<div class="row">
					<div class="col-xs-4">
						<h4>{{ $reference->project_number }} {{ $reference->dfac_name != '' ? ' - '.$reference->dfac_name : '' }} {{ $reference->confidential == 1 ? '(Confidential)' : '' }}</h4>
					</div>
					<!-- Button toolbar -->
					<div class="col-xs-8">
						<div class="btn-toolbar btn-sm pull-right" role="toolbar" aria-label="...">
							<div id="toolbar" class="btn-group" role="group" aria-label="...">

								<!-- If user admin or dcom manager -->
								@if(Auth::user()->profile_id == 5 || Auth::user()->profile_id == 3)
									@if($reference->dcom_approval == 0)
										<a class="btn btn-default btn-sm" href="{{ action('ReferenceController@approve', $reference->id) }}">
											<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Approve
										</a>
									@else
										<a class="btn btn-default btn-sm" href="{{ action('ReferenceController@disapprove', $reference->id) }}">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Disapprove
										</a>
									@endif
								@endif
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span class="caret"></span>
									<!-- Extract -->
									</button>
									<ul class="dropdown-menu">
										<li class="dropdown-header">WB</li>
										<li><a href="{{ action('ReferenceController@generate_file_base', ['Template_world_bank', 'wb', $reference->id]) }}">
											WB - EN
										</a></li>
										<li><a href="{{ action('ReferenceController@generate_file_base', ['Template_world_bank_fr', 'wb_fr', $reference->id]) }}">
											WB - FR
										</a></li>
										<li class="dropdown-header">EURO</li>
										<li><a href="{{ action('ReferenceController@generate_file_base', ['Template_euro', 'euro', $reference->id]) }}">
											EURO - EN
										</a></li>
										<li><a href="{{ action('ReferenceController@generate_file_base', ['Template_euro_fr', 'euro_fr', $reference->id]) }}">
											EURO - FR
										</a></li>
										@if ($linked_languages->count() > 0)
											<li class="dropdown-header">OTHER</li>
											@foreach ($linked_languages as $language)
												@if(in_array($language->name, $languages_with_template))
													<li class="translation"><a href="{{ action('ReferenceController@generate_file_translations', [$reference->id, $language->id]) }}">
														{{ $language->name }}
													</a></li>
												@endif
											@endforeach
										@endif
									</ul>
								</div>
								<button id="save_btn" form="form_save" type="submit" class="btn btn-default btn-sm">
									<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
								</button>
								<button id="base_btn" type="button" class="btn btn-default btn-sm" aria-label="Left Align" data-toggle="tab" href="#base_menu">
								  <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Base
								</button>
								<!-- <a data-toggle="tab" href="#description_menu" class="btn btn-default btn-sm">
									<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Base
								</a> -->
								@if($linked_languages->count() > 0)
									<button id="language_btn" type="button" class="btn btn-default btn-sm" aria-label="Left Align" data-toggle="tab" href="#language_menu">
								@else
									<button id="language_btn" type="button" class="btn btn-default btn-sm" aria-label="Left Align" data-toggle="tab">
								@endif
								  <i class="fa fa-language" aria-hidden="true"></i> {{ $linked_languages->count() < 1 ? 'Add translation' : 'Translations ('.$linked_languages->count().')' }}
								</button>
								<button id='btn_language_selector' type="button" class="btn btn-default btn-sm hidden">
								  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								</button>
								<button id="btn_delete" form="form_delete" type="submit" class="btn btn-default btn-sm">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</button>
								@if(Auth::user()->profile_id == 3)
									<a class="btn btn-default btn-sm" href="{{ action('ReferenceController@index') }}">
										<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
									</a>
								@endif

							</div>
						</div>
					</div>
				</div>
			</h3>
		</div>
		<div class="panel-body">
			@include('errors.validation')
  			@include('messages.messages')
  			@include('messages.update')

			<form id="form_delete" role="form" method="POST" action="{{ action('ReferenceController@destroy', $reference->id) }}">
				<?php echo method_field('DELETE'); ?>
			    <?php echo csrf_field(); ?>
			</form>

			<form id="form_add_translation" role="form" method="POST" action="{{ action('ReferenceController@link_translation', $reference->id) }}">
			    <?php echo csrf_field(); ?>
			    @include("references.create.english.modals.select_language_modal")
			</form>

			<form id="form_save" class="form-horizontal" role="form" method="POST" action="{{ action('ReferenceController@update', $reference->id) }}">
				{{ method_field('PUT') }}
				<?php echo csrf_field(); ?>

				<!-- Menu content -->
				<div class="tab-content col-sm-12">
					<!-- Base menu content -->
					<div id="base_menu" class="tab-pane fade in active">
						@include("references.edit.layout")
					</div>
					<!-- /#base menu content -->
					<div id="language_menu" class="tab-pane fade">
						@include("references.edit.lang_layout")
					</div>
				</div>
				<!-- /#menu content -->
			</form>

		</div>
	</div>
	<div class="container">
		<form id="form_upload" class="form-horizontal hidden" role="form" method="POST" action="{{ action('ReferenceController@upload_file', $reference->id) }}" enctype="multipart/form-data">
			<?php echo csrf_field(); ?>
			<label for="import_input">Import file</label>
			<input type="file" id="import_input" name="file" accept="*">
			<p class="help-block">Import your file here.</p>
			<input id="upload_btn" class="btn btn-default" type="submit" value="Submit">
		</form>
	</div>

	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Uploading</h4>
	      </div>
	      <div class="modal-body">
	        <div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 0%;">
					<div class="percent">0%</div>
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button id="upload_modal_cancel" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<form id="form_delete_file" class="form-horizontal hidden" role="form" method="POST" action="{{ action('ReferenceController@delete_file', $reference->id)  }}">
		<?php echo csrf_field(); ?>
		<input id="file_input_delete" type="text" name="file" value="">
	</form>

	<form id="form_download" class="form-horizontal hidden" role="form" method="POST" action="{{ action('ReferenceController@download_file', $reference->id)  }}">
		<?php echo csrf_field(); ?>
		<input id="file_input_download" type="text" name="file" value="">
	</form>
</div>



<script>
	var linked_languages = {!! $linked_languages->toJson() !!};
	var countries = {!! $countries->toJson() !!};
	var zones = {!! $zones->toJson() !!};
	var seniors = {!! $seniors->toJson() !!};
	var experts = {!! $experts->toJson() !!};
	var selected_external_services = {!! $reference->external_services !!};
	var selected_internal_services = {!! $reference->internal_services !!};
	var country_zone = {!! $country_zone->toJson() !!};
	var zone_managers = {!! $zone_managers->toJson() !!};

	var domains = {!! $domains->toJson() !!};
	var expertises = {!! $expertises->toJson() !!};
	var selected_expertises = {!! $reference->expertises !!};

	var fundings_in_db = {!! $fundings->toJson() !!}
	var involved_staff_db = {!! $seniors->toJson() !!}
	var experts_db = {!! $exps->toJson() !!}
	var consultants_db = {!! $consults->toJson() !!}
	var senior_profiles = {!! $senior_profiles->toJson() !!}
	var expert_profiles = {!! $expert_profiles->toJson() !!}
	var contacts = {!! $contacts->toJson() !!}
	var clients = {!! $clients->toJson() !!}
	var linked_fundings = {!! $financings->toJson() !!}

	var language_reference = {!! $language_reference->toJson() !!}
	var reference = {!! $reference->toJson() !!}

	var categories = {!! $categories->toJson() !!};
	var measures = {!! $measures_values->toJson() !!};
	var qualifiers = {!! $qualifiers_values->toJson() !!};

	// $(function(){
	//   var hash = window.location.hash;
	//   hash && $('ul.nav a[href="' + hash + '"]').tab('show');

	//   $('.nav-tabs a').click(function (e) {
	//     $(this).tab('show');
	//     var scrollmem = $('body').scrollTop() || $('html').scrollTop();
	//     window.location.hash = this.hash;
	//     $('html,body').scrollTop(scrollmem);
	//   });
	// });

	var bar = $('.progress-bar');
	var percent = $('.percent');

	$('#form_upload').ajaxForm({
	    beforeSend: function(event) {
	        var percentVal = '0%';
	        bar.width(percentVal);
	        percent.html(percentVal);
	        $('#upload_modal_cancel').click(event.abort);
	    },
	    uploadProgress: function(event, position, total, percentComplete) {
	        var percentVal = percentComplete + '%';
	        bar.width(percentVal);
	        percent.html(percentVal);
	    },
	    success: function() {
	        var percentVal = '100%';
	        bar.width(percentVal);
	        percent.html(percentVal);
	        $('#myModal').modal('hide');
	        alert('Upload succeed !');
	    },
	    error: function(event) {
	    	if ($('#upload_modal_cancel').hasClass('canceled') == false) {
				event.abort;
				$('#myModal').modal('hide');
				$('#upload_modal_cancel').addClass('canceled');
				alert('An error occured. Please, try again.');
			}
	    },
		complete: function(xhr) {
			if ($('#upload_modal_cancel').hasClass('canceled') == false) {
				location.reload();
			}
			$('#upload_modal_cancel').removeClass('canceled');
		}
	});
</script>
<script type="text/javascript" src="/js/ref-edit-scripts.js"></script>

@endsection
