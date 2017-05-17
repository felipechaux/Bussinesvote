<?php 
session_start();
require_once("../php/conexion.php");

///libreria - recaptcha google
require_once ("../php/recaptchalib.php");

class Usuario{


function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=10;
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}

function Autenticacion($usuario,$passencriptado){


   //implementacion de recaptcha
  // secret key
  $secret = "6LfX5yAUAAAAAPeAWtkkLlgiQGhQmbcekJe1bLVK";
  // empty response
  $response = null;
  // check secret key
  $reCaptcha = new ReCaptcha($secret);
  //verificacion de que la clave secreta está presente.
  $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"],$_POST["g-recaptcha-response"]);
  /////////////////////////////////
                  
                  $conexion = new conexion();
                  $conexion=$conexion->dbconexion();
                     

                  $query=mysqli_query($conexion,"SELECT * FROM tbl_usuario where documento='$usuario' AND password='$passencriptado' ");
                  $query2=mysqli_query($conexion,"SELECT id_rol,documento FROM tbl_usuario where documento='$usuario'  ");
                  $validacion=mysqli_num_rows($query2);

                          //validacion de recaptcha
                          if($response->success){

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
                          ////fin validacion 
                          else{
                             echo "<div class='alert alert-danger'>
                                          Captcha erroneo
                                       </div>";
                          }   

                       


              }


function Session(){
   $rol=$this->rol;
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