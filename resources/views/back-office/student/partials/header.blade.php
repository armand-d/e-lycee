<div class="container">
	<div class="row">
		@include('front-office.partials.logo')
		<div class="col-lg-12 p-relative">
			<div class="col-lg-12 col-lg-offset-12">
				<div class="col-lg-4 col-lg-offset-4 border-right text-center"><a href="#" id="btn-search"><i class="fa fa-search"></i></a></div>
				<div class="col-lg-4 border-right text-center"><i class="fa fa-bell"></i></div>
				<div class="col-lg-8 border-right text-center" id="name-user"><a href="{{url('professeur')}}" class="t-bold">{{Auth::user()->username}}</a></div>
				<div class="col-lg-4 text-center"><a href="#" id="menu-caret"><i class="fa fa-caret-down"></i></a>
					<div class="menu-caret">
						<hr>
						<li><a href="{{url('logout')}}"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Déconnexion</a></li>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
