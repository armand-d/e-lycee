<div class="row questionnaire-content-list">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2" id="action-qcm-status">
		<a href="#Tous" id="btn-all" class="col-lg-4 col-md-4 status-q active-status-q">Tous ({{count($qcmsAll)}})</a>
		<a href="#Publies" id="btn-publish" class="col-lg-4 col-md-4 status-q">Publiés ({{count($qcmsPublish)}})</a>
		<a href="#Brouillons" id="btn-unpublish" class="col-lg-4 col-md-4 status-q">Brouillons ({{count($qcmsUnpublish)}})</a>
		<a href="#Corbeille" id="btn-delete" class="col-lg-4 col-md-4 status-q">Corbeille ({{count($qcmsDelete)}})</a>
		<a href="#Ajouter" class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 add add-q"><i class="fa fa-plus"></i> Ajouter</a>
	</div>
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		{{ Form::open() }}
			<div class="row">
				{{ Form::select('action', ['' => 'Actions','publish' => 'Publier','delete' => 'Suprimer']) }}
				{{ Form::submit('Appliquer', array('class'=> 'apply')) }}
			</div>
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th>{{Form::checkbox('select-all')}}</th>
			      <th>Titre</th>
			      <th>Statu</th>
			      <th>Date</th>
			    </tr>
			  </thead>
			  <tbody id="qcm-all">
			    @foreach($qcmsAll as $qcm)
			    <tr>
			      <th scope="row">{{Form::checkbox('selected', 'id')}}</th>
			      <td><a href="{{url('qcm/'.$qcm->id)}}">{{ $qcm->title }}</a></td>
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
			      <th scope="row">{{Form::checkbox('selected', 'id')}}</th>
			      <td><a href="{{url('qcm/'.$qcm->id)}}">{{ $qcm->title }}</a></td>
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
			      <th scope="row">{{Form::checkbox('selected', 'id')}}</th>
			      <td><a href="{{url('qcm/'.$qcm->id)}}">{{ $qcm->title }}</a></td>
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
			      <th scope="row">{{Form::checkbox('selected', 'id')}}</th>
			      <td><a href="{{url('qcm/'.$qcm->id)}}">{{ $qcm->title }}</a></td>
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
		<a href="#Annuler" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel cancel-q"><i class="fa fa-close"></i> Annuler</a>
	</div>
	<div class="spacer-xs"></div>
	<div class="row">
		<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Ajouter un nouveau QCM</p>
	</div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		{{ Form::open(array('url'=>'qcm', 'method'=> 'POST')) }}
		<p class="error-add-questions"></p>
		<div class="add-qcm">
			<li>Titre de votre QCM : {{ Form::text('title_qcm', null, array('placeholder'=>'Titre')) }}</li>
			<li>Niveau : {{ Form::select('level_qcm', ['first_class'=>'first_class','final_class'=>'final_class']) }}</li>
			<li>Nombre de choix : {{ Form::select('nbr_choice', ['2'=>'2','3'=>'3','4'=>'4','5'=>'5']) }}</li>
			<div class="spacer-xs"></div>
			<li><a href="#ajouter-des-questions" class="add" id="add-question">Ajouter des questions</a></li>
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
					{{ Form::text('question-0', null,array('placeholder'=> 'Question')) }}
					<ul class="all-choice">
						<li class="choice-0-0">{{ Form::text('choice-0-0', null,array('placeholder'=> 'Choix 1')) }}{{ Form::radio('response-0', false, null, array('class'=>'response'))}}</li>
						<li class="choice-0-1">{{ Form::text('choice-0-1', null,array('placeholder'=> 'Choix 2')) }}{{ Form::radio('response-0', false, null, array('class'=>'response'))}}</li>
					</ul>
				</li>
				<li class="question-1 new-question">
					{{ Form::text('question-1', null,array('placeholder'=> 'Question')) }}
					<ul class="all-choice">
						<li class="choice-1-0">{{ Form::text('choice-1-0', null,array('placeholder'=> 'Choix 1')) }}{{ Form::radio('response-1', false, null, array('class'=>'response'))}}</li>
						<li class="choice-1-1">{{ Form::text('choice-1-1', null,array('placeholder'=> 'Choix 2')) }}{{ Form::radio('response-1', false, null, array('class'=>'response'))}}</li>
					</ul>
				</li>
			</ul>
			<a href="#" id="add-single-question">Ajouter une question</a>
		<p id="verif-qcm"><a href="#">Vérifier le QCM</a></p>
		<p id="submt-qcm">{{Form::submit('Ajouter le QCM')}}</p>
		</div>
		{{ Form::close() }}
		<div class="spacer-xs"></div>
	</div>
</div>
