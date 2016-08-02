@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-16 col-md-16 col-lg-offset-4 col-md-offset-4 article row">
		<a href="{{url('actualites')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Retour</a>
		<p class="t-s-1_5"><a href="{{url('actualite/'.$actualite->id.'/'.$actualite->title)}}">{{$actualite->title}}</a></p> 
		<p>{{ $actualite->user['username'] }} - {{ Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y') }}</p>
		<div class="col-lg-12 col-lg-offset-6 col-md-12 col-md-offset-6">
			<img src="{{ $actualite->url_thumbnail }}">
		</div>
		<div class="spacer-xs"></div>
		<div class="col-lg-16 col-lg-offset-4 col-md-16 col-md-offset-4">
			<p class="justify">{{$actualite->content}}</p>
		</div>
		<div class="spacer-xs"></div>
		<div class="col-lg-16 col-lg-offset-4 col-md-16 col-md-offset-4">
			<hr>
			<p class="t-s-1_5">Ajouter un commentaires</p>
			{{Form::open(array('url'=>'comment/create', 'method'=>'GET'))}}
				{{Form::hidden('status', '1')}}
			    <li>@if($errors->has('status')) <span class="error">{{$errors->first('status')}}@endif</li>
				{{Form::hidden('post_id', $actualite->id)}}
				{{Form::text('title', old('title'), array('placeholder'=>'Titre'))}}
			    <li>@if($errors->has('title')) <span class="error">{{$errors->first('title')}}@endif</li>
				{{Form::textarea('content', old('content'), array('placeholder'=>'Votre commentaire...'))}}
			    <li>@if($errors->has('content')) <span class="error">{{$errors->first('content')}}@endif</li>
				{{Form::submit('Ajouter', array('class'=>'submit-form'))}}
			{{Form::close()}}
			<hr>
			<p class="t-s-1_5">Commentaires</p>
			<ul>
			@foreach($actualite->comments as $comment)
				<li>
					<p><strong>{{$comment->title}}</strong></p>
					<small>{{ Carbon\Carbon::parse($comment->created_at)->format('d/m/Y - H:i:s') }}</small>
					<p>{{$comment->content}}</p>
				</li>
			@endforeach
			</ul>
		</div>
	</div>
</div>
		
@endsection