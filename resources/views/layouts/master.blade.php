<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-lycée - @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')!!}    
    {!!Html::style('assets/style/stylesheets/screen.css')!!}
</head>
<body>
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
    <div class="container">
        @yield('content')
    </div>
</div>

<footer>
    @include('front-office.partials.footer')
</footer>

    {!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')!!}
    {!!Html::script('assets/js/script.js')!!}

</body>
</html>