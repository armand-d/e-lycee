<div class="content-search">
	<div class="row">
		{{Form::open(array('url'=>'search','method'=>'get'))}}
			<input type="text" name="q" class="col-lg-20" placeholder="Rechercher...">
			<button type="submit" class="col-lg-4"><i class="fa fa-search"></i></button>
		{{Form::close()}}
	</div>
</div>