
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Agnamstore</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>

    <!-- Styles -->
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/AgnamStore.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body>
<nav class="navbar navbar-agnam">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo" src="/images/logo2.png" title="Logo AgnamStore"/>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Genre
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('showProductsByType', 1) }}">Manga</a></li>
                        <li><a href="{{ route('showProductsByType', 2) }}">Anime</a></li>
                        <li><a href="{{ route('showProductsByType', 3) }}">Light Novel</a></li>
                        <li><a href="{{ route('showProductsByType', 4) }}">Film</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Connexion</a></li>
                    <li><a href="{{ url('/register') }}">Inscription</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span
                                    class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->isAdmin())
                                <li><a href="{{ route('admin.index') }}"><i class="fa-btn fa fa-wrench"></i>Administration</a></li>
                            @endif
                                <li><a href="{{ route('user.cart') }}"><i class="glyphicon glyphicon-shopping-cart"></i>Panier</a></li>
                                <li><a href="{{ route('user.profile') }}"><i class="fa fa-btn fa-user"></i>Mon profil</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Deconnexion</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@if(Session::has('success'))
    <div class="container">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif
@yield('content')

        <!-- JavaScripts -->
<script src="/lib/jquery/jquery-1.11.1.min.js"></script>
<script src="/lib/bootstrap/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
