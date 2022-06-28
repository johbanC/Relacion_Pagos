  <div class="modal fade" id="modal-tipodocumento-editar<?= $idtipodocumento;?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar Tipo de Documento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?=base_url?>TipoDocumento/edit" enctype="multipart/form-data"
          id="">
          <div class="modal-body">

            <input type="hidden"  name="idtipodocumento" value="<?=$idtipodocumento;?>">

            

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?=$td->nombre?>">

            <label for="prefijo">Prefijo</label>
            <input type="text" name="prefijo" class="form-control" value="<?=$td->prefijo?>">
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

