<?php 
require_once("../php/conexion.php");
require_once("../php/clases/class-eleccion.php");


class Voto{


function Registrar(){

     
    $documentov=$this->documentov;
    $documentoc=$this->documentoc;
    $estado=$this->estado;
    $ideleccion=$this->ideleccion;


    $conexion = new conexion();
    $conexion=$conexion->dbconexion();

    //validar si se puede votar primero 
    $query=mysqli_query($conexion,"SELECT fecha_inicio_vot,fecha_fin_vot FROM tbl_eleccion WHERE id_eleccion = '$ideleccion' " );
     $captura=mysqli_fetch_array($query);
     
     $obj = new Eleccion();
     $obj->fecha_ini=$captura['fecha_inicio_vot'];
     $obj->fecha_fin=$captura['fecha_fin_vot'];
     $val=$obj->Validar();

      if($val){

           $query=mysqli_query($conexion,"SELECT documento_v FROM tbl_voto WHERE documento_v ='$documentov' AND id_eleccion=$ideleccion ");

       //validacion para que solo se permita el registro de un voto de un votante  en una eleccion  .
             if( mysqli_fetch_array($query)>=1){
              echo"<script type=\"text/javascript\">
                         setTimeout(Modalmessageno,1000);
                        </script>";
                 return false;
             }

             else{
              $query=mysqli_query($conexion,"INSERT INTO tbl_voto(documento_v,documento_c,id_estado_voto,id_eleccion) 
                VALUES ('$documentov','$documentoc','$estado','$ideleccion')  ");
                      if($query){
                         echo"<script type=\"text/javascript\">
                         setTimeout(Modalmessagesi,1000);
                        </script>";
                  return true;
                      }else{
                        $conexion->error;
                      }
             }
      
      }



   


}

}

?>