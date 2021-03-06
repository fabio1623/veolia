<ul class="nav nav-tabs">
	@for ($i=0; $i < count($linked_languages); $i++)
		@if ($i==0)
			<li role="presentation" class="active"><a data-toggle="tab" href="#{{ $linked_languages[$i]->name }}_menu"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> {{ $linked_languages[$i]->name }}</a></li>		
		@else
			<li id="criteria_pane" role="presentation"><a data-toggle="tab" href="#{{ $linked_languages[$i]->name }}_menu"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> {{ $linked_languages[$i]->name }}</a></li>
		@endif
	@endfor
</ul>

<!-- Content menu -->
<div class="tab-content col-sm-12">
	
	@for ($i=0; $i < count($linked_languages); $i++)
		@if($i==0)
			<div id="{{ $linked_languages[$i]->name }}_menu" class="tab-pane fade in active">
				<h3></h3>
				@include("references.show.languages")
			</div>
		@else
			<div id="{{ $linked_languages[$i]->name }}_menu" class="tab-pane fade">
				<h3></h3>
				@include("references.show.languages")
			</div>
		@endif
	@endfor
</div>