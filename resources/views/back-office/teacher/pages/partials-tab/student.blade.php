<div class="row student-content-list">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2" id="action-student-status">
		<a href="#Ajouter" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 add add-s"><i class="fa fa-plus"></i> Ajouter</a>
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
			      <th>Date</th>
			      <th>Supprimer</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($students as $student)
			    <tr>
			      <td>{{$student->id}}</td>
			      <th>{{$student->username}}</th>
			      <td>{{$student->level}}</td>
			      <td>{{ Carbon\Carbon::parse($student->created_at)->format('d/m/Y') }}</td>
			      <td><a href="{{url('user/delete/'.$student->id)}}"><i class="fa fa-close delete-user"></i></a></td>
			    </tr>
			    @endforeach
			</table>
		{{ Form::close() }}
		<div class="spacer-xs"></div>
	</div>
</div>
<div class="row student-content-form">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		<a href="#Annuler" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel cancel-s"><i class="fa fa-close"></i> Annuler</a>
		<div class="row">
			<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Ajouter un élève</p>
		</div>
		{{Form::open(array('url'=>'user', 'method'=>'POST'))}}
			{{Form::hidden('role', 'student')}}
			<li>Nom : {{Form::text('username', old('username'), array('class'=>'input-grey'))}}</li>
	    	@if($errors->has('username')) <span class="error">{{$errors->first('username')}}@endif</li>
			<li>Niveau : {{Form::select('level', ['Seconde'=>'Seconde','Première'=>'Première','Terminale'=>'Terminale'])}}</li>
	    	@if($errors->has('level')) <span class="error">{{$errors->first('level')}}@endif</li>
			<li>{{Form::submit('Ajouter',array('class' => 'submit-form'))}}</li>
		{{Form::close()}}
	</div>
	<div class="spacer-xs"></div>

</div>