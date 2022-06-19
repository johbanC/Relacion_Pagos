<?php if (isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Guardado con exito.');</script>
  <?php elseif(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'failed'): ?>
    <script type="text/javascript">toastr.error("Error al guardar, Verifica los datos introducidos.");</script>
  <?php endif; ?> 

  <?php if (isset($_SESSION['administrador_edit']) && $_SESSION['administrador_edit'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Editado con exito.');</script>
  <?php elseif(isset($_SESSION['administrador_edit']) && $_SESSION['administrador_edit'] == 'failed'): ?>
    <script type="text/javascript">toastr.error("Error al editar, Verifica los datos introducidos.");</script>
  <?php endif; ?> 

  <?php Utils::deleteSession('administrador'); ?>
  <?php Utils::deleteSession('administrador_edit'); ?>
  

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
          Administradores
        </h3>
      </div>


      <div class="col-md-4 box-center">

      </div>


      <div class="col-md-4 box-right">

        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-administrador">
          <i class="fas fa-plus"></i>
          Agregar Administrador
        </button>
      </div>
    </div>




  </div>
  <div class="card-body">
   <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Lista de Administradores</h3>

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
              <th>Urbanizacion</th>
              <th>Nombre - Apellido</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>Session</th>
              <th style="text-align: right;">Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php 
            $i = 1;
            while ($adm = $administrador->fetch_object()) :

              $idadministrador = $adm->idadministrador;?>

              <tr>
                <td><?=$i++?></td>
                <td><?= $adm->nombre_urb; ?></td>
                <td><?= $adm->nombre.' '.$adm->apellido;?></td>
                <td><?= $adm->telefono; ?></td>
                <td><?= $adm->email; ?></td>
                <td><?= $adm->sesion; ?></td>


                <td style="text-align: right;">

                  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-administrador-editar<?= $idadministrador;?>">
                    <i class="fas fa-edit"></i>
                    Editar
                  </button>

                </td>
              </tr>

              <?php include 'modal/EditarAdministrador.php'; ?>

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


<?php include 'modal/AgregarAdministrador.php'; ?>






