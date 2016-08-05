@extends('layouts.master')

@section('content')
@include('back-office.teacher.partials.nav')
<div class="tab-pane active row" id="qcm-index">
	<div class="row questionnaire-content-list">
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2" id="action-qcm-status">
			<a id="btn-all" class="col-lg-4 col-md-4 status-q active-status-q">Tous ({{count($qcmsAll)}})</a>
			<a id="btn-publish" class="col-lg-4 col-md-4 status-q">Publiés ({{count($qcmsPublish)}})</a>
			<a id="btn-unpublish" class="col-lg-4 col-md-4 status-q">Brouillons ({{count($qcmsUnpublish)}})</a>
			<a id="btn-delete" class="col-lg-4 col-md-4 status-q">Corbeille ({{count($qcmsDelete)}})</a>
			<a href="{{url('professeur/qcm/create')}}" class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 add"><i class="fa fa-plus"></i> Ajouter</a>
		</div>
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
			{{ Form::open(array('url'=>'professeur/qcm/update/multiple', 'method'=> 'POST')) }}
				<div class="row">
					<span class="action-select">
						{{ Form::select('action', ['' => 'Actions','0' => 'Brouillon','1' => 'Publier','2' => 'Suprimer']) }}
						{{ Form::submit('Appliquer', array('class'=> 'apply')) }}
						{{Form::hidden('id_selected_qcm', false,array('id'=>'id_selected_qcm'))}}
					</span>
					<a href="{{url('professeur/qcm/delete/multiple')}}" id="delete-qcms">Vider la corbeille</a>
				</div>
				<table class="table table-hover" id="tab-qcm">
				  <thead>
				    <tr>
				      <th>{{Form::checkbox('select-all', false,false, array('disabled'=>'disabled'))}}</th>
				      <th>Titre</th>
				      <th>Niveau</th>
				      <th>Statu</th>
				      <th>Date</th>
				    </tr>
				  </thead>
				  <tbody id="qcm-all">
				    @foreach($qcmsAll as $qcm)
				    <tr>
				      <td scope="row">{{Form::checkbox('selected', $qcm->id)}}</td>
				      <th><a href="{{url('professeur/qcm/'.$qcm->id.'/edit')}}" class="link-show-qcm">{{ $qcm->title }}</a></th>
				      <td>{{$qcm->level}}</td>
				      <td>
						@if($qcm->status == 1) Publié
						@elseif($qcm->status == 2) Supprimé
						@else Brouillon
				      	@endif
				      </td>
				      <td>{{ Carbon\Carbon::parse($qcm->created_at)->format('d/m/Y') }}</td>
				    </tr>
				    @endforeach
				  </tbody>
				  <tbody id="qcm-publish">
				    @foreach($qcmsPublish as $qcm)
				    <tr>
				      <td scope="row">{{$qcm->id}}</td>
				      <th><a href="{{url('professeur/qcm/'.$qcm->id.'/edit')}}" class="link-show-qcm">{{ $qcm->title }}</a></th>
				      <td>{{$qcm->level}}</td>
				      <td>
						@if($qcm->status == 1) Publié
						@elseif($qcm->status == 2) Supprimé
						@else Brouillon
				      	@endif
				      </td>
				      <td>{{ Carbon\Carbon::parse($qcm->created_at)->format('d/m/Y') }}</td>
				    </tr>
				    @endforeach
				  </tbody>
				  <tbody id="qcm-unpublish">
				    @foreach($qcmsUnpublish as $qcm)
				    <tr>
				      <td scope="row">{{$qcm->id}}</td>
				      <th><a href="{{url('professeur/qcm/'.$qcm->id.'/edit')}}" class="link-show-qcm">{{ $qcm->title }}</a></th>
				      <td>{{$qcm->level}}</td>
				      <td>
						@if($qcm->status == 1) Publié
						@elseif($qcm->status == 2) Supprimé
						@else Brouillon
				      	@endif
				      </td>
				      <td>{{ Carbon\Carbon::parse($qcm->created_at)->format('d/m/Y') }}</td>
				    </tr>
				    @endforeach
				  </tbody>
				  <tbody id="qcm-delete">
				    @foreach($qcmsDelete as $qcm)
				    <tr>
				      <td scope="row">{{$qcm->id}}</td>
				      <th><a href="{{url('professeur/qcm/'.$qcm->id.'/edit')}}" class="link-show-qcm">{{ $qcm->title }}</a></th>
				      <td>{{$qcm->level}}</td>
				      <td>
						@if($qcm->status == 1) Publié
						@elseif($qcm->status == 2) Supprimé
						@else Brouillon
				      	@endif
				      </td>
				      <td>{{ Carbon\Carbon::parse($qcm->created_at)->format('d/m/Y') }}</td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
			{{ Form::close() }}
			<div class="spacer-xs"></div>
		</div>
	</div>
</div>
@endsection