<div class="row questionnaire-content-list">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2" id="action-qcm-status">
		<a href="#QcmTous" id="btn-all" class="col-lg-4 col-md-4 status-q active-status-q">Tous ({{count($qcmsAll)}})</a>
		<a href="#QcmPublies" id="btn-publish" class="col-lg-4 col-md-4 status-q">Publiés ({{count($qcmsPublish)}})</a>
		<a href="#QcmBrouillons" id="btn-unpublish" class="col-lg-4 col-md-4 status-q">Brouillons ({{count($qcmsUnpublish)}})</a>
		<a href="#QcmCorbeille" id="btn-delete" class="col-lg-4 col-md-4 status-q">Corbeille ({{count($qcmsDelete)}})</a>
		<a href="#QcmAjouter" class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 add add-q"><i class="fa fa-plus"></i> Ajouter</a>
	</div>
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		{{ Form::open(array('url'=>'qcm-update-status-multiple', 'method'=> 'POST')) }}
			<div class="row">
				<span class="action-select">
					{{ Form::select('action', ['' => 'Actions','0' => 'Brouillon','1' => 'Publier','2' => 'Suprimer']) }}
					{{ Form::submit('Appliquer', array('class'=> 'apply')) }}
					{{Form::hidden('id_selected_qcm', false,array('id'=>'id_selected_qcm'))}}
				</span>
				<a href="{{url('qcms/delete-multiple')}}" id="delete-qcms">Vider la corbeille</a>
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
			      <th><a href="{{url('qcm/'.$qcm->id)}}" class="link-show-qcm">{{ $qcm->title }}</a></th>
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
			      <th><a href="{{url('qcm/'.$qcm->id)}}" class="link-show-qcm">{{ $qcm->title }}</a></th>
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
			      <th><a href="{{url('qcm/'.$qcm->id)}}" class="link-show-qcm">{{ $qcm->title }}</a></th>
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
			      <th><a href="{{url('qcm/'.$qcm->id)}}" class="link-show-qcm">{{ $qcm->title }}</a></th>
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
<div class="row questionnaire-content-form">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		<a href="#QcmAnnuler" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel cancel-q"><i class="fa fa-close"></i> Annuler</a>
	</div>
	<div class="spacer-xs"></div>
	<div class="row">
		<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Ajouter un nouveau QCM</p>
	</div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		{{ Form::open(array('url'=>'qcm', 'method'=> 'POST')) }}
		<p class="error-add-questions"></p>
		<div class="add-qcm">
			<li>Titre de votre QCM : {{ Form::text('title_qcm', null, array('placeholder'=>'Titre', 'class'=>'input-grey')) }}</li>
			<li>Niveau : {{ Form::select('level_qcm', ['Seconde'=>'Seconde','Première'=>'Première','Terminale'=>'Terminale']) }}</li>
			<li>Nombre de choix : {{ Form::select('nbr_choice', ['2'=>'2','3'=>'3','4'=>'4','5'=>'5']) }}</li>
			<div class="spacer-xs"></div>
			<li><a href="#QcmAjouterQuestions" class="add" id="add-question">Ajouter des questions</a></li>
		</div>
		<div class="add-question">
			<div class="row">
				<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Ajouter vos question</p>
			</div>
			<p class="has-error text-center" id="error-add-qcm"></p>
			<p class="has-success text-center" id="success-add-qcm"></p>
			<ul id="all-question">
				{{Form::hidden('nbr_questions', '2')}}
				<li class="question-0 new-question">
					{{ Form::text('question-0', null,array('placeholder'=> 'Question', 'class'=>'input-grey')) }}
					<ul class="all-choice">
						<li class="choice-0-0">{{ Form::text('choice-0-0', null,array('placeholder'=> 'Choix 1', 'class'=>'input-grey')) }} {{ Form::radio('response-0', false, null, array('class'=>'response'))}}</li>
						<li class="choice-0-1">{{ Form::text('choice-0-1', null,array('placeholder'=> 'Choix 2', 'class'=>'input-grey')) }} {{ Form::radio('response-0', false, null, array('class'=>'response'))}}</li>
					</ul>
				</li>
				<li class="question-1 new-question">
					{{ Form::text('question-1', null,array('placeholder'=> 'Question', 'class'=>'input-grey')) }}
					<ul class="all-choice">
						<li class="choice-1-0">{{ Form::text('choice-1-0', null,array('placeholder'=> 'Choix 1', 'class'=>'input-grey')) }} {{ Form::radio('response-1', false, null, array('class'=>'response'))}}</li>
						<li class="choice-1-1">{{ Form::text('choice-1-1', null,array('placeholder'=> 'Choix 2', 'class'=>'input-grey')) }} {{ Form::radio('response-1', false, null, array('class'=>'response'))}}</li>
					</ul>
				</li>
			</ul>
			<a href="#" id="add-single-question" class="submit-form text-center">Ajouter une question</a>
		<p id="verif-qcm"><a href="#QcmVerification" class="submit-form text-center">Vérifier le QCM</a></p>
		<p id="submt-qcm">{{Form::submit('Ajouter le QCM',array('class' => 'submit-form'))}}</p>
		</div>
		{{ Form::close() }}
		<div class="spacer-xs"></div>
	</div>
</div>
<div class="row questionnaire-content-single">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		<a href="#QcmAnnuler" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel prev-q"><i class="fa fa-close"></i> Retour</a>
	</div>
	<div class="spacer-xs"></div>
	<div class="single-qcm">
		<div class="row">
			<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom title-single-qcm"></p>
		</div>
		<div class="col-lg-18 col-md-18 col-lg-offset-3 col-md-offset-3">
			<div class="level-single-qcm"></div>
			<div class="nbr_question-single-qcm"></div>
			<div class="nbr_choice-single-qcm"></div>
			<hr>
			<div class="questions-single-qcm"></div>
		</div>
	</div>
	<div class="spacer-xs"></div>
</div>