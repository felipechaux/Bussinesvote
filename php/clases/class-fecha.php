<?php 

class Fecha{

        function ConsultarFechaActual(){

        $fecha_actual = date("Y-m-d H:i:00",time());
        //echo "hoy es :".$fecha_actual." <br></br>";
        
         return $fecha_actual;
        }

}


?>