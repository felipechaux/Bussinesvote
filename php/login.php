<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
include("clases/class-usuario.php");
 ?>
<!DOCTYPE html>
<html>
<head>
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
</script>
<!--  -->

<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
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
							<li class="hvr-bounce-to-bottom"><a href="form-candidato.php">Postularse</a></li>
							<li class="hvr-bounce-to-bottom active"><a href="login.php">Iniciar sesión</a></li>
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
			<p class="eum">Por favor ingrese sus credenciales para acceder </p>
			
				<div class="contact-top">
					<div class="col-md-6 contact-top-left">
						<img src="../images/vote.png"/>
					</div>
					<div class="col-md-6 contact-top-right">
						<div class="contact-textarea">
						<h4>Iniciar Sesión.</h4>
						<?php 
						if( (isset($_POST['ingresar']))  ) {

						$obj = new Usuario();
						$usuario=$_POST["usuario"];
						$password=$_POST["password"];
						$passencriptado=md5($password);
						$obj->Autenticacion($usuario,$passencriptado);

						}
 						?>
							<form method="POST">
                                <label>Documento :</label>
								<input required="" maxlength="15" onkeypress='return soloNumeros(event)' type="text"  name="usuario" >
								<label>Contraseña :</label>
								<input required="" maxlength="30"  type="password"  name="password" >
								<input type="submit" name="ingresar"  value="Ingresar">
								<input type="reset" value="Limpiar">

								<br />
								<!--<a href="create-account.php" class="eum2"><p class="eum2">¿Aún no estas regitrado? Regístrate aquí.</p></a>-->

							</form>

						</div>
						
					</div>
					<div class="clearfix"></div>
				</div>
				
			
		</div>
	</div>

<!--- footer --->
	
	<div class="clear"> </div>
	<div class="copy-right">
		<p>Copyright © 2017 Business Vote. All rights reserved</p>
	</div>
<!--- //footer --->
<!-- for bootstrap working -->
		<script src="../js/bootstrap.js"> </script>
<!-- //for bootstrap working -->




</body>
</html>

