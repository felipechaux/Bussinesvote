<?php 
require_once("../php/conexion.php");
require_once("class-email.php");
require_once("class-usuario.php");

class Votante{

          function RegistrarUsuario($documento,$usuario,$email,$genero,$nacimiento){

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
                    $obj = new Usuario();
                    $pass=$obj->generaPass();
                    $passencriptado=md5($pass);   
                     
                    $query=mysqli_query($conexion,"INSERT INTO tbl_usuario(documento,nombre_usuario,password,id_genero_usuario,fecha_nacimiento,id_rol,correo) VALUES ('$documento','$usuario','$passencriptado','$genero','$nacimiento','3','$email') ");
                      if($query){
                         echo "este sera su password:  $pass ";
                     echo "<div class='alert alert-success'>Registro exitoso , se enviara un email a su correo con sus credenciales .</div>"; 

                       $obj = new Email();
                       //envio de email , con credenciales -- user , pass
                       $obj->enviarMail($email,$documento,$pass);
                      }
                      else{
                       $conexion->error;
                      
                      }

              }
              
          }

          

/////////////






//////////////
  }

?>