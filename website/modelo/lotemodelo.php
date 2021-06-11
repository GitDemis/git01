<?php





class modelolote{



	/*=============================================

	GET PSP 1

    =============================================*/	



	public static function mdlGetpsp1($lote, $db){

                

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT M.* FROM(

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'Subtotal' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1,3)

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 1

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 2

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp,

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido,

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve, 

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 3

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp,

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido,

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve,

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 1

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Alquileres' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 2

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Mantenimiento y Limpieza' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 3

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 4

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Servicios comerciales' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 5

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 7

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Impuestos' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 8

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Otros servicios- mantenimiento soft' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 9

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 1 AND in_data = 4

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            'Transferencia (aporte a OIM- Migraciones)' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (1) AND pr = 1 AND fte = 4 AND in_data = 5

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 325 AND pg IN (1,3)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            --  (SELECT REPLACE(GROUP_CONCAT(C.in_data),',', '-') FROM (

            (SELECT GROUP_CONCAT(C.in_data) FROM (

            SELECT in_data FROM history WHERE lote = '$lote' AND

            saf = 325 AND pg = 3 GROUP BY in_data

            ) C) AS in_data,

            '0' AS pp,

            'Apoyo a programas c/finan.externo' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (3)

            ) M WHERE M.pg is not null");



        return $sql;

        



    }





    /*=============================================

	GET PSP 16

    =============================================*/	



	public static function mdlGetpsp16($lote, $db){

        

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT M.* FROM(

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'Subtotal' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (16)

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 1

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 2

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 1

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Alquileres' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 2

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Mantenimiento y Limpieza' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 4

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Servicios comerciales' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 5

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 7

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Impuestos' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 8

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote ='$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Otros servicios- mantenimiento soft' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 9

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote ='$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 4

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote ='$lote'

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            'Transferencia FPP' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote'

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 5

        ) M WHERE M.pg is not null");

        return $sql;



    }



    /*=============================================

	GET PSP 17

    =============================================*/	



	public static function mdlGetpsp17($lote, $db){

        

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT M.* FROM(

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'Subtotal' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.')AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 1

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 2

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 1

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Alquileres' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 2

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Mantenimiento y Limpieza' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 4

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Servicios comerciales' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 5

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 7

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Impuestos' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 8

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 9

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 4

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            'Transferencias a municipios' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 1 AND fte = 1 AND in_data = 5

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            -- (SELECT REPLACE(GROUP_CONCAT(C.in_data),',', '-') FROM (

            (SELECT GROUP_CONCAT(C.in_data) FROM (    

            SELECT in_data FROM history WHERE lote = '$lote' AND

            saf = 325 AND pg = 17 AND pr = 2 AND fte = 2 GROUP BY in_data

            ) C) AS in_data,

            '0' AS pp,

            'DAMI (crédito externo)' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (17) AND pr = 2 AND fte = 2

        ) M WHERE M.pg is not null");

        return $sql;



    }



    /*=============================================

	GET PSP 19

    =============================================*/	

    public static function mdlGetpsp19($lote, $db){

        

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT M.* FROM(

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) 

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'Subtotal' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 1

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 2

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 1

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Alquileres' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.')AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 2

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Mantenimiento y Limpieza' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 4

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Servicios comerciales' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 5

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 7

            UNION                            

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Impuestos' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 8

            UNION                            

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 9

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 4

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            'Transferencias (incluye Fideicomiso Austral)' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%') , ',','.')AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 1 AND in_data = 5

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            'Transferencias ATN' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 1 AND fte = 3 AND in_data = 5

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            -- (SELECT REPLACE(GROUP_CONCAT(C.in_data),',', '-') FROM (

            (SELECT GROUP_CONCAT(C.in_data) FROM (    

            SELECT in_data FROM history WHERE lote = '$lote' AND

            saf = 325 AND pg = 19 AND pr = 2 AND fte = 2 GROUP BY in_data

            ) C) AS in_data,

            '0' AS pp,

            'Transferencias Crédito Externo' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (19) AND pr = 2 AND fte = 2

        ) M WHERE M.pg is not null");

        return $sql;



    }



    /*=============================================

	GET PSP 34

    =============================================*/	



	public static function mdlGetpsp34($lote, $db){

        

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT M.* FROM(

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'Subtotal' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 1

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 2

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0) , ',','.')AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 1

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Alquileres' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 2

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Mantenimiento y Limpieza' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%') , ',','.')AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 4

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Servicios comerciales' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%') , ',','.')AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0) , ',','.')AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 5

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 7

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Impuestos' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 8

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%') , ',','.')AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 9

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 4

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            '0' AS pp,

            'Transferencias a Fronteras y Org.Int`l.Archivo' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 1 AND in_data = 5

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            -- (SELECT REPLACE(GROUP_CONCAT(C.in_data),',', '-') FROM (

            (SELECT GROUP_CONCAT(C.in_data) FROM (    

            SELECT in_data FROM history WHERE lote = '$lote' AND

            saf = 325 AND pg = 34 AND pr = 1 AND fte = 3 GROUP BY in_data

            ) C) AS in_data,

            '0' AS pp,

            'Complejo Terminal de Cargas (COTECAR)' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 1 AND fte = 3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            -- (SELECT REPLACE(GROUP_CONCAT(C.in_data),',', '-') FROM (

            (SELECT GROUP_CONCAT(C.in_data) FROM (

            SELECT in_data FROM history WHERE lote = '$lote' AND

            saf = 325 AND pg = 34 AND pr = 2 AND fte = 2 GROUP BY in_data

            ) C) AS in_data,

            '0' AS pp,

            'Pasos Fronterizos (CAF 7769-FONPLATA 35/2017)' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 325 AND pg IN (34) AND pr = 2 AND fte = 2

        ) M WHERE M.pg is not null");

        return $sql;



    }

   

     /*=============================================

	GET saf 325 excluye tranferencia atn 

    =============================================*/

    public static function mdlGetExcluyeAtn($lote, $db){

        

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT pg,

        'EXCLUYE TRANFERENCIA ATN'AS programa,

               '0' AS in_data,

               '0' AS pp,

               'Subtotal1' AS concepto,

               REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

               REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

               REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

               REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

               REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve, 

               REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar                           

               FROM history WHERE lote = '$lote' AND saf=325 AND !(saf = 325 AND pg IN (19) AND pr = 1 AND fte = 3 AND in_data = 5)");



       return $sql;



    }

    /*=============================================

	GET MINISTERIO DEL INTERIOR

    =============================================*/

    public static function mdlGetTotalMinInt($lote, $db){

        

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT pg,

        'MINISTERIO DEL INTERIOR'AS programa,

               '0' AS in_data,

               '0' AS pp,

               'Subtotal1' AS concepto,

               REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

               REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

               REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

               REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

               REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve, 

               REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar                           

               FROM history WHERE lote = '$lote' AND saf=325");



       return $sql;



    }

  

    /*=============================================

	GET SAF200 Registro Nacional de las Personas

    =============================================*/	



	public static function mdlGetSaf200($lote, $db){

        

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT M.* FROM(

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, 'Identificación, Registro y Clasificación del Potencial Humano Nacional') AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'Subtotal' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16)

            UNION 

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, 'Renaper') AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16) AND pr = 1 AND fte= 1

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'FF 11- Tesoro Nacional' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte= 1

            

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 1

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 2

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp,

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido,

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve, 

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp,

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido,

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve,

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 1

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Alquileres' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 2

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Mantenimiento y Limpieza' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 3

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 4

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Servicios comerciales' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 5

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 7

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Impuestos' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 8

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Otros servicios- mantenimiento soft' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 9

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 4

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            'Transferencia (aporte a OIM- Migraciones)' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 5

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

           (SELECT GROUP_CONCAT(C.in_data) FROM (

            SELECT in_data FROM history WHERE lote = '$lote' AND

            saf = 200 AND pg = 3 GROUP BY in_data

            ) C) AS in_data,

            '0' AS pp,

            'Apoyo a programas c/finan.externo' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (3)

            UNION 



           SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, 'Renaper') AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16) AND pr = 1 AND fte= 2

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'FF 12- Recursos Propios' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte= 2

            

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 1

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 2

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp,

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido,

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve, 

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp,

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido,

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve,

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 1

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Alquileres' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 2

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Mantenimiento y Limpieza' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 3

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 4

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Servicios comerciales' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 5

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 7

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Impuestos' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 8

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Otros servicios- mantenimiento soft' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 9

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 4

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            'Transferencia (aporte a OIM- Migraciones)' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 5

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 200 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            (SELECT GROUP_CONCAT(C.in_data) FROM (

            SELECT in_data FROM history WHERE lote = '$lote' AND

            saf = 200 AND pg = 3 GROUP BY in_data

            ) C) AS in_data,

            '0' AS pp,

            'Apoyo a programas c/finan.externo' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 200 AND pg IN (3)

            ) M WHERE M.pg is not null");

        return $sql;



    }





    /*=============================================

	SAF201 - Dirección Nacional de Migraciones

    =============================================*/	



	public static function mdlGetSaf201($lote, $db){

        

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT M.* FROM(

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, ' Control de Ingresos y Egresos, Admisión y Permanencia de Personas dentro del Territorio Nacional') AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'Subtotal' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16)

            UNION 

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, 'Renaper') AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16) AND pr = 1 AND fte= 1

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'FF 11- Tesoro Nacional' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte= 1

            

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 1

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 2

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp,

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido,

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve, 

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp,

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido,

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve,

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 1

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Alquileres' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 2

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Mantenimiento y Limpieza' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 3

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 4

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Servicios comerciales' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 5

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 7

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Impuestos' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 8

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Otros servicios- mantenimiento soft' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 3 AND pp = 9

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 4

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            'Transferencia (aporte a OIM- Migraciones)' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 5

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

           (SELECT GROUP_CONCAT(C.in_data) FROM (

            SELECT in_data FROM history WHERE lote = '$lote' AND

            saf = 201 AND pg = 3 GROUP BY in_data

            ) C) AS in_data,

            '0' AS pp,

            'Apoyo a programas c/finan.externo' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (3)

            UNION 



           SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, 'Renaper') AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16) AND pr = 1 AND fte= 2

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            '0' AS in_data,

            '0' AS pp,

            'FF 12- Recursos Propios' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte= 2

            

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 1

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 2

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp,

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido,

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve, 

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0),',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0),',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_comp,

            replace(FORMAT(SUM(devengado_consumido),0),',','.') AS devengado_consumido,

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'),',','.') AS porc_deve,

            replace(FORMAT(SUM(disponible_gastar),0),',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 1

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Alquileres' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 2

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Mantenimiento y Limpieza' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 3

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 4

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Servicios comerciales' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 5

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            principal_desc AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 7

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Impuestos' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 8

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            pp,

            'Otros servicios- mantenimiento soft' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 3 AND pp = 9

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            inciso_desc AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 4

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            in_data,

            '0' AS pp,

            'Transferencia (aporte a OIM- Migraciones)' AS concepto, 

            replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (16) AND pr = 1 AND fte = 2 AND in_data = 5

            UNION

            SELECT 

            pg,

            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (

                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = '$lote' 

                AND saf = 201 AND pg IN (16)

                GROUP BY programa_desc

                ORDER BY pg ASC) A) AS programa,

            (SELECT GROUP_CONCAT(C.in_data) FROM (

            SELECT in_data FROM history WHERE lote = '$lote' AND

            saf = 201 AND pg = 3 GROUP BY in_data

            ) C) AS in_data,

            '0' AS pp,

            'Apoyo a programas c/finan.externo' AS concepto, 

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = '$lote' 

            AND saf = 201 AND pg IN (3)

            ) M WHERE M.pg is not null");

        return $sql;



    }



    /*=============================================

	GET PSP TOTALES

    =============================================*/

    public static function mdlGetpspTotales($lote, $db){

        

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT 

                            '999' AS saf,

                            'TOTAL MINISTERIO DEL INTERIOR' as concepto,

                            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

                            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

                            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

                            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

                            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve, 

                            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar,

                            4 AS orden

                            FROM history WHERE lote = '$lote'

                            ");



        return $sql;

        

    }



  



     



}

