<?php if (isset($_SESSION['tipopropiedad']) && $_SESSION['tipopropiedad'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Guardado con exito.');</script>
<?php elseif(isset($_SESSION['tipopropiedad']) && $_SESSION['tipopropiedad'] == 'failed'): ?>
  <script type="text/javascript">toastr.error("Error al guardar, Verifica los datos introducidos.");</script>
<?php endif; ?> 

<?php if (isset($_SESSION['tipopropiedad_edit']) && $_SESSION['tipopropiedad_edit'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Editado con exito.');</script>
<?php elseif(isset($_SESSION['tipopropiedad_edit']) && $_SESSION['tipopropiedad_edit'] == 'failed'): ?>
  <script type="text/javascript">toastr.error("Error al editar, Verifica los datos introducidos.");</script>
<?php endif; ?> 

<?php if (isset($_SESSION['tipopropiedad_delete']) && $_SESSION['tipopropiedad_delete'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Eliminado con exito.');</script>
<?php elseif(isset($_SESSION['tipopropiedad_delete']) && $_SESSION['tipopropiedad_delete'] == 'failed'): ?>
  <script type="text/javascript">toastr.error("Error al Eliminar, Verifica los datos introducidos.");</script>
<?php endif; ?> 

<?php Utils::deleteSession('tipopropiedad'); ?>
<?php Utils::deleteSession('tipopropiedad_edit'); ?>
<?php Utils::deleteSession('tipopropiedad_delete'); ?>
 

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


<!-- jquery PARA PREVISUALIZAR LAS IMAGENES -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




<div class="card card-primary card-outline">
  <div class="card-header">

    <div class="row">

      <div class="col-md-4 box-left">
        <h3 class="card-title">
          <i class="fas fa-edit"></i>
          Tipo de Propiedad
        </h3>
      </div>


      <div class="col-md-4 box-center">

      </div>


      <div class="col-md-4 box-right">

        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-tipopropiedad">
          <i class="fas fa-plus"></i>
          Agregar Tipo de Propiedad
        </button>
      </div>
    </div>




  </div>
  <div class="card-body">
   <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Lista de Tipo de Propiedad</h3>

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
              <th style="text-align: right;">Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php 
            $i = 1;
            while ($tp = $tipopropiedad->fetch_object()) :

              $idtipopropiedad = $tp->idTipoPropiedad;?>

              <tr>
                <td><?=$i++?></td>
                <td><?= $tp->nombre; ?></td>
                
                <td style="text-align: right;">

                  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-tipopropiedad-editar<?= $idtipopropiedad;?>">
                    <i class="fas fa-edit"></i>
                    Editar
                  </button>

                  <button type="button" class="btn btn-sm btn-danger" onclick="confirmar(<?= $idtipopropiedad ?>) ">
                    <i class="fas fa-trash-alt"></i>
                    Eliminar
                  </button>

                </td>
              </tr>

              <?php include 'modal/EditarTipoPropiedad.php'; ?>

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


<?php include 'modal/AgregarTipoPropiedad.php'; ?>


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
  function confirmar($idtipopropiedad)
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
      location.href ="<?=base_url?>TipoPropiedad/delete&id="+$idtipopropiedad;

    }
  });
}

</script>



