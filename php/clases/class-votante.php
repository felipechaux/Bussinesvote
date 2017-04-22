<?php 
require_once("../php/conexion.php");

class Votante{

          function RegistrarUsuario($documento,$usuario,$passencriptado,$genero,$nacimiento){

           $conexion = new conexion();
           $conexion=$conexion->dbconexion();
              $query=mysqli_query($conexion,"SELECT documento FROM tbl_usuario WHERE documento='$documento' AND id_rol='3' ");
              $result=mysqli_num_rows($query);
                //validacion de existencia de usuarios con el mismo documento .
              if ($result>=1){
                  echo "<div class='alert alert-danger'>
                  Documento ya existente, por favor vuelva a intentarlo
                 </div>";
              }else{   
                    $query=mysqli_query($conexion,"INSERT INTO tbl_usuario(documento,nombre_usuario,password,id_genero_usuario,fecha_nacimiento,id_rol) VALUES ('$documento','$usuario','$passencriptado','$genero','$nacimiento','3') ");
                      if($query){
                     echo "<div class='alert alert-success'>Registro exitoso</div>"; 
                      }
                      else{
                       $conexion->error;
                      
                      }

              }
              
          }

          


  }

?>