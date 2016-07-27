<div class="row article-content-list">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		<a href="#Tous" class="col-lg-4 col-md-4 status-q active-status-q">Tous (3q)</a>
		<a href="#Publies" class="col-lg-4 col-md-4 status-q">Publiés ()</a>
		<a href="#Brouillons" class="col-lg-4 col-md-4 status-q">Brouillons</a>
		<a href="#Corbeille" class="col-lg-4 col-md-4 status-q">Corbeille</a>
		<a href="#Ajouter" class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 add add-a"><i class="fa fa-plus"></i> Ajouter</a>
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
			      <td><a href="{{url('article/modification/')}}">Mark</a></td>
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
<div class="row article-content-form">
	<div class="spacer-xs"></div>
	<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
		<a href="#Annuler" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel cancel-a"><i class="fa fa-close"></i> Annuler</a>
	</div>
	<div class="spacer-xs"></div>

</div>