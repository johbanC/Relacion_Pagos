  <div class="modal fade" id="modal-administrador">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Agregar Administrador</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?=base_url?>Administrador/save" enctype="multipart/form-data"
          id="uploadForm">
          <div class="modal-body">

            <div class="form-group">
              <label>Urbanizacion</label>
              <?php $urbactivo = Utils::UrbActivo(); ?>
              <select class="form-control" name="idurbanizacion">
                <?php while ($urbact = $urbactivo->fetch_object()) : ?>

                  <option value="<?=$urbact->idurbanizacion;?>" >
                    <?= $urbact->nombre?>
                  </option>

                <?php endwhile; ?>

              </select>
            </div>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control">

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="form-control">

            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" class="form-control">

            <label for="email">Email</label>
            <input type="text" name="email" class="form-control">

            <label for="pass">Password Temporal</label>
            <input type="text" name="pass" class="form-control">


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

