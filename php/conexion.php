<?php

class conexion{
  
	  function dbconexion(){

	  $conexion = mysqli_connect("sql309.eshost.com.ar", "eshos_19709769", "pipecha", "eshos_19709769_bussinesvote");
      $conexion->set_charset("utf8");
	  if (mysqli_connect_errno($conexion)) {
	      echo "Fallo al contenctar a MySQL: " . mysqli_connect_error();
	  }

	  return $conexion;
	}

}


?>