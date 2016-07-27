@extends('layouts.master')

@section('title') Accueil @stop

@section('content')
<div class="home">
	<div class="spacer-md"></div>
	<div class="row col-lg-24">
		<div class="col-lg-6">
			<div class="spacer-xs"></div>
			<p class="text-right t-s-2">Le Lycée</p>
			<p class="text-center bg-dark-grey t-white padding-2 t-s-2 t-light">Marcel <br>Gimond</p>
		</div>
		<div class="col-lg-12">
			<p class="bg-grey padding-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus doloremque voluptatum quis labore a cumque, dignissimos in, quod officia praesentium at hic dolore accusantium sint veritatis ad expedita eligendi fugit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus doloremque voluptatum quis labore a cumque, dignissimos in, quod officia praesentium at hic dolore accusantium sint veritatis ad expedita eligendi fugit
			</p>
			<div class="spacer-xs"></div>
			<div class="row col-lg-24">
				<div class="col-lg-18"><span class="line-deco col-lg-24"></span></div>
				<div class="col-lg-6"><button class="btn-line t-bold">PR&Eacute;SENTATION</button></div>
			</div>
		</div>
		<div class="col-lg-6"><div class="spacer-xs"></div><img src="{{Request::root('/').'/assets/images/marcel.png'}}" class="col-lg-24" alt=""></div>
	</div>
	<div class="spacer-md"></div>
	<p class="t-s-2 col-lg-24">Les formations</p>
	<div id="formations">
		<li class="col-lg-8"><p class="text-center t-white padding-3 t-s-2">Générales</p></li>
		<li class="col-lg-8"><p class="text-center t-white padding-3 t-s-2">Technologique</p></li>
		<li class="col-lg-8"><p class="text-center t-white padding-3 t-s-2">Professionnelle</p></li>
	</div>
</div>
@stop