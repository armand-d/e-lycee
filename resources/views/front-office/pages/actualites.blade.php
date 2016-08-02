@extends('layouts.master')

@section('content')

@include('front-office.partials.twitter')

<!-- Tous les articles avec nav catégories  -->
<nav class="navbar">
      <ul class="nav">

		@foreach($articles as $article)
			<p>titre :	{{ $article->title }}</p> 
			<p>user : {{ $article->user['username'] }} </p>
			<img src="{{ $article->url_thumbnail }}">
			{{ $article->url_thumbnail }}
		@endforeach

	  </ul>
</nav>


		
@endsection