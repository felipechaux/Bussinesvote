<?php

require_once("../php/clases/class-usuario.php");
require_once("../php/clases/class-eleccion.php");

if(isset($_GET['volver'])){
header("Location: ../admin/index.php");
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

    <title>Business Vote</title>
     

            <script type="text/javascript">
                $(function(){
                    $('#fecha').datetimepicker({
                    showSecond: true,
                    dateFormat: "yy-mm-dd", 
                    timeFormat: "HH:mm:ss",
                    showTimePicker: null, 
                    showSecond:null,
                    showMillisec:null,
                    showMicrosec:null,
                    showTimezone:null
                    });

                    $('#fecha2').datetimepicker({
                    showSecond: true,
                    dateFormat: "yy-mm-dd", 
                    timeFormat: "HH:mm:ss",
                    showTimePicker: null, 
                    showSecond:null,
                    showMillisec:null,
                    showMicrosec:null,
                    showTimezone:null
                    });

                    $('#fecha3').datetimepicker({
                    showSecond: true,
                    dateFormat: "yy-mm-dd", 
                    timeFormat: "HH:mm:ss",
                    showTimePicker: null, 
                    showSecond:null,
                    showMillisec:null,
                    showMicrosec:null,
                    showTimezone:null
                    });

                    $('#fecha4').datetimepicker({
                    showSecond: true,
                    dateFormat: "yy-mm-dd", 
                    timeFormat: "HH:mm:ss",
                    showTimePicker: null, 
                    showSecond:null,
                    showMillisec:null,
                    showMicrosec:null,
                    showTimezone:null
                    });



                });
          </script>
 
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
                            <li class="hvr-bounce-to-bottom active"><a href="form-registro-eleccion.php">Crear elección</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="#"> <?php $obj = new Usuario();
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
                    <p class="eum">Por favor ingrese los datos solicitados a continuación para crear una elección.</p>

                <div class="col-md-6 contact-top-right">
                        <div class="contact-textarea">
                                <form  method="POST">
                             

                                     <label>Nombre de la eleccion :</label>
                                     <input maxlength="50" onkeypress='return soloLetras(event)'   required="" name="neleccion" type="text">
                                     <label >Fecha inicio de inscripcion :</label>
                                     <input required="" type="text" name="fecha-ini-in" id="fecha"  >
                                      <label>Fecha fin de inscripcion :</label>
                                     <input required="" type="text" name="fecha-fin-in" id="fecha2"  >
                                     <label>Fecha inicio de votacion :</label>
                                     <input required="" type="text" name="fecha-ini-vot" id="fecha3"  >
                                     <label>Fecha fin de votacion :</label>
                                     <input required="" type="text" name="fecha-fin-vot" id="fecha4"  >
                                     <input name="registro" type="submit" value="Guardar"></input>
                               
                              
                                </form>

                        </div>
                </div>
            </div>
        
    </div>


<?php


if(isset($_POST['registro'])){


  $obj =new Eleccion();
  $neleccion=$_POST['neleccion'];
  $fechaini_in=$_POST['fecha-ini-in'];
  $fechafin_in=$_POST['fecha-fin-in'];
  $fechaini_vot=$_POST['fecha-ini-vot'];
  $fechafin_vot=$_POST['fecha-fin-vot'];
  
  $obj->Crear($neleccion,$fechaini_in,$fechafin_in,$fechaini_vot,$fechafin_vot);


}


?>

</body>
</html>