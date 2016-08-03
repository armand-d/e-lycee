@extends('layouts.master')

@section('content')
@include('back-office.teacher.pages.partials.nav')
<div class="tab-pane active row" id="qcm-show">
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
</div>
@endsection