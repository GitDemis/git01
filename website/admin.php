<?php

   
  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
//    page_require_level(1);

?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5')
?>
<?php include_once('layouts/header.php'); ?>

<!-- <div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <p class="text-muted">Usuarios</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-list"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>
          <p class="text-muted">Categorías</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue">
          <i class="glyphicon glyphicon-shopping-cart"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_product['total']; ?> </h2>
          <p class="text-muted">Productos</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-yellow">
          <i class="glyphicon glyphicon-usd"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_sale['total']; ?></h2>
          <p class="text-muted">Ventas</p>
        </div>
       </div>
    </div>
  </div>

  <div class="row">
   <div class="col-md-4">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>01- Activadades Centrales al Ministerior y 03- Actividades comunes a Programas con Financiamiento Externo</span>
         </strong>
       </div>
       <div class="panel-body">
         <table class="table table-striped table-bordered table-condensed">
          <thead>
           <tr>
             <th>Título</th>
             <th>Total vendido</th>
             <th>Cantidad total</th>
           <tr>
          </thead>
          <tbody>
            <?php foreach ($products_sold as  $product_sold): ?>
              <tr>
                <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                <td><?php echo (int)$product_sold['totalSold']; ?></td>
                <td><?php echo (int)$product_sold['totalQty']; ?></td>
              </tr>
            <?php endforeach; ?>
          <tbody>
         </table>
       </div>
     </div>
   </div>
   <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>16 Impulso al Desarrollo del Sisema Democrático y Relaciones con la Comunidad</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">#</th>
           <th>Producto</th>
           <th>Fecha</th>
           <th>Venta total</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($recent_sales as  $recent_sale): ?>
         <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td>
            <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
             <?php echo remove_junk(first_character($recent_sale['name'])); ?>
           </a>
           </td>
           <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
           <td>$<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div>
  <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>17- Cooperación, Asistencia Técnica y Capacitación a Municipios</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">#</th>
           <th>Producto</th>
           <th>Fecha</th>
           <th>Venta total</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($recent_sales as  $recent_sale): ?>
         <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td>
            <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
             <?php echo remove_junk(first_character($recent_sale['name'])); ?>
           </a>
           </td>
           <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
           <td>$<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
 </div>
</div>
</div> -->



<div class="row">
    <div class="col-xs-12">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Historial de archivos </h3>
            </div>
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table  class="table table-bordered table-striped dataTable" >
                                <thead>
                                    <tr role="row">        
                                    <!-- <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="descending" aria-label="FECHA: activate to sort column ascending" style="width: 100px;">FECHA</th> -->
   
                                    <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 326px;">Fecha</th>
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 365px;">Lote</th>
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 326px;">Nombre de archivo</th>
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 326px;">Ver</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql="SELECT id, lote,nombre_file, fecha FROM `history` GROUP BY lote ORDER by id DESC LIMIT 1,10"; 
                                    // >>>> Activar cuando el servidor sea productivo
                                    // $sql="SELECT id, lote,nombre_file, DATE_SUB(fecha,INTERVAL '5-13' HOUR_MINUTE) as fecha FROM `history` GROUP BY lote ORDER by id DESC LIMIT 0,10"; 
                                    $datapsp = $db->query($sql);
                                    $count  = mysqli_num_rows($datapsp);
                                    
                                    while($valor = mysqli_fetch_array($datapsp)){
                                        $date = date_create($valor["fecha"]);
                                        $fecha = date_format($date,  'd/m/Y H:i:s');
                                        echo '<tr> 
                                                <td>'.$fecha.'</td>
                                                <td>'.$valor["lote"].'</td>
                                                <td>'.$valor["nombre_file"].'</td>
                                                <td style="text-align:center;">
                                                    <a type="submit" style="text-align: center; text-decoration: none;font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 50%;" value="+" href="mascara_lote.php?lote='.$valor["lote"].'" target="_blank"> <i class="glyphicon glyphicon-eye-open"></i></a></td>

                                                
                                            </tr>';
                                    }
                                    ?> 
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>  





<?php include_once('layouts/footer.php'); ?>
