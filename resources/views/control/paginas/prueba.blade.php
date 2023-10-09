@extends('plantilla')
@section('titulo')
    Prueba
  
@section('content')

<body>
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


</body>
@endsection



@include('control.modal.modal_alta')
@include('control.modal.modal_baja')
@endsection
@section('additionals_js')
@endsection
