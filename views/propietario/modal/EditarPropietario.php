  <div class="modal fade" id="modal-propietario-editar<?=$idpropietario?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar Propietario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?=base_url?>Propietario/edit" enctype="multipart/form-data"
          id="">
          <div class="modal-body">

            <input type="hidden"  name="idpropietario" value="<?=$idpropietario;?>">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tipo Documento</label>
                  <?php $tipodocumento = Utils::showTipoDocumento(); ?>
                  <select class="form-control" name="idtipodocumento">
                    <option value="">Selecciona</option>
                    <?php while ($td = $tipodocumento->fetch_object()) : ?>

                      <option value="<?=$td->idTipoDocumento;?>" <?=isset($pro) && is_object($pro) && $td->idTipoDocumento == $pro->idTipoDocumento ? 'selected' : ''; ?> >
                        <?= $td->prefijo.' - '.$td->nombre ?>
                      </option>

                    <?php endwhile; ?>

                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <label for="documento">Nro Documento</label>
                <input type="text" name="documento" class="form-control" id="number" value="<?=$pro->documento?>">   
              </div>
            </div>


            <div class="row">
              <div class="col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?=$pro->NomPro?>">                    
              </div>

              <div class="col-md-6">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?=$pro->ApePro?>">    
              </div>
            </div>


            <div class="row">
             <div class="col-md-6">
              <label for="celular">Celular</label>
              <input type="text" name="celular" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="<?=$pro->celular?>">
            </div>

            <div class="col-md-6">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" value="<?=$pro->email?>">
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

                    <option value="<?=$bank->idBanco;?>" <?=isset($pro) && is_object($pro) && $bank->idBanco == $pro->idBanco ? 'selected' : ''; ?>>
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

                    <option value="<?=$tc->idTipoCuenta;?>" <?=isset($pro) && is_object($pro) && $tc->idTipoCuenta == $pro->idTipoCuenta ? 'selected' : ''; ?>>
                      <?= $tc->nombre?>
                    </option>

                  <?php endwhile; ?>

                </select>
              </div>
            </div>

            <div class="col-md-4">
              <label for="nro_cuenta">Nro Cuenta</label>
              <input type="text" name="nro_cuenta" class="form-control" data-inputmask='"mask": "999-999999-99"' data-mask value="<?=$pro->nro_cuenta?>">
            </div>
          </div>

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

