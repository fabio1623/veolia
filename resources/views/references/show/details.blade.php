<div class="form-group">
	<span class="label label-default col-sm-2 col-sm-offset-5">English</span>
	<span class="label label-default col-sm-2 col-sm-offset-2">French</span>
</div>
<!-- Line -->
<div class="form-group">
	<label for="project_name" class="col-sm-4 control-label">Name of the project</label>
	<div class="col-sm-4">
	  <!-- <input type="text" class="form-control" id="project_name" value="{{ $reference->project_name }}" disabled> -->
	  <p class="form-control-static">{{ $reference->project_name }}</p>
	</div>
	<div class="col-sm-4">
	  <!-- <input type="text" class="form-control" id="project_name_fr" value="{{ $reference->project_name_fr }}" disabled> -->
	  <p class="form-control-static">{{ $reference->project_name_fr }}</p>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="detailed_project" class="col-sm-4 control-label">Detailed description of project</label>
	<div class="col-sm-4">
	  <!-- <textarea class="form-control" rows="5" id="detailed_project" readonly>{{ $reference->project_description }}</textarea> -->
	  <p class="form-control-static">{{ $reference->project_description }}</p>
	</div>
	<div class="col-sm-4">
	  <!-- <textarea class="form-control" rows="5" id="detailed_project_fr" readonly>{{ $reference->project_description_fr }}</textarea> -->
	  <p class="form-control-static">{{ $reference->project_description_fr }}</p>
	</div>
</div>

<hr>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="service_name" class="col-sm-4 control-label">Title of services provided by Seureca</label>
	<div class="col-sm-4">
	  <!-- <input type="text" class="form-control" id="service_name" value="{{ $reference->service_name }}" disabled> -->
	  <p class="form-control-static">{{ $reference->service_name }}</p>
	</div>
	<div class="col-sm-4">
	  <!-- <input type="text" class="form-control" id="service_name_fr" value="{{ $reference->service_name_fr }}" disabled> -->
	  <p class="form-control-static">{{ $reference->service_name_fr }}</p>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="detailed_service" class="col-sm-4 control-label">Detailed description of service</label>
	<div class="col-sm-4">
	  <!-- <textarea class="form-control" rows="5" id="detailed_service" readonly>{{ $reference->service_description }}</textarea> -->
	  <p class="form-control-static">{{ $reference->service_description }}</p>
	</div>
	<div class="col-sm-4">
	  <!-- <textarea class="form-control" rows="5" id="detailed_service_fr" readonly>{{ $reference->service_description_fr }}</textarea> -->
	  <p class="form-control-static">{{ $reference->service_description_fr }}</p>
	</div>
</div>
<!-- EO line -->
<hr>
<!-- Line -->
<div class="form-group">
	<label class="col-sm-4 control-label"><i class="fa fa-users" aria-hidden="true"></i> Senior staff</label>
</div>
@if (count($staff_involved) > 0)

	@for ($i=0; $i < count($staff_involved); $i++)
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<table class="table table-bordered table-condensed">
				<tbody>
					<tr>
						<td class="col-sm-2">
							<em>Name</em>
						</td>
						<td colspan="2" class="col-sm-10">
							{{ with($c=$staff_involved[$i]->contributor()->first()) ? $c->name : null }}
						</td>
					</tr>
					<tr>
						<td class="col-sm-2">
							<em>Responsabilities</em>
						</td>
						<td class="col-sm-5">
							{{ $staff_involved[$i]->responsability_on_project }}
						</td>
						<td class="col-sm-5">
							{{ $staff_involved[$i]->responsability_on_project_fr }}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	@endfor

@else
	<div class="form-group">
		<div class="col-sm-8 col-sm-offset-4">
			<div class="input-group">
				<p class="form-control-static"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> No senior staff</p>
			</div>
		</div>
	</div>
@endif

<hr>
<!-- Line -->
<div class="form-group">
	<label class="col-sm-4 control-label"><i class="fa fa-users" aria-hidden="true"></i> Staff provided</label>
</div>
@if (count($experts) > 0)
	@for ($i=0; $i < count($experts); $i++)
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<table class="table table-bordered table-condensed">
				<tbody>
					<tr>
						<td class="col-sm-2">
							<em>Name</em>
						</td>
						<td colspan="2" class="col-sm-10">
							{{ with($e=$experts[$i]->contributor()->first()) ? $e->name : null }}
						</td>
					</tr>
					<tr>
						<td class="col-sm-2">
							<em>Profile</em>
						</td>
						<td class="col-sm-5">
							{{ $experts[$i]['responsability_on_project'] }}
						</td>
						<td class="col-sm-5">
							{{ $experts[$i]['responsability_on_project_fr'] }}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	@endfor
