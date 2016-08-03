<ul class="nav nav-tabs" id="myTab">
  
  <li class="@if(Route::current()->getPath() === 'professeur/tableau-de-bord') active @endif">
  	<a href="{{url('professeur/tableau-de-bord')}}">Tableau de bord</a>
  </li>

  <li class="@if(Route::current()->getPath() === 'professeur/qcm' || Route::current()->getPath() === 'professeur/qcm/create' || Route::current()->getPath() === 'professeur/qcm/{id}/edit') active @endif">
  	<a href="{{url('professeur/qcm')}}" id="btn-1">QCM</a>
  </li>

  <li class="@if(Route::current()->getPath() === 'professeur/article' || Route::current()->getPath() === 'professeur/article/create') active @endif">
  	<a href="{{url('professeur/article')}}" id="btn-2">Articles</a>
  </li>

  <li class="@if(Route::current()->getPath() === 'professeur/eleve') active @endif">
  	<a href="{{url('professeur/eleves')}}" id="btn-3">&Eacute;lèves</a>
  </li>
  <li class="@if(Route::current()->getPath() === 'professeur/profil') active @endif">
  	<a href="{{url('professeur/profil')}}" id="btn-4">Profil</a>
  </li>
</ul>