<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-lycée - @yield('title') </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    {!!Html::style('assets/stylesheets/styles.css')!!}
    {!!Html::style('assets/stylesheets/animate.css')!!}
    {!!Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css')!!}

</head>
<body>
    <div id="no-click-search"></div>
    @include('front-office.partials.search')
<header>
    @if (Auth::check() && Auth::user()->role == 'teacher')
        @include('back-office.teacher.partials.header')
    @elseif (Auth::check() && Auth::user()->role != 'teacher')
        @include('back-office.student.partials.header')
    @else
        @include('front-office.partials.header')
    @endif
</header>

<div>
    @if(Route::current()->getPath() === '/')
        @include('front-office.partials.slider')
    @endif
    <div class="container">
        @yield('content')
    </div>
</div>

<footer>
    @include('front-office.partials.footer')
</footer>

    {!!Html::script('https://code.jquery.com/jquery-3.1.0.min.js')!!}
    <!-- {!!Html::script('assets/javascripts/bootstrap.min.js')!!} -->
    {!!Html::script('assets/javascripts/script.js')!!}

</body>
</html>