@if(!Auth::check())
<div class="menu-caret-mobil hidden-md hidden-lg">
    <hr>
    <li><a href="{{url('actualites')}}">Actualités</a></li>
    <hr>
    <li><a id="login" data-toggle="modal" data-target="#myModal">Connexion</a></li>
    <hr>
    <li><a id="btn-search">Rechercher</a></li>  
    <hr>
</div>
@else
<div class="menu-caret-mobil hidden-md hidden-lg">
<hr>
<li><i class="fa fa-user" aria-hidden="true"></i>
    <a href="@if (Auth::user()->role == 'teacher'){{url('professeur/tableau-de-bord')}} @else (Auth::user()->role == 'student'){{url('etudiant/tableau-de-bord')}} @endif" class="t-bold">{{Auth::user()->username}}</a>
</li>
<hr>
<li>
    <p><i class="fa fa-bell"></i> Notifications</p>
</li>
<hr>
<li>
    <a id="btn-search-mobil"><i class="fa fa-search"></i> Recherche</a>
</li>
<hr>
<li>
    <a href="{{url('logout')}}"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Déconnexion</a>
</li>
<hr>    
</div>
@endif