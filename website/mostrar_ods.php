<?php
    // require 'upload/PHPExcel/Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
    // require 'includes/load.php'; //Agregamos la conexión
	// // require 'conexion.php'; //Agregamos la conexión    
	
	// //Variable con el nombre del archivo	
	// $nombreArchivo = $_FILES['ods-0']['tmp_name'];
    // // echo '<h1>'.$nombreArchivo.'</h1>';
    // // $nombreArchivo = 'bienvenido';
	// // echo '<h1>Prueba de respuesta'.$nombreArchivo.'/h1>';	


	// // Cargo la hoja de cálculo
	// $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	
	// //Asigno la hoja de calculo activa
	// $objPHPExcel->setActiveSheetIndex(0);
	// //Obtengo el numero de filas del archivo
	// $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
    // // echo '<table class="table"><tr><td>Lote</td><td>Ejer</td><td>SAF</td><td>Servicio Administrativo Financiero Desc.</td><td>Crédito Vigente</td><td>Compromiso Consumido</td><td>Devengado Consumido</td><td>Disponible Gastar</td></tr>';
    // echo '<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">';
    // echo '<thead>';
    // echo '<tr role="row">';
    // echo '<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ejer: activate to sort column descending" style="width: 301px;">Ejer</th>
    //       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="SAF: activate to sort column ascending" style="width: 365px;">SAF</th>
    //       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Servicio Administrativo Financiero Desc.: activate to sort column ascending" style="width: 326px;">Servicio Administrativo Financiero Desc.</th>
    //       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Crédito Vigente: activate to sort column ascending" style="width: 260px;">Crédito Vigente</th>
    //       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Compromiso Consumido: activate to sort column ascending" style="width: 192px;">Compromiso Consumido</th></tr>';
    // echo '</thead>';
	
	// /** Vacio la tabla carga_excel */
	// $delete = "DELETE FROM carga_ods";
	// $resultadoDelete = $mysqli->query($delete);
	
	// /**Genero un numero de lote */
	// $lote = RAND();

	// for ($i = 2; $i <= $numRows; $i++) {
		
	// 	$ejer = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
	// 	$saf = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
	// 	$servicioAdm = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
	// 	$credito_vigente = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
	// 	$compromiso_consumido = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
	// 	$devengado_consumido = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
	// 	$disponible_gastar = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		
	// 	/**Insert sobre carga_excel */
	// 	$sqlOds = "INSERT INTO carga_ods (lote,
	// 										ejer,
	// 										saf,
	// 										servicio_adm,
	// 										credito_vigente,
	// 										compromiso_consumido,
	// 										devengado_consumido,
	// 										disponible_gastar) 
	// 									VALUES('$lote','$ejer','$saf','$servicioAdm','$credito_vigente','$compromiso_consumido','$devengado_consumido','$disponible_gastar')";
	// 	$result = $mysqli->query($sqlOds);

	// 	/* Insert para la tabla de historial*/
	// 	$sqlhistoryODS = "INSERT INTO history_ods (lote,
	// 								ejer,
    //                                 saf,
    //                                 servicio_adm,
    //                                 credito_vigente,
    //                                 compromiso_consumido,
    //                                 devengado_consumido,
    //                                 disponible_gastar) 
	// 							VALUES('$lote','$ejer','$saf','$servicioAdm','$credito_vigente','$compromiso_consumido','$devengado_consumido','$disponible_gastar')";

	// 	$resulthistoryODS = $mysqli->query($sqlhistoryODS);

    //     echo '<tbody>';
	// 	echo '<tr>';
    //     // echo '<td>'. $lote.'</td>';
    //     echo '<tr role="row" class="odd">
    //             <td class="sorting_1">'. $ejer.'</td>
    //                 <td>'.$saf.'</td>
    //                 <td>'.$servicioAdm.'</td>
    //                 <td>'.$credito_vigente.'</td>
    //                 <td>'.$compromiso_consumido.'</td>
    //           </tr>';        
	// 	// echo '<tr>';		
	// 	// echo '<td>'. $ejer.'</td>';
	// 	// echo '<td>'. $saf.'</td>';
    //     // echo '<td>'. $servicioAdm.'</td>';
	// 	// echo '<td>'. $credito_vigente.'</td>';
	// 	// echo '<td>'. $compromiso_consumido.'</td>';
	// 	// echo '<td>'. $devengado_consumido.'</td>';
	// 	// echo '<td>'. $disponible_gastar.'</td>';
	// 	// echo '</tr>';
    //     echo '</tbody>';

    // }
    // // echo '<table class="table"><tr><td>Lote</td><td>Ejer</td><td>SAF</td><td>Servicio Administrativo Financiero Desc.</td><td>Crédito Vigente</td><td>Compromiso Consumido</td><td>Devengado Consumido</td><td>Disponible Gastar</td></tr>';
    //     echo '<tfoot>
    //           <tr><th rowspan="1" colspan="1">Ejer</th><th rowspan="1" colspan="1">SAF</th><th rowspan="1" colspan="1">Servicio Administrativo Financiero Desc.</th><th rowspan="1" colspan="1">Crédito Vigente</th><th rowspan="1" colspan="1">Compromiso Consumido</th></tr>
    //           </tfoot>';
	// echo '<table>';

?>