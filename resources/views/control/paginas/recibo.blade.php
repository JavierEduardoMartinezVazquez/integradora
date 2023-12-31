<style>
    body{
	background-color: #391602;
}
.card{
	background-color: #fff;
	width: 280px;
	padding: 1.96rem !important;
}
.profile-image{
}
.name{
	font-size: 12px;
	font-family: sans-serif;
	color: #060606;
	text-align: left;
	top: 8px;
}
.mail{
	font-size: 9px;
	color: grey;
	position: relative;
	top: 2px;
}

.codi{
	position: center;
}

.primero{
	font-family: sans-serif;
	font-size: 12px;
	color: rgb(0, 0, 0);
	align-items: center;
	top: 2px;
	display: flex;
}

.espacio{
	font-size: 6px;
	color: rgb(255, 255, 255);
	position: justify;
	top: 2px;
}

.letra{
	font-family: sans-serif;
	font-size: 10px;
	color: rgb(75, 75, 75);
	position: justify;
	padding: 10px;
}





<style>
    /* Your existing styles here */
</style>

    <div class="card">
        <center>
            <img src="control/img/favicon.png" class="img-fluid profile-image" style="width: 150px">
        </center>
        <h5 class="name">SOPAMEX</h5>
        <div class="primero">

            <table>
                <tr>
                    <td>Productos</td>
                    <td>Cantidad</td>
                    <td></td>
                    <td>SubTotal</td>
                </tr>
@foreach ($data as $compra)

                <tr>
                    <td>
                        {{ $compra->producto }}..................
                    </td>
                    <td>
                        {{ $compra->cantidadcompra }}
                    </td>
                    <td></td>
                    <td>
                        ${{ $compra->total }}.00
                    </td>
                </tr>
                <!-- You can add more rows if needed for each purchase -->
                <!-- Repeat the above <tr> block for each purchase in the array -->
                <!-- ... -->

@endforeach
        <tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>${{ $data->sum_total}}</td>
                </tr>
            </table>
        </div>
        <br>
        <h5 class="name">Codigo de pago</h5>
        <div style="codi">
            <center>
                {!! DNS1D::getBarcodeHTML("$compra->id", 'C128', 3) !!}
            </center>
        </div>

    </div>

</style>
