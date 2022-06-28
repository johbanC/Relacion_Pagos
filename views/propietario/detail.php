<?php if (isset($_SESSION['propiedad']) && $_SESSION['propiedad'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Guardado con exito.');</script>
<?php elseif(isset($_SESSION['propiedad']) && $_SESSION['propiedad'] == 'failed'): ?>
  <script type="text/javascript">toastr.error("Error al guardar, Verifica los datos introducidos.");</script>
<?php endif; ?> 

<?php if (isset($_SESSION['propiedad_edit']) && $_SESSION['propiedad_edit'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Editado con exito.');</script>
<?php elseif(isset($_SESSION['propiedad_edit']) && $_SESSION['propiedad_edit'] == 'failed'): ?>
  <script type="text/javascript">toastr.error("Error al editar, Verifica los datos introducidos.");</script>
<?php endif; ?> 

<?php Utils::deleteSession('propiedad'); ?>
<?php Utils::deleteSession('propiedad_edit'); ?> 




<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="callout callout-info">
          <h5><i class="fas fa-info"></i> Nota:</h5>
          Aquí encontraras toda la información del propietario desde su cuenta bancarias propiedades registradas y relaciones de pagos.
        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-user"></i> Detalles del Propietario.
                <small class="float-right">
                  Fecha de Registro: <?=$propietario->fecha_creacion?><br>
                </small>
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
                Documento: <?=$propietario->prefijo." ".$propietario->documento?><br>
                Nombre Apellido: <?=$propietario->NomPro." ".$propietario->ApePro?><br>
                Celular: <?=$propietario->celular?><br>
                Email: <?=$propietario->email?><br>


              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <!-- To -->
              <br>
              <address>
                <strong>Datos Bancarios</strong><br>
                Banco: <?=$propietario->NomBan?><br>
                Tipo Cuenta: <?=$propietario->NomTipoCuen?><br>
                Nro Cuenta: <?=$propietario->nro_cuenta?><br>
                <!-- <?=$propietario->documento_tercero?><br>
                <?=$propietario->nombre_tercero?><br>
                <?=$propietario->apellido_tercero?><br>
                <?=$propietario->nombre_banco?><br> 
                <?=$propietario->tipo_cuenta?><br>
                <?=$propietario->nro_cuenta?><br> -->
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Contrato #:DH-0015</b><br>
              <br>
              <b>Order ID:</b> 4F3S8J<br>
              <b>Payment Due:</b> 2/22/2014<br>
              <b>Account:</b> 968-34567
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->



          <hr>
          <!-- Table row -->
          <div class="row">

            <div class="col-md-6 col-sm-12">
              <h4><i class="fas fa-building"></i>Propiedades</h4>
            </div>

            <div class="col-md-6 col-sm-12" style="text-align:right;">
              <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-propiedad">
                <i class="fas fa-plus"></i>
                Agregar Propiedad
              </button>
            </div>


            <div class="col-12 table-responsive">

              <table class="table table-striped" style="text-align:center">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tipo Propiedad</th>
                    <th>Sector - Unidad</th>
                    <th>Nro Propiedad</th>
                    <th>Comision</th>
                    <th>Iva</th>
                    <th>Canon</th>
                    <th>Estatus</th>
                    <th>Relacion de pago</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $i = 1;
                  while($PP = $propiedadP->fetch_object()) :

                    $idPropiedad = $PP->idPropiedad; 
                    $Canon = $PP->canon;
                    $Canon = number_format($Canon,2,",","."); ?>

                    <tr>

                      <td><?=$i++?></td>
                      <td> <?=$PP->TipoPro?> </td>
                      <td> <?=$PP->sector_unidad?> </td>
                      <td> <?=$PP->nro_propiedad?> </td>
                      <td> <?=$PP->comision.'%'?> </td>
                      <td> <?=$PP->iva.'%'?> </td>
                      <td> $ <?= $Canon ?> </td>
                      <td><span class="badge badge-success">Activo</span></td>
                      <td>
                        <form method="POST" action="<?=base_url?>RelacionPago/create">
                          <div class="input-group input-group-md">      
                            <input type="hidden" name="idpropiedad" value="<?=$idPropiedad?>">                      
                            <input type="text" name="dias" class="form-control" placeholder="Dias" style="width:40px">
                            <span class="input-group-append">
                              <button type="submit" class="btn btn-sm btn-success"> 
                                <i class="fas fa-receipt"></i> 
                                Crear
                              </button>

                            </span>

                          </div>
                        </form>

                        

                      </td>




                    </tr>

                  <?php endwhile; ?>

                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->



          <!-- this row will not appear when printing -->
          <div class="row no-print" style="padding-top: 50px;">
            <div class="col-12">
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
<!-- /.content -->





<?php include 'modal/AgregarPropiedad.php'; ?>