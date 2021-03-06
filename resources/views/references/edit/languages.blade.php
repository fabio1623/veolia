<!-- Line -->
<div class="form-group">
	<h4><span class="label label-default col-sm-2 col-sm-offset-2"><i class="fa fa-briefcase" aria-hidden="true"></i> Project</span></h4>
	<div class="col-sm-8">
		<a class="btn btn-sm btn-default pull-right remove_translation_btn" href="{{ action('ReferenceController@detach_translation', [$reference->id, $linked_languages[$i]->id]) }}">
			<i class="fa fa-trash" aria-hidden="true"></i> Remove translation
		</a>
	</div>
</div>
<div class="form-group">
	<label for="project_name_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Name</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control" id="project_name_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][project_name]" value="{{ $language_reference[$i]->project_name }}">
	</div>
</div>

<!-- Line -->
<div class="form-group">
	<label for="detailed_project_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Description</label>
	<div class="col-sm-4">
	  	<textarea class="form-control" rows="10" id="detailed_project_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][project_description]">{{ $language_reference[$i]->project_description }}</textarea>
	</div>
</div>
<!-- EO line -->
<hr>
<!-- Line -->
<div class="form-group">
	<h4><span class="label label-default col-sm-2 col-sm-offset-2"><i class="fa fa-refresh" aria-hidden="true"></i> Services</span></h4>
</div>
<div class="form-group">
	<label for="project_title_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Title</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control" id="project_title_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][service_title]" value="{{ $language_reference[$i]->service_name }}">
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="detailed_service_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Description</label>
	<div class="col-sm-4">
	  	<textarea class="form-control" rows="10" id="detailed_service_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][service_description]">{{ $language_reference[$i]->service_description }}</textarea>
	</div>
</div>
<!-- EO line -->
<hr>
<div class="form-group">
	<h4><span class="label label-default col-sm-2 col-sm-offset-2"><i class="fa fa-map-marker" aria-hidden="true"></i> Location</span></h4>
</div>
<div class="form-group">
	<!-- <label for="country_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Country</label> -->
	<div class="col-sm-4 col-sm-offset-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon2">
				<span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
				Country
			</span>
	  		<input type="text" class="form-control" id="country_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][country]" value="{{ $language_reference[$i]->country }}">
  		</div>
	</div>
</div>

<div class="form-group">
	<!-- <label for="location_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Location</label> -->
	<div class="col-sm-4 col-sm-offset-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon2">
				<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
				Address
			</span>
	  		<input type="text" class="form-control" id="location_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][location]" value="{{ $language_reference[$i]->location }}">
  		</div>
	</div>
</div>
<hr>
<div class="form-group">
	<h4><span class="label label-default col-sm-2 col-sm-offset-2"><i class="fa fa-users" aria-hidden="true"></i> Staff</span></h4>
</div>
<div class="form-group">
	<label for="staff_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Staff</label>
	<div class="col-sm-4">
	  	<textarea class="form-control" rows="5" id="staff_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][staff]">{{ $language_reference[$i]->staff }}</textarea>
	</div>
</div>

<div class="form-group">
	<label for="consultants_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Consultants</label>
	<div class="col-sm-4">
	  	<textarea class="form-control" rows="5" id="consultants_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][consultants]">{{ $language_reference[$i]->consultants }}</textarea>
	</div>
</div>

<div class="form-group">
	<label for="experts_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Experts</label>
	<div class="col-sm-4">
		<textarea class="form-control" rows="5" id="experts_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][experts]">{{ $language_reference[$i]->experts }}</textarea>
		<!-- <input type="text" class="form-control" id="experts_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][experts]" value="{{ $language_reference[$i]->experts }}"> -->
	</div>
</div>
<!-- EO line -->
<div id="contact_info">
	<hr>
	<div class="form-group">
		<h4><span class="label label-default col-sm-2 col-sm-offset-2">Contact information</span></h4>
	</div>
	<!-- Line -->
	<div class="form-group">
		<!-- <label for="contact_name_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Name</label> -->
		<div class="col-sm-4 col-sm-offset-4">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon2">
					Name
				</span>
		  		<input type="text" class="form-control" id="contact_name_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][contact_name]" value="{{ $language_reference[$i]->contact_name }}">
	  		</div>
		</div>
	</div>
	<!-- EO line -->
	<!-- Line -->
	<div class="form-group">
		<!-- <label for="contact_department_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Department</label> -->
		<div class="col-sm-4 col-sm-offset-4">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon2">
					Department
				</span>
		  		<input type="text" class="form-control" id="contact_department_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][contact_department]" value="{{ $language_reference[$i]->contact_department }}">
	  		</div>
		</div>
	</div>
	<!-- EO line -->
	<!-- Line -->
	<div class="form-group">
		<!-- <label for="contact_email_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Email</label> -->
		<div class="col-sm-4 col-sm-offset-4">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon2">
					Email
				</span>
		  		<input type="email" class="form-control" id="contact_email_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][contact_email]" value="{{ $language_reference[$i]->contact_email }}">
	  		</div>
		</div>
	</div>
	<!-- EO line -->
	<hr>
</div>

<!-- Line -->
<div class="form-group">
	<h4><span class="label label-default col-sm-2 col-sm-offset-2"><i class="fa fa-blind" aria-hidden="true"></i> Client</span></h4>
</div>
<div class="form-group">
	<!-- <label for="client_name_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Name of the client</label> -->
	<div class="col-sm-4 col-sm-offset-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon2">
				<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
				Name
			</span>
	  		<input type="text" class="form-control" id="client_name_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][customer_name]" value="{{ $language_reference[$i]->client }}">
  		</div>
	</div>
</div>

<div class="form-group">
	<!-- <label for="client_address_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Address of the client</label> -->
	<div class="col-sm-4 col-sm-offset-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon2">
				<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
				Address
			</span>
	  		<input type="text" class="form-control" id="client_address_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][customer_address]" value="{{ $language_reference[$i]->customer_address }}">
  		</div>
	</div>
</div>
<!-- EO line -->
<hr>
<!-- Line -->
<div class="form-group">
	<h4><span class="label label-default col-sm-2 col-sm-offset-2"><i class="fa fa-money" aria-hidden="true"></i> Fundings</span></h4>
</div>
<div class="form-group">
	<!-- <label for="financing_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">Financing</label> -->
	<div class="col-sm-4 col-sm-offset-4">
		<textarea class="form-control" rows="5" id="financing_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][funding]">{{ $language_reference[$i]->financing }}</textarea>
	  <!-- <input type="text" class="form-control" id="financing_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][funding]" value="{{ $language_reference[$i]->financing }}"> -->
	</div>
</div>
<!-- EO line -->
<hr>
<!-- Line -->
<div class="form-group">
	<h4><span class="label label-default col-sm-2 col-sm-offset-2">General comments</span></h4>
</div>
<div class="form-group">
	<!-- <label for="general_comments_{{ strtolower($linked_languages[$i]->name)}}" class="col-sm-4 control-label">General comments / Key words</label> -->
	<div class="col-sm-4 col-sm-offset-4">
	  	<textarea class="form-control" rows="3" id="general_comments_{{ strtolower($linked_languages[$i]->name)}}" name="linked_languages[{{ $linked_languages[$i]->name }}][comments]">{{ $language_reference[$i]->general_comments }}</textarea>
	</div>
</div>