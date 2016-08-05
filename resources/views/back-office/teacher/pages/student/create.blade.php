@extends('layouts.master')

@section('content')
@include('back-office.teacher.partials.nav')
<div class="tab-pane active row" id="student-create">
	<div class="row student-content-form">
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
			<a href="{{url('professeur/eleve')}}" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel cancel-s"><i class="fa fa-close"></i> Annuler</a>
			<div class="row">
				<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Ajouter un élève</p>
			</div>
			{{Form::open(array('url'=>'professeur/eleve/create', 'method'=>'GET'))}}
				{{Form::hidden('role', 'student')}}
				{{Form::hidden('url_avatar', url('assets/images/avatar.png'))}}
				<li>Nom : {{Form::text('username', old('username'), array('class'=>'input-grey'))}}</li>
		    	@if($errors->has('username')) <span class="error">{{$errors->first('username')}}</span>@endif</li>
				<li>Niveau : {{Form::select('level', ['Seconde'=>'Seconde','Première'=>'Première','Terminale'=>'Terminale'])}}</li>
		    	@if($errors->has('level')) <span class="error">{{$errors->first('level')}}</span>@endif</li>
				<li>{{Form::submit('Ajouter',array('class' => 'submit-form','name'=>'student_create'))}}</li>
			{{Form::close()}}
		</div>
		<div class="spacer-xs"></div>
	</div>
</div>
@endsection