@extends('layouts.master')

@section('title') Accueil @stop

@section('content')
<div class="home">
<div class="spacer-md"></div>

<div class="row">
		<div class="col-sm-24 col-md-24">
			<div class="col-sm-6 col-md-6">
				<div class="spacer-xs"></div>
				<p class="text-right t-s-2">Le Lycée</p>
				<p class="text-center bg-dark-grey t-white padding-2 t-s-2 t-light">Marcel <br>Gimond</p>
			</div>

			<div class="col-sm-12 col-md-12">
				<p class="bg-grey padding-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus doloremque voluptatum quis labore a cumque, dignissimos in, quod officia praesentium at hic dolore accusantium sint veritatis ad expedita eligendi fugit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus doloremque voluptatum quis labore a cumque, dignissimos in, quod officia praesentium at hic dolore accusantium sint veritatis ad expedita eligendi fugit
				</p>
				<div class="spacer-xs"></div>

				<div class="row">
					<div class="col-md-16 col-sm-12 hidden-xs"><div class="line-deco col-xs-24"></div></div>
					<div class="col-md-8 col-sm-12"><button class="btn-line t-bold col-xs-24"><a href="{{url('presentation')}}">PR&Eacute;SENTATION</a></button></div>
				</div>
			</div>

			<div class="col-sm-6 col-md-6 col-xs-12 col-xs-offset-6 col-sm-offset-0" style="overflow: hidden;">
				<div class="spacer-xs"></div>
				<img src="{{Request::root('/').'/assets/images/marcel.png'}}" alt="" style="max-width: 100%;">
			</div>
		</div>
</div>

<div class="spacer-md"></div>

<div class="row">
	<p class="t-s-2 col-sm-24">Les formations</p>
</div>

<div class="row">
	<div id="formations">
		<li class="col-sm-8 col-xs-12"><p class="text-center t-white padding-4 t-s-2">Générales</p></li>
		<li class="col-sm-8 col-xs-12"><p class="text-center t-white padding-4 t-s-2">Technologique</p></li>
		<li class="col-sm-8 col-xs-24"><p class="text-center t-white padding-4 t-s-2">Professionnelle</p></li>
	</div>
</div>

<div class="spacer-md"></div>

<div class="row">
	<p class="t-s-2" ><a href="{{url('actualites')}}">L'actualité</a></p>
</div>

<div class="row">
	<div class="col-md-24 col-xs-24">
		<div class="col-md-8 col-xs-8 hidden-xs">@include('front-office.partials.twitter')</div>
		<div id="actualite">
			@foreach($actualites as $actualite)
				<div class="col-md-8 col-sm-8 col-xs-12">
					<li>
						<div class="article-thumbnail-home">
							<img width="100%" src="{{$actualite->url_thumbnail}}" alt="">
						</div>
						<p class="text-center t-black padding-2 t-s-1_5 no-wrap">{{$actualite->title}}</p>
						<a href="{{url('actualite/'.$actualite->id.'/'.$actualite->title)}}" class="link-action-tab" id="link-1"><small><i class="fa fa-angle-right" aria-hidden="true"></i> Lire l'article</small></a>
					</li>
				</div>
			@endforeach
		</div>
		<div class="spacer-xs"></div>
		<div class="row col-md-24">
			<div class="col-md-16 col-sm-10 hidden-xs"><span class="line-deco col-xs-24"></span></div>
			<div class="col-md-8 col-sm-12"><button class="btn-line t-bold col-xs-24"><a href="{{url('actualites')}}">TOUTES LES ACTUALIT&Eacute;S</a></button></div>
		</div>
	</div>
</div>

<div class="spacer-md"></div>

</div>
@stop