     </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  
  <script type="text/javascript" src="libs/js/functions.js"></script>
  <script type="text/javascript" src="libs/js/importacion_eje.js"></script>
  <script type="text/javascript" src="libs/js/importacion_ods.js"></script>
  <script type="text/javascript" src="libs/js/tableToExcel.js"></script>
  <script type="text/javascript" src="libs/js/desplegar.js"></script>
  <script type="text/javascript" src="libs/js/function.users.js"></script>

<!-- DataTables -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- <script>
  function getfyh(){
      var f = new Date();
      console.log(f.getFullYear() + "-" + ("0" + (f.getMonth() + 1)).slice(-2) + "-" + ("0" + f.getDate()).slice(-2) + " " +
                  f.getHours() + ":" + f.getMinutes() + ":" + f.getSeconds());
      var fechahora = f.getFullYear() + "-" + ("0" + (f.getMonth() + 1)).slice(-2) + "-" + ("0" + f.getDate()).slice(-2) + " " + f.getHours() + ":" + f.getMinutes() + ":" + f.getSeconds()
  }
</script> -->
  </body>
</html>

<?php if(isset($db)) { $db->db_disconnect(); } ?>
