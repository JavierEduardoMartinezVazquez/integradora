



<table class="table table-bordered">
    @foreach ($assistance as $item)

    <thead>
        <tr>
            <td colspan="2">Asistencia</td>
            <td colspan="2">Fecha: {{$item->Fecha}}</td>
        </tr>
    </thead>

    <thead>
      <tr>
        <th scope="col">Empresa</th>
        <th scope="col">Empleado</th>
        <th scope="col">Entrada</th>
        <th scope="col">Salida</th>
      </tr>
    </thead>

    <tbody>

      <tr>
        <td>{{$item->business}}</td>
        <td>{{$item->Usuario}}</td>
        <td>{{$item->Entrada}}</td>
        <td>{{$item->Salida}}</td>
      </tr>


    </tbody>
    @endforeach
</table>
