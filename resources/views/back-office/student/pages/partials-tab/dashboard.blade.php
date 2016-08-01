<div class="spacer-xs"></div>
<div class="row col-lg-24 col-md-24">
	<div class="col-lg-8 col-md-8 text-center"><img class="radius-50 avatar" width="200px" height="200px" src="{{$user->url_avatar}}" alt=""></div>
	<div class="col-lg-16 col-md-16">
		<div class="spacer-xs"></div>
		<p class="t-s-2">Bonjour {{Auth::user()->username}}</p>
		<a href="" class="link-action-tab" id="link-4"><i class="fa fa-angle-right" aria-hidden="true"></i> Modifier votre profil</a>
	</div>
</div>
<div class="spacer-xs"></div>
<div class="row">
	<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Statistiques</p>
</div>
<div class="row col-lg-24 col-md-24">
	<div class="col-lg-8 padding-lf-3">
		<p><span class="t-s-3 t-base-blue t-bold">{{count($qcms)}}</span> QCM</p>
		{{-- <a href="#QCM" class="link-action-tab" id="link-1"><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des QCM</a> --}}
	</div>
	<div class="col-lg-8 padding-lf-3">
		<p><span class="t-s-3 t-base-blue t-bold">{{$scoreUser}}</span> Score</p>
		{{-- <a href="" class="link-action-tab" id="link-2"><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des articles</a> --}}
	</div>
	<div class="col-lg-8 padding-lf-3">
		<p><span class="t-s-3 t-base-blue t-bold">{{round($average, 2)}}</span> Moyenne</p>
		{{-- <a href="" class="link-action-tab" id="link-3"><i class="fa fa-angle-right" aria-hidden="true"></i> Gestion des élèves</a> --}}
	</div>
</div>
<div class="spacer-xs"></div>
<div class="row">
	<p class="col-lg-21 col-md-21 col-lg-offset-1 col-md-offset-1 t-s-1_5 border-bottom">Activitées récentes</p>
</div>
<div class="row col-lg-24 col-md-24">
	<div class="spacer-xs"></div>
	<div class="col-lg-8 col-md-8 col-lg-offset-16 col-md-offset-16">
		{{-- <li><a href="#QCM" id="new-qcm"><i class="fa fa-angle-right" aria-hidden="true"></i> Création d'un nouveau QCM</a></li>
		<li><a href="#article" id="new-article"><i class="fa fa-angle-right" aria-hidden="true"></i> Création d'un nouvel article</a></li> --}}
	</div>
</div>
<div class="spacer-md"></div>
