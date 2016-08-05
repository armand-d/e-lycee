@extends('layouts.master')

@section('content')
@include('back-office.student.partials.nav')
<div class="tab-pane active row" id="qcm-show">
	<div class="row qcm-content-single">
	<div class="spacer-xs"></div>
	<div class="single-qcm">
		<div class="row">
			<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom title-single-qcm">{{$qcm->title}}</p>
		</div>
		<div class="col-lg-18 col-md-18 col-lg-offset-3 col-md-offset-3">
			<div class="error"></div>
			<div class="level-single-qcm">Niveau : {{$qcm->level}}</div>
			<div class="nbr_question-single-qcm">Nombre de questions : {{$qcm->nbr_question}}</div>
			<div class="nbr_choice-single-qcm">Nombre de choix :{{$qcm->nbr_choice}}</div>
			<hr>
			{{Form::open(array('url'=>'etudiant/qcm/'.$qcm->id, 'id'=>'student-qcm', 'method'=>'get'))}}
			<div class="questions-single-qcm">
				@foreach($qcm->questions as $key => $question)
				<li class="single-qcm-question-{{$key}}">{{$question->title}} :</li>
				
				<ul class="single-qcm-choices-{{$key}}">
					@foreach($question->choices as $keyB => $choice)
					<li>
						<input type="radio" id="question-{{$key}}-{{$keyB}}" name="question-{{$question->id}}" value="{{$choice->title}}"> 
						<label for="question-{{$key}}-{{$keyB}}">{{$choice->title}}</label>
					</li>
					@endforeach
				</ul>
				@endforeach
			</div>
			{{Form::submit('Valider', array('class'=>'submit-form','name'=>'qcm_submit'))}}
			{{Form::close()}}
			<div class="score"></div>
			<div class="return">
				<a href="{{url('etudiant/qcm')}}" class="link-action-tab" id="link-return"><i class="fa fa-angle-right" aria-hidden="true"></i> Retour au QCM</a>
			</div>
		</div>
	</div>
	<div class="spacer-xs"></div>
</div>
@endsection