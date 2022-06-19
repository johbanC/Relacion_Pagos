

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
            <div class="col-12 table-responsive">

              <h4>
                <i class="fas fa-building"></i>Propiedades
              </h4>

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
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $i = 1;
                  while($PP = $propiedadP->fetch_object()) :

                    $idPropiedad = $PP->idPropiedad; ?>

                    <tr>

                      <td><?=$i++?></td>
                      <td> <?=$PP->TipoPro?> </td>
                      <td> <?=$PP->sector_unidad?> </td>
                      <td> <?=$PP->nro_propiedad?> </td>
                      <td> <?=$PP->comision?> </td>
                      <td> <?=$PP->iva?> </td>
                      <td> <?= number_format($PP->canon,2,",",".") ?> </td>
                      <td><span class="badge badge-success">Activo</span></td>
                      <td>
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tipodocumento-editar<?= $idtipodocumento;?>">
                          <i class="fas fa-receipt"></i>
                          Relacion de pago
                        </button>
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