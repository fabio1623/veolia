@extends('templates.template')

@section('content')
		<div class="container stand-page">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<div class="row">
							<div class="col-sm-9">List of categories</div>
							<div class="col-sm-3">
								<div class="btn-group pull-right" role="group" aria-label="...">
									<a class="btn btn-default btn-xs" href="{{ action('CategoryController@create', $subsidiary->id) }}">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</a>
									<button id="save_btn" form="form_save" type="submit" class="btn btn-default btn-xs">
										<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
									</button>
									<a class="btn btn-default btn-xs" href="{{ action('SubsidiaryController@edit', $subsidiary->id) }}">
										<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
									</a>
								</div>
							</div>
						</div>
					</h3>
				</div>
				
				<div class="table-responsive">

					<table class="table table-hover">
						<thead>
							<tr>
								<th class="col-sm-1"></th>
								<th class="col-sm-10">Category name</th>
						    	<th class="col-sm-1"><input type="checkbox" id="select_all"> All</th>
							</tr>
						</thead>
						<tbody>
							<form id="form_save" action="{{ action('CategoryController@link_category', $subsidiary->id) }}" method="POST">
							    <?php echo csrf_field(); ?>
								@for ($i=0; $i < $categories->count(); $i++)
										<tr data-href="{{ action('CategoryController@custom_edit', [$subsidiary->id, $categories[$i]->id]) }}">
											<td>
												<a class="btn btn-link btn-xs">
													@if ($categories->currentPage() < 2)
														{{ $i + 1 }}
													@else
														{{ ($categories->currentPage() - 1) * 100 + $i + 1 }}
													@endif
												</a>
											</td>
											<td>
												<a class="btn btn-link btn-xs">{{$categories[$i]->name}}</a>	
											</td>
											<td class="check">
												@if ($linked_categories->contains($categories[$i]))
													<input class="checkbox" type="checkbox" value="{{ $categories[$i]->id }}" name=id[] checked>
												@else
													<input class="checkbox" type="checkbox" value="{{ $categories[$i]->id }}" name=id[]>
												@endif
											</td>
										</tr>
								@endfor
							</form>
						</tbody>
					</table>
				</div>
				<div class="pull-right">
					{!! $categories->render() !!}
				</div>
			</div>
	</div>
<!-- </div> -->
<script>
	if ($('.checkbox:checked').length == $('.checkbox').length) {
		$('#select_all').prop('checked', true);
	};

	$("tbody > tr").click(function() {
		var href = $(this).data("href");
		if(href){
			window.location = href;
		}
	});

	$( ".check").click(function( event ) {
	  event.stopImmediatePropagation();
	});

    $("#select_all").change(function(){
      $(".checkbox").prop("checked", $(this).prop("checked"));
    });

    $('#save_btn').click(function(e){
  		$('#form_save').submit();
  	});
</script>
@endsection