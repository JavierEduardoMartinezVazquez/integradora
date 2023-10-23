@extends('plantilla')
@section('titulo')
    - Home - Tienda
@endsection
    @section('additionals_css')
@endsection
@section('content')
<style>

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
                            <div class="row row-cols-1 row-cols-md-3 g-4"">
                                @foreach ($productos as $producto)
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <img src="{{ asset($producto->fotografia) }}" class="card-img-top" alt="{{ $producto->producto }}" style="width: 100%; height: 320px;">
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
