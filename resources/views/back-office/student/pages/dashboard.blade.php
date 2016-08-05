@extends('layouts.master')

@section('content')
@include('back-office.student.partials.nav')
<div class="tab-pane active row" id="dashboard">
	<div class="spacer-xs"></div>
	<div class="row col-lg-24 col-md-24 col-xs-24">
		<div class="col-lg-8 col-md-8 text-center"><img class="radius-50 avatar" width="200px" height="200px" src="{{$user->url_avatar}}" alt=""></div>
		<div class="col-lg-16 col-md-16">
			<div class="spacer-xs"></div>
			<p class="t-s-2">Bonjour {{Auth::user()->username}}</p>
			<a href="{{url('etudiant/profil')}}" class="link-action-tab" id="link-4"><i class="fa fa-angle-right" aria-hidden="true"></i> Modifier votre profil</a>
		</div>
	</div>
	<div class="spacer-xs"></div>
	<div class="row">
		<p class="col-lg-21 col-md-21 col-xs-21 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 t-s-1_5 border-bottom">Statistiques</p>
	</div>
	<div class="row col-lg-24 col-md-24">
		<div class="col-lg-8 padding-lf-3">
			<p><span class="t-s-3 t-base-blue t-bold">{{count($scores)}}</span> QCM fait</p>
			{{-- <a href="#QCM" class="link-action-tab" id="link-1"><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des QCM</a> --}}
		</div>
		<div class="col-lg-8 padding-lf-3">
			<p><span class="t-s-3 t-base-blue t-bold">{{count($qcms) - count($scores)}}</span> Qcm restant</p>
			{{-- <a href="" class="link-action-tab" id="link-2"><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des articles</a> --}}
		</div>
		<div class="col-lg-8 padding-lf-3">
			<p><span class="t-s-3 t-base-blue t-bold">{{round($average, 2)}}</span>/20 de moyenne</p>
			{{-- <a href="" class="link-action-tab" id="link-3"><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des élèves</a> --}}
		</div>
	</div>
	<div class="spacer-xs"></div>
	<div class="row">
		<p class="col-lg-21 col-md-21 col-xs-21 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 t-s-1_5 border-bottom">Activitées récentes</p>
	</div>
	<div class="row col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1">
		<div class="spacer-xs"></div>
		<div class="col-lg-12 col-md-12">
			<p>Derniers QCM</p>
			<div class="bg-grey">
				@foreach($scores as $score)
				<li class="padding-2">
					<span>{{ Carbon\Carbon::parse($score->created_at)->format('H\hi - d/m/Y') }}</span>&nbsp;&nbsp;<span class="t-base-blue t-bold t-s-1_5">{{$score->qcm->title}}</span>
				</li>
				@endforeach
			</div>
		</div>
		<div class="col-lg-12 col-md-12">
			<p>Derniers commentaires</p>
			<div class="bg-grey">
				@foreach($comments as $comment)
				<li class="padding-2">
					<span>{{ Carbon\Carbon::parse($comment->created_at)->format('H\hi - d/m/Y') }}</span>&nbsp;|&nbsp;Article :<span class="t-base-blue t-bold"> <a href="{{url('actualite/'.$comment->post->id.'/'.$comment->post->title)}}">{{$comment->post->title}}</a></span>
					<p class="t-base-blue">{{$comment->post->title}}</p>
					<p>{{$comment->content}}</p>
				</li>
				@endforeach
			</div>
		</div>
	</div>
	<div class="spacer-md"></div>
</div>
@endsection