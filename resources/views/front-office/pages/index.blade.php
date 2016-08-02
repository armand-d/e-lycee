@extends('layouts.master')

@section('title') Accueil @stop

@section('content')
<div class="home">
	<div class="spacer-md"></div>

	<div class="row">
		<div class="col-sm-6">
			<div class="spacer-xs"></div>
			<p class="text-right t-s-2">Le Lycée</p>
			<p class="text-center bg-dark-grey t-white padding-2 t-s-2 t-light">Marcel <br>Gimond</p>
		</div>

		<div class="col-sm-12">
			<p class="row bg-grey padding-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus doloremque voluptatum quis labore a cumque, dignissimos in, quod officia praesentium at hic dolore accusantium sint veritatis ad expedita eligendi fugit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus doloremque voluptatum quis labore a cumque, dignissimos in, quod officia praesentium at hic dolore accusantium sint veritatis ad expedita eligendi fugit
			</p>
			<div class="spacer-xs"></div>
			
			<div class="row">
				<div class="line-deco col-sm-8"></div>
				<div class="col-sm-4"><button class="btn-line t-bold"><a href="{{url('presentation')}}">PR&Eacute;SENTATION</a></button></div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="spacer-xs"></div>
			<img src="{{Request::root('/').'/assets/images/marcel.png'}}" class="col-xs-24" alt="">
		</div>
	</div>
	<div class="spacer-md"></div>

	<p class="t-s-2 col-sm-24">Les formations</p>
	<div id="formations">
		<li class="col-sm-8"><p class="text-center t-white padding-4 t-s-2">Générales</p></li>
		<li class="col-sm-8"><p class="text-center t-white padding-4 t-s-2">Technologique</p></li>
		<li class="col-sm-8"><p class="text-center t-white padding-4 t-s-2">Professionnelle</p></li>
	</div>
	<div class="spacer-md"></div>

	<p class="t-s-2 col-md-24" ><a href="{{url('actualites')}}">L'actualité</a></p>
	<div class="col-md-8">@include('front-office.partials.twitter')</div>
	<div id="actualite">
		<li class="col-md-8"><p class="text-center t-black padding-4 t-s-2">Article 1</p></li>
		<li class="col-md-8"><p class="text-center t-black padding-4 t-s-2">Article 2</p></li>
		<li class="col-md-8"><p class="text-center t-black padding-4 t-s-2">Article 3</p></li>
		<li class="col-md-8"><p class="text-center t-black padding-4 t-s-2">Article 4</p></li>
	</div>
	<div class="spacer-xs"></div>
	<div class="row col-md-24">
		<div class="col-md-16"><span class="line-deco col-xs-24"></span></div>
		<div class="col-md-8"><button class="btn-line t-bold col-xs-24"><a href="{{url('actualites')}}">TOUTES LES ACTUALIT&Eacute;S</a></button></div>
	</div>
	<div class="spacer-md"></div>


</div>
@stop