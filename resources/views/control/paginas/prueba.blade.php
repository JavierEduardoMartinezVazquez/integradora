@extends('plantilla')
@section('titulo')
    Prueba
@endsection
    @section('additionals_css')
@endsection
@section('content')

<style>
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
</style>



    <div class="content-wrapper"> 
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                </div>
            </div>
        </section> 

        <section class="content">
            <div class="card">
                <div class="card-header" style="background-color: #8e4000">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="titulo">Tienda</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="control/img/tallarin.jpg" class="img-cards-venta">
                                                <div class="card-body">
                                                    <h5 class="card-title">Sopa de tallarin</h5>
                                                    <p class="card-text">Caja 12pz. Sopa de tallarin (mayoreo)</p>
                                                    <p class="card-text">$119.99</p>
                                                    <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="control/img/tallarin.jpg" class="img-cards-venta">
                                                <div class="card-body">
                                                    <h5 class="card-title">Sopa de tallarin</h5>
                                                    <p class="card-text">Caja 12pz. Sopa de tallarin (mayoreo)</p>
                                                    <p class="card-text">$119.99</p>
                                                    <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="control/img/tallarin.jpg" class="img-cards-venta">
                                                <div class="card-body">
                                                    <h5 class="card-title">Sopa de tallarin</h5>
                                                    <p class="card-text">Caja 24pz. Sopa de tallarin (mayoreo)</p>
                                                    <p class="card-text">$219.99</p>
                                                    <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="control/img/kids.jpg" class="img-cards-venta">
                                                <div class="card-body">
                                                    <h5 class="card-title">Sopa de kids</h5>
                                                    <p class="card-text">Caja 36pz. Sopa de kids (mayoreo)</p>
                                                    <p class="card-text">$319.99</p>
                                                    <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="control/img/kids.jpg" class="img-cards-venta">
                                                <div class="card-body">
                                                    <h5 class="card-title">Sopa de kids</h5>
                                                    <p class="card-text">Caja 12pz. Sopa de kids (mayoreo)</p>
                                                    <p class="card-text">$119.99</p>
                                                    <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="control/img/kids.jpg" class="img-cards-venta">
                                                <div class="card-body">
                                                    <h5 class="card-title">Sopa de tallarin</h5>
                                                    <p class="card-text">Caja 12pz. Sopa de kids (mayoreo)</p>
                                                    <p class="card-text">$119.99</p>
                                                    <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="control/img/bolis.jpg" class="img-cards-venta">
                                                <div class="card-body">
                                                    <h5 class="card-title">Sopa de bolis</h5>
                                                    <p class="card-text">Caja 36pz. Sopa de bolis (mayoreo)</p>
                                                    <p class="card-text">$319.99</p>
                                                    <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="control/img/bolis.jpg" class="img-cards-venta">
                                                <div class="card-body">
                                                    <h5 class="card-title">Sopa de bolis</h5>
                                                    <p class="card-text">Caja 12pz. Sopa de bolis (mayoreo)</p>
                                                    <p class="card-text">$119.99</p>
                                                    <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="control/img/bolis.jpg" class="img-cards-venta">
                                                <div class="card-body">
                                                    <h5 class="card-title">Sopa de tallarin</h5>
                                                    <p class="card-text">Caja 12pz. Sopa de bolis (mayoreo)</p>
                                                    <p class="card-text">$119.99</p>
                                                    <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection