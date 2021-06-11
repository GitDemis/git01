<?php
  $page_title = 'Presupuestaria';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo display_msg($msg); ?>
    </div>


    <div class="col-md-12">
        <div class="panel">
        <div class="jumbotron text-center">
            <h1>Importar el archivo de ejecución presupuestaria</h1>
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Panel de importación</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">   
                 


              </div>

            <form role="form" action="mostrar_eje.php" method="post" enctype="multipart/form-data" id="archivoEjecucion">
                <div class="box-body">
                    <div class="form-group">
                        <!-- <label for="ejecucionExcel">Presionar aquí para agregar el archivo</label> -->
                        <input class="form-control" type="file" accept=".xlsx, .xls" name="ejecucionExcel">
                    </div>
                </div>

                <div class="box-footer" id="buttonImpo">
                    <button type="button" onclick="ejecucionexcel()" class="btn btn-primary form-control">Subir archivo</button>
                </div>
                <div>
                    <a href="https://wiki.mininterior.gob.ar/2020/08/12/manual-de-usuario-para-la-importacion-del-archivo-excel-en-el-sistema-ejecucion-presupuestaria-2/" target="_blank"><p class="help-block">¿Necesitás ayuda?</p></a>
                </div>

                <div id="loading" style="display:none">
                    <h2>
                        <img src="https://sistemas.mininterior.gob.ar/presupuesto/libs/images/loading.gif">
                    </h2>
                </div>

            </form>
          </div>
        </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-xs-12">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla de ejecución</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">                    
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ejer: activate to sort column descending" style="width: 100px;">Ejer</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nro. Imputa.: activate to sort column ascending" style="width: 365px;">Nro. Imputa.</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="SAF: activate to sort column ascending" style="width: 326px;">SAF</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="S.A.F.D: activate to sort column ascending" style="width: 326px;">S.A.F.D.</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Pg: activate to sort column ascending" style="width: 260px;">Pg</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Programa Desc.: activate to sort column ascending" style="width: 400px;">Programa Desc.</th></tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql="select * from carga_excel"; 
                                    $result = $db->query($sql);
                                    $count  = mysqli_num_rows($result);
                                    //$row = mysqli_fetch_array($result);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<tr role="row" class="odd">
                                                <td class="sorting_1">'.$row["ejer"].'</td>
                                                <td>'.$row["nro_imputa"].'</td>
                                                <td>'.$row["saf"].'</td>
                                                <td>'.$row["safd"].'</td>
                                                <td>'.$row["pg"].'</td>
                                                <td>'.$row["programa_desc"].'</td>
                                            </tr>';
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr><th rowspan="1" colspan="1">Ejer</th><th rowspan="1" colspan="1">Nro. Imputa.</th><th rowspan="1" colspan="1">SAF</th><th rowspan="1" colspan="1">S.A.F.D</th><th rowspan="1" colspan="1">Pg</th><th rowspan="1" colspan="1">Programa Desc.</th></tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
</div>


<?php include_once('layouts/footer.php'); ?>