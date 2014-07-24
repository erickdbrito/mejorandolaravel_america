<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
        @if (Auth::check())
        
          <ul class="nav navbar-nav pull-right">
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                  <span class="icon icon-wh i-profile"></span>
                  {{ Auth::user()->full_name }}
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('profile') }}">Editar perfil</a></li>
                  <li><a href="{{ route('account') }}">Editar usuario</a></li>
                  <li><a href="{{ route('logout') }}">Salir</a></li>
                </ul>
              </li>

          </ul>
        @else

          {{ Form::open(['route' => 'login', 'method' => 'POST', 'role' => 'form', 'class' => 'navbar-form navbar-right']) }}
            
            @if (Session::has('login_error'))
              <span class="label label-danger">Sesión no valida</span>
            @endif
            <div class="form-group">

              {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) }}

            </div>
            <div class="form-group">

              {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <div class="checkbox">
              <label for="remember" class="remember-me">
                {{ Form::checkbox('remember') }} Recordarme
              </label>
            </div>
          {{ Form::close() }}
          @endif
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    @yield('content')


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>
