  <div class="modal fade" id="modal-banco">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Agregar Urbanizacion</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?=base_url?>Urbanizacion/save" enctype="multipart/form-data"
          id="uploadForm">
          <div class="modal-body">

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control">

            <label for="nombre">Direccion</label>
            <input type="text" name="direccion" class="form-control">

            <label for="nombre">Telefono</label>
            <input type="text" name="telefono" class="form-control">

            <label for="nombre">Email</label>
            <input type="text" name="email" class="form-control">
                    

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

