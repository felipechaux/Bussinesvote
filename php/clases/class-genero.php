<?php 
require_once("../php/conexion.php");

class Genero{
   //lista los generos existentes en un menu de opciones .
     function listar(){

   $conexion = new conexion();
   $conexion=$conexion->dbconexion();
   $query=mysqli_query($conexion,"SELECT * FROM tbl_genero_usuario");
   $select="
    <label>Genero :</label>
    <select required='' name='genero' id='tipo-eleccion'>
    <option value=''>Selecione un genero :</option>";
    while($rows=mysqli_fetch_array($query))
    {
    $select.="<option value='$rows[0]'>$rows[1]</option>";
    }
    $select.="</select>";
    echo $select."<br/><br/>";

    }


}



?>