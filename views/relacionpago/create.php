<?php
/*DIAS A FACTURAR*/
$dias = $_POST['dias'];

/*COSTO DEL CANON TOTAL NETO | _F CON FORMATO*/
$CanonTotal = $propiedadRP->canon;
$CanonTotal_F = number_format($CanonTotal,0,",",".");

/*COSTO DE LA COMISION PARA LA AGENCIA*/
$ComisionTotal = $propiedadRP->comision;

/*COSTO DEL IVA A DESCONTAR*/
$IvaTotal = $propiedadRP->iva;

/*VALOR DEL DIA | _F CON FORMATO*/
$ValorDia = $CanonTotal/30;
$ValorDia_F = number_format($ValorDia,0,",",".");

/*CANON A DEPOSITAR SEGUN LA CANTIDAD DE DIAS | _F CON FORMATO*/
$Canon = $ValorDia * $dias;
$Canon_F = number_format($Canon,0,",",".");

/*COMICION DE LA EMPRESA | _F CON FORMATO*/
$Comision = $Canon * $ComisionTotal/100;
$Comision_F = number_format($Comision,0,",",".");

/*IVA DE LA COMISION A DESCONTAR | _F CON FORMATO*/
$Iva = $Comision * $IvaTotal/100;
$Iva_F = number_format($Iva,0,",",".");

/*TOTAL A COBRAR LA AGENCIA | _F CON FORMATO*/
$T_Agencia = $Comision + $Iva;
$T_Agencia_F = number_format($T_Agencia,0,",",".");

/*TOTAL A CONSIGNAR AL PROPIETARIO | _F CON FORMATO*/
$T_Propietario = $Canon - $T_Agencia;
$T_Propietario_F = number_format($T_Propietario,0,",",".");


/*NUMERO DE REALCION DE PAGO PARA SER GUARDADA EN BASE DE DATOS*/
$CountRP = Utils::showCountRP(); 
$CountRP = $CountRP->fetch_object();

$CountRP = $CountRP->NumRP+1;

/*CANTIDAD DE CARACTERES*/
$length = 5;
/*NUMERO DE RELACION DE PAGO A AGREGAR*/
$N_RelacionPago = str_pad($CountRP,$length,"0", STR_PAD_LEFT);

/*NUMERO DE RELACION DE PAGO CON EL FORMATO COMPLETO*/
$NRelacionPago = 'RP-DH-'.$N_RelacionPago;

?>

<script type="text/javascript">
	function TotalPagos() {
		var total = 0;
		$(".T_Pagos").each(function() {
			if (isNaN(parseFloat($(this).val()))) {
				total += 0;
			} else {
				total += parseFloat($(this).val().replace(/\./g,''));
			}
		});
		document.getElementById('TPagos').value = '$ '+total.toLocaleString();
	}

	$(document).ready(function(){
		$('.number').mask('00.000.000,00', {reverse: true});
	});



</script>

<script type="text/javascript">
	function TotalDeducciones() {
		var total = 0;
		$(".T_Deducciones").each(function() {
			if (isNaN(parseFloat($(this).val()))) {
				total += 0;
			} else {
				total += parseFloat($(this).val().replace(/\./g,''));
			}
		});
		document.getElementById('TDeducciones').value = '$ '+total.toLocaleString();
	}

	$(document).ready(function(){
		$('.number').mask('00.000.000,00', {reverse: true});
	});



</script>




