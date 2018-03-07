<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>PRUEBA</title>
        <meta name="description" content="Responsive Animated Border Menus with CSS Transitions" />
        <meta name="keywords" content="navigation, menu, responsive, border, overlay, css transition" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/icons.css" />
        <link rel="stylesheet" type="text/css" href="css/style5.css" />
        <script src="js/modernizr.custom.js"></script>
        
        <style>
            .full-height {
                height: 100vh;
            }

          
            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #FFF;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
         <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">ADMIN</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        <div class="container">
            <header class="codrops-header">
                <h1>EJERCICIO DE LARAVEL<span>Sebastian Coronel</h1>
                <div class="codrops-related">
                   NECESITAS <a href="{{route('login')}}"> ACCEDER</a>  O <a href="{{route('register')}}"> REGISTRARTE</a> PARA USAR TODAS LAS FUNCIONES
                </div>
            </header>
            <nav id="bt-menu" class="bt-menu">
                <a href="#" class="bt-menu-trigger"><span>Menu</span></a>
                <ul>
                    <li><a style="line-height: 25px;" href="{{action('ProvinciaController@index')}}">VER PROVINCIAS</a></li>
                    <br>
                </ul>
                
            </nav>
        </div>
        </div>
    </body>
    <script src="js/classie.js"></script>
    <script src="js/borderMenu.js"></script>
</html>