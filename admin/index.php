<?php

include("../php/clases/class-usuario.php");
include("../php/clases/class-eleccion.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- for-mobile-apps -->
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


    <title>Business Vote</title>
     


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
                        <a class="navbar-brand" href="../admin/index.php"><img src="../images/Business_Vote_logo.png" style="width: 79px;"></a>
                    </div>
                                        <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="hvr-bounce-to-bottom active"><a href="../admin/index.php">Inicio</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="../php/form-registro-candidato.php">Inscribir candidato</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="../php/form-registro-eleccion.php">Crear elección</a></li>
                             <li class="hvr-bounce-to-bottom"><a href="#">Administrador: <?php $obj = new Usuario();
                             $obj->rol=1;
                             $obj->Session();?></a></li>

             
                           <!--  <li class="hvr-bounce-to-bottom"><a href="reports.html">Reportes</a></li>-->
                        </ul>
                    </div><!-- /navbar-collapse -->
                </nav>
            </div>
        </div>
    </div>
<!-- //header -->
<br>
</br>
  <div class="container">

       
    <?php
  
    
    $obj = new Eleccion();
    $obj->ListarTable();  

    

 
    ?>
   </div>
  </body>
</html>