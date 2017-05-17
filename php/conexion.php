<?php

class conexion{
  
	  function dbconexion(){

	  $conexion = mysqli_connect("localhost", "root", "", "bd_bussinesvote");
      $conexion->set_charset("utf8");
	  if (mysqli_connect_errno($conexion)) {
	      echo "Fallo al contenctar a MySQL: " . mysqli_connect_error();
	  }

	  return $conexion;
	}

}


?>