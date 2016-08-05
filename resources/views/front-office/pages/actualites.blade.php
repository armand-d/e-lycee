@extends('layouts.master')

@section('content')

<div class="row">
		@foreach($actualites as $actualite)
			<div class="col-lg-16 col-md-16 col-lg-offset-4 col-md-offset-4 col-sm-16 col-xs-16 col-sm-offset-4 col-xs-offset-4 actualites row">
				<p class="t-s-1_5"><a href="{{url('actualite/'.$actualite->id.'/'.$actualite->title)}}">{{$actualite->title}}</a></p> 
				<p>{{ $actualite->user['username'] }} - {{ Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y') }}</p>
				<div class="col-lg-10 col-md-10">
					<img src="{{ $actualite->url_thumbnail }}">
				</div>
				<div class="col-lg-14 col-md-14">
					<p>{{ str_limit($actualite->content, $limit = 150, $end = '') }} <a href="{{url('actualite/'.$actualite->id.'/'.$actualite->title)}}"><strong>Lire la suite</strong></a></p>
				</div>
			</div>
		@endforeach
		<div class="clearfix"></div>
		<center>
			<div class="row">{!! $actualites->render() !!}</div>
		</center>
</div>
		
@endsection