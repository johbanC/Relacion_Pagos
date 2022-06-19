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
          Propietario
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
  <div class="card-body">
   <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Lista de Propietarios</h3>

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
              <th>#</th>
              <th>Documento</th>
              <th>Nombre - Apellido</th>
              <th>Celular</th>
              <th>Email</th>              
              
              <th style="text-align: right;">Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php 
            $i = 1;
            while ($pro = $propietario->fetch_object()) :

              $idpropietario = $pro->idPropietario;?>

              <tr>
                <td><?=$i++?></td>
                <td><?= $pro->prefijo.' '.$pro->documento?></td>                
                <td><?= $pro->NomPro.' '.$pro->ApePro;?><br><span class="right badge badge-info"><?= $pro->celular; ?></span></td>
                <td><?= $pro->celular; ?></td>
                <td><?= $pro->email; ?></td>

                <td style="text-align: right;">
                  
                  <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Acciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="<?=base_url?>Propietario/detail&id=<?=$idpropietario?>">Detalles</a>
                      <a class="dropdown-item" data-toggle="modal" data-target="#modal-propietario-editar<?= $idpropietario;?>">Editar</a>
                      <a class="dropdown-item" onclick="confirmar(<?= $idPropietario ?>)" >Eliminar</a>
                    </div>
                  </div>






                </td>
              </tr>

              <?php include 'modal/EditarPropietario.php'; ?>

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


<?php include 'modal/AgregarPropietario.php'; ?>






