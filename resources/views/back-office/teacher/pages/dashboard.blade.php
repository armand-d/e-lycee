@extends('layouts.master')

@section('content')
@include('back-office.teacher.partials.nav')
<div class="tab-pane active row" id="dashboard">
	<div class="spacer-xs"></div>
	<div class="row col-lg-24 col-md-24">
		<div class="col-lg-8 col-md-8 text-center"><img class="radius-50 avatar" width="200px" height="200px" src="{{$user->url_avatar}}" alt=""></div>
		<div class="col-lg-16 col-md-16">
			<div class="spacer-xs"></div>
			<p class="t-s-2">Bonjour {{Auth::user()->username}}</p>
			<a href="{{url('professeur/profil')}}" class="link-action-tab" id="link-4"><i class="fa fa-angle-right" aria-hidden="true"></i> Modifier votre profil</a>
		</div>
	</div>
	<div class="spacer-xs"></div>
	<div class="row">
		<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Statistiques</p>
	</div>
	<div class="row col-lg-24 col-md-24">
		<div class="col-lg-8 padding-lf-3">
			<p><span class="t-s-3 t-base-blue t-bold">{{count($qcms)}}</span> QCM</p>
			<a href="{{url('professeur/qcm')}}" class="link-action-tab" id="link-1"><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des QCM</a>
		</div>
		<div class="col-lg-8 padding-lf-3">
			<p><span class="t-s-3 t-base-blue t-bold">{{count($articles)}}</span> Articles</p>
			<a href="{{url('professeur/article')}}" class="link-action-tab" id="link-2"><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des articles</a>
		</div>
		<div class="col-lg-8 padding-lf-3">
			<p><span class="t-s-3 t-base-blue t-bold">{{count($students)}}</span> &Eacute;lèves</p>
			<a href="{{url('professeur/eleve')}}" class="link-action-tab" id="link-3"><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des élèves</a>
		</div>
	</div>
	<div class="spacer-xs"></div>
	<div class="row">
		<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Activitées récentes</p>
	</div>
	<div class="row col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1">
		<div class="spacer-xs"></div>
		<div class="col-lg-12 col-md-12">
			<p>Derniers QCM</p>
			<div class="bg-grey">
				@foreach($qcmsLimit as $qcm)
				<li class="padding-2">
					<span>{{ Carbon\Carbon::parse($qcm->created_at)->format('H\hi - d/m/Y') }}</span>&nbsp;&nbsp;<span class="t-base-blue t-bold t-s-1_5">{{$qcm->title}}</span>
				</li>
				<hr>
				@endforeach
			</div>
		</div>
		<div class="col-lg-12 col-md-12">
			<p>Derniers articles</p>
			<div class="bg-grey">
				@foreach($articlesLimit as $article)
				<li class="padding-2">
					<span>{{ Carbon\Carbon::parse($article->created_at)->format('H\hi - d/m/Y') }}</span>&nbsp;|&nbsp;<span class="t-base-blue t-bold"> <a href="{{url('actualite/'.$article->id.'/'.$article->title)}}">{{$article->title}}</a></span>
					<p>{{ str_limit($article->content, $limit = 100, $end = '') }} <a href="{{url('actualite/'.$article->id.'/'.$article->title)}}"><strong>Lire la suite</strong></a></p>
				</li>
				@endforeach
			</div>
		</div>
	</div>
	<div class="row col-lg-24 col-md-24">
		<div class="spacer-xs"></div>
		<div class="col-lg-8 col-md-8 col-lg-offset-16 col-md-offset-16">
			<li><a href="{{url('professeur/qcm/create')}}" id="new-qcm"><i class="fa fa-angle-right" aria-hidden="true"></i> Création d'un nouveau QCM</a></li>
			<li><a href="{{url('professeur/article/create')}}" id="new-article"><i class="fa fa-angle-right" aria-hidden="true"></i> Création d'un nouvel article</a></li>
		</div>
	</div>
	<div class="spacer-md"></div>
</div>
@endsection