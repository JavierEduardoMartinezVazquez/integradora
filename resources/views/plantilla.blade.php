<!DOCTYPE html>
    <html lang="es">
        <head>
            <title>Sopamex @yield('titulo')</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

            @include('control.secciones.head')
            @yield('additionals_css')
        </head>
        <body class="hold-transition sidebar-mini layout-fixed text-sm">
                    <div class="wrapper">
                @include('control.secciones.header')
                @include('control.secciones.menu')
                @yield('content')
                <aside class="control-sidebar control-sidebar-dark">
            </aside>
                @include('control.secciones.footer')
            </div>
            @include('control.secciones.footer_lib')
            @yield('additionals_js')
        </body>
    </html>