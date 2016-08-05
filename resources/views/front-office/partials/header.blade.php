@include('front-office.partials.login')

<div class="container">
	<div class="row">
		<div class="col-xs-24">

			<div class="col-sm-12 col-xs-12">
				@include('front-office.partials.logo')
			</div>
			@if (Auth::check())
				<div class="col-xs-12 p-relative visible-md visible-lg">
					<div class="col-xs-12 col-xs-offset-12">
						<div class="col-xs-4 col-xs-offset-4 border-right text-center"><a id="btn-search"><i class="fa fa-search"></i></a></div>
						<div class="col-xs-4 border-right text-center"><i class="fa fa-bell"></i></div>
						<div class="col-xs-8 border-right text-center" id="name-user">
							<a href="@if (Auth::user()->role == 'teacher'){{url('professeur/tableau-de-bord')}}
								 @else (Auth::user()->role == 'student'){{url('etudiant/tableau-de-bord')}}
								 @endif" class="t-bold">{{Auth::user()->username}}</a>
						</div>
						<div class="col-xs-4 text-center"><a id="menu-caret"><i class="fa fa-caret-down"></i></a>
							<div class="menu-caret">
								<hr>
								<li>
									<a href="{{url('logout')}}"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Déconnexion</a>
								</li>
								<hr>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 p-relative visible-xs visible-sm">
					<div class="col-xs-12 col-xs-offset-12">
						<div class="pull-right"><a id="menu-caret-mobil" class="t-s-2"><i class="fa fa-bars"></i></a>
						</div>
					</div>
				</div>
		    @else
				<div class="col-sm-12 visible-md visible-lg">
					<div class="col-sm-5 text-center"><a href="{{url('actualites')}}">Actualités</a></div>
					<div class="col-sm-5 text-center"><a id="login" data-toggle="modal" data-target="#myModal">Connexion</a></div>
					<div class="col-sm-5 text-center"><a id="btn-search">Rechercher</a></div>
					<div class="col-sm-5 col-md-offset-4">
						<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
					</div>
				</div>
				<div class="col-xs-12 p-relative visible-xs visible-sm">
					<div class="col-xs-12 col-xs-offset-12">
						<div class="pull-right"><a id="menu-caret-mobil" class="t-s-2"><i class="fa fa-bars"></i></a>
							
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
