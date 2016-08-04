@extends('layouts.master')

@section('content')
@include('back-office.teacher.pages.partials.nav')
<div class="tab-pane active row" id="article-edit">
	<div class="article-content-single">
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
			<a href="{{url('professeur/article')}}" class="col-lg-4 col-md-4 col-lg-offset-20 col-md-offset-20 cancel prev-a"><i class="fa fa-close"></i> Retour</a>
		</div>
		<div class="spacer-xs"></div>
		<div class="single-qcm">
			<div class="row">
				<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Modifier l'article</p>
			</div>
			<div class="col-lg-16 col-lg-offset-4 col-md-16 col-md-offset-4">
			{{Form::open(array('url'=>'professeur/article/'.$article->id, 'method'=>'PAtCH', 'enctype'=>'multipart/form-data'))}}
				<li>{{Form::text('title', $article->title, array('class'=>'input-grey','placeholder'=>'Titre'))}}</li>
		    	@if($errors->has('title')) <span class="error">{{$errors->first('title')}} </span>@endif</li>
				<li>{{Form::textarea('content', $article->content, array('class'=>'input-grey','placeholder'=>'Contenu de l\'article...'))}}</li>
		    	@if($errors->has('content')) <span class="error">{{$errors->first('content')}} </span>@endif</li>
				<li><img width="200px" src="{{$article->url_thumbnail}}" alt=""></li>
				<li>Image : {{Form::file('url_thumbnail', array('class'=>'input-grey'))}}</li>
		    	@if($errors->has('url_thumbnail')) <span class="error">{{$errors->first('url_thumbnail')}} </span>@endif</li>
				<li>Statut : 
					<select name="status" id="">
						<option value="1" @if($article->status == '1') selected @endif>Publié</option>
						<option value="0" @if($article->status == '0') selected @endif>Brouillon</option>
						<option value="2" @if($article->status == '2') selected @endif>Suprimé</option>
					</select>
				</li>
				<li>{{Form::submit('Modifier', array('class' => 'submit-form','name'=>'article_create'))}}</li>
			{{Form::close()}}
			<hr>
			<p class="t-s-1_5">Commentaires</p>
			<ul>
			@foreach($article->comments as $comment)
				<li class="dash-comment">
					<p><strong>{{$comment->title}}</strong></p>
					<small>{{ Carbon\Carbon::parse($comment->created_at)->format('d/m/Y - H:i:s') }}</small>
					<p>{{$comment->content}}</p>
					{{Form::open(array('url'=>'comment/'.$comment->id, 'method'=>'delete'))}}
							<button type="submit">Supprimer le commentaire</button>
				      	{{Form::close()}}
				</li>
			@endforeach
			</ul>
			</div>
		</div>
		<div class="spacer-xs"></div>
	</div>
</div>
@endsection