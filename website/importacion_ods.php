<?php
  $page_title = 'Home Page';
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
            <h1>Importar el archivo ODS 200 y 201 ministro</h1>
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Panel de importación</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <!-- <form role="form">
              <div class="box-body">   
                
                <div class="form-group">
                  <label for="ejecucionExcel">Presionar aquí para agregar el archivo</label>
                  <input class="form-control" type="file" accept=".xlsx, .xls" name="ejecucionExcel">
                  <a href="#"><p class="help-block">Verifique la documentación del archivo a importar.</p></a>
                </div>

              </div> -->

            <form role="form" action="mostrar_eje.php" method="post" enctype="multipart/form-data" id="archivoEjecucion">
                <div class="box-body">                   
                    <div class="form-group">                    
                        <label for="ejecucionExcel">Presionar aquí para agregar el archivo</label>
                        <input class="form-control" type="file" accept=".xlsx, .xls" name="ejecucionExcel">
                        <a href="#"><p class="help-block">Verifique la documentación del archivo a importar.</p></a>
                    </div>
                </div>
                <!-- /.box-body -->
                <!-- 
                    1. Tenés que obtner el total de registros. Variable= 100 registros.
                    2. Tenés que tener el valor unitario. Variable incremental 1,2,4,5,6
                    3. Ejecutar fórmula de porcentaje.
                -->
                <?php
                $item=200;
                $numeroVotos=5000;
                
                $percent = round($item/$numeroVotos*100);
                ?>

                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percent;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent;?>%;">
                    <?php echo $percent;?>%
                    </div>
                </div>

                <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary">Iniciar importación</button> -->
                    <button type="button" onclick="odsexcel()" class="btn btn-primary form-control">Subir archivo</button>
                </div>
            </form>
          </div>
        </div>
        </div>
    </div>

</div>


<!-- <div class="" id="tablaEjecucion"></div> -->


<div class="row">
    <div class="col-xs-12">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla de ODS 200 y 201</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <!-- <thead>
                                    <tr role="row">                    
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ejer: activate to sort column descending" style="width: 301px;">Ejer</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nro. Imputa.: activate to sort column ascending" style="width: 365px;">Nro. Imputa.</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="SAF: activate to sort column ascending" style="width: 326px;">SAF</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Pg: activate to sort column ascending" style="width: 260px;">Pg</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Programa Desc.: activate to sort column ascending" style="width: 192px;">Programa Desc.</th></tr>
                                </thead>
                                <tbody>                
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                    <td class="sorting_1">Gecko</td>
                                    <td>Firefox 2.0</td>
                                    <td>Win 98+ / OSX.2+</td>
                                    <td>1.8</td>
                                    <td>A</td>
                                    </tr><tr role="row" class="even">
                                    <td class="sorting_1">Gecko</td>
                                    <td>Firefox 3.0</td>
                                    <td>Win 2k+ / OSX.3+</td>
                                    <td>1.9</td>
                                    <td>A</td>
                                    </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Gecko</td>
                                    <td>Camino 1.0</td>
                                    <td>OSX.2+</td>
                                    <td>1.8</td>
                                    <td>A</td>
                                    </tr><tr role="row" class="even">
                                    <td class="sorting_1">Gecko</td>
                                    <td>Camino 1.5</td>
                                    <td>OSX.3+</td>
                                    <td>1.8</td>
                                    <td>A</td>
                                    </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Gecko</td>
                                    <td>Netscape 7.2</td>
                                    <td>Win 95+ / Mac OS 8.6-9.2</td>
                                    <td>1.7</td>
                                    <td>A</td>
                                    </tr><tr role="row" class="even">
                                    <td class="sorting_1">Gecko</td>
                                    <td>Netscape Nro. Imputa. 8</td>
                                    <td>Win 98SE+</td>
                                    <td>1.7</td>
                                    <td>A</td>
                                    </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Gecko</td>
                                    <td>Netscape Navigator 9</td>
                                    <td>Win 98+ / OSX.2+</td>
                                    <td>1.8</td>
                                    <td>A</td>
                                    </tr><tr role="row" class="even">
                                    <td class="sorting_1">Gecko</td>
                                    <td>Mozilla 1.0</td>
                                    <td>Win 95+ / OSX.1+</td>
                                    <td>1</td>
                                    <td>A</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr><th rowspan="1" colspan="1">Ejer</th><th rowspan="1" colspan="1">Nro. Imputa.</th><th rowspan="1" colspan="1">SAF</th><th rowspan="1" colspan="1">Pg</th><th rowspan="1" colspan="1">Programa Desc.</th></tr>
                                </tfoot> -->
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