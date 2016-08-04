@extends('layouts.master')

@section('content')
@include('back-office.teacher.pages.partials.nav')
<div class="tab-pane active row" id="article-index">
	<div class="row article-content-list">
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2" id="action-article-status">
			<a id="btn-all" class="col-lg-4 col-md-4 status-a active-status-a">Tous ({{count($articlesAll)}})</a>
			<a id="btn-publish" class="col-lg-4 col-md-4 status-a">Publiés ({{count($articlesPublish)}})</a>
			<a id="btn-unpublish" class="col-lg-4 col-md-4 status-a">Brouillons ({{count($articlesUnpublish)}})</a>
			<a id="btn-delete" class="col-lg-4 col-md-4 status-a">Corbeille ({{count($articlesDelete)}})</a>
			<a href="{{url('professeur/article/create')}}" class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 add add-a"><i class="fa fa-plus"></i> Ajouter</a>
		</div>
		<div class="spacer-xs"></div>
		<div class="col-lg-20 col-md-20 col-lg-offset-2 col-md-offset-2">
			{{ Form::open(array('url'=>'professeur/article/update/multiple', 'method'=> 'POST')) }}
				<div class="row">
					<span class="action-select">
						{{ Form::select('action', ['' => 'Actions','0' => 'Brouillon','1' => 'Publier','2' => 'Suprimer']) }}
						{{ Form::submit('Appliquer', array('class'=> 'apply')) }}
						{{Form::hidden('id_selected_article', false,array('id'=>'id_selected_article'))}}
					</span>
					<a href="{{url('professeur/article/delete/multiple')}}" id="delete-articles">Vider la corbeille</a>
				</div>
				<table class="table table-hover" id="tab-article">
				  <thead>
				    <tr>
				      <th>{{Form::checkbox('select-all', false,false, array('disabled'=>'disabled'))}}</th>
				      <th>Titre</th>
				      <th>Statu</th>
				      <th>Commentaires</th>
				      <th>Date</th>
				    </tr>
				  </thead>
				  <tbody  id="article-all">
				    @foreach($articlesAll as $article)
				    <tr>
				      <td>{{Form::checkbox('selected-article', $article->id)}}</td>
				      <th><a href="{{url('professeur/article/'.$article->id.'/edit')}}" class="link-show-article">{{$article->title}}</a></th>
				      <td>
				      	@if($article->status == 1) Publié
						@elseif($article->status == 2) Supprimé
						@else Brouillon
				      	@endif
				      </td>
				      <td>{{count($article->comments)}}</td>
				      <td>{{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</td>
				    </tr>
				    @endforeach
				  </tbody>
				  <tbody id="article-publish">
				    @foreach($articlesPublish as $article)
				    <tr>
				      <td scope="row">{{$article->id}}</td>
				      <th><a href="{{url('professeur/article/'.$article->id.'/edit')}}" class="link-show-article">{{ $article->title }}</a></th>
				      <td>{{$article->level}}</td>
				      <td>
						@if($article->status == 1) Publié
						@elseif($article->status == 2) Supprimé
						@else Brouillon
				      	@endif
				      </td>
				      <td>{{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</td>
				    </tr>
				    @endforeach
				  </tbody>
				  <tbody id="article-unpublish">
				    @foreach($articlesUnpublish as $article)
				    <tr>
				      <td scope="row">{{$article->id}}</td>
				      <th><a href="{{url('professeur/article/'.$article->id.'/edit')}}" class="link-show-article">{{ $article->title }}</a></th>
				      <td>{{$article->level}}</td>
				      <td>
						@if($article->status == 1) Publié
						@elseif($article->status == 2) Supprimé
						@else Brouillon
				      	@endif
				      </td>
				      <td>{{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</td>
				    </tr>
				    @endforeach
				  </tbody>
				  <tbody id="article-delete">
				    @foreach($articlesDelete as $article)
				    <tr>
				      <td scope="row">{{$article->id}}</td>
				      <th><a href="{{url('professeur/article/'.$article->id.'/edit')}}" class="link-show-article">{{ $article->title }}</a></th>
				      <td>{{$article->level}}</td>
				      <td>
						@if($article->status == 1) Publié
						@elseif($article->status == 2) Supprimé
						@else Brouillon
				      	@endif
				      </td>
				      <td>{{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</td>
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