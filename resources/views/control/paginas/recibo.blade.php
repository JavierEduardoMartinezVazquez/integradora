<style>
    body{
	background-color: #ec1c23;
	text-align: justify;
}
.card{
	background-color: #fff;
	width: 280px;
	border-radius: 2px;
	padding: 1.96rem !important;
}
.profile-image{
}
.name{
	font-size: 11px;
	font-family: sans-serif;
	color: #272727;
	position: relative;
	top: 8px;
}
.mail{
	font-size: 9px;
	color: grey;
	position: relative;
	top: 2px;
}

.atras{
	font-size: 15px;
	font-family: sans-serif;
	color: #272727;
	position: relative;
	top: 8px;
}

.codi{
	position: center;
}

.primero{
	font-family: sans-serif;
	border-left: 0px solid #5957f9;
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
	font-size: 9px;
	color: rgb(75, 75, 75);
	position: justify;
	top: 2px;
}



</style>
<div class="container d-flex justify-content-center">
	<div class="card">
		<div class="container">
			<center>
			<a class="espacio">
			-------------------------------------------------------------------------------------------------------
			
			<!-- CAMBIAR LOGOS EN LA CREDENCIAL -->

			<!-- LOGO SOCASA -->
			<img src="control/img/logo_socasa.png" class="img-fluid profile-image" width="70"> 
			
			<!-- LOGO TECNODIESEL 
			<img src="control/img/logo_TECNODIESEL.jpg" class="img-fluid profile-image" width="70">-->
			
			<!-- Fot de credencial -->
			<img class="img-fluid profile-image" src= "{{ $user->foto }}" width="80px" height="80px"/>


			<div>
				<h5 class="name">{{ $user->name }}
				{{ $user->lastname_p }}
				{{ $user->lastname_m }}
			</h5>
				<p class="mail">{{ $user->empresa_id }} </p>
			</div>
		</div>
</center>


<div class="primero">
	
</div> 
	<div class="primero">
		<table>
                <tr>
					<td>ID: {{ $user->id }}<br>
                    NSS: {{ $user->nss }} <br>
					Puesto: {{ $user->puesto }}</td>
					<br>
                </tr>            
            </table>
		</div>
        <br>
        <div style="codi">
			<center>
            <!--{!! DNS2D::getBarcodeHTML("'".$user->id."'", 'QRCODE', 3 ,3) !!}-->
			{!! DNS1D::getBarcodeHTML("$user->id", 'C128', 3) !!}
		</div>
		<br>
			<div class="letra">
				<!-- DIRECCIÓN -->

				<!-- SOCASA -->
				<center>AVENIDA PRINCIPAL #7 INT. 1, BO.EL ESPINO, XONACATLÁN, ESTADO DE MÉXICO. C.P.52067. R.F.C. 
				</center>

				<!-- SOCASA REFACCIONARIA
				<center>BOULEVARD MIGUEL ALEMAN, 122 COLONIA ALVARO OBREGON, MUNICIPIO DE SAN MATEO ATENCO, C.P. 52105
				</center>-->

				<!-- UTP
				<center>AVENIDA PRINCIPAL #7 INT. 1, BO.EL ESPINO, XONACATLÁN, ESTADO DE MÉXICO. C.P.52067. R.F.C. 
				</center> -->
				
				<!-- TECNODIESEL 
				<center>AUTOBUSES Y TRACTOCAMIONES DE QUERETARO S.A. DE C.V. AUTOPISTA MEXICO QUERETARO KM. 191.490, EL COLORADO, EL MARQUES, QUERETARO,  C.P. 76246, R.F.C. ATQ090625GE4
				</center> -->


			</div>
        </div>
</div>

<div class="container d-flex justify-content-center">
	<div class="card">
		<div class="container">



	<div class="atras">
		<table>
                <tr>
                    <td>
						<b>TELEFONO DE EMERGENCIA: </b>
						<br>
						{{ $user->tel }} 
						<br>
						<br>
						<b>CURP: </b>
						<br>
						{{ $user->curp }}
						<br>
						<br>
						<b>R.F.C: </b> 
						<br>
						{{ $user->rfc }}
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
					</td>
					<div class="letra">
						<center>
							ES DE USO EXCLUSIVO PARA LA EMPRESA SIENDO UN DOCUMENTO INTRANSFERIBLE, NO
							ES VÁLIDO SI PRESENTA RAYADURAS O TACHADURAS.
						</center>
					</div>
					<br>
                </tr>            
            </table>
		</div>
        
        </div>
</div>
