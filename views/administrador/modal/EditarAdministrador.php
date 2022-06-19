  <div class="modal fade" id="modal-administrador-editar<?=$idadministrador?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar Administrador</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?=base_url?>Administrador/edit" enctype="multipart/form-data"
          id="">
          <div class="modal-body">

            <input type="hidden"  name="idadministrador" value="<?=$idadministrador;?>">

            <div class="form-group">
              <label>Urbanizacion</label>
              <?php $urbactivo = Utils::UrbActivo(); ?>
              <select class="form-control" name="idurbanizacion">
                <?php while ($urbact = $urbactivo->fetch_object()) : ?>

                  <option value="<?=$urbact->idurbanizacion;?>" <?=isset($adm) && is_object($adm) && $urbact->idurbanizacion == $adm->idurbanizacion ? 'selected' : ''; ?> >
                                                                    
                    <?= $urbact->nombre?>
                  </option>

                <?php endwhile; ?>

              </select>
            </div>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?=$adm->nombre?>">

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?=$adm->apellido?>">

            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" class="form-control" value="<?=$adm->telefono?>">

            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="<?=$adm->email?>">

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

