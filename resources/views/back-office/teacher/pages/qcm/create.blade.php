@extends('layouts.master')

@section('content')
@include('back-office.teacher.pages.partials.nav')
<div class="tab-pane active row" id="qcm-create">
	<div class="row questionnaire-content-form">
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
			<a href="{{url('professeur/qcm')}}" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel cancel-q"><i class="fa fa-close"></i> Annuler</a>
		</div>
		<div class="spacer-xs"></div>
		<div class="row">
			<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Ajouter un nouveau QCM</p>
		</div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
			{{ Form::open(array('url'=>'professeur/qcm/create', 'method'=> 'GET')) }}
			<p class="error-add-questions"></p>
			<div class="add-qcm">
				<li>Titre de votre QCM : {{ Form::text('title_qcm', null, array('placeholder'=>'Titre', 'class'=>'input-grey')) }}</li>
				<li>Niveau : {{ Form::select('level_qcm', ['Seconde'=>'Seconde','Première'=>'Première','Terminale'=>'Terminale']) }}</li>
				<li>Nombre de choix : {{ Form::select('nbr_choice', ['2'=>'2','3'=>'3','4'=>'4','5'=>'5']) }}</li>
				<div class="spacer-xs"></div>
				<li><a class="add" id="add-question">Ajouter des questions</a></li>
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
				<a id="add-single-question" class="submit-form text-center">Ajouter une question</a>
			<p id="verif-qcm"><a class="submit-form text-center">Vérifier le QCM</a></p>
			<p id="submt-qcm">{{Form::submit('Ajouter le QCM',array('class' => 'submit-form','name'=>'qcm_create'))}}</p>
			</div>
			{{ Form::close() }}
			<div class="spacer-xs"></div>
		</div>
	</div>
</div>
@endsection