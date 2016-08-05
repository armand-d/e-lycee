@extends('layouts.master')

@section('content')
@include('back-office.student.partials.nav')
<div class="tab-pane active row" id="qcm-index">
	<div class="row qcm-content-list">
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th>ID</th>
			      <th>Titre</th>
			      <th>Nombres de questions</th>
			      <th>Score</th>
			      <th>Moyenne</th>
			      <th>Date</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($qcms as $qcm)
				    <tr class="@if(Auth::user()->getScore())qcm-is-ok @endif">
				      <td>{{$qcm->id}}</td>
				      <th>
						@if(Auth::user()->getScore())
				      		{{$qcm->title}}
				      	@else
				      		<a href="{{url('etudiant/qcm/'.$qcm->id)}}" class="link-qcm-student">{{$qcm->title}}</a></th>
				      	@endif
				      <td>{{$qcm->nbr_question}}</td>
				      <td>
				      	@if(Auth::user()->getScore())
			      			{{Auth::user()->getScore()}}
			      		@endif
				      </td>
				      <td>
				      	@if(Auth::user()->getScore())
			      			{{(Auth::user()->getScore()/$qcm->nbr_question)*20}}/20
			      		@endif
				      </td>
				      <td>{{ Carbon\Carbon::parse($qcm->created_at)->format('d/m/Y') }}</td>
				    </tr>
			    @endforeach
			    </tbody>
			</table>
			<div class="spacer-xs"></div>
		</div>
	</div>
</div>
@endsection