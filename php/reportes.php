<?php

require_once("../php/clases/class-usuario.php");
require_once("../php/clases/class-eleccion.php");

if(isset($_GET['volver'])){
header("Location: ../admin/index.php");
}
if(isset($_GET['reporte2'])){
 if(isset($_POST['tipo-eleccion']) ){
        $ideleccion=$_POST['tipo-eleccion'];
        $conexion = new conexion();
        $conexion=$conexion->dbconexion();
       }
}
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


     <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <link type='text/css' rel='stylesheet' href='../css/jquery.timepicker.css' />
 
    <script type="text/javascript" src="../js/jquery-ui-1.8.21.custom.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
    <script src="../js/calendar-es.js"></script>

    <script src="../js/Chart.js"></script>
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
                            <li class="hvr-bounce-to-bottom"><a href="../admin/index.php">Inicio</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="../php/form-registro-candidato.php">Inscribir candidato</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="form-registro-eleccion.php">Crear elección</a></li>
                            <li class="hvr-bounce-to-bottom active"><a href="reportes.php">Reportes</a></li>
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
  <a href="?volver"><img title="Jaime guzman" src="../img/volver.png" style="width: 38px; margin-left: 35px; margin-top: 3px;"></a>
    <div class="about">
            <div class="container">
                    <p class="eum">Por favor seleccione el tipo de reporte que quiere generar </p>

                <div class="col-md-6 contact-top-right">
                        <div class="contact-textarea">
                               <ul>
                                   <li><a href="?reporte1">Resultados de votaciónes</a> </li>
                                   <li><a href="?reporte2">Rendimiento de candidatos</a> </li>
                               </ul>
                               <div>
                               <form method="POST">
                                   <?php 

                                     if (isset($_GET['reporte2'])){
                                     //listar elecciones 
                                     $obj = new Eleccion();
                                     $obj->listar(); 
                                     echo "<input type='submit' value='Generar'>";

                                     }

                                    

                                    ?>
                                    
                               </form>
                                   
                               </div>
                               
                        </div>
                </div>
            </div>
        
    </div>


<?php


require_once("conexion.php");

?>
<div style="width: 50%">
            <canvas id="canvas" height="450" width="600"></canvas>
        </div>

    

    <div> 
    <script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

    var barChartData = {
        labels : [
       <?php
      
       

        $sql = "SELECT  tbl_usuario.nombre_usuario,
        count(tbl_voto.documento_c)
        from tbl_voto 
        INNER JOIN tbl_usuario on tbl_voto.documento_c =tbl_usuario.documento
        where tbl_voto.id_eleccion='$ideleccion' 
        group by tbl_voto.documento_c  ";
        $result=mysqli_query($conexion,$sql); 
        while($row=mysqli_fetch_array($result))
        {
         ?>

           '<?php echo $row[0]?>',
        <?php
        }

        ?>
        ],
        datasets : [
         
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,0.8)",
                highlightFill : "rgba(151,187,205,0.75)",
                highlightStroke : "rgba(151,187,205,1)",
                data : [

                <?php
     

        $sql = "SELECT  count(documento_c)
         from tbl_voto
         where id_eleccion='$ideleccion'
         group by documento_c ";
        $result=mysqli_query($conexion,$sql); 
        while($row=mysqli_fetch_array($result))
        {
         ?>
           '<?php echo $row[0]?>',
        <?php
        }

        ?>
        ]
            }
        ]

    }
    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx).Bar(barChartData, {
            responsive : true
        });
    }

    </script>
    </div>
</body>
</html>