<!-- Line -->
<div class="form-group required">
	<label for="project_number" class="col-sm-4 control-label">Project number</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control" id="project_number" name="project_number" value="{{ $reference->project_number }}">
	</div>
	<div class="checkbox col-sm-2">
		<label>
			@if($reference->confidential == 1)
				<input id="confidential_check" name="confidential" type="checkbox" checked> <b>Confidential</b>
			@else
				<input id="confidential_check" name="confidential" type="checkbox"> <b>Confidential</b>
			@endif
		</label>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="dfac_name" class="col-sm-4 control-label">Name of DFAC project</label>
	<div class="col-sm-4">
	  <input type="text" class="form-control" id="dfac_name" name="dfac_name" value="{{ $reference->dfac_name }}">
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="country" class="col-sm-4 control-label">Country</label>
	<div class="col-sm-4">
	    <select class="form-control selectpicker" data-width="100%" data-live-search="true" id="country" name="country" data-size="5">
	    	<option></option>
	    	@foreach($countries as $country)
	    		@if($country->id == $reference->country)
	    			<option value="{{ $country->id }}" selected>{{$country->name}}</option>
    			@else
    				<option value="{{ $country->id }}">{{$country->name}}</option>
	    		@endif
	    	@endforeach
		</select>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="continent" class="col-sm-4 control-label">Continent</label>
	<div class="col-sm-4">
	  	<input type="text" class="form-control" id="continent" readonly>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="zone" class="col-sm-4 control-label">Zone</label>
	<div class="col-sm-4">
	  	<select class="form-control selectpicker" data-width="100%" id="zone" name="zone" data-size="5">
	  		<option></option>
			@foreach($zones as $zone)
				@if ($zone->id == $reference->zone)
					<option value="{{ $zone->id }}" selected>{{$zone->name}}</option>
				@else
					<option value="{{ $zone->id }}">{{$zone->name}}</option>
				@endif
			@endforeach
  		</select>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="zone_manager" class="col-sm-4 control-label">Zone manager</label>
	<div class="col-sm-4">
	  	<input type="text" class="form-control" id="zone_manager" name="zone_manager" value="" readonly>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="location" class="col-sm-4 control-label">Location</label>
	<div class="col-sm-4">
	  	<input type="text" class="form-control" id="location_name" name="location" value="{{ $reference->location }}">
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group required">
	<label for="start_date" class="col-sm-4 control-label">Project start</label>
	<div class="col-sm-3">
	    <div id="date_picker_start" class="input-group input-append date">
	      <input type="text" class="form-control" id="start_date" name="start_date" value="{{ $reference->start_date }}" readonly>
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">
	        	<span class="glyphicon glyphicon glyphicon-calendar" aria-hidden="true"></span>
	        </button>
	      </span>
	    </div>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group required">
	<label for="end_date" class="col-sm-4 control-label">Project end</label>
	<div class="col-sm-3">
	    <div id="date_picker_end" class="input-group input_append date">
	      <input type="text" class="form-control" id="end_date" name="end_date" value="{{ $reference->end_date }}" readonly>
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">
	        	<span class="glyphicon glyphicon glyphicon-calendar" aria-hidden="true"></span>
	        </button>
	      </span>
	    </div>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="estimated_duration" class="col-sm-4 control-label">Estimated duration</label>
	<div class="col-sm-3">
		<div class="input-group">
		  <input type="text" class="form-control" id="estimated_duration" name="estimated_duration" value="{{ $reference->estimated_duration }}">
		  <span class="input-group-addon" id="basic-addon2">Months</span>
		</div>
	</div>
</div>
<!-- EO line -->

<!-- List of external services -->
<!-- Line -->
<div class="form-group" id="external_div">
	<hr>
	<label class="col-sm-4 control-label"><i class="fa fa-refresh" aria-hidden="true"></i> Type of services (External market)</label>
	@foreach($external_services as $service)
			@if($service->parent_service_id != "")
				<div class="checkbox col-sm-7 col-sm-offset-5">
			@else
				<div class="checkbox col-sm-8 col-sm-offset-4">
			@endif
			  <label>
			    <input type="checkbox" id="external-{{$service->id}}" name="external[{{ $service->id }}]"><b> {{$service->name}} </b>
			  </label>
			</div>
	@endforeach
</div>
<!-- EO line -->

<!-- Line -->
<!-- <div class="form-group">
	<div class="checkbox col-sm-8 col-sm-offset-4">
	  <label>
	    <input id="internal_checkbox" name="internal_check" type="checkbox"><b> Veolia's tenders (Internal Market only) ?</b>
	  </label>
	</div>
</div> -->
<!-- EO line -->

<!-- List of internal services -->
<!-- Line -->
<!-- <div class="form-group hidden" id="internal_div"> -->
	<hr>
	<label class="col-sm-4 control-label"><i class="fa fa-recycle" aria-hidden="true"></i> Veolia's contract type (Internal market only)</label>
	@foreach($internal_services as $service)
		@if($service->parent_service_id != "")
			<div class="checkbox col-sm-7 col-sm-offset-5">
		@else
			<div class="checkbox col-sm-8 col-sm-offset-4">
		@endif
		  <label>
		    <input type="checkbox" id="internal-{{ $service->id }}" name="internal[{{ $service->id }}]"><b> {{$service->name}} </b>
		  </label>
		</div>
	@endforeach
<!-- </div> -->
<!-- EO line -->
