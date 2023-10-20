@section('content')
@extends('layouts.app')
@section('titulo')
 - Restablecer contraseña
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
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
</style>

<body>
    <center>
        <h2>
            <strong>
                <p class="text-secondary">R E C U P E R A R <br> C O N T R A S E Ñ A</p>
            </strong>
        </h2>
        <div class="col-md-1 border border-warning"></div>
        <br>
    </center>
<div class="card-group">    
            <div class="container-fluid">
                <div class="row justify-content-md-center row mb-6">
                    <div class="col-sm-12">
                        <div class="card" style="padding: 10%">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="container-fluid">
                                    <div class="row justify-content-md-center">
                                        <div class="col-sm-12">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                
                                    <div class="form-group row">
                                        <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('Ingresa tu e-mail') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-12">
                                        <div class="col-md-6 offset-4">
                                            <br>
                                            <button type="submit" class="btn btn-secondary">
                                                {{ __('Restablecer') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
@endsection
