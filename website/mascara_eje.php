<?php
  $page_title = 'Vista';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php 
    include_once('layouts/header.php'); 
    include 'controlador/pspcontrolador.php';
?>

<?php
    // $datapsp = controladorpsp::getpsp(3);    
    // echo '<pre>';
    // var_dump($datapsp);
    // echo '</pre>';

    // while($row = mysqli_fetch_array($datapsp)){
    //     echo '<p>'.$row["id"].'</p>';
    // }
?>                            

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Ejecución presupuestaria </span> 
                </strong>
                <input id="Excel" type="button" onclick="tableToExcel('loteTable', 'consolidado')" value="Exportar Excel">
            </div>
            
            <div class="panel-body">
                <table id="loteTable" class="table table-striped table-bordered table-condensed">
                    <!-- // Muestro la cabecera de la vista o mascara. -->
                    <thead>
                        <tr>
                            <th style="background-color: #7B68EE; vertical-align:middle; text-align:center;">Programa</th>
                            <th style="background-color: #7B68EE; vertical-align:middle; text-align:center;">Inciso</th>
                            <th style="background-color: #7B68EE; vertical-align:middle; text-align:center;">Ppal</th>
                            <th style="background-color: #32CD32; vertical-align:middle; text-align:center; width: 20%;">Concepto</th>
                            <th style="background-color: #32CD32; vertical-align:middle; text-align:center;">Crédito vigente</th>
                            <th style="background-color: #32CD32; vertical-align:middle; text-align:center;">Comprometido</th>
                            <th style="background-color: #32CD32; vertical-align:middle; text-align:center;">% Comprometido</th>
                            <th style="background-color: #32CD32; vertical-align:middle; text-align:center;">Devengado</th>
                            <th style="background-color: #32CD32; vertical-align:middle; text-align:center;">% Devengado</th>
                            <th style="background-color: #32CD32; vertical-align:middle; text-align:center;">Crédito Disponible para gastar</th>                            
                        </tr>
                    </thead>
                    <tbody>                        
                        <?php
                            // Muestro el cuerpo de la vista o mascara, por medio de las formulas que viene del modelo.
                            for ($i=1; $i <= 7; $i++) {
                                $cantidadFilas=0;
                                if ($i == 1) {
                                    $programa="01 y 03 ACTIVIDADES CENTRALES Y COMUNES";
                                    $datapsp = controladorpsp::getpsp(1,$db);   
                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;
                                    $ver="bloqueuno";
                                    $tabla="tablauno";
                                }elseif ($i == 2){
                                    $programa="SECRETARÍA ASUNTOS POLÍTICOS";
                                    $datapsp = controladorpsp::getpsp(16,$db);
                                    //$cantidadFilas=13;
                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;
                                    $ver="bloquedos";
                                    $tabla="tablados";
                                }elseif ($i == 3){
                                    $programa="SECRETARÍA DE MUNICIPIOS";
                                    $datapsp = controladorpsp::getpsp(17,$db);
                                    //$cantidadFilas=12;
                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;
                                    $ver="bloquetres";
                                    $tabla="tablatres";
                                }elseif ($i == 4){
                                    $programa=" SECRETARÍA DE PROVINCIAS";
                                    $datapsp = controladorpsp::getpsp(19,$db);
                                    //$cantidadFilas=14;
                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;
                                    $ver="bloquecuatro";
                                    $tabla="tablacuatro";
                                }elseif ($i == 5){
                                    $programa="SECRETARÍA DE INTERIOR";
                                    $datapsp = controladorpsp::getpsp(34,$db);
                                    //$cantidadFilas=14;
                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;
                                    $ver="bloquecinco";
                                    $tabla="tablacinco";
                                }
                                elseif ($i == 6) {
                                    $programa="SAF 325 - MINISTERIO DEL INTERIOR";
                                    $datapsp = controladorpsp::getTotalMinInt($db);
                                }elseif ($i == 7) {
                                    $programa="SAF 325 - MINISTERIO DEL INTERIOR SIN ATN";
                                    $datapsp = controladorpsp::getExcluyeAtn($db);
                                }
                                                                
                                while($valor = mysqli_fetch_array($datapsp)){
                                    if($valor["disponible_gastar"]<1){
                                        $disponible_gastar=0;
                                    }else {
                                         $disponible_gastar= $valor["disponible_gastar"];
                                    }
                                    $comentario='Sin comentario';
                                    if ($valor["concepto"] == 'Subtotal' || $valor["concepto"] == 'Subtotal1') {
                                        if($programa == "SAF 325 - MINISTERIO DEL INTERIOR SIN ATN" || $programa == "SAF 325 - MINISTERIO DEL INTERIOR" ) {
                                            echo '<tr>
                                                    <td colspan="4" style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$programa.'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["credito_vigente"].'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["compromiso_consumido"].'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["porc_comp"].'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["devengado_consumido"].'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["porc_deve"].'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$disponible_gastar.'</td>
                                                </tr>';
                                            if ($programa == 'SAF 325 - MINISTERIO DEL INTERIOR SIN ATN') {
                                                echo '<tr><td></td></tr>';
                                            }

                                            if ($valor["concepto"] == 'Subtotal'){
                                                echo '<tbody id="'.$tabla.'">
                                                        <tr>
                                                            <td rowspan="'.$cantidadFilas.'" style="vertical-align:middle; text-align:center;">'.$valor["programa"].'</td>';
                                            }
                                        }else {
                                            echo '<tr>
                                                    <!--<td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;"><span class="badge bg-green">+</span></td> -->
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;"><input id="'.$ver.'" type="button" style="background-color: #4CAF50; border: none; color: white; padding: 1px 7px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 50%;" value="+"></input></td>
                                                    <td colspan="3" style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$programa.'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["credito_vigente"].'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["compromiso_consumido"].'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["porc_comp"].'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["devengado_consumido"].'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["porc_deve"].'</td>
                                                    <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$disponible_gastar.'</td>
                                                </tr>';
                                           

                                            if ($valor["concepto"] == 'Subtotal'){
                                                echo '<tbody id="'.$tabla.'">
                                                        <tr>
                                                            <td rowspan="'.$cantidadFilas.'" style="vertical-align:middle; text-align:center;">'.$valor["programa"].'</td>';
                                            }
                                        }
                                    }

                                    if ($valor["concepto"] != 'Subtotal' && $valor["concepto"] != 'Subtotal1') {
                                        if (!is_null($valor["pg"])) {
                                            if ($valor["concepto"] == 'Gastos en Personal') {
                                                $comentario = '- Personal permanente - Personal Temporario - horas extras y electorales - aguinaldo - Asistencia social - Gabinete de autoridades superiores - personal contratado';
                                            } elseif ($valor["concepto"] == 'Bienes de Consumo') {
                                                $comentario = '- Alimentos - prendas de vestir - insumos de oficina- libros - pintura- combustible - herramientas menores';
                                            } elseif ($valor["concepto"] == 'Servicios Básicos') {
                                                $comentario = '- Energía eléctrica - Agua - Gas - Telefonía';
                                            } elseif ($valor["concepto"] == 'Alquileres') {
                                                $comentario = '- Alquiler de edificios - maquinaria - medios de transporte - alquiler con opción a compra equipos de computación fotocopiadoras - terrenos - licencias informáticas';
                                            } elseif ($valor["concepto"] == 'Mantenimiento y Limpieza') {
                                                $comentario = '- Mantenimiento y reparación de edificios - vehículos - equipos - limpieza - fumigación - sistemas informáticos';
                                            } elseif ($valor["concepto"] == 'Servicios Técnicos y Profesionales') {
                                                $comentario = '- Consultorías - médicos - Jurídicos - auditoría - capacitación - informática - (LOYS)';
                                            } elseif ($valor["concepto"] == 'Servicios comerciales') {
                                                $comentario = '- Transporte - almacenamiento - imprenta - publicaciones - gastos de seguros - gastos bancarios - Internet';
                                            } elseif ($valor["concepto"] == 'Pasajes y Viáticos') {
                                                $comentario = '- Pasajes - Viáticos';
                                            } elseif ($valor["concepto"] == 'Impuestos') {
                                                $comentario = '- Impuestos indirectos - directos - Derechos y tasas - multas - juicios';
                                            } elseif ($valor["concepto"] == 'Impuestos') {
                                                $comentario = '- Impuestos indirectos - directos - Derechos y tasas - multas - juicios';
                                            } elseif ($valor["concepto"] == 'Otros servicios- mantenimiento soft') {
                                                $comentario = '- Servicios de ceremonial - gastos reservados - vigilancia - protocolares - pasantías - becas de investigación - peculio';
                                            } elseif ($valor["concepto"] == 'Otros Servicios') {
                                                $comentario = '- Servicios de ceremonial - gastos reservados - vigilancia - protocolares - pasantías - becas de investigación - peculio';
                                            } elseif ($valor["concepto"] == 'Bienes de Uso') {
                                                $comentario = '- Construcciones - maquinarias - equipos - vehículos-computadoras - obras de arte - programas informáticos';
                                            } elseif ($valor["concepto"] == 'Transferencia (aporte a OIM- Migraciones)') {
                                                $comentario = '- Transferencia (aporte a OIM- Migraciones)';
                                            } elseif ($valor["concepto"] == 'Apoyo a programas c/finan.externo') {
                                                $comentario = '- Insumo y contratos';
                                            } elseif ($valor["concepto"] == 'Transferencia FPP') {
                                                $comentario = '- Fondo Permanente Partidario';
                                            } elseif ($valor["concepto"] == 'Transferencias a municipios') {
                                                $comentario = '- Instituciones sin fines de lucro - Transferencias gastos corrientes y de capital para provincias y municipios';
                                            } elseif ($valor["concepto"] == 'DAMI (crédito externo)') {
                                                $comentario = '- Insumo - servicios - transferencia corrientes y capital';
                                            } elseif ($valor["concepto"] == 'Transferencias (incluye Fideicomiso Austral)') {
                                                $comentario = '- Transferencias corrientes y de capital a provincias y municipios - Fideicomiso Austral';
                                            } elseif ($valor["concepto"] == 'Transferencias ATN') {
                                                $comentario = '- Transferencia corrientes';
                                            } elseif ($valor["concepto"] == 'Transferencias Crédito Externo') {
                                                $comentario = '- Bienes - servicios - transferencias corrientes de capital a provincias y municipios (BID-CAF-FN)';
                                            } elseif ($valor["concepto"] == 'Transferencias a Fronteras y Org.Int`l.Archivo') {
                                                $comentario = '- Transferencias por membresías a la Asociación Latinoamericana de Archivos y al Consejo Internacional de Archivos';
                                            } elseif ($valor["concepto"] == 'Complejo Terminal de Cargas (COTECAR)') {
                                                $comentario = '- Insumo y servicios financiado con tasas del complejo de carga';
                                            } elseif ($valor["concepto"] == 'Pasos Fronterizos (CAF 7769-FONPLATA 35/2017)') {
                                                $comentario = '- Contrataciones varias';
                                            }

                                            if ($valor["concepto"] == 'Servicios No Personales') {
                                                echo '<tr>
                                                        <td class="CellWithComment" style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["in_data"].'</td>
                                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["pp"].'</td>
                                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["concepto"].'</td>
                                                        <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["credito_vigente"].'</td>
                                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["compromiso_consumido"].'</td>
                                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["porc_comp"].'</td>
                                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["devengado_consumido"].'</td>
                                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["porc_deve"].'</td>
                                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$disponible_gastar.'</td>                      
                                                    </tr>';        
                                            } elseif ($valor["pp"] == 0 && $valor["in_data"] == 0){
                                                echo '
                                                        <td colspan="3" style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["concepto"].'</td>
                                                        <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["credito_vigente"].'</td>
                                                        <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["compromiso_consumido"].'</td>
                                                        <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["porc_comp"].'</td>
                                                        <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["devengado_consumido"].'</td>
                                                        <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["porc_deve"].'</td>
                                                        <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$disponible_gastar.'</td>
                                                    </tr>';
                                            } else {
                                                if($valor["pp"] == 0){ 
                                                    if ($valor["concepto"] == 'Gastos en Personal') {
                                                        echo '<td class="CellWithComment" style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["in_data"].'<span id="comentario" class="CellComment">'.$comentario.'</span></td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["pp"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["concepto"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["credito_vigente"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["compromiso_consumido"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["porc_comp"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["devengado_consumido"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["porc_deve"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$disponible_gastar.'</td>                      
                                                            </tr>';
                                                    } else {
                                                        echo '<tr>
                                                                <td class="CellWithComment" style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["in_data"].'<span id="comentario" class="CellComment">'.$comentario.'</span></td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["pp"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["concepto"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["credito_vigente"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["compromiso_consumido"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["porc_comp"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["devengado_consumido"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["porc_deve"].'</td>
                                                                <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$disponible_gastar.'</td>                      
                                                            </tr>';
                                                    }
                                                } else {
                                                    echo '<tr>
                                                            <td class="CellWithComment" style="vertical-align:middle; text-align:center;">'.$valor["in_data"].'<span id="comentario" class="CellComment">'.$comentario.'</span></td>
                                                            <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["pp"].'</td>
                                                            <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["concepto"].'</td>
                                                            <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["credito_vigente"].'</td>
                                                            <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["compromiso_consumido"].'</td>
                                                            <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["porc_comp"].'</td>
                                                            <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["devengado_consumido"].'</td>
                                                            <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["porc_deve"].'</td>
                                                            <td style="vertical-align:middle; text-align:center; font-size:12px">'.$disponible_gastar.'</td>                      
                                                        </tr>';
                                                    
                                                }
                                            }
                                        } 
                                    }  
                                }
                                echo '</tbody>';                                                                
                            }
                            //saf 200 y 201
                            for ($i=1; $i <= 2; $i++) {
                                if ($i == 1) {
                                    $programa = "O.D. 200 - REGISTRO NACIONAL DE LAS PERSONAS";
                                    $datapsp = controladorpsp::getSaf200($db);
                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;
                                    $ver="bloqueseis";
                                    $tabla="tablaseis";
                                }
                                elseif ($i == 2){
                                    $programa = "O.D. 201 - DIRECCIÓN NACIONAL DE MIGRACIONES";
                                    $datapsp = controladorpsp::getSaf201($db);
                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;
                                    $ver="bloquesiete";
                                    $tabla="tablasiete";
                                }

                                while($valor = mysqli_fetch_array($datapsp)){
                                    if($valor["disponible_gastar"]<1){
                                        $disponible_gastar=0;
                                    }else {
                                         $disponible_gastar= $valor["disponible_gastar"];
                                    }
                                    $comentario='Sin comentario';
                                    if ($valor["concepto"] == 'Subtotal' || $valor["concepto"] == 'Subtotal1' ) {  
                                                                     
                                        echo '
                                        <tr>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;"><input id="'.$ver.'" type="button" style="background-color: #4CAF50; border: none; color: white; padding: 1px 7px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 50%;" value="+"></input></td>

                                        <td colspan="3" style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$programa.'</td>
                                        <!--<td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["concepto"].'-->
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["credito_vigente"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["compromiso_consumido"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["porc_comp"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["devengado_consumido"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valor["porc_deve"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$disponible_gastar.'</td>
                                        </tr>';

                                        if($valor["concepto"] == 'Subtotal'){
                                            echo '<tbody id="'.$tabla.'">
                                            <tr>
                                                <td rowspan="'.$cantidadFilas.'" style="vertical-align:middle; text-align:center;">'.$valor["programa"].'</td>';
                                        }
                                        
                                    }

                                    if ($valor["concepto"] != 'Subtotal' && $valor["concepto"] != 'Subtotal1') {
                                        if (!is_null($valor["pg"])) {
                                            if ($valor["concepto"] == 'Gastos en Personal') {
                                                $comentario = '- Personal permanente - Personal Temporario - horas extras y electorales - aguinaldo - Asistencia social - Gabinete de autoridades superiores - personal contratado';
                                            } elseif ($valor["concepto"] == 'Bienes de Consumo') {
                                                $comentario = '- Alimentos - prendas de vestir - insumos de oficina- libros - pintura- combustible - herramientas menores';
                                            } elseif ($valor["concepto"] == 'Servicios Básicos') {
                                                $comentario = '- Energía eléctrica - Agua - Gas - Telefonía';
                                            } elseif ($valor["concepto"] == 'Alquileres') {
                                                $comentario = '- Alquiler de edificios - maquinaria - medios de transporte - alquiler con opción a compra equipos de computación fotocopiadoras - terrenos - licencias informáticas';
                                            } elseif ($valor["concepto"] == 'Mantenimiento y Limpieza') {
                                                $comentario = '- Mantenimiento y reparación de edificios - vehículos - equipos - limpieza - fumigación - sistemas informáticos';
                                            } elseif ($valor["concepto"] == 'Servicios Técnicos y Profesionales') {
                                                $comentario = '- Consultorías - médicos - Jurídicos - auditoría - capacitación - informática - (LOYS)';
                                            } elseif ($valor["concepto"] == 'Servicios comerciales') {
                                                $comentario = '- Transporte - almacenamiento - imprenta - publicaciones - gastos de seguros - gastos bancarios - Internet';
                                            } elseif ($valor["concepto"] == 'Pasajes y Viáticos') {
                                                $comentario = '- Pasajes - Viáticos';
                                            } elseif ($valor["concepto"] == 'Impuestos') {
                                                $comentario = '- Impuestos indirectos - directos - Derechos y tasas - multas - juicios';
                                            } elseif ($valor["concepto"] == 'Impuestos') {
                                                $comentario = '- Impuestos indirectos - directos - Derechos y tasas - multas - juicios';
                                            } elseif ($valor["concepto"] == 'Otros servicios- mantenimiento soft') {
                                                $comentario = '- Servicios de ceremonial - gastos reservados - vigilancia - protocolares - pasantías - becas de investigación - peculio';
                                            } elseif ($valor["concepto"] == 'Otros Servicios') {
                                                $comentario = '- Servicios de ceremonial - gastos reservados - vigilancia - protocolares - pasantías - becas de investigación - peculio';
                                            } elseif ($valor["concepto"] == 'Bienes de Uso') {
                                                $comentario = '- Construcciones - maquinarias - equipos - vehículos-computadoras - obras de arte - programas informáticos';
                                            } elseif ($valor["concepto"] == 'Transferencia (aporte a OIM- Migraciones)') {
                                                $comentario = '- Transferencia (aporte a OIM- Migraciones)';
                                            } elseif ($valor["concepto"] == 'Apoyo a programas c/finan.externo') {
                                                $comentario = '- Insumo y contratos';
                                            } elseif ($valor["concepto"] == 'Transferencia FPP') {
                                                $comentario = '- Fondo Permanente Partidario';
                                            } elseif ($valor["concepto"] == 'Transferencias a municipios') {
                                                $comentario = '- Instituciones sin fines de lucro - Transferencias gastos corrientes y de capital para provincias y municipios';
                                            } elseif ($valor["concepto"] == 'DAMI (crédito externo)') {
                                                $comentario = '- Insumo - servicios - transferencia corrientes y capital';
                                            } elseif ($valor["concepto"] == 'Transferencias (incluye Fideicomiso Austral)') {
                                                $comentario = '- Transferencias corrientes y de capital a provincias y municipios - Fideicomiso Austral';
                                            } elseif ($valor["concepto"] == 'Transferencias ATN') {
                                                $comentario = '- Transferencia corrientes';
                                            } elseif ($valor["concepto"] == 'Transferencias Crédito Externo') {
                                                $comentario = '- Bienes - servicios - transferencias corrientes de capital a provincias y municipios (BID-CAF-FN)';
                                            } elseif ($valor["concepto"] == 'Transferencias a Fronteras y Org.Int`l.Archivo') {
                                                $comentario = '- Transferencias por membresías a la Asociación Latinoamericana de Archivos y al Consejo Internacional de Archivos';
                                            } elseif ($valor["concepto"] == 'Complejo Terminal de Cargas (COTECAR)') {
                                                $comentario = '- Insumo y servicios financiado con tasas del complejo de carga';
                                            } elseif ($valor["concepto"] == 'Pasos Fronterizos (CAF 7769-FONPLATA 35/2017)') {
                                                $comentario = '- Contrataciones varias';
                                            }
                                            

                                            if ($valor["concepto"] == 'Servicios No Personales') {
                                            
                                                echo '<tr>
                                                    <td class="CellWithComment" style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["in_data"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["pp"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["concepto"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["credito_vigente"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["compromiso_consumido"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["porc_comp"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["devengado_consumido"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["porc_deve"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$disponible_gastar.'</td>                      
                                                </tr>';
                                                
                                            }elseif($valor["pp"] == 0 && $valor["in_data"] == 0){
                                                if($valor["concepto"]== "FF 11- Tesoro Nacional"){
                                                    echo '
                                            <td colspan="3" style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["concepto"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["credito_vigente"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["compromiso_consumido"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["porc_comp"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["devengado_consumido"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["porc_deve"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$disponible_gastar.'</td>
                                            </tr>';
                                                }else {
                                                echo '<tr>
                                            <td colspan="3" style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["concepto"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["credito_vigente"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["compromiso_consumido"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["porc_comp"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["devengado_consumido"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$valor["porc_deve"].'</td>
                                            <td style="background-color: #A0ABB7; vertical-align:middle; text-align:center;">'.$disponible_gastar.'</td>
                                            </tr>';
                                                }

                                            }else {
                                                if($valor["pp"] == 0){ 
                                                    echo '<tr>
                                                    <td class="CellWithComment" style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["in_data"].'<span id="comentario" class="CellComment">'.$comentario.'</span></td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["pp"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["concepto"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["credito_vigente"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["compromiso_consumido"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["porc_comp"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["devengado_consumido"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["porc_deve"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$disponible_gastar.'</td>                      
                                                 </tr>';
                                                }else {
                                                    echo '<tr>
                                                    <td class="CellWithComment" style="vertical-align:middle; text-align:center;">'.$valor["in_data"].'<span id="comentario" class="CellComment">'.$comentario.'</span></td>
                                                    <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["pp"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["concepto"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["credito_vigente"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["compromiso_consumido"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["porc_comp"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["devengado_consumido"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-size:12px">'.$valor["porc_deve"].'</td>
                                                    <td style="vertical-align:middle; text-align:center; font-size:12px">'.$disponible_gastar.'</td>                      
                                                 </tr>';

                                                }
                                            }
                                        } 
                                    
                                      
                                    }  
                                } 
                                echo '</tbody>';    
                            }


                                



                            // Muestro los totales de todo los saf en la vista o mascara que vienen del modelo.
                            $datapsptotal = controladorpsp::getpspTotales($db);
                            //while($valortotal = mysqli_fetch_array($datapsptotal)){
                                $valortotal = mysqli_fetch_array($datapsptotal);                                
                                echo '<tr>
                                        <td colspan="4" style="background-color: #7FFFD4; style="vertical-align:middle; text-align:center;">'.$valortotal["concepto"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valortotal["credito_vigente"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valortotal["compromiso_consumido"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valortotal["porc_comp"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valortotal["devengado_consumido"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valortotal["porc_deve"].'</td>
                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center;">'.$valortotal["disponible_gastar"].'</td>                      
                                    </tr>';                    
                        ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>