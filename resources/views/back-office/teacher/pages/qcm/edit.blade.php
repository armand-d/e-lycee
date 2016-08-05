@extends('layouts.master')

@section('content')
@include('back-office.teacher.partials.nav')
<div class="tab-pane active row" id="qcm-show">
<div class="row qcm-content-single">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		<a href="{{url('professeur/qcm')}}" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel"><i class="fa fa-close"></i> Retour</a>
	</div>
	<div class="spacer-xs"></div>
	<div class="row">
		<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Modifier le QCM</p>
	</div>
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		{{ Form::open(array('url'=>'professeur/qcm/'.$qcm->id, 'method'=> 'PATCH')) }}
			<p class="error-add-questions"></p>
			<div class="add-qcm">
				<li>Titre de votre QCM : {{ Form::text('title_qcm', $qcm->title, array('placeholder'=>'Titre', 'class'=>'input-grey')) }}</li>
				<li>Niveau : 
					<select name="level_qcm" id="">
						<option value="Seconde" @if($qcm->level == 'Seconde') selected @endif>Seconde</option>
						<option value="Première" @if($qcm->level == 'Première') selected @endif>Première</option>
						<option value="Terminale" @if($qcm->level == 'Terminale') selected @endif>Terminale</option>
					</select>
				</li>
				<li>Statut : 
					<select name="status" id="">
						<option value="1" @if($qcm->status == '1') selected @endif>Publié</option>
						<option value="0" @if($qcm->status == '0') selected @endif>Brouillon</option>
						<option value="2" @if($qcm->status == '2') selected @endif>Suprimé</option>
					</select>
				</li>
				<div class="spacer-xs"></div>
			</div>
			<div>
				<div class="row">
					<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Vos question</p>
				</div>
				<p class="has-error text-center" id="error-add-qcm"></p>
				<p class="has-success text-center" id="success-add-qcm"></p>
				<ul id="all-question">
					{{Form::hidden('nbr_questions', '2')}}
					@foreach($qcm->questions as $key => $question)
					<li class="question-{{$key}} new-question">
						{{ Form::text('question-'.$key, $question->title,array('placeholder'=> 'Question', 'class'=>'input-grey')) }}
						
						<ul class="all-choice">
							@foreach($question->choices as $keyB => $choice)
							<li class="choice-{{$key}}-{{$keyB}}">
								@if($question->response == $choice->title)
								{{ Form::text('choice-'.$key.'-'.$keyB, $choice->title,array('placeholder'=> 'Choix', 'class'=>'input-grey')) }} 
								{{ Form::radio('response-'.$key, $choice->title, array('class'=>'response'))}}
								@else
								{{ Form::text('choice-'.$key.'-'.$keyB, $choice->title,array('placeholder'=> 'Choix', 'class'=>'input-grey')) }} 
								{{ Form::radio('response-'.$key, $choice->title, array('class'=>'response'))}}
								@endif
							</li>
							@endforeach
						</ul>
					</li>
					@endforeach
				</ul>
			<p>{{Form::submit('Modifier le QCM',array('class' => 'submit-form','name'=>'qcm_create'))}}</p>
			</div>
			{{ Form::close() }}
	</div>
	<div class="spacer-xs"></div>
</div>
</div>
@endsection