@section('content')
@extends('layouts.app')
@section('titulo')
    - Login
@endsection
<head>
    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="shortcut icon" href="control/img/favicon.png">
      
      <!-- Font Awesome icons (free version)-->
      <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
      <!-- Google fonts-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="css/styles.css" rel="stylesheet" />
</head>

<div class="card-group">
    <div class="card">
      <div class="card-body">
        <center>
            <h2>
                <strong>
                    <p class="text-secondary">L O G I N</p>
                </strong>
            </h2>
            <div class="col-md-1 border border-warning"></div>
        </center>
        <div class="salto"></div>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-center">{{ __('E-Mail') }}</label>
                                        <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        <br>
                                        <label for="password" class="col-md-4 col-form-label text-md-center">{{ __('Contraseña') }}</label>
                                        <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        <div class="salto"></div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Recuerdame') }}
                                                </label>
                                        </div>
                                        <div class="form-group row mb-04">
                                            <div class="col-md-4 offset-md-8">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Listo') }}
                                                </button>
                                            </div>
                                        </div>
                                        <a class="btn btn-link" href="{{ route('register') }}">Registrate</a>
                                    </div> 
                                     @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <div class="card">
        <div class="card-body">
          <img src="control/img/bolis.jpg" class="imglogin">
        </div>
    </div>
</div>

@endsection

