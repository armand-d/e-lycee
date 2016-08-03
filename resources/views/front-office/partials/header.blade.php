@include('front-office.partials.login')

<div class="container">
	<div class="row">
		<div class="col-xs-24">

			<!-- LOGO -->
			<div class="pull-left col-sm-12 col-xs-14">
				@include('front-office.partials.logo')
			</div>
			@if (Auth::check())
			    <!-- MENU PRIVEE -->
			    <!-- XS //INVERSE ORDER FOR PULL-RIGHT -->
				<div class="pull-right navbar-right col-xs-10 p-relative">
					<div class="pull-right col-xs-2 text-center"><a href="#" id="menu-caret"><i class="fa fa-caret-down"></i></a>
						<div class="menu-caret">
							<li style="margin:15px;"><a href="{{url('logout')}}"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Déconnexion</a></li>
						</div>
					</div>

					<div class="pull-right col-xs-6 border-right text-center" id="name-user">
						<a href="@if (Auth::user()->role == 'teacher'){{url('professeur/tableau-de-bord')}}
								 @else (Auth::user()->role == 'student'){{url('etudiant/tableau-de-bord')}}
								 @endif"class="t-bold">{{Auth::user()->username}}</a>
					</div>
					<div class="pull-right col-xs-2 border-right text-center"><i class="fa fa-bell"></i></div>
					<div class="pull-right col-xs-2 border-right text-center">
						<a href="#" id="btn-search"><i class="fa fa-search"></i></a>
					</div>
				</div>
				
		    @else
				<!-- MENU PUBLIC -->
				<!-- SM -->
				<div class="col-sm-12 visible-sm visible-md visible-lg">
						<div class="col-sm-5 text-center"><a href="{{url('actualites')}}">Actualités</a></div>
						<div class="col-sm-5 text-center"><a href="" id="login" data-toggle="modal" data-target="#myModal">Connexion</a></div>
						<div class="col-sm-5 text-center"><a href="" id="btn-search">Rechercher</a></div>
						<div class="col-sm-5 col-md-offset-4">
							<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
						</div>
				</div>
				<!-- XS -->
				<div class="pull-right visible-xs col-xs-10">
					burger menu
				</div>
			@endif
		</div>
	</div>
</div>
