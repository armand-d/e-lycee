@extends('layouts.master')

@section('content')
	<ul class="nav nav-tabs" id="myTab">
	  <li class="active"><a href="#dashboard">Tableau de bord</a></li>
	  <li><a href="#questionnaire" id="btn-1">QCM</a></li>
	  <li><a href="#profile" id="btn-4">Profil</a></li>
	</ul>
	 
	<div class="tab-content">
	  <div class="tab-pane active row" id="dashboard">
	  	@include('back-office.student.pages.partials-tab.dashboard')
	  </div>
	  <div class="tab-pane" id="questionnaire">
	  	@include('back-office.student.pages.partials-tab.questionnaire')
	  </div>
	  <div class="tab-pane" id="profile">
	  	@include('back-office.student.pages.partials-tab.profile')
	  </div>
	</div>
@endsection