<?php

require_once("../php/clases/class-genero.php");
require_once("../php/clases/class-eleccion.php");
require_once("../php/clases/class-candidato.php");

if(isset($_GET['volver'])){
header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <!-- script validacion de campos -->
    <script type="text/javascript">
       function soloNumeros(e){
      var key = window.Event ? e.which : e.keyCode
      return (key >= 48 && key <= 57)
    }


    //aquino
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
    function red(){
      alert('Actualizacion realizada');
      window.location="../admin/index.php";
    }
    </script>
    <!--  -->
<title>Business Vote</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pasta Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="../js/jquery-1.11.1.min.js"></script>
<!-- //js -->

<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

<!-- necesario para calendario js-->
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
 <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
 <script src="../js/calendar-es.js"></script>
      <!-- -->

    <!-- calendario js -->
    <script>
        $(document).ready(function(){
             $("#campofecha").datepicker({
             
                //buttonImage: 'calendar.png',
                changeYear: true,
                showButtonPanel: true,
                yearRange: "1900:2017",
                 dateFormat: "yy-mm-dd", 
                timeFormat: 'hh:mm:00',
             });
      })
    </script>
    <!-- --> 
</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-nav">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					    <a class="navbar-brand" href="../index.php"><img src="../images/Business_Vote_logo.png" style="width: 79px;"></a>
					</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
						    <li class="hvr-bounce-to-bottom"><a href="../index.php">Inicio</a></li>
							<li class="hvr-bounce-to-bottom"><a href="../how-to-vote.html">¿Cómo Votar?</a></li>
							<li class="hvr-bounce-to-bottom active"><a href="form-candidato.php">Postularse</a></li>
							<li class="hvr-bounce-to-bottom"><a href="login.php">Iniciar sesión</a></li>
							<li class="hvr-bounce-to-bottom"><a href="../contact.html">Contáctenos</a></li>
							
						</ul>
					</div><!-- /navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>
<!-- //header -->

	<div class="about">
		<div class="container">
			<p class="eum">Por favor ingrese los datos solicitados a continuación , para inscribirse como candidato.</p>
<div class="contact-top">
					<div class="col-md-6 contact-top-right">
						<div class="contact-textarea">
							<form method="POST" enctype="multipart/form-data" >
									<label>Documento :</label>
								    <input  onkeypress='return soloNumeros(event)' required="" maxlength="15" name="documento" id="documento" type="text" />
								    <label>Nombre :</label>
								    <input  required="" maxlength="50" name="nombre" id="nombre" type="text" />
								    <br>
								    <label>Imagen :</label>
								    <input type="hidden" name="MAX_FILE_SIZE" value="9999999">
								    <input required="" name="imagen" id="imagen" type="file"> 
								    <br>
								    </br>
								    <?php
								     //listar generos
								     $obj = new Genero();
								     $obj->listar();

								     ?>
								    <label>Fecha de nacimiento :</label>
								     <input required="" type="text" name="nacimiento" id="campofecha">
								     <?php
								     //listar elecciones 
								     $obj = new Eleccion();
								     $obj->listar(); 

								     ?>
								    <input name="registro" value="Inscribir" type="submit"></input>
								<input type="reset" value="Limpiar">
								
							</form>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
		</div>
	</div>



<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->

<?php 
if( (isset($_POST['registro']))  ) {

    $obj = new Candidato();
    $imagen = $_FILES['imagen']['tmp_name'];
    $name = $_FILES['imagen']['name']; 
    $size = $_FILES['imagen']['size'];
    $size = $size / 1024;
    $size = round($size, 2);
    $size = "$size KB";
  	$documento=$_POST['documento'];
  	$nombre=$_POST['nombre'];
  	$genero=$_POST['genero'];
  	$nacimiento=$_POST['nacimiento'];
  	$eleccion=$_POST['tipo-eleccion'];
    $obj->RegistrarUsuario($documento,$nombre,$genero,$nacimiento,$eleccion,$imagen,$size,$name);
    

	}

?>
</body>
</html>