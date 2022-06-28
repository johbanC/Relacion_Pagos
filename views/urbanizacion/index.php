<?php if (isset($_SESSION['urbanizacion']) && $_SESSION['urbanizacion'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Guardado con exito.');</script>
<?php elseif(isset($_SESSION['urbanizacion']) && $_SESSION['urbanizacion'] == 'failed'): ?>
  <script type="text/javascript">toastr.error("Error al guardar, Verifica los datos introducidos.");</script>
<?php endif; ?> 

<?php if (isset($_SESSION['urbanizacion_edit']) && $_SESSION['urbanizacion_edit'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Editado con exito.');</script>
<?php elseif(isset($_SESSION['urbanizacion_edit']) && $_SESSION['urbanizacion_edit'] == 'failed'): ?>
  <script type="text/javascript">toastr.error("Error al editar, Verifica los datos introducidos.");</script>
<?php endif; ?> 

<?php if (isset($_SESSION['urbanizacion_delete']) && $_SESSION['urbanizacion_delete'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Eliminado con exito.');</script>
<?php elseif(isset($_SESSION['urbanizacion_delete']) && $_SESSION['urbanizacion_delete'] == 'failed'): ?>
  <script type="text/javascript">toastr.error("Error al Eliminar, Verifica los datos introducidos.");</script>
<?php endif; ?> 

<?php Utils::deleteSession('urbanizacion'); ?>
<?php Utils::deleteSession('urbanizacion_edit'); ?>
<?php Utils::deleteSession('urbanizacion_delete'); ?>



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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="row">

      <div class="col-md-6 box-left">
        <h3 class="card-title">
          <i class="far fa-building"></i>
          Urbanizaciones
        </h3>
      </div>


      <div class="col-md-6 box-right">

        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-banco">
          <i class="fas fa-plus"></i>
          Agregar Urbanizacion
        </button>
      </div>
    </div>




  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">

      <thead>
          <tr>
            <th>Nro</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
            <th style="text-align: right;">Acciones</th>
          </tr>
        </thead>


      <tbody>

          <?php 
          $i = 1;
          while ($urb = $urbanizacion->fetch_object()) :

            $idurbanizacion = $urb->idurbanizacion;?>

            <tr>
              <td><?=$i++?></td>
              <td><?= $urb->nombre; ?></td>
              <td><?= $urb->direccion; ?></td>
              <td><?= $urb->telefono; ?></td>
              <td><?= $urb->email; ?></td>


              <!-- td style="text-align: right;">

                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-urbanizacion-editar<?= $idurbanizacion;?>">
                  <i class="fas fa-edit"></i>
                  Editar
                </button>

              </td> -->

              <td style="width: 1%;">

                <div class="dropdown">
                  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Acciones
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-urbanizacion-editar<?= $idurbanizacion;?>">Editar</a>
                    <a class="dropdown-item" onclick="confirmar(<?= $idurbanizacion ?>)" >Eliminar</a>
                  </div>
                </div>

              </td>

            </tr>

            <?php include 'modal/EditarUrbanizacion.php'; ?>

          <?php endwhile; ?>

        </tbody>


      <tfoot>
        <!--
        <tr>
          <th>#</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        
        </tr>
      -->
    </tfoot>


  </table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

<?php include 'modal/AgregarUrbanizacion.php'; ?>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">
  function confirmar($idurbanizacion)
  {
    Swal.fire({
      title: 'Seguro que quieres eliminar',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminar'
    }).then((result) => {
      if (result.value) {
        location.href ="<?=base_url?>Urbanizacion/delete&id="+$idurbanizacion;

      }
    });
  }

</script>
