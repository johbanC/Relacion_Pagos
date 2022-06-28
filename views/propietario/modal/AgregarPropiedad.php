  <div class="modal fade" id="modal-propiedad">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fas fa-building"></i> Agregar Propiedad</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?=base_url?>Propiedad/save" enctype="multipart/form-data"
          id="uploadForm">

          <input type="hidden" name="idpropietario" value="<?= $propietario->idPropietario; ?>">

          <div class="modal-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tipo Propiedad</label>
                  <?php $tipo_propiedad = Utils::showTipoPropiedad(); ?>
                  <select class="form-control" name="idtipopropiedad">
                    <option value="">Selecciona</option>
                    <?php while ($tp = $tipo_propiedad->fetch_object()) : ?>

                      <option value="<?=$tp->idTipoPropiedad;?>" >
                        <?= $tp->nombre ?>
                      </option>

                    <?php endwhile; ?>

                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <label for="sector_unidad">Sector / Unidad</label>
                <input type="text" name="sector_unidad" class="form-control">   
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="nro_propiedad">Nro Propiedad</label>
                <input type="text" name="nro_propiedad" class="form-control">                    
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="comision">Comision</label>
                  <div class="input-group">
                    <input type="text" name="comision" class="form-control"> 
                    <div class="input-group-append">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>
                </div>
              </div>

            </div>


            <div class="row">
             <div class="col-md-6">
              <div class="form-group">
                <label for="iva">Iva</label>
                <div class="input-group">
                  <input type="text" name="iva" class="form-control"> 
                  <div class="input-group-append">
                    <span class="input-group-text">%</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="canon">Canon</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                  </div>
                  <input type="text" name="canon" class="form-control" id="number"> 
                </div>

              </div>



            </div>
          </div>

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



<script type="text/javascript">
   //COLOCAR PUNTOO DE MIL DE FORMA AUTOMATICA EN PROPIETARIO
   const number = document.querySelector('#number');

   function formatNumber (n) {
    n = String(n).replace(/\D/g, "");
    return n === '' ? n : Number(n).toLocaleString();
  }
  number.addEventListener('keyup', (e) => {
    const element = e.target;
    const value = element.value;
    element.value = formatNumber(value);
  });

</script>