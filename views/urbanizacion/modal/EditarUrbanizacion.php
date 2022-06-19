  <div class="modal fade" id="modal-urbanizacion-editar<?=$idurbanizacion?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar Urbanizacion</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?=base_url?>Urbanizacion/edit" enctype="multipart/form-data"
          id="">
          <div class="modal-body">

            <input type="hidden"  name="idurbanizacion" value="<?=$idurbanizacion;?>">

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?=$urb->nombre?>">

            <label for="direccion">Direccion</label>
            <input type="text" name="direccion" class="form-control" value="<?=$urb->direccion?>">

            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" class="form-control" value="<?=$urb->telefono?>">

            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="<?=$urb->email?>">

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Editar</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

