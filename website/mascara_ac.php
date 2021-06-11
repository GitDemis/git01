<?php

  $page_title = 'Vista';

  require_once('includes/load.php');

  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}

?>

<?php 

    include_once('layouts/header.php'); 

    include 'controlador/accontrolador.php';

?>

                           



<div class="row">

    <div class="col-md-12">

        <div class="panel panel-default">

            <div class="panel-heading">

                <strong>

                    <span class="glyphicon glyphicon-th"></span>

                    <span>Ejecución DINE </span> 

                </strong>

                <input id="Excel" type="button" onclick="tableToExcel('loteTable', 'consolidado')" value="Exportar Excel">

            </div>

            <div class="panel-body">

                <table id="loteTable" class="table table-striped table-bordered table-condensed">

                    <!-- // Muestro la cabecera de la vista o mascara. -->

                    <thead>

                        <tr>

                            <th style="background-color: #7B68EE; vertical-align:middle; text-align:center;">Programa/Actividad</th>

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

                            for ($i=1; $i <= 4; $i++) {

                                $cantidadFilas=0;

                                if ($i == 1) {

                                    $programa="Programa 16. Impulso al Desarrollo del Sistema Democrático y Relaciones con la Comunidad";

                                    $datapsp = controladorac::getprog16($db);   

                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;

                                }elseif ($i == 2){

                                    $programa="Actividad 43- Ejecución de Actos Electorales";

                                    $datapsp = controladorac::getact43($db);

                                    //$cantidadFilas=13;

                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;

                                }elseif ($i == 3){

                                    $programa="";

                                    $datapsp = controladorac::getdetalle($db);

                                    //$cantidadFilas=12;

                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;

                                }elseif ($i == 4){

                                    $programa="43- Ejecución de Actos Electorales SIN GASTOS EN PERSONAL";

                                    $datapsp = controladorac::getsingastos($db);

                                    //$cantidadFilas=14;

                                    $cantidadFilas=mysqli_num_rows($datapsp) - 1;

                                }

                                                                

                                while($valor = mysqli_fetch_array($datapsp)){

                                    if($programa!= ""){

                                        if($i==1){

                                            echo '<tr>

                                        <td colspan="4" style="background-color: #7FFFD4; vertical-align:middle; text-align:center; font-weight: bold;">'.$programa.'</td>                                         

                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["credito_vigente"].'</td>

                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["compromiso_consumido"].'</td>

                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["porc_comp"].'</td>

                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["devengado_consumido"].'</td>

                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["porc_deve"].'</td>

                                        <td style="background-color: #7FFFD4; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["disponible_gastar"].'</td>

                                        </tr>';



                                        }else {

                                        echo '<tr>

                                        <td colspan="4" style="background-color: #edbb99; vertical-align:middle; text-align:center; font-weight: bold;">'.$programa.'</td>                                         

                                        <td style="background-color: #edbb99; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["credito_vigente"].'</td>

                                        <td style="background-color: #edbb99; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["compromiso_consumido"].'</td>

                                        <td style="background-color: #edbb99; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["porc_comp"].'</td>

                                        <td style="background-color: #edbb99; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["devengado_consumido"].'</td>

                                        <td style="background-color: #edbb99; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["porc_deve"].'</td>

                                        <td style="background-color: #edbb99; vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["disponible_gastar"].'</td>

                                        </tr>';

                                        }

                                   



                                    }else {

                                        if($valor["pp"]== 0 ){

                                            echo '<tr>

                                        <td></td>

                                        <td class="CellWithComment" style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["in_data"].'</td>

                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["pp"].'</td>

                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["concepto"].'</td>

                                        <td style="vertical-align:middle; text-align:center; font-weight: bold;">'.$valor["credito_vigente"].'</td>

                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["compromiso_consumido"].'</td>

                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["porc_comp"].'</td>

                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["devengado_consumido"].'</td>

                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["porc_deve"].'</td>

                                        <td style="vertical-align:middle; text-align:center; font-weight: bold; ">'.$valor["disponible_gastar"].'</td>                      

                                        </tr>';



                                        }else{

                                            echo '<tr>

                                        <td></td>

                                        <td class="CellWithComment" style="vertical-align:middle; text-align:center;">'.$valor["in_data"].'</td>

                                        <td style="vertical-align:middle; text-align:center;">'.$valor["pp"].'</td>

                                        <td style="vertical-align:middle; text-align:center;">'.$valor["concepto"].'</td>

                                        <td style="vertical-align:middle; text-align:center;">'.$valor["credito_vigente"].'</td>

                                        <td style="vertical-align:middle; text-align:center;">'.$valor["compromiso_consumido"].'</td>

                                        <td style="vertical-align:middle; text-align:center;">'.$valor["porc_comp"].'</td>

                                        <td style="vertical-align:middle; text-align:center;">'.$valor["devengado_consumido"].'</td>

                                        <td style="vertical-align:middle; text-align:center;">'.$valor["porc_deve"].'</td>

                                        <td style="vertical-align:middle; text-align:center;">'.$valor["disponible_gastar"].'</td>                      

                                        </tr>';



                                        }

                                         

                                         

                                    }

                                 

                                          

                                          





                             

                                }

                                echo '</tbody>';                                                                

                            }

                         





                                





            

                        ?>                        

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>



<?php include_once('layouts/footer.php'); ?>