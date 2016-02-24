<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a data-toggle="tab" href="#description_menu"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Description</a></li>
  @if ($reference->confidential == 0)
	<li id="criteria_pane" role="presentation"><a data-toggle="tab" href="#criteria_menu"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Criteria</a></li>
	<li id="quantities_pane" role="presentation"><a data-toggle="tab" href="#measure_menu"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Quantities</a></li>
	<li id="details_pane" role="presentation"><a data-toggle="tab" href="#detail_menu"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Details</a></li>
  @else
	<li id="criteria_pane" role="presentation" class="hide"><a data-toggle="tab" href="#criteria_menu"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Criteria</a></li>
	<li id="quantities_pane" role="presentation" class="hide"><a data-toggle="tab" href="#measure_menu"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Quantities</a></li>
	<li id="details_pane" role="presentation" class="hide"><a data-toggle="tab" href="#detail_menu"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Details</a></li>
  @endif
</ul>

<!-- Content menu -->
<div class="tab-content col-sm-12">
	
	<!-- Dropdown menu -->
	<div id="description_menu" class="tab-pane fade in active">
		<h3></h3>
		@include("references.show.description")
	</div>
	<div id="criteria_menu" class="tab-pane fade">
		<h3></h3>
		@include("references.show.criteria")
	</div>
	<div id="measure_menu" class="tab-pane fade">
		<h3></h3>
		@include("references.show.quantities")
	</div>
	<div id="detail_menu" class="tab-pane fade">
		<h3></h3>
		@include("references.show.details")
	</div>

</div>