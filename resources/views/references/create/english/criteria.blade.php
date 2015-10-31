<div class="row">
  @foreach($domains as $domain)
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">{{ $domain->name }}</h3>
      </div>
      <div class="panel-body">
        @foreach($domain->expertises as $expertise)
        <div class="checkbox col-sm-6">
          <label>
            <input type="checkbox"> {{$expertise->name}}
          </label>
          <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#expertises_modal">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </button>
          @include('references.create.english.modals.expertises_modal')
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @endforeach
</div>