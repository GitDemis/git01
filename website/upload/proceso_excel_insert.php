<?php

$importar = 1;

$dir = ''; //'C:\Users\Desarrollo\Desktop\excel-muni\\';

$file = 'importacion.xlsx';


$archivo = $dir . $file;
echo "importando:<br/>";
echo $archivo;
echo "<br/>";
echo "<br/>";

$counter = 0;

$nombreTablaImportacion = 'carga_excel';

$DB = 'c1presupuestos';
$HOST = '192.168.237.14:8080';
$USER = 'c1cristina';
$PASS = 'Genesis2020';
$conn = new PDO("mysql:dbname=$DB;host=$HOST", $USER, $PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("set names utf8");

if ($importar != 'no') {

    date_default_timezone_set('America/Buenos_Aires');
    require_once('\application\libraries\PHPExcel\Classes\PHPExcel\IOFactory.php');

    $relacionCampos = array(
		'A' => array('nombreColumna' => 'ejer', 'campoBase' => 'ejer'),
        'B' => array('nombreColumna' => 'Nro. Imputa.', 'campoBase' => 'nro_imputa'),
		'C' => array('nombreColumna' => 'SAF', 'campoBase' => 'saf'),
        'D' => array('nombreColumna' => 'Pg', 'campoBase' => 'pg'),
		'E' => array('nombreColumna' => 'Programa Desc.', 'campoBase' => 'programa_desc'),
        'F' => array('nombreColumna' => 'Pr', 'campoBase' => 'pr'),
		'G' => array('nombreColumna' => 'Fte', 'campoBase' => 'fte'),
        'H' => array('nombreColumna' => 'In', 'campoBase' => 'in_1'),
        'I' => array('nombreColumna' => 'Inciso Desc.', 'campoBase' => 'inciso_desc'),
        'J' => array('nombreColumna' => 'Pp', 'campoBase' => 'pp'),
        'K' => array('nombreColumna' => 'Principal Desc.', 'campoBase' => 'principal_desc'),
        'L' => array('nombreColumna' => 'Crédito Vigente', 'campoBase' => 'credito_vigente'),        
        'M' => array('nombreColumna' => 'Compromiso Consumido', 'campoBase' => 'compromiso_consumido'),
        'N' => array('nombreColumna' => 'Devengado Consumido', 'campoBase' => 'devengado_consumido'),
        'O' => array('nombreColumna' => 'Disponible Gastar', 'campoBase' => 'disponible_gastar')
    );

    $valoresInsert = array();
    $valoresRow = array();

    $objPHPExcel = PHPExcel_IOFactory::load($archivo);
    $sheets = $objPHPExcel->getAllSheets();

    $hoja = 1;

    foreach ($sheets as $sheet) {
        $rows = $sheet->getRowIterator();
        $highestRow = $sheet->getHighestRow();

        if ($highestRow <= 1)
            continue;

        foreach ($rows as $row) {
            $row->getCellIterator();
            $cells = $row->getCellIterator();

            foreach ($valoresRow as $k => $v)
                $valoresRow[$k] = null;

            foreach ($cells as $cell) {
                $r = $cell->getRow();
                $c = $cell->getColumn();
                $value = $cell->getValue();

                if ($r == 1) {
                    if (!isset($relacionCampos[$c]))
                        mensajeError('La columna ' . $c . ' no está definida en el proceso de importación');

                    if ($relacionCampos[$c]['nombreColumna'] != strtolower($value)) {
                        $mensaje = 'El título de la columna ' . $c . ' no se corresponde con el definido en el proceso de importación. (en hoja ' . $hoja . ').
								          <br /><br />El Excel debe tener estas columnas:<br />';

                        foreach ($relacionCampos as $k => $v)
                            $mensaje = $mensaje . $k . '=>' . $v['nombreColumna'] . '<br />';

                        mensajeError($mensaje);
                    }

                    $valoresRow[$c] = null;
                } else {
                    if (!isset($relacionCampos[$c]['tipo']))
                        $valoresRow[$c] = $value;

                    else {
                        switch ($relacionCampos[$c]['tipo']) {
                            case 'date':
                                $valoresRow[$c] = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($value));
                                break;
                            default:
                                $valoresRow[$c] = $value;
                        }
                    }
                }
            }

            if ($r != 1)
                $valoresInsert[] = $valoresRow;

        }

        $hoja++;
    }

    $camposInsert = array();
    $values = array();

    foreach ($relacionCampos as $k => $v) {

        //insert, no tiene Id
        if ($k == "A") {
            continue;
        }

        $camposInsert[] = $v['campoBase'];
        $values[] = '?';
    }

    $conn->query("TRUNCATE TABLE carga_excel");

    $query = "insert into " . $nombreTablaImportacion . "(" . implode(',', $camposInsert) . ") values(" . implode(',', $values) . ")";
    $r = $conn->prepare($query);


    try {
        $conn->beginTransaction();

        foreach ($valoresInsert as $v) {
            $insertar = array();

            $i = 0;
            foreach ($v as $x) {
                if ($i == 0) {
                    $i++;
                    continue;
                }


                $insertar[] = $x;

            }

            $r->execute($insertar);

        }

        $conn->commit();
    } catch (PDOException $e) {
        $conn->rollBack();
        mensajeError($e->getMessage() . '<br> tratando de insertar los valores:<br>' . implode(',', $insertar));
    }

    echo 'Importación finalizada con éxito. Registros Insertados: ' . count($valoresInsert);

}

