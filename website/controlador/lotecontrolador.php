<?php

include 'modelo/lotemodelo.php';


class controladorlote
{

    /*=============================================

	GET PSP

	=============================================*/

    static public function getpsp($pg, $lote, $db)
    {
        if ($pg == 1) {
            $data = modelolote::mdlGetpsp1($lote, $db);
        } elseif ($pg == 16) {
            $data = modelolote::mdlGetpsp16($lote, $db);
        } elseif ($pg == 17) {
            $data = modelolote::mdlGetpsp17($lote, $db);
        } elseif ($pg == 19) {
            $data = modelolote::mdlGetpsp19($lote, $db);
        } elseif ($pg == 34) {
            $data = modelolote::mdlGetpsp34($lote, $db);
        }
        return $data;
    }



    /*=============================================

	GET PSP TOTAL MIN INTERIOR

	=============================================*/

    static public function getExcluyeAtn($lote, $db)
    {
        $dataTotal = modelolote::mdlGetExcluyeAtn($lote, $db);
        return $dataTotal;
    }



    /*=============================================

	GET PSP TOTAL MIN INTERIOR

	=============================================*/

    static public function getTotalMinInt($lote, $db)
    {
        $dataTotal = modelolote::mdlGetTotalMinInt($lote, $db);
        return $dataTotal;
    }



    /*=============================================

	GET SAF200 Registro Nacional de las Personas

	=============================================*/

    static public function getSaf200($lote, $db)
    {
        $dataTotal = modelolote::mdlGetSaf200($lote, $db);
        return $dataTotal;
    }



    /*=============================================

	SAF201 - Dirección Nacional de Migraciones

	=============================================*/

    static public function getSaf201($lote, $db)
    {
        $dataTotal = modelolote::mdlGetSaf201($lote, $db);
        return $dataTotal;
    }



    /*=============================================

	GET PSP TOTALES

	=============================================*/

    static public function getpspTotales($lote, $db)
    {
        $dataTotal = modelolote::mdlGetpspTotales($lote, $db);
        return $dataTotal;
    }
}