<form method="POST" action="<?=base_url?>RelacionPago/save" enctype="multipart/form-data" id="uploadForm">

	<!-- ID DE LA PROPIEDAD -->
	<input type="hidden" name="idPropiedad" value="<?=$propiedadRP->idPropiedad;?>">
	<!-- NUMERO DE RELACION DE PAGO -->
	<input type="hidden" name="nro_relacion" value="<?=$NRelacionPago?>">
	<!-- ID DE PROPIETARIO	 -->
	<input type="hidden" name="idpropietario" value="<?=$propietarioRP->idPropietario?>">
	<!-- SIGUIENTE NUMERO DE RELACION DE PAGO -->
	<input type="hidden" name="idRelacionPago" value="<?=$CountRP?>">

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="callout callout-info">
						<h5><i class="fas fa-info"></i> Note:</h5>
						This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
					</div>


					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12">
								<h4>
									<i class="fas fa-receipt"></i> Relacion de Pago
									<small class="float-right">Date: 2/10/2014</small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								<!-- From -->
								<br>
								<address>
									<strong>Datos Propietario</strong><br>
									Documento: <?=$propietarioRP->prefijo." ".$propietarioRP->documento?><br>
									Nombre Apellido: <?=$propietarioRP->NomPro." ".$propietarioRP->ApePro?><br>
									Celular: <?=$propietarioRP->celular?><br>
									Email: <?=$propietarioRP->email?><br>
								</address>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<!-- To -->
								<br>
								<address>
									<strong>Datos Bancarios</strong><br>
									Banco: <?=$propietarioRP->NomBan?><br>
									Tipo Cuenta: <?=$propietarioRP->NomTipoCuen?><br>
									Nro Cuenta: <?=$propietarioRP->nro_cuenta?><br>
								</address>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<!-- To -->
								<br>
								<address>
									<strong>Apartamento</strong><br>
									Tipo Propiedad: <?=$propiedadRP->TpNom?><br>
									Sector / Unidad: <?=$propiedadRP->sector_unidad?><br>
									Nro Propiedad: <?=$propiedadRP->nro_propiedad?><br>
									Comision: <?=$ComisionTotal?>%<br>
									Iva: <?=$IvaTotal?>%<br>
									Canon:$ <?=$CanonTotal_F?><br>  
									Valor del dia:$ <?=$ValorDia_F?>
								</address>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- TABLA 1 Detalle Relacion de pago -->
						<div class="row">


							<div class="col-md-12">
								<h4><i class="fas fa-building"></i>Detalle Relacion de pago</h4>
							</div>

							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Mes</th>
											<th>Dias</th>
											<th>Fecha Consignacion</th>
											<th>Canon</th>
											<th>Comision</th>
											<th>Iva</th>
											<th>Total Agencia</th>
											<th>Valor Consignado</th>

										</tr>
									</thead>
									<tbody>
										<tr>
											<td>											
												<div class="form-group">
													<select class="form-control" name="mes">
														<option value="enero">Enero</option>
														<option value="febrero">Febrero</option>
														<option value="marzo">Marzo</option>
														<option value="abril">Abril</option>
														<option value="mayo">Mayo</option>
														<option value="junio">Junio</option>
														<option value="julio">Julio</option>
														<option value="agosto">Agosto</option>
														<option value="septiembre">Septiembre</option>
														<option value="octubre">Octubre</option>
														<option value="noviembre">Noviembre</option>
														<option value="diciembre">Diciembre</option>
													</select>
												</div>
											</td>

											<td><input type="number" name="dias" class="form-control" value="<?=$dias?>" ></td>
											<td><input type="date" name="fecha_consignacion" class="form-control"></td>
											<td><input type="text" name="canon" class="form-control" value="$ <?=$Canon_F?>" ></td>
											<td><input type="text" name="comision" class="form-control" value="$ <?=$Comision_F?>" ></td>
											<td><input type="text" name="iva" class="form-control" value="$ <?=$Iva_F?>" ></td>
											<td><input type="text" name="total_agencia" class="form-control" value="$ <?=$T_Agencia_F?>" ></td>
											<td><input type="text" name="valor_consignado" class="form-control" value="$ <?=$T_Propietario_F?>" ></td>

										</tr>

									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- TABLA 1 Detalle Relacion de pago -->

						<!-- TABLA 2 PAGOS -->
						<div class="row">


							<div class="col-md-12">
								<h4><i class="fas fa-building"></i>Pagos</h4>
							</div>

							<div class="col-12 table-responsive">
								<table class="table table-striped" id="tabla_pagos">
									<thead>
										<tr>
											<th>Fecha</th>
											<th>descripcion</th>
											<th>Valor</th>
										</tr>
									</thead>
									<tbody>
										<tr>										
											<td><input type="date" name="fecha_p[]" class="form-control"></td>
											<td><input type="text" name="descripcion_p[]" class="form-control"></td>
											<td><input type="text" name="valor_p[]" class="form-control number T_Pagos" id="numero-mil" onkeyup="TotalPagos();"></td>	
										</tr>


									</tbody>
									<tfoot>
										<tr>
											<td colspan="3" align="center">
												<a id="agregar_pagos" class="btn btn-success">Agregar</a>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- TABLA 2 PAGOS -->

						<!-- TABLA 3 Deduciones -->
						<div class="row">


							<div class="col-md-12">
								<h4><i class="fas fa-building"></i>Deducciones</h4>
							</div>

							<div class="col-12 table-responsive">
								<table class="table table-striped" id="tabla_deducciones">
									<thead>
										<tr>
											<th>Fecha</th>
											<th>descripcion</th>
											<th>Valor</th>
										</tr>
									</thead>
									<tbody>
										<tr>										
											<td><input type="date" name="fecha_d[]" class="form-control"></td>
											<td><input type="text" name="descripcion_d[]" class="form-control"></td>
											<td><input type="text" name="valor_d[]" class="form-control number  T_Deducciones" id="numero-mil" onkeyup="TotalDeducciones();"></td>	
										</tr>


									</tbody>
									<tfoot>
										<tr>
											<td colspan="3" align="center">
												<a id="agregar_deducciones" class="btn btn-success">Agregar</a>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- TABLA 3 Deduciones -->

						<div class="row">
							<!-- accepted payments column -->
							<div class="col-6">
								<p class="lead"><i class="fas fa-receipt"> </i> Comprobante de pago</p>

								<div class="form-group">
									<label for="imgInp1"></label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="recibopago" class="custom-file-input" id="imgInp1">
											<label class="custom-file-label" for="imgInp1">Selecciona un comprobante de pago</label>
										</div>
									</div>
									<center><img id="blah1" src="<?=base_url_img?>DH_ReciboPago.jpg" width="200px" alt="Tu imagen"></center>
								</div> 




								<input type="file" name="comprobante_pago" class="custom-file-input">
							</div>
							<!-- /.col -->
							<div class="col-6">
								<!-- <p class="lead">Amount Due 2/22/2014</p> -->

								<div class="table-responsive">
									<table class="table">
										<tr>
											<th>Total Valor a Consignar:</th>
											<td><input type="text" name="TPagos" class="form-control number" value="<?=$T_Propietario_F?>"readonly ></td>
										</tr>
										<tr>
											<th>Total de Pagos</th>
											<td><input type="text" name="TPagos" class="form-control number" id="TPagos" placeholder="0" readonly></td>
										</tr>
										<tr>
											<th>Total de Deducciones</th>
											<td><input type="text" name="TDeducciones" class="form-control number" id="TDeducciones" placeholder="0" readonly></td>
										</tr>
										<!-- <tr>
											<th>Total:</th>
											<td>$265.24</td>
										</tr> -->
									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- this row will not appear when printing -->
						<div class="row no-print">
							<div class="col-12">
								<a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
								<button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Generar
								</button>
								<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
									<i class="fas fa-download"></i> Generate PDF
								</button>
							</div>
						</div>
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script type="text/javascript">
	$("#agregar_pagos").on("click", function(){

		var numTr = $('#tabla_pagos tbody tr').length + 1;

		$('#tabla_pagos tbody tr:last')
		.after(`<tr>
			<td><input type="date" id="fecha" name="fecha_p[]" class="form-control"></td>
			<td><input type="text" id="descripcion" name="descripcion_p[]" class="form-control"></td>
			<td><input type="text" id="valor" name="valor_p[]" class="form-control number T_Pagos" onkeyup="TotalPagos();"></td>
			</td>

			</tr>`);

	});


	$("#agregar_deducciones").on("click", function(){

		var numTr = $('#tabla_deducciones tbody tr').length + 1;

		$('#tabla_deducciones tbody tr:last')
		.after(`<tr>
			<td><input type="date" id="fecha" name="fecha_d[]" class="form-control"></td>
			<td><input type="text" id="descripcion" name="descripcion_d[]" class="form-control"></td>
			<td><input type="text" id="valor" name="valor_d[]" class="form-control number T_Deducciones" onkeyup="TotalDeducciones();"></td>
			</td>

			</tr>`);

	});

</script>


<!--SCRIPT PARA PREVISUALIZAR LAS IMAGENES EN AGREGAR-->
<script>
	function readImage1 (input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
          $('#blah1').attr('src', e.target.result); // Renderizamos la imagen
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp1").change(function () {
    // Código a ejecutar cuando se detecta un cambio de archivO
    readImage1(this);
  });
</script>


<script type="text/javascript">
   //COLOCAR PUNTOO DE MIL DE FORMA AUTOMATICA EN PROPIETARIO
   const number = document.querySelector('#numero-mil');

   function formatNumber (n) {
   	n = String(n).replace(/\D/g, "");
   	return n === '' ? n : Number(n).toLocaleString();
   }
   number.addEventListener('keyup', (e) => {
   	const element = e.target;
   	const value = element.value;
   	element.value = formatNumber(value);
   });

 </script>