@else
	<div class="form-group">
		<div class="col-sm-8 col-sm-offset-4">
			<div class="input-group">
				<p class="form-control-static"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> No staff provided</p>
			</div>
		</div>
	</div>
@endif
<!-- EO line -->
<hr>
<!-- Line -->
<div class="form-group">
	<label for="staff_number" class="col-sm-4 control-label">Total number of staff</label>
	<div class="col-sm-2">
		<p class="form-control-static">
			@if ($reference->staff_number)
				{{ $reference->staff_number }} persons
			@endif
		</p>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="seureca_man_months" class="col-sm-4 control-label">Total number man/months (Seureca)</label>
	<div class="col-sm-3">
		<div class="input-group">
			<p class="form-control-static">
				@if ($reference->seureca_man_months)
					{{ $reference->seureca_man_months }} man/months
				@endif
			</p>
		</div>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="consultants_man_months" class="col-sm-4 control-label">Total number man/months (Partners)</label>
	<div class="col-sm-3">
	    <div class="input-group">
		  <!-- <input type="text" class="form-control" id="consultants_man_months" aria-describedby="basic-addon2" value="{{ $reference->consultants_man_months }}" disabled>
		  <span class="input-group-addon" id="basic-addon2">man/months</span> -->
			<p class="form-control-static">
				@if ($reference->consultants_man_months)
					{{ $reference->consultants_man_months }} man/months
				@endif
			</p>
		</div>
	  </div>
</div>
<!-- EO line -->
<hr>
<!-- Line -->
<div class="form-group">
	<label class="col-sm-4 control-label"><i class="fa fa-users" aria-hidden="true"></i> Partners</label>
</div>
@if (count($consultants) > 0)
	@for ($i=0; $i < count($consultants); $i++)
		<div class="form-group">
			<label for="contact_name_en" class="col-sm-4 control-label">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			</label>
			<div class="col-sm-8">
				<div class="input-group">
					<p class="form-control-static">{{$consultants[$i]->name}}</p>
				</div>
			</div>
		</div>
	@endfor
@else
	<div class="form-group">
		<div class="col-sm-8 col-sm-offset-4">
			<div class="input-group">
				<p class="form-control-static"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> No partner</p>
			</div>
		</div>
	</div>
@endif
<!-- Line -->
<!-- EO line -->
@if ($contact)
	<hr>
	<div class="form-group">
		<label for="contact_name_en" class="col-sm-4 control-label">Contact information</label>
	</div>
	<!-- Line -->
	<div class="form-group">
		<label for="contact_name_en" class="col-sm-4 control-label">Name</label>
		<div class="col-sm-4">
		  <!-- <input type="text" class="form-control contact_name" id="contact_name_en" value="{{ $contact->name }}" disabled> -->
		  <p class="form-control-static">{{ $contact->name }}</p>
		</div>
	</div>
	<!-- EO line -->
	<!-- Line -->
	<div class="form-group">
		<label for="contact_department" class="col-sm-4 control-label">Department</label>
		<div class="col-sm-4">
		  <!-- <input type="text" class="form-control" id="contact_department" value="{{ $reference->contact_department }}" disabled> -->
		  <p class="form-control-static">{{ $reference->contact_department }}</p>
		</div>
		<div class="col-sm-4">
		  <!-- <input type="text" class="form-control" id="contact_department_fr" value="{{ $reference->contact_department_fr }}" disabled> -->
		  <p class="form-control-static">{{ $reference->contact_department_fr }}</p>
		</div>
	</div>
	<!-- EO line -->
	<!-- Line -->
	<div class="form-group">
		<label for="contact_phone_en" class="col-sm-4 control-label">Phone</label>
		<div class="col-sm-4">
		  <!-- <input type="text" class="form-control" id="contact_phone_en" value="{{ $reference->contact_phone }}" disabled> -->
		  <p class="form-control-static">{{ $reference->contact_phone }}</p>
		</div>
	</div>
	<!-- EO line -->
	<!-- Line -->
	<div class="form-group">
		<label for="contact_email_en" class="col-sm-4 control-label">Email</label>
		<div class="col-sm-4">
		  <!-- <input type="email" class="form-control" id="contact_email_en" value="{{ $reference->contact_email }}" disabled> -->
		  <p class="form-control-static">{{ $reference->contact_email }}</p>
		</div>
	</div>
	<!-- EO line -->
