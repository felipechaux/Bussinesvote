<?php 
require_once("../php/conexion.php");
require_once("class-eleccion.php");
require_once("class-imagen.php");

class Candidato{
     

    
     //listar todos los candidatos inscritos en la eleccion enviada por parametro -$ideleccion
    function Listar($ideleccion){
       $band=0;
      //visibilidad de la impresion de los candidatos 
      $ver=$this->ver;

     $conexion = new conexion();
     $conexion=$conexion->dbconexion();

    //consulta que llama el nombre de la imagen correspondiente de cada candidato. 
     $query=mysqli_query($conexion,"SELECT tbl_usuario.documento,tbl_imagen_candidato.nombre_imagen,
      tbl_usuario.nombre_usuario,tbl_eleccion.fecha_inicio_vot,tbl_eleccion.fecha_fin_vot FROM tbl_imagen_candidato 
      INNER JOIN tbl_usuario INNER JOIN tbl_eleccion ON tbl_imagen_candidato.id_imagen = tbl_usuario.id_imagen 
      AND tbl_usuario.id_rol='2' AND tbl_usuario.id_eleccion='$ideleccion' AND tbl_eleccion.id_eleccion ='$ideleccion'  ");

    //Muestra de candidatos disponibles , de acuerdo a la fecha de votacion de la eleccion -
      
      if ( mysqli_num_rows($query)>=1){

                                while ($r=mysqli_fetch_array($query)) {
                         
                        //uso del metodo validar de la clase  eleccion ..
                          $obj = new Eleccion();
                          $obj->fecha_ini=$r[3];
                          $obj->fecha_fin=$r[4];
                          $val=$obj->Validar();
                               
                               if($val){

                                         if ($ver){
                                          $band=true;
                                         echo " <div class='col-md-6'><figure class='candidato'>
                                        <a href='$r[0]' value='$r[2]'  onclick='ModalConfirmacion(this); return false;' >
                                         <img title='$r[2]' src='../img/candidatos/$r[1]' >
                                         </a>
                                        <figcaption>$r[2]</figcaption>
                                        </figure></div>"; 
                                        }

                               }
                            
                            
                         
                          }
                          ////mostrar  voto en blanco solo si esta disponible la eleccion
                           if ($band){
                                        if($ver){
                                         echo " <div class='col-md-6'><figure class='blanco'>
                                          <a href='blanco' value='blanco' onclick='ModalConfirmacion(this); return false;' >
                                           <img title='' src='../img/voto-blanco.jpg' >
                                           </a>
                                          <figcaption>Voto en blanco</figcaption>
                                          </figure></div>"; 
                                      }
                           }

    
      }
      else{
        echo "<h2>No hay candidatos registrados en la eleccion .</h2>";
        
      }
    
    
     }


   function RegistrarUsuario($documento,$nombre,$genero,$nacimiento,$eleccion,$imagen,$size,$name){

     $conexion = new conexion();
     $conexion=$conexion->dbconexion();

     $query=mysqli_query($conexion,"SELECT documento FROM tbl_usuario WHERE documento='$documento' AND id_rol ='2'  ");
     $result=mysqli_num_rows($query);
        

        //validacion para que solo se permita el registro del candidato en una unica eleccion .
        if ($result>=1){
            echo "<div class='alert alert-danger'>
            Documento ya existente , por favor vuelva a intentarlo
           </div>";
        }
        else{
              $query=mysqli_query($conexion,"SELECT fecha_inicio_ins,fecha_fin_ins FROM tbl_eleccion WHERE id_eleccion ='$eleccion' ");
              $captura=mysqli_fetch_array($query);

              $obj = new Eleccion();
              $obj->fecha_ini=$captura['fecha_inicio_ins'];
              $obj->fecha_fin=$captura['fecha_fin_ins'];
              $val=$obj->Validar();
             
             //primer validacion de registro de usuario-
              if($val)
              {
              $obj2 = new Imagen();
              $val2=$obj2->ValidarCarga($name);
             
             //segunda validacion -guardar imagen con el tipo de extension correcto
                if($val2){

                          $query=mysqli_query($conexion,"INSERT INTO tbl_usuario(documento, nombre_usuario, id_genero_usuario, fecha_nacimiento,id_eleccion,id_rol) 
                            VALUES ('$documento','$nombre','$genero','$nacimiento','$eleccion','2')");
                          if($query){
                           echo "<div class='alert alert-success'>Registro exitoso</div>";
                            $obj = new Imagen();
                            $obj->GuardarImagen($imagen,$size,$documento,$name);
                          }
                          else{
                             $conexion->error;
                          }


                }

                
              }else{
                 echo "<div class='alert alert-danger'>
                         No es posible la inscripcion , fecha caducada
                        </div>";
              }

               

            }


   }


}
?>