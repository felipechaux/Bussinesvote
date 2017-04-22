<?php 
require_once("../php/conexion.php");
require_once("class-fecha.php");


class Eleccion{
      
//////////////admin funciones
function ListarTable(){

    //$string="<h3><a href='../php/form-registro-eleccion.php' > Nueva eleccion </a></h3>";


    //echo $string;

   $conexion = new conexion();
   $conexion=$conexion->dbconexion();
   $query=mysqli_query($conexion,"SELECT * FROM tbl_eleccion ");
   $select="<center>
   <p class='eum'>A continuación encontrará la sección de administración de votaciones.</p><br>
   <table border='4'>
   <tr> 
   <td> <Strong> Eleccion Eleccion </Strong></td>
   <td> <Strong> Fecha inicio de inscripcion </Strong></td>
   <td> <Strong> Fecha fin de inscripcion </Strong></td>
   <td> <Strong> Fecha inicio de votacion </Strong></td>
   <td> <Strong> Fecha fin de votacion </Strong></td>
   <td> Modificar </td>
    </tr>
   
   ";
    while($rows=mysqli_fetch_array($query))
    {
    $select.=" <tr> 
   <td> $rows[1]</td>
   <td> $rows[2]</td>
   <td> $rows[3]</td>
   <td> $rows[4]</td>
   <td> $rows[5]</td>
   <td> <a href='../php/form-modificar-eleccion.php?eleccion=$rows[0] ' > Modificar </a> </td>
    </tr>";
    }
    $select.="</table></center>";
    echo $select;

}
///////////////
function Crear($neleccion,$fechaini_in,$fechafin_in,$fechaini_vot,$fechafin_vot){
   


  $conexion = new conexion();
  $conexion=$conexion->dbconexion();
  $query=mysqli_query($conexion,"INSERT INTO tbl_eleccion(nombre_eleccion,fecha_inicio_ins,fecha_fin_ins,fecha_inicio_vot,fecha_fin_vot) 
    VALUES ('$neleccion','$fechaini_in','$fechafin_in','$fechaini_vot','$fechafin_vot') ");
                      if($query){
                     echo "<div class='alert alert-success'>Registro exitoso</div>"; 
                      }
                      else{
                       $conexion->error;
                      
                      }
 
  


}
function Modificar(){

$modificar=$this->modificar;
$v1=$this->v1;
$v2=$this->v2;
$v3=$this->v3;
$v4=$this->v4;
$v5=$this->v5;


$eleccion=$this->eleccion;
$conexion = new conexion();
$conexion=$conexion->dbconexion();

$query=mysqli_query($conexion,"SELECT * FROM tbl_eleccion where id_eleccion = '$eleccion' ");
$result=mysqli_fetch_array($query);

    if($v1){

      return $result[1];

    }
    if($v2){

      return $result[2];

    }
    if($v3){

      return $result[3];

    }
    if($v4){

      return $result[4];

    }
    if($v5){

      return $result[5];

    }

 
 if($modificar){

$eleccion=$this->eleccion;
$neleccion=$this->neleccion;
$fechaini_in=$this->fechaini_in;
$fechafin_in=$this->fechafin_in;
$fechaini_vot=$this->fechaini_vot;
$fechafin_vot=$this->fechafin_vot;


$query=mysqli_query($conexion,"UPDATE tbl_eleccion SET nombre_eleccion = '$neleccion',fecha_inicio_ins='$fechaini_in',
  fecha_fin_ins='$fechafin_in',fecha_inicio_vot='$fechaini_vot',fecha_fin_vot='$fechafin_vot'
   WHERE id_eleccion = '$eleccion' ");
 

    if($query){
      //echo "modificaion hecha";
     //header("Location: ../../admin/index.php");
    echo "<script>";
    echo "red();";
    echo "</script>";
    }
    else{

    $conexion->error;

    }
   
  }







}


///////////////




///////validacion de fechas de eleccion  --> inscripcion de candidatos  ; --> Votaciones  --,
function Validar(){

           $obj = new Fecha();
           $fecha_actual=$obj->ConsultarFechaActual();
           $fecha0 = new DateTime($fecha_actual);

           $fecha_ini=$this->fecha_ini;
           $fecha_fin=$this->fecha_fin;

           $fecha_ini=new DateTime($fecha_ini);
           $fecha_fin=new DateTime($fecha_fin);

           /////condicion verdadera - retorna true .
            if( ($fecha0>=$fecha_ini) && ($fecha0<=$fecha_fin) ){
                          
                          return true;                       

                }
                else{
                          //echo "No es posible registrarse<br></br>";

                          //echo "Fecha inicio : ".$fecha_ini->format('Y-m-d H:i:00')."<br></br>";
                          //echo "Fecha fin : ".$fecha_fin->format('Y-m-d H:i:00')."<br></br>";
            //condicion falsa - retorna false     
                          return false;
                         
                }


       }  


      //lista las elecciones existentes en un menu de opciones .
      function listar(){

   $conexion = new conexion();
   $conexion=$conexion->dbconexion();
   $query=mysqli_query($conexion,"SELECT * FROM tbl_eleccion ");
   $select="
    <label>Eleccion:</label>
    <select required='' name='tipo-eleccion' id='tipo-eleccion'>
     <option value=''>Seleecione el tipo de eleccion :</option>";
    while($rows=mysqli_fetch_array($query))
    {
    $select.="<option value='$rows[0]'>$rows[1]</option>";
    }
    $select.="</select>";
    echo $select."<br/><br/>";

  }

 /////Listar en botones
   function ListarBoton(){
    $band=0;
    $conexion = new conexion();
    $conexion=$conexion->dbconexion();
    $query=mysqli_query($conexion,"SELECT * FROM tbl_eleccion ");
          
///////////////////Muestra de elecciones disponibles para votar -> estan dentro del rango de fecha para  votar

    while($rows=mysqli_fetch_array($query))
    {
    //uso del metodo validar de la clase  eleccion ..
    $obj = new Eleccion();
    $obj->fecha_ini=$rows[4];
    $obj->fecha_fin=$rows[5];
    $val=$obj->Validar();
     
         //condicion verdadera 
        if($val){

        echo "<a href='index.php?eleccion=$rows[0]' ><button type='button' class='btn btn-primary btn-lg'>$rows[1]</button></a></br></br>";
         $band=1;

        }
  
    }
    if($band==0){
         echo "<h2>No hay elecciones disponibles </h2>";
    }
    
////////////////


   }




}

?>