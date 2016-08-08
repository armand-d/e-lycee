<ul class="nav nav-tabs" id="myTab">
  
  <li class="@if(Route::current()->getPath() === 'etudiant/tableau-de-bord') active @endif">
  	<a href="{{url('etudiant/tableau-de-bord')}}">Tableau de bord</a>
  </li>

  <li class="@if(Route::current()->getPath() === 'etudiant/qcm' || Route::current()->getPath() === 'etudiant/qcm/create' || Route::current()->getPath() === 'etudiant/qcm/{id}/edit') active @endif">
  	<a href="{{url('etudiant/qcm')}}" id="btn-1">QCM</a>
  </li>

  <li class="@if(Route::current()->getPath() === 'etudiant/profil') active @endif">
  	<a href="{{url('etudiant/profil')}}" id="btn-4">Profil</a>
  </li>
</ul>