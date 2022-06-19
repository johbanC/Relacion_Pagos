<div class="modal fade" id="modal-tipopropiedad-editar<?= $idtipopropiedad;?>">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Editar Tipo de banco</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form method="POST" action="<?=base_url?>TipoPropiedad/edit" enctype="multipart/form-data"
      id="">
      <div class="modal-body">

        <input type="hidden"  name="idtipopropiedad" value="<?=$idtipopropiedad;?>">

        

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?=$tp->nombre?>">

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

