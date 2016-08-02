@include('front-office.partials.login')
<div class="container">
	<div class="row">
		@include('front-office.partials.logo')
		<div class="col-xs-12">
			<div class="col-xs-20 col-md-offset-4">
				<div class="col-xs-5 text-center"><a href="{{url('actualites')}}">Actualités</a></div>
				<div class="col-xs-5 text-center"><a href="" id="login" data-toggle="modal" data-target="#myModal">Connexion</a></div>
				<div class="col-xs-5 text-center"><a href="" id="btn-search">Rechercher</a></div>
				<div class="col-xs-5 col-md-offset-4">
					<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
				</div>
			</div>
		</div>
	</div>
</div>