@endif
	<hr>

<!-- </div> -->
<!-- Line -->
<div class="form-group">
	<label class="col-sm-4 control-label"><i class="fa fa-blind" aria-hidden="true"></i> Client</label>
</div>
@if ($client != null)
	<div class="form-group">
		<!-- <label for="client_name" class="col-sm-4 control-label">Name of the client</label> -->
			<div class="col-sm-4 col-sm-offset-4">
				<p class="form-control-static"><strong><em>Name :</em></strong> {{ $client->name }}</p>
			</div>
			<div class="col-sm-4">
			  	<p class="form-control-static"><strong><em>Name :</em></strong> {{ $client->name_fr }}</p>
			</div>
	</div>
	<div class="form-group">
		<div class="col-sm-8 col-sm-offset-4">
		  	<p class="form-control-static"><strong><em>Address :</em></strong> {{ $client->address }}</p>
		</div>
	</div>
@else
	<div class="form-group">
		<div class="col-sm-4 col-sm-offset-4">
			<p class="form-control-static"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> No client</p>
		</div>
	</div>
@endif
<!-- EO line -->
<hr>
<!-- Line -->
<div class="form-group">
	<label class="col-sm-4 control-label"><i class="fa fa-money" aria-hidden="true"></i> Fundings</label>
</div>
@if( count( $financings ) > 0 )
	@for ($i = 0; $i < count( $financings ); $i++)
		<div class="form-group">
			<label for="client_name" class="col-sm-4 control-label">
				<span class="glyphicon glyphicon-random" aria-hidden="true"></span>
			</label>
			<div class="col-sm-4">
				<p class="form-control-static">{{ $financings[$i]->name }}</p>
			</div>
			<div class="col-sm-4">
			  	<p class="form-control-static">{{ $financings[$i]->name_fr }}</p>
			</div>
		</div>
	@endfor
@else
	<div class="form-group">
		<div class="col-sm-8 col-sm-offset-4">
			<div class="input-group">
				<p class="form-control-static"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> No funding</p>
			</div>
		</div>
	</div>
@endif

<!-- EO line -->
<!-- EO line -->
<hr>
<!-- Line -->
<div class="form-group">
	<label for="project_cost" class="col-sm-4 control-label">Total project cost</label>
	<div class="col-sm-2">
		<p class="form-control-static">
			@if ($reference->total_project_cost)
					{{ $reference->total_project_cost }}
					@if ($reference->currency == 'Dollars')
						M $
					@else
						M €
					@endif
			@else
				N/A
			@endif
		</p>
	</div>
	@if ($reference->currency != 'Euros')
		<label for="project_cost" class="col-sm-4 control-label">Contract rate (€)</label>
		<div class="col-sm-2">
			<p class="form-control-static">{{ $reference->rate }}</p>
		</div>
	@endif
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="services_cost" class="col-sm-4 control-label">Cost of services provided by Seureca</label>
	<div class="col-sm-2">
		<p class="form-control-static">
			@if ($reference->seureca_services_cost)
					{{ $reference->seureca_services_cost }}
					@if ($reference->currency == 'Dollars')
						M $
					@else
						M €
					@endif
			@else
				N/A
			@endif
		</p>
	</div>
</div>
<!-- EO line -->
<!-- Line -->
<div class="form-group">
	<label for="works_cost" class="col-sm-4 control-label">Works cost</label>
	<div class="col-sm-2">
		<p class="form-control-static">
			@if ($reference->work_cost)
				{{ $reference->work_cost }}
				@if ($reference->currency == 'Dollars')
					M $
				@else
					M €
				@endif
			@else
				N/A
			@endif
		</p>
	</div>
</div>
<!-- EO line -->
<div class="form-group">
	<label class="col-sm-4 control-label">Number of inhabitants</label>
	<div class="col-sm-2">
		<p class="form-control-static">
			@if ($reference->nb_inhabitants)
				{{ $reference->nb_inhabitants }} persons
			@else
				N/A
			@endif
		</p>
	</div>
</div>
<hr>
<!-- Line -->
<div class="form-group">
	<label for="general_comments" class="col-sm-4 control-label">General comments / Key words</label>
	<div class="col-sm-4">
		<p class="form-control-static">{{ $reference->general_comments }}</p>
	</div>
	<div class="col-sm-4">
		<p class="form-control-static">{{ $reference->general_comments_fr }}</p>
	</div>
</div>
<!-- EO line -->
