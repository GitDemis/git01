<?php
include 'modelo/pspmodelo.php';

class controladorpsp{
	/*=============================================
	GET PSP
	=============================================*/
	static public function getpsp($pg,$db){
        // $saf,$pg,$pr,$fte,$in_data,$pp
        if ($pg == 1) {
            $data = modelopsp::mdlGetpsp1($db);

        } elseif ($pg == 16){

            $data = modelopsp::mdlGetpsp16($db);

        } elseif ($pg == 17){

            $data = modelopsp::mdlGetpsp17($db);

        } elseif ($pg == 19){

            $data = modelopsp::mdlGetpsp19($db);

        } elseif ($pg == 34){

            $data = modelopsp::mdlGetpsp34($db);

        }
        
		return $data;

    }

    /*=============================================
	GET PSP TOTAL MIN INTERIOR
	=============================================*/
    static public function getExcluyeAtn($db){

        $dataTotal = modelopsp::mdlGetExcluyeAtn($db);
        return $dataTotal;

    }

    /*=============================================
	GET PSP TOTAL MIN INTERIOR
	=============================================*/
    static public function getTotalMinInt($db){

        $dataTotal = modelopsp::mdlGetTotalMinInt($db);
        return $dataTotal;

    }
    
    /*=============================================
	GET SAF200 Registro Nacional de las Personas
	=============================================*/
	static public function getSaf200($db){

        $dataTotal = modelopsp::mdlGetSaf200($db);
        return $dataTotal;

    }

    /*=============================================
	SAF201 - Dirección Nacional de Migraciones
	=============================================*/
	static public function getSaf201($db){

        $dataTotal = modelopsp::mdlGetSaf201($db);
        return $dataTotal;

    }

    /*=============================================
	GET PSP TOTALES
	=============================================*/
	static public function getpspTotales($db){

        $dataTotal = modelopsp::mdlGetpspTotales($db);
        return $dataTotal;

    }

  


    
}