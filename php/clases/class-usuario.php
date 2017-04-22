<?php 
session_start();
require_once("../php/conexion.php");

class Usuario{

function Autenticacion($usuario,$passencriptado){
                  
                  $conexion = new conexion();
                  $conexion=$conexion->dbconexion();
                     

                  $query=mysqli_query($conexion,"SELECT * FROM tbl_usuario where documento='$usuario' AND password='$passencriptado' ");
                  $query2=mysqli_query($conexion,"SELECT id_rol,documento FROM tbl_usuario where documento='$usuario'  ");
                  $validacion=mysqli_num_rows($query2);

                        if (mysqli_fetch_array($query)) {                
                          $_SESSION['usuario']=$usuario; 
                            echo "<div class='alert alert-success'>Acceso otorgado</div>";
                           
                           $rol=mysqli_fetch_array($query2);
                           $rol=$rol['id_rol'];
                            switch ($rol) {
                              case 1:
                               header("Location: ../admin/index.php");

                                break;
                          
                              case 3:
                               header("Location: ../votante/index.php");
                                break;
                            }

                        }
                        else{
                            if ($validacion!=1){
                               echo "<div class='alert alert-danger'>
                                Usuario incorrecto
                             </div>";
                            }
                            else{
                             echo "<div class='alert alert-danger'>
                                Contraseña incorrecta
                             </div>";
                            }


                        }


              }


function Session(){
   $rol=$this->rol;
///pendiente validar session
  if ((isset($_SESSION['usuario'])) ) {

       $usuario=$_SESSION['usuario'];
       $conexion = new conexion();
       $conexion=$conexion->dbconexion();
       $query=mysqli_query($conexion,"SELECT nombre_usuario FROM tbl_usuario where documento='$usuario' AND id_rol='$rol' ");
       $result=mysqli_fetch_array($query);
       //echo "result : ".$result;
       if($result){
        $string= "<h5 class='user'> ".$result['nombre_usuario']."</h5>
       <a href='../php/cerrar-sesion.php' >Salir</a> ";
       echo $string;
  
       }else{
       header("Location: ../index.php");
       }



     

      
      }
      else{
        header("Location: ../index.php");
      }


}
         



}






?>