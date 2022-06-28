  <div class="modal fade" id="modal-propietario">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Agregar Propietario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?=base_url?>Propietario/save" enctype="multipart/form-data"
          id="uploadForm">
          <div class="modal-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tipo Documento</label>
                  <?php $tipodocumento = Utils::showTipoDocumento(); ?>
                  <select class="form-control" name="idtipodocumento">
                    <option value="">Selecciona</option>
                    <?php while ($td = $tipodocumento->fetch_object()) : ?>

                      <option value="<?=$td->idTipoDocumento;?>" >
                        <?= $td->prefijo.' - '.$td->nombre ?>
                      </option>

                    <?php endwhile; ?>

                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <label for="documento">Nro Documento</label>
                <input type="text" name="documento" class="form-control" id="number">   
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control">                    
              </div>

              <div class="col-md-6">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control">    
              </div>
            </div>

            <div class="row">
             <div class="col-md-6">
              <label for="celular">Celular</label>
              <input type="text" name="celular" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
            </div>

            <div class="col-md-6">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Banco</label>
                <?php $banco = Utils::showBanco(); ?>
                <select class="form-control" name="idbanco">
                  <option value="">Selecciona</option>
                  <?php while ($bank = $banco->fetch_object()) : ?>

                    <option value="<?=$bank->idBanco;?>" >
                      <?= $bank->nombre?>
                    </option>

                  <?php endwhile; ?>

                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Tipo de Cuenta</label>
                <?php $tipo_cuenta = Utils::showTipoCuenta(); ?>
                <select class="form-control" name="idtipocuenta">
                  <option value="">Selecciona</option>
                  <?php while ($tc = $tipo_cuenta->fetch_object()) : ?>

                    <option value="<?=$tc->idTipoCuenta;?>" >
                      <?= $tc->nombre?>
                    </option>

                  <?php endwhile; ?>

                </select>
              </div>
            </div>

            <div class="col-md-4">
              <label for="nro_cuenta">Nro Cuenta</label>
              <input type="text" name="nro_cuenta" class="form-control" data-inputmask='"mask": "999-999999-99"' data-mask>
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
   //COLOCAR PUNTOO DE MMIL DE FORMA AUTOMATICA EN PROPIETARIO
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

  /*PARA DAR FORMATO AL NUMERO DE CELULAR Y CUENTA BANCARIA*/
  $(function () {
    $('[data-mask]').inputmask()
  });
</script>