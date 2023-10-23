@extends('plantilla')
@section('titulo')
    - Home - Tienda
@endsection
    @section('additionals_css')
@endsection
@section('content')
<style>
.bodyy {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.slider {
  display: flex;
  height: auto;
  margin: auto;
  overflow: hidden;
  align-items: center;
}
.slider:before {
  position: absolute;
  z-index: 1;
  left: 0;
  content: "";
  width: 23.958%;
  height: 110px;
  background: linear-gradient(-90deg, hsla(0, 0%, 96.9%, 0), #f7f7f7);
}

.slider:after {
  position: absolute;
  right: 0;
  content: "";
  width: 23.958%;
  height: 110px;
  background: linear-gradient(
    90deg,
    hsla(0, 0%, 96.9%, 0),
    hsla(0, 0%, 96.9%, 0.99) 99%
  );
}
.slider .slide-track {
  display: flex;
  animation: scroll 35s linear infinite;
  -webkit-animation: scroll 35s linear infinite;
  width: calc(240px * 10);
}
.slider .slide {
  cursor: pointer;
  width: 180px;
  height: auto;
  padding: 10px;
  margin: 20px;
  background-color: white;
  border-radius: 8px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px,
    rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}

.slider .slide img {
  height: auto;
  width: 160px
}

.rectangulo {
  margin: 117px;
}

    .titulo{
    justify-content: center;
    text-align: center;
    font-size: 20px;
    color: rgb(255, 255, 255);
    }
    .img-cards-venta{
    width: auto; /* La imagen no excederá el ancho de la columna */
    height: 400px; /* La altura se ajustará automáticamente para mantener la proporción de la imagen */
    padding: 10%;
}


@keyframes scroll {
  0% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }

  100% {
    -webkit-transform: translateX(calc(-240px * 5));
    transform: translateX(calc(-240px * 5));
  }
}
</style>


    <div class="content-wrapper">
        <!-- Otras partes de tu vista -->

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- Tu encabezado aquí -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($productos as $producto)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="{{ asset($producto->fotografia) }}" class="card-img-top" alt="{{ $producto->producto }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $producto->producto }}</h5>
                                            <p class="card-text">{{ $producto->descripcionp }}</p>
                                            <p class="card-text">$ {{ $producto->precio }} .00</p>
                                            <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
@endsection