//IMPORTACIÓN DATOS A TABLA OK


$query = "select * from " . $nombreTablaImportacion . " where procesado=0";
$r = $conn->prepare($query);
$r->execute();
$result = $r->fetchAll();

try {
    $conn->beginTransaction();
    /*
    $queryUpdateMuni = "update municipios set nombre=?,
		                           id_pcia=(select id from provincias where nombre=?),
                                   carta_organica=?,
                                   cabecera=?,
                                   sitio_web=?,
                                   fecha_fundacion=?,
                                   id_categoria_municipios=(select id from categoria_municipio where nombre=?)

                 where id=?";
    */
    $queryUpdateMuni = "INSERT INTO municipios (
                                cod_gobierno_local,
								id_pcia,
                                nombre,
                                cabecera,
                                sitio_web,
                                id_categoria_municipios,
								id_categoria_agrupada,
                                es_municipio,
                                nombre_cabecera,
                                id_tipo_municipio,
                                id_tamano_poblacion_municipio,
                                direccion_municipio,
                                estado_datos,
                                fecha_actualizacion_datos,
                                tipo_fuente_datos,
                                fuente_datos,
                                observaciones,
                                id_seccion_electoral,
								id_usuario_ultima_actualizacion,
								usuario_ultima_actualizacion
                                )
                                VALUES (?,?,?,?,?,
								(select id from categoria_municipio where nombre = ?),
								(select id from categoria_agrupada where nombre = ?),
								1,?,
								(select id from tipo_municipio where nombre = ?),
								(select id from tamano_poblacion_municipio where nombre = ?),
								?,?,?,?,?,?,
								(select id from seccion_electoral where nombre = ?),
								1,'admin');";
    $pUpdateMuni = $conn->prepare($queryUpdateMuni);

    $queryInsertTelMuni = "insert ignore into tel_municipios(nro, id_muni) values(?,?)";
    $queryInsertMailMuni = "insert ignore into mail_municipios(mail, id_muni) values(?,?)";
    $queryInsertIntendente = "insert ignore into intendentes(nombre, dni, sexo, apodo) values(?,?,?,?)";
	$queryInsertIntendenteAnterior = "insert ignore into intendentes(nombre,activo) values(?,0)";
    $queryInsertTelIntendente = "insert ignore into tel_intendentes(tel_contacto, id_intendente) values(?,?)";
    $queryInsertMailIntendente = "insert ignore into mail_intendentes(correo, id_intendente) values(?,?)";
    $queryInsertPanoramaPolitico = "insert ignore into panorama_politico(id_intendente, id_tendencia, nro_mandato, reelecto, fecha_inicio_mandato, 
									fecha_fin_mandato, id_municipio, activo, id_partido_politico, id_partido_politico_nacional, asistido_gestion_anterior)
	                                values(?,?,?,?,?,?,?,?, (select id from partidos_politicos WHERE nombre = ? AND idprovincia = ?),
									(select id from partidos_politicos WHERE nombre = ? AND idprovincia = ? and orden_nacional = 1),?)";
	$queryInsertPanoramaPoliticoAnterior = "insert ignore into panorama_politico(id_intendente, id_tendencia, id_municipio, activo, id_partido_politico, 
											id_partido_politico_nacional, asistido_gestion_anterior)
											values(?,?,?,?, (select id from partidos_politicos WHERE nombre = ? AND idprovincia = ?),
											(select id from partidos_politicos WHERE nombre = ? AND idprovincia = ? and orden_nacional = 1),?)";						
	$queryInsertIndicadores = "insert ignore into indicadores(valor, id_tipo_indicador, id_municipio, activo) values (?,?,?,?)";
	
    foreach ($result as $row) {
        //--------------- INSERTA MUNICIPIOS ------------------
		//echo "vuelta nro: $counter<br/>";

        $row = (object)$row;

        $cabecera = ($row->cabecera == 'SI') ? 1 : 0;
							
        $data = array(
            $row->cod_gobierno_local,
			$row->cod_prov,
			$row->gobierno_local,
            $cabecera,
            $row->sitio_web,
			$row->categoria,
			$row->categoria_agrupada,
            $row->nombre_cabecera,
			$row->tipo_municipio,
			$row->tamano_poblacion_municipio,
			$row->direccion_municipalidad,
			$row->estado,
			$row->fecha,
			$row->tipo_fuente,
			$row->fuente_dato,
			$row->observaciones_info,
			$row->seccion_electoral
            );

        $pUpdateMuni->execute($data);
        $idMuncipio = $conn->lastInsertId();
        $row->id_municipio = $idMuncipio;

        //------------------------------------------------------------------
		
		//--------------- INSERTA TELEFONOS MUNICIPIOS ------------------

        $pInsertTelMuni = $conn->prepare($queryInsertTelMuni);

        if ($row->tel_municipio1 != null) {
            $data = array($row->tel_municipio1, $row->id_municipio);
            $pInsertTelMuni->execute($data);
        }

        if ($row->tel_municipio2 != null) {
            $data = array($row->tel_municipio2, $row->id_municipio);
            $pInsertTelMuni->execute($data);
        }

        if ($row->tel_municipio3 != null) {
            $data = array($row->tel_municipio3, $row->id_municipio);
            $pInsertTelMuni->execute($data);
        }

        if ($row->tel_municipio4 != null) {
            $data = array($row->tel_municipio4, $row->id_municipio);
            $pInsertTelMuni->execute($data);
        }
		
		if ($row->tel_municipio5 != null) {
            $data = array($row->tel_municipio5, $row->id_municipio);
            $pInsertTelMuni->execute($data);
        }
		
		if ($row->tel_municipio6 != null) {
            $data = array($row->tel_municipio6, $row->id_municipio);
            $pInsertTelMuni->execute($data);
        }
		
		
		
        //------------------------------------------------------------------


        //------------------- INSERTA MAILS MUNICIPIO -----------------------------

        $pInsertMailMuni = $conn->prepare($queryInsertMailMuni);

        if ($row->mail_intendente1 != null) {
            $data = array($row->mail_intendente1, $row->id_municipio);
            $pInsertMailMuni->execute($data);
        }

        //-------------------- INSERT O UPDATE EN INTENDENTES ---------------------

        if($row->intendente != null){
			$pInsertIntendente = $conn->prepare($queryInsertIntendente);
			$data = array($row->intendente, $row->dni_intendente, $row->sexo, $row->apodo);
			$pInsertIntendente->execute($data);
			$idIntendente = $conn->lastInsertId();
		}

        //----------------------------------------------------------------------


        //--------------------- INSERT EN TELEFONOS INTENDENTES -----------------------

        $pInsertTelIntendente = $conn->prepare($queryInsertTelIntendente);

        if ($row->tel_intendente1 != null) {
            $data = array($row->tel_intendente1, $idIntendente);
            $pInsertTelIntendente->execute($data);
        }

        if ($row->tel_intendente2 != null) {
            $data = array($row->tel_intendente2, $idIntendente);
            $pInsertTelIntendente->execute($data);
        }
		
		if ($row->tel_intendente3 != null) {
            $data = array($row->tel_intendente3, $idIntendente);
            $pInsertTelIntendente->execute($data);
        }
		
		if ($row->tel_intendente4 != null) {
            $data = array($row->tel_intendente4, $idIntendente);
            $pInsertTelIntendente->execute($data);
        }
		
		if ($row->tel_intendente5 != null) {
            $data = array($row->tel_intendente5, $idIntendente);
            $pInsertTelIntendente->execute($data);
        }

        //----------------------------------------------------------------------------------


        //------------------------- MAIL INTENDENTE ------------------------------------------

        $pInsertMailIntendente = $conn->prepare($queryInsertMailIntendente);

        if ($row->mail_intendente1 != null) {
            $data = array($row->mail_intendente1, $idIntendente);
            $pInsertMailIntendente->execute($data);
        }
        //----------------------------------------------------------------------------------------	 
		

        //----------------------------- INSERT EN PANORAMA POLITICO INTENDENTE ACTUAL ------------------------------
		
		$pInsertPanoramaPolitico = $conn->prepare($queryInsertPanoramaPolitico);
		if ($row->ano_inicio_mandato != null){
			$fecha = $row->ano_inicio_mandato."-12-10";
			$row->ano_inicio_mandato = date("Y-m-d", strtotime($fecha));
		}
		if ($row->ano_fin_mandato != null){
			$fecha = $row->ano_fin_mandato."-12-10";
			$row->ano_fin_mandato = date("Y-m-d", strtotime($fecha));
		}
		
		$activo = 1;
		$tendencia = 3; //No está definida para el Intendente Actual
		$asistido_gestion_anterior = "-";	//No está definida para el Intendente Actual
		
        $data = array(
					  $idIntendente, 
					  $tendencia,
					  $row->nro_mandato,
					  $row->reelecto,
					  $row->ano_inicio_mandato,
					  $row->ano_fin_mandato,
                      $row->id_municipio,
					  $activo,
					  $row->partido_local,
					  $row->cod_prov,
				      $row->referente_nacional,
					  $row->cod_prov,
					  $asistido_gestion_anterior
					  );
					  
        $pInsertPanoramaPolitico->execute($data);

        //--------------------------------------------------------------------------------------------
		
		//-------------------- INSERT O UPDATE EN INTENDENTES - PARA INDENDENTE ANTERIOR ---------------------
		
		if ($row->intendente2 != null) {
			$pInsertIntendenteAnterior = $conn->prepare($queryInsertIntendenteAnterior);
			$data = array($row->intendente2);
			$pInsertIntendenteAnterior->execute($data);
			$idIntendenteAnterior = $conn->lastInsertId();
		}

        //----------------------------------------------------------------------------------------------------
	
		//----------------------------- INSERT EN PANORAMA POLITICO INTENDENTE ANTERIOR ------------------------------

        $pInsertPanoramaPoliticoAnterior = $conn->prepare($queryInsertPanoramaPoliticoAnterior);

        switch (mb_convert_case($row->tendencia, MB_CASE_LOWER, 'UTF-8')) {
            case null:
                $tendencia = 3;
                break;
            case 'oficialista':
                $tendencia = 2;
                break;
            case 'opositor':
                $tendencia = 1;
                break;
        }

		
		$activo = 1;
		
        $data = array(
					  $idIntendenteAnterior, 
					  $tendencia,
                      $row->id_municipio,
					  $activo,
					  $row->partido_local_2,
					  $row->cod_prov,
				      $row->referente_nacional_2,
					  $row->cod_prov,
					  $row->asistido_gestion_anterior
					  );
					  
        $pInsertPanoramaPoliticoAnterior->execute($data);

        //--------------------------------------------------------------------------------------------
		
		//-------------------- INSERT EN INDICADORES  ---------------------
		
		
		
		if ($row->poblacion != null) {
			$pInsertIndicadores = $conn->prepare($queryInsertIndicadores);
			$data = array($row->poblacion, 1, $row->id_municipio,1);
			$pInsertIndicadores->execute($data);
		}
		
		if ($row->electores != null) {
			$pInsertIndicadores = $conn->prepare($queryInsertIndicadores);
			$data = array($row->electores, 2, $row->id_municipio,1);
			$pInsertIndicadores->execute($data);
		}
		

        //----------------------------------------------------------------------------------------------------
		
		
        $query = "update " . $nombreTablaImportacion . " set procesado=1 where id=" . $row->id;
        $r = $conn->prepare($query);
        $r->execute();

        $counter++;

    }

    $conn->commit();
    echo "</br>Finalizado OK</br>";
} catch (PDOException $e) {
    $conn->rollBack();
    mensajeError($e->getMessage() . '<br> tratando de actualizar los valores:<br>' . implode(',', $data));
	var_dump($data);
}

function mensajeError($m)
{
    die('ERROR!!!! ' . $m);
}

?>