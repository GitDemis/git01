<?php

include 'modelo/acmodelo.php';



class controladorac{

    /*=============================================

	GET PSP PROGRAMA 16 Impulso al Desarrollo del Sistema Democrático y Relaciones con la Comunidad

	=============================================*/

    static public function getprog16($db){



        $dataTotal = modeloac::mdlGetprog16($db);

        return $dataTotal;



    }



     /*=============================================

	GET PSPActividad 43- Ejecución de Actos Electorales

	=============================================*/

    static public function getact43($db){



        $dataTotal = modeloac::mdlGetact43($db);

        return $dataTotal;



    }



     /*=============================================

	GET PSPActividad 43- Ejecución de Actos Electorales DETALLADO

	=============================================*/

    static public function getdetalle($db){



        $dataTotal = modeloac::mdlGetdetalle($db);

        return $dataTotal;



    }



     /*=============================================

	GET PSP     43- Ejecución de Actos Electorales SIN GASTOS EN PERSONAL



    =============================================*/	

  

    static public function getsingastos($db){



        $dataTotal = modeloac::mdlGetsingastos($db);

        return $dataTotal;



    }



}







?>