@extends('layouts.master')

@section('content')
@include('back-office.teacher.partials.nav')
<div class="tab-pane active row" id="student-index">
	<div class="row student-content-list">
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-xs-20 col-lg-offset-2 col-md-offset-2 col-xs-offset-2" id="action-student-status">
			<a href="{{url('professeur/eleve/create')}}" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 add add-s"><i class="fa fa-plus"></i> Ajouter</a>
		</div>
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
			{{ Form::open() }}
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th>ID</th>
				      <th>Nom</th>
				      <th>Niveau</th>
				      <th>Score</th>
				      <th>Supprimer</th>
				    </tr>
				  </thead>
				  <tbody>
				    @foreach($students as $student)
				    <tr>
				      <td>{{$student->id}}</td>
				      <th>{{$student->username}}</th>
				      <td>{{$student->level}}</td>
				      <td>{{$student->getScore()}}</td>
				      <td>
				      	{{Form::open(array('url'=>'professeur/eleve/'.$student->id, 'method'=>'delete'))}}
							<button type="submit"><i class="fa fa-close delete-user"></i></button>
				      	{{Form::close()}}
				      </td>
				    </tr>
				    @endforeach
					</tbody>
				</table>
			{{ Form::close() }}
			<div class="spacer-xs"></div>
		</div>
	</div>
</div>
@endsection