<?php 



class modeloac {

    /*=============================================

	GET PSP PROGRAMA 16 Impulso al Desarrollo del Sistema Democrático y Relaciones con la Comunidad

    =============================================*/	



	public static function mdlGetprog16($db){

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT 

            pg,



            (SELECT GROUP_CONCAT(A.programa) AS programa FROM (



                SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 



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



            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 



            AND saf = 325 AND pg IN (16)");

            

            return $sql;

    

    }



    /*=============================================

	GET PSPActividad 43- Ejecución de Actos Electorales

    =============================================*/	





    public static function mdlGetact43($db){

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT 

                pg,

                'subtotal' AS programa,

                in_data,

                '0' AS pp,

                'subtotal' AS concepto,  

                REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

                REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

                REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

                REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

                REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

                REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

                FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

                AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1  AND ac = 43 ");

            

            return $sql;

    

    }



    /*=============================================

	GET PSPActividad 43- Ejecución de Actos Electorales DETALLADO

    =============================================*/	





    public function mdlGetdetalle($db){

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT M.* FROM(

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

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

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 1 AND ac=43



            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

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

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 2 AND ac=43



            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Productos Alimenticios' AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 2 AND ac=43 AND pp=1

            

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Productos de Papel, Cartón e Impresos' AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 2 AND ac=43 AND pp=3

            

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Combustibles -Productos Químicos' AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 2 AND ac=43 AND pp=5 

            

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Otros bienes de consumo' AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data = 2 AND ac=43 AND pp=9

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

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

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16) AND ac=43 AND pr = 1 AND fte = 1 AND in_data = 3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

             pp,

            'Servicios Básicos' AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)  AND ac=43  AND pr = 1 AND fte = 1 AND in_data = 3 AND pp=1

            UNION

           SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

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

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)  AND ac=43  AND pr = 1 AND fte = 1 AND in_data = 3 AND pp=2

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Mantenimiento y Limpieza' AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)  AND ac=43  AND pr = 1 AND fte = 1 AND in_data = 3 AND pp=3

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Servicios Técnicos y Profesionales' AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)  AND ac=43  AND pr = 1 AND fte = 1 AND in_data = 3 AND pp=4

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

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

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)  AND ac=43  AND pr = 1 AND fte = 1 AND in_data = 3 AND pp=5

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

            pp,

            'Pasajes y Viáticos' AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)  AND ac=43  AND pr = 1 AND fte = 1 AND in_data = 3 AND pp=7 

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

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

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)  AND ac=43  AND pr = 1 AND fte = 1 AND in_data = 3 AND pp=8

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

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

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)  AND ac=43  AND pr = 1 AND fte = 1 AND in_data = 3 AND pp=9

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

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

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)  AND ac=43  AND pr = 1 AND fte = 1 AND in_data = 5

            UNION

            SELECT 

            pg,

            (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)

            GROUP BY programa_desc

            ORDER BY pg ASC) AS programa,

            in_data,

             pp,

            ' Fondo Permanente Partidario- Transf. al Sect. Privado - Gastos Corrientes' AS concepto,  

            REPLACE(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

            REPLACE(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

            REPLACE(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

            REPLACE(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

            REPLACE(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

            FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

            AND saf = 325 AND pg IN (16)  AND ac=43  AND pr = 1 AND fte = 1 AND in_data = 5 





             ) M WHERE M.pg is not null");

            

            return $sql;

    

    }





    /*=============================================

	GET PSP     43- Ejecución de Actos Electorales SIN GASTOS EN PERSONAL

    =============================================*/	

    

    public function mdlGetsingastos($db){

        //$db = new mysqli("localhost", "c1user_psp", "Genesis2020", "c1bbdd_presupuestos");

        $sql = $db->query("SELECT 

        pg,

        (SELECT CONCAT_WS('-', pg, programa_desc) AS programa FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

        AND saf = 325 AND pg IN (16)

        GROUP BY programa_desc

        ORDER BY pg ASC) AS programa,

        '0' AS in_data,

        '0' AS pp,

        inciso_desc AS concepto, 

        replace(FORMAT(SUM(credito_vigente),0), ',','.') AS credito_vigente, 

        replace(FORMAT(SUM(compromiso_consumido),0), ',','.') AS compromiso_consumido, 

        replace(CONCAT(FORMAT(((SUM(compromiso_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_comp, 

        replace(FORMAT(SUM(devengado_consumido),0), ',','.') AS devengado_consumido, 

        replace(CONCAT(FORMAT(((SUM(devengado_consumido)/SUM(credito_vigente)) *100),0),'%'), ',','.') AS porc_deve,  

        replace(FORMAT(SUM(disponible_gastar),0), ',','.') AS disponible_gastar

        FROM history WHERE lote = (SELECT lote FROM history GROUP BY lote ORDER by fecha DESC LIMIT 1) 

        AND saf = 325 AND pg IN (16) AND pr = 1 AND fte = 1 AND in_data IN (2,3,5) AND ac=43");

            

            return $sql;

    

    }







}
