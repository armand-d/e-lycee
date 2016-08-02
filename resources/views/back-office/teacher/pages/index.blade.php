@extends('layouts.master')

@section('content')
	<ul class="nav nav-tabs" id="myTab">
	  <li class="active"><a href="#dashboard">Tableau de bord</a></li>
	  <li><a href="#QCM" id="btn-1">QCM</a></li>
	  <li><a href="#articles" id="btn-2">Articles</a></li>
	  <li><a href="#eleves" id="btn-3">&Eacute;lèves</a></li>
	  <li><a href="#profil" id="btn-4">Profil</a></li>
	</ul>
	 
	<div class="tab-content">
	  <div class="tab-pane active row" id="dashboard">
	  	@include('back-office.teacher.pages.partials-tab.dashboard')
	  </div>
	  <div class="tab-pane" id="QCM">
	  	@include('back-office.teacher.pages.partials-tab.questionnaire')
	  </div>
	  <div class="tab-pane" id="articles">
	  	@include('back-office.teacher.pages.partials-tab.article')
	  </div>
	  <div class="tab-pane" id="eleves">
	  	@include('back-office.teacher.pages.partials-tab.student')
	  </div>
	  <div class="tab-pane" id="profil">
	  	@include('back-office.teacher.pages.partials-tab.profile')
	  </div>
	</div>
@endsection