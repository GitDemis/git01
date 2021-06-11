<?php
    require 'upload/PHPExcel/Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
    require 'includes/load.php'; //Agregamos la conexión	
    
    //Variable con el nombre del archivo        
    $nombreArchivo = $_FILES['ejecucion-0']['tmp_name'];
    $nombreOriginalArchivo = $_FILES['ejecucion-0']['name'];

	// Cargo la hoja de cálculo
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	
	//Asigno la hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);

	//Obtengo el numero de filas del archivo
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    
	/** Vacio la tabla carga_excel */
	$delete = "DELETE FROM carga_excel";
	$resultadoDelete = $db->query($delete);
	
	/**Genero un numero de lote */
    $lote = RAND();

 

	for ($i = 1; $i <= $numRows; $i++) {
        
		$ejer = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$nro_imputa = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $saf = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $safd = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$pg = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        $programa_desc = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
        $ac = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
        $actividad_desc = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
		$pr = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
		$fte = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		$in_data = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
		$inciso_desc = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
		$pp = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
		$principal_desc = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
		$credito_vigente = $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
		$compromiso_consumido = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
		$devengado_consumido = $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
		$disponible_gastar = $objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
		
		if ($i == 1) {

			if ($ejer == "" || $nro_imputa == "" || $saf == "" || $safd == "" || $pg == ""	|| $programa_desc == ""|| $ac == "" ||  $actividad_desc == "" ||
				$pr == "" || $fte == "" || $in_data == ""|| $inciso_desc == ""	|| $pp == "" || $principal_desc == "" || 
				$credito_vigente == "" || $compromiso_consumido == "" || $devengado_consumido == ""	|| $disponible_gastar == "") {
				echo json_encode(array("estado"=>1, "mensaje"=>"El Excel tiene campos vacíos o contiene mas de una solapa."));
				exit;
			}

		}else{

			// Inserto en la tabla carga_excel
			$sql = "INSERT INTO carga_excel (lote,
                                            nombre_file,
											ejer,
											nro_imputa,
											saf,
											safd,
											pg,
											programa_desc,
                                            ac,
                                            actividad_desc,
											pr,
											fte,
											in_data,
											inciso_desc,
											pp,
											principal_desc,
											credito_vigente,
											compromiso_consumido,
											devengado_consumido,
											disponible_gastar) 
											VALUES('$lote','$nombreOriginalArchivo','$ejer','$nro_imputa','$saf','$safd','$pg','$programa_desc','$ac','$actividad_desc','$pr','$fte','$in_data','$inciso_desc','$pp','$principal_desc','$credito_vigente','$compromiso_consumido','$devengado_consumido','$disponible_gastar')";

            $result = $db->query($sql);
			if(!$result){
				echo json_encode(array("estado"=>1, "mensaje"=>$db->error()));
				exit;
			}else{

			// Inserto en la tabla history
			$sqlhistory = "INSERT INTO history (lote,
                                                nombre_file,
												ejer,
												nro_imputa,
												saf,
												safd,
												pg,
												programa_desc,
                                                ac,
                                                actividad_desc,
												pr,	
												fte,
												in_data,
												inciso_desc,
												pp,
												principal_desc,
												credito_vigente,
												compromiso_consumido,
												devengado_consumido,
												disponible_gastar) 
												VALUES('$lote','$nombreOriginalArchivo','$ejer','$nro_imputa','$saf','$safd','$pg','$programa_desc','$ac','$actividad_desc','$pr','$fte','$in_data','$inciso_desc','$pp','$principal_desc','$credito_vigente','$compromiso_consumido','$devengado_consumido','$disponible_gastar')";
				
				$result = $db->query($sqlhistory);
				if(!$result){
					echo json_encode(array("estado"=>1, "mensaje"=>$db->error()));
					exit;
				}else{
					$valor[] = $i - 1;				
				}

			}

		}

	}

	$actual = $i - 1;
	if($numRows==$actual){
		$numRows = $numRows - 1;
		echo json_encode(array("estado"=>0, "mensaje"=>"Importación generada con éxito.", "total"=>$numRows, "valor"=>$valor));
		exit;
	} else {
		echo json_encode(array("estado"=>1, "mensaje"=>"La importación tuvo problema con la Excel, verifique que no contenga columnas o filas vacias."));
		exit;
    }
 
?>