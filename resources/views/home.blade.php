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
        <section class="content">
            <div class="row">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4"">
                        @foreach ($productos as $producto)
                        <div class="col-md-4">
                            <div class="card h-100">
                                <img src="{{ asset($producto->fotografia) }}" class="card-img-top" alt="{{ $producto->producto }}" style="width: 100%; height: 370px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $producto->producto }}</h5>
                                    <p class="card-text">{{ $producto->descripcionp }}</p>
                                    <p class="card-text">$ {{ $producto->precio }} .00</p>
                                    <form method="POST" action="{{ route('agregar.al.carrito') }}">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                        <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
@endsection
