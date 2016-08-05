<!DOCTYPE html>
<html>
    <head>
        <title>404</title>
        <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
    	{!!Html::style('assets/stylesheets/404.css')!!}

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin: 0px;
            }
            a {
            	letter-spacing: 3px;
            	color: #333;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="glitch" data-text="404">404</div> 
                <p class="title">Cette page n'existe pas</p>
                <br>
                <a href="{{url('/')}}">Retourner sur le site</a>
            </div>
        </div>
    </body>
</html>
