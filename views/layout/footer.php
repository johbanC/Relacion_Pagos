</div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>



<!-- jQuery -->
<script src="<?=base_url?>librerias/plugins/jquery/jquery.min.js"></script>

<!-- BS-Stepper -->
<script src="<?=base_url?>librerias/plugins/bs-stepper/js/bs-stepper.min.js"></script>

<!-- InputMask CON TA OPCION COLOCAMOS LOS PARENTESIS Y GUIONES EN EL INTUP DE TELEFONO-->
<!-- InputMask -->
<script src="<?=base_url?>librerias/plugins/moment/moment.min.js"></script>
<script src="<?=base_url?>librerias/plugins/inputmask/jquery.inputmask.min.js"></script>

<!-- Select2 -->
<script src="<?=base_url?>librerias/plugins/select2/js/select2.full.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?=base_url?>librerias/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url?>librerias/dist/js/adminlte.min.js"></script>

<script src="<?=base_url?>librerias/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- DataTables -->
<script src="<?=base_url?>librerias/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url?>librerias/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url?>librerias/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url?>librerias/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Summernote -->
<script src="<?=base_url?>librerias/plugins/summernote/summernote-bs4.min.js"></script>




</body>
</html>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<script>
  $(function () {
   //CON TA OPCION COLOCAMOS LOS PARENTESIS Y GUIONES EN EL INTUP DE TELEFONO
    $('[data-mask]').inputmask();
    $('[data-maskk]').inputmask();

       //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()


  });
</script>


