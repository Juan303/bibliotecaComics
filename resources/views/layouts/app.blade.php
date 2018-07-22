<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

     
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                    <a class="navbar-brand" href="#">Biblioteca Comics</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contacto<span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                        @guest
                        <div class="row">
                            <div class="col-12">
                                <form class="form-inline my-2 my-lg-0" method="post" action="{{ url('/login') }}" aria-label="{{ __('Login') }}">
                                    {{ csrf_field() }}
                                    <div class="col-auto pl-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="material-icons">face</i>
                                                </div>
                                            </div>
                                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"  autofocus placeholder="Email..." autofocus>
                                            @if($errors->get('email'))
                                                @foreach($errors->get('email') as $error)
                                                   <div class="alert alert-danger" role="alert">
                                                        <strong>{{ $error }}</strong>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-auto pl-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">lock</i></div>
                                            </div>
                                            <input type="password" class="form-control" name="password" id="inlineFormInputGroup" placeholder="Contraseña" required>
                                            @if($errors->get('password'))
                                                @foreach($errors->get('password') as $error)
                                                   <span class="alert alert-danger" role="alert">
                                                        <strong>{{ $error }}</strong>
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-auto pl-0 pr-0">
                                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Login</button>
                                    </div>
                                </form>
                                @if(session('login_notification'))
                                    <div class="text-danger mt-1 mb-0" role="alert">
                                        {{ session('login_notification') }}
                                    </div>
                                @endif
                                <a class="" href="{{ route('register') }}">{{ __('Registrarse') }}</a> | 
                                <a class="" href="{{ route('password.request') }}">
                                    {{ __('Recordar contraseña') }}
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="dropdown">
                            <a class="btn btn-info" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="dropdown-item" href="{{ url('/home') }}">Mi biblioteca</a>
                                </li>
                                @if(auth()->user()->is_admin())
                                    <li>
                                        <hr>
                                        <a class="dropdown-item" href="{{ url('/admin/products') }}">Gestionar usuarios</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/admin/categories') }}">Gestionar categorias</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/admin/categories') }}">Gestionar tipos</a>
                                        <hr>
                                    </li>
                                @endif
                                <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endguest
                    </div>
                    </nav>	
                </div>
            </div>
        </div>
        
        @yield('content')
   
        <div class="container-fluid">
            <footer class="page-footer bg-light pt-4">
                <div class="row text-center text-xs-center text-sm-left text-md-left">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-1">
                        <ul class="list-unstyled list-inline social text-center">
                            <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-facebook-square"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                    </hr>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-dark">
                        <p> Desarrollado por <b>Juan Esteban</b> con Laravel</p>
                        <p class="h6">&copy Todos los derechos reservados.</p>
                    </div>
                    </hr>
                </div>
            </footer>
            </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    </body>
</html>
