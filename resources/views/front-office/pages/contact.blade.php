@extends('layouts.master')

@section('content')
	<h1 class="text-center">Contact</h1>
	<div class="col-lg-16 col-lg-offset-4 col-md-16 col-md-offset-4 contact bg-white">	
	<div class="spacer-xs"></div>
	{{Form::open(array('url'=>'contact/send/', 'method'=>'POST'))}}
		<li>{{Form::email('email', old('email'), array('class'=>'input-grey','placeholder'=>'Email'))}}</li>
    	@if($errors->has('email')) <span class="error">{{$errors->first('email')}} </span>@endif</li>
		<li>{{Form::text('subject', old('subject'), array('class'=>'input-grey','placeholder'=>'Sujet'))}}</li>
    	@if($errors->has('subject')) <span class="error">{{$errors->first('subject')}} </span>@endif</li>
    	<li>{{Form::textarea('content', old('content'), array('class'=>'input-grey','placeholder'=>'Votre message...'))}}</li>
		<li>@if($errors->has('content')) <span class="error">{{$errors->first('content')}} </span>@endif</li>
		<li>{{Form::submit('Envoyer', array('class' => 'submit-form'))}}</li>
	{{Form::close()}}
	<div class="spacer-xs"></div>
	</div>
@endsection