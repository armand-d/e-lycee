@extends('layouts.master')

@section('content')
@include('back-office.teacher.partials.nav')
<div class="tab-pane active row" id="article-create">
	<div class="row article-content-form">
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
			<a href="{{url('professeur/article')}}" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel cancel-a"><i class="fa fa-close"></i> Annuler</a>
			<div class="row">
				<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Ajouter un article</p>
			</div>
			<div class="col-lg-16 col-lg-offset-4 col-md-16 col-md-offset-4">
			{{Form::open(array('url'=>'professeur/article', 'method'=>'POST', 'enctype'=>'multipart/form-data'))}}
				<li>{{Form::text('title', old('title'), array('class'=>'input-grey','placeholder'=>'Titre'))}}</li>
		    	@if($errors->has('title')) <span class="error">{{$errors->first('title')}} </span>@endif</li>
				<li>{{Form::textarea('content', old('content'), array('class'=>'input-grey','placeholder'=>'Contenu de l\'article...'))}}</li>
		    	@if($errors->has('content')) <span class="error">{{$errors->first('content')}} </span>@endif</li>
				<li>Image : {{Form::file('url_thumbnail', array('class'=>'input-grey'))}}</li>
		    	@if($errors->has('url_thumbnail')) <span class="error">{{$errors->first('url_thumbnail')}} </span>@endif</li>
				<li>{{Form::checkbox('status', old('status'))}} Publié l'article</li>
				<li>{{Form::submit('Ajouter', array('class' => 'submit-form','name'=>'article_create'))}}</li>
			{{Form::close()}}
			</div>
		</div>
		<div class="spacer-xs"></div>
	</div>
</div>
@endsection