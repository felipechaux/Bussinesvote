<?php 
require_once("../php/conexion.php");

class Imagen {
           
        //validacion para permitir solo el alojamiento de imagenes con extension png y jpg .
         function ValidarCarga($name){

           
             $ext = pathinfo($name, PATHINFO_EXTENSION);
              $ext = strtolower($ext);
               if (($ext=="png")or ($ext=="jpg")){
                return true;
               }else{
                 echo "<div class='alert alert-danger'>
                               Tipo de archivo no permitido , por favor seleccionar una imagen en formato JPG o PNG
                             </div>";
                return false;
               }

         }
         //alojar imagen en bse de datos    
        function GuardarImagen($imagen,$size,$documento,$name){
              
             $ext = pathinfo($name, PATHINFO_EXTENSION);
             $directory = '../img/candidatos';  
             $namefile=$documento.".".$ext;
                                   
                   $conexion = new conexion();
                   $conexion=$conexion->dbconexion();

                         if (move_uploaded_file($imagen, $directory."/".$namefile)){
                       // echo "<p>Archivo agregado correctamente </p>";
                         $qu=mysqli_query($conexion,"INSERT INTO tbl_imagen_candidato(nombre_imagen,peso_imagen) VALUES ('$namefile','$size') ");
                               if($qu)
                                     {
                                         $id=$conexion->insert_id;
                                        $up=mysqli_query($conexion,"UPDATE tbl_usuario SET id_imagen='$id' where documento='$documento'");
                                                  if($up){
                                                   }
                                                  else{
                                                  $conexion->error;
                                                  }

                                    }
                                     else{
                                        $conexion->error;
                                         }

                          }else{
                          echo "<div class='alert alert-danger'>
                                No se cargo el archivo
                             </div>";
                         }
            

      }
   


}


?>