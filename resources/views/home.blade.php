@extends('plantilla')
@section('titulo')
    Home
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
<body>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-12">
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card" style="background-color: #bdbdbd">
                <div class="card-header">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card mb-4">
                                  <div class="card-body text-center">
                                    <img src="{{ Auth::user()->foto }}" alt="user" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">{{ Auth::user()->name }}</h5>
                                    <p class="text-muted mb-1">{{ Auth::user()->puesto }}</p>
                                    <div class="d-flex justify-content-center mb-2">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <p class="mb-0">CURP</p>
                                          </div>
                                          <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ Auth::user()->curp }}</p>
                                          </div>
                                        </div>
                                      <hr>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <p class="mb-0">Correo empresarial</p>
                                          </div>
                                          <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                          </div>
                                        </div>
                                      <hr>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <p class="mb-0">Telefono</p>
                                          </div>
                                          <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ Auth::user()->tel }}</p>
                                          </div>
                                        </div>
                                      <hr>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <p class="mb-0">Empresa</p>
                                          </div>
                                          <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ Auth::user()->empresa_id }}</p>
                                          </div>
                                        </div>
                                      <hr>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <p class="mb-0">RFC</p>
                                          </div>
                                          <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ Auth::user()->rfc }}</p>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="card mb-4">
                                  <div class="card-body text-center" style="background-color: #411600; border-radius:5px">
                                    <div class="d-flex justify-content-center mb-2">
                                        <div class="rectangulo"></div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="text-color">
                    <h1 class="display-6 text-danger">¿Quienes somos?</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <h6 class="text-secondary text-justify">Somos una empresa integral 100% mexicana, nos encontramos fuertemente consolidada en el Estado de México, con 18 años de experiencia en el ramo de mantenimiento y reparación de unidades colisionadas, restauración, modificación y adaptaciones a tracto camiones, autobuses, pipas, cajas , remolques y equipo aliado.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 --}}
        <div class="slider">
          <div class="slide-track">

            <div class="slide"><img src="control\img\receta1.jpg" alt="">
            </div>
            <div class="slide"><img src="control\img\receta2.jpg" alt="">
            </div>
            <div class="slide"><img src="control\img\receta3.jpg" alt="">
            </div>
            <div class="slide"><img src="control\img\receta1.jpg" alt="">
            </div>
            <div class="slide"><img src="control\img\receta2.jpg" alt="">
            </div>
            <div class="slide"><img src="control\img\receta3.jpg" alt="">
            </div>


            <div class="slide"><img src="control\img\receta1.jpg" alt="">
            </div>
            <div class="slide"><img src="control\img\receta2.jpg" alt="">
            </div>
            <div class="slide"><img src="control\img\receta3.jpg" alt="">
            </div>
            <div class="slide"><img src="control\img\receta1.jpg" alt="">
            </div>
            <div class="slide"><img src="control\img\receta2.jpg" alt="">
            </div>
            <div class="slide"><img src="control\img\receta3.jpg" alt="">
            </div>

          </div>
        </div>
    </div>
</body>
@endsection
