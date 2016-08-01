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
		      <th>Date</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($qcms as $qcm)
			    <tr class="@if($qcm->getScores)qcm-is-ok @endif">
			      <td>{{$qcm->id}}</td>
			      <th>
					@if($qcm->getScores)
			      		{{$qcm->title}}
			      	@else
			      		<a href="{{url('qcm-student/'.$qcm->id)}}" class="link-qcm-student">{{$qcm->title}}</a></th>
			      	@endif
			      <td>{{$qcm->nbr_question}}</td>
			      <td>
			      	@if($qcm->getScores)
		      			{{$qcm->getScores->note}}
		      		@endif
			      </td>
			      <td>{{ Carbon\Carbon::parse($qcm->created_at)->format('d/m/Y') }}</td>
			    </tr>
		    @endforeach
		</table>
		<div class="spacer-xs"></div>
	</div>
</div>
<div class="row qcm-content-single">
	<div class="spacer-xs"></div>
	<div class="single-qcm">
		<div class="row">
			<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom title-single-qcm"></p>
		</div>
		<div class="col-lg-18 col-md-18 col-lg-offset-3 col-md-offset-3">
			<div class="error"></div>
			<div class="level-single-qcm"></div>
			<div class="nbr_question-single-qcm"></div>
			<div class="nbr_choice-single-qcm"></div>
			<hr>
			{{Form::open(array('url'=>'qcm-student', 'id'=>'student-qcm'))}}
			<div class="questions-single-qcm"></div>
			{{Form::submit('Valider', array('class'=>'submit-form'))}}
			{{Form::close()}}
			<div class="score"></div>
			<div class="return">
				<a href="#QCM" class="link-action-tab" id="link-return"><i class="fa fa-angle-right" aria-hidden="true"></i> Retour au QCM</a>
			</div>
		</div>
	</div>
	<div class="spacer-xs"></div>
</div>