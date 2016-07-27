<div class="row" class="article-content">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		<a class="col-lg-4 col-md-4 status active-status">Tous (3q)</a>
		<a class="col-lg-4 col-md-4 status">Publiés ()</a>
		<a class="col-lg-4 col-md-4 status">Brouillons</a>
		<a class="col-lg-4 col-md-4 status">Corbeille</a>
		<a class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 add status"><i class="fa fa-plus"></i> Ajouter</a>
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
			  <tbody>
			    <tr>
			      <th scope="row">{{Form::checkbox('remember', 'id')}}</th>
			      <td>Mark</td>
			      <td>Otto</td>
			      <td>@mdo</td>
			    </tr>
			    <tr>
			      <th scope="row">{{Form::checkbox('remember', 'id')}}</th>
			      <td>Jacob</td>
			      <td>Thornton</td>
			      <td>@fat</td>
			    </tr>
			    <tr>
			      <th scope="row">{{Form::checkbox('remember', 'id')}}</th>
			      <td colspan="2">Larry the Bird</td>
			      <td>@twitter</td>
			    </tr>
			  </tbody>
			</table>
		{{ Form::close() }}
		<div class="spacer-xs"></div>
	</div>
</div>