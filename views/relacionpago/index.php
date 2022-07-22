<?php if (isset($_SESSION['propietario']) && $_SESSION['propietario'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Guardado con exito.');</script>
<?php elseif(isset($_SESSION['propietario']) && $_SESSION['propietario'] == 'failed'): ?>
  <script type="text/javascript">toastr.error("Error al guardar, Verifica los datos introducidos.");</script>
<?php endif; ?> 

<?php if (isset($_SESSION['propietario_edit']) && $_SESSION['propietario_edit'] == 'complete'): ?>
  <script type="text/javascript">toastr.success('Editado con exito.');</script>
<?php elseif(isset($_SESSION['propietario_edit']) && $_SESSION['propietario_edit'] == 'failed'): ?>
  <script type="text/javascript">toastr.error("Error al editar, Verifica los datos introducidos.");</script>
<?php endif; ?> 

<?php Utils::deleteSession('propietario'); ?>
<?php Utils::deleteSession('propietario_edit'); ?> 




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
          Relaciones de pago
        </h3>
      </div>


      <div class="col-md-4 box-center">

      </div>


      <div class="col-md-4 box-right">

        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-propietario">
          <i class="fas fa-plus"></i>
          Agregar Propietario
        </button>
      </div>
    </div>




  </div>


  <div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 1px;">#</th>
            <th>Nro Relacion de Pago</th>
            <th>Nombre Apellido</th>
            <th>Sector / Unidad</th>
            <th>Nro Propiedad</th>
            <th style="text-align: right;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          while($rp = $relacionpago->fetch_object()) : 

            $idrelacionpago = $rp->idRelacionPago;?>
            <tr>
              <td><?=$i++?></td>
              <td><?=$rp->nro_relacion?></td>
              <td><?=$rp->nombre.' '.$rp->apellido?></td>
              <td><?=$rp->sector_unidad?></td>
              <td><?=$rp->nro_propiedad?></td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Acciones
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?=base_url?>RelacionPago/detail&id=<?=$idrelacionpago?>">Detalles</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-propietario-editar<?= $idpropietario;?>">Editar</a>
                    <a class="dropdown-item" onclick="confirmar(<?= $idPropietario ?>)" >Eliminar</a>
                  </div>
                </div>
              </td>
            </tr>

          <?php endwhile; ?>
        </tbody>
        <tfoot>
         <tr>
          <th style="width: 1px;">#</th>
          <th>Nro Relacion de Pago</th>
          <th>Nombre Apellido</th>
          <th>Sector / Unidad</th>
          <th>Nro Propiedad</th>
          <th style="text-align: right;">Acciones</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</div>


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









