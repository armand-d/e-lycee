<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-lycée - @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    {!!Html::style('assets/stylesheets/styles.css')!!}
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

    <!-- {!!Html::script('assets/javascripts/bootstrap.min.js')!!} -->
    {!!Html::script('assets/javascripts/script.js')!!}

</body>
</html>