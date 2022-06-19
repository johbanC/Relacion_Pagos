<?php if (isset($_SESSION['tipovehiculo']) && $_SESSION['tipovehiculo'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Guardado con exito.');</script>
  <?php elseif(isset($_SESSION['tipovehiculo']) && $_SESSION['tipovehiculo'] == 'failed'): ?>
    <script type="text/javascript">toastr.error("Error al guardar, Verifica los datos introducidos.");</script>
  <?php endif; ?> 

  <?php if (isset($_SESSION['tipovehiculo_edit']) && $_SESSION['tipovehiculo_edit'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Editado con exito.');</script>
  <?php elseif(isset($_SESSION['tipovehiculo_edit']) && $_SESSION['tipovehiculo_edit'] == 'failed'): ?>
    <script type="text/javascript">toastr.error("Error al editar, Verifica los datos introducidos.");</script>
  <?php endif; ?> 

  <?php Utils::deleteSession('tipovehiculo'); ?>
  <?php Utils::deleteSession('tipovehiculo_edit'); ?>
  

<style type="text/css">

  .box-left{
    text-align: left;
  }

  .box-center{
    text-align: center;
  }

  .box-right{
    text-align: right;
  }

  @media screen and (max-width: 600px) {
    .box-left {
      text-align: center;
    }

    .box-center {
      text-align: center;
    }

    .box-right{
      text-align: center;
    }
  }

</style>

<!-- jquery PARA PREVISUALIZAR LAS IMAGENES -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




<div class="card card-primary card-outline">
  <div class="card-header">

    <div class="row">

      <div class="col-md-4 box-left">
        <h3 class="card-title">
          <i class="fas fa-edit"></i>
          Tipo de Vehiculos
        </h3>
      </div>


      <div class="col-md-4 box-center">

      </div>


      <div class="col-md-4 box-right">

        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-tipovehiculo">
          <i class="fas fa-plus"></i>
          Agregar Tipo de Vehiculos
        </button>
      </div>
    </div>




  </div>
  <div class="card-body">
   <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Lista Tipo de Vehiculos</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
            <tr>
              <th>Nro</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th style="text-align: right;">Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php 
            $i = 1;
            while ($tv = $tipovehiculo->fetch_object()) :

              $idtipovehiculo = $tv->idTipoVehiculo;?>

              <tr>
                <td><?=$i++?></td>
                <td><?= $tv->nombre; ?></td>
                <td><?= $tv->descripcion?></td>
                
                <td style="text-align: right;">

                  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-tipovehiculo-editar<?= $idtipovehiculo;?>">
                    <i class="fas fa-edit"></i>
                    Editar
                  </button>

                </td>
              </tr>

              <?php include 'modal/EditarTipoVehiculo.php'; ?>

            <?php endwhile; ?>

          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">

    </div>
    <!-- /.card-footer -->
  </div>
</div>
<!-- /.card -->
</div>


<?php include 'modal/AgregarTipoVehiculo.php'; ?>






