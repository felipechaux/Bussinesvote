
<?php

include("../php/clases/class-usuario.php");
include("../php/clases/class-eleccion.php");

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
   
    function red(){
      alert('Actualizacion realizada');
      window.location="../admin/index.php";
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
                            <li class="hvr-bounce-to-bottom"><a href="form-registro-eleccion.php">Crear eleccion</a></li>
                            <li class="hvr-bounce-to-bottom"><a href="#">Administrador :<?php $obj = new Usuario();
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
  <a href="?volver">Volver</a>
    <div class="about">
            <div class="container">
                    <p class="eum">Por favor ingrese los datos solicitados a continuación para crear una eleccion.</p>

                <div class="col-md-6 contact-top-right">
                        <div class="contact-textarea">
                                <form  method="POST">

                                      <?php 

                                              if(isset($_GET['eleccion'])){

                                              $eleccion=$_GET['eleccion'];    
                                              
                                   
                                            $obj =new Eleccion();
                                            $obj->modificar=false;
                                            $obj->eleccion=$eleccion;
                                             $obj->v1=true;
                                             $obj->v2=false;
                                             $obj->v3=false;
                                             $obj->v4=false;
                                             $obj->v5=false;
                                            $val1=$obj->Modificar();
                                             $obj->v1=false;
                                             $obj->v2=true;
                                             $obj->v3=false;
                                             $obj->v4=false;
                                             $obj->v5=false;
                                            $val2=$obj->Modificar();
                                             $obj->v1=false;
                                             $obj->v2=false;
                                             $obj->v3=true;
                                             $obj->v4=false;
                                             $obj->v5=false;
                                            $val3=$obj->Modificar();
                                             $obj->v1=false;
                                             $obj->v2=false;
                                             $obj->v3=false;
                                             $obj->v4=true;
                                             $obj->v5=false;
                                            $val4=$obj->Modificar();
                                             $obj->v1=false;
                                             $obj->v2=false;
                                             $obj->v3=false;
                                             $obj->v4=false;
                                             $obj->v5=true;
                                            $val5=$obj->Modificar();


                                                   if(isset($_POST['modificacion'])){
                                            

                                                    $obj =new Eleccion();
                                                    $obj->eleccion=$eleccion;
                                                    $obj->neleccion=$_POST['neleccion'];
                                                    $obj->fechaini_in=$_POST['fecha-ini-in'];
                                                    $obj->fechafin_in=$_POST['fecha-fin-in'];
                                                    $obj->fechaini_vot=$_POST['fecha-ini-vot'];
                                                    $obj->fechafin_vot=$_POST['fecha-fin-vot'];
                                                    $obj->modificar=true;
                                                    $obj->v1=false;
                                                    $obj->v2=false;
                                                    $obj->v3=false;
                                                    $obj->v4=false;
                                                    $obj->v5=false;
                                                    $obj->Modificar();


                                                 }

                                              }
                                     
                                     
                                       ?>
                             

                                     <label>Nombre de la eleccion :</label>
                                     <input maxlength="50"  required="" name="neleccion" type="text" value="<?php echo $val1 ?> ">
                                     <br>
                                     </br>
                                     <label >Fecha inicio de inscripcion :</label>
                                     <input required="" type="text" name="fecha-ini-in" id="fecha" value="<?php echo $val2 ?> " >
                                     <br>
                                     </br>
                                      <label>Fecha fin de inscripcion :</label>
                                     <input required="" type="text" name="fecha-fin-in" id="fecha2" value="<?php echo $val3 ?> " >
                                     <br>
                                     </br>
                                     <label>Fecha inicio de votacion :</label>
                                     <input required="" type="text" name="fecha-ini-vot" id="fecha3" value="<?php echo $val4 ?> " >

                                     <br>
                                     </br>
                                     <label>Fecha fin de votacion :</label>
                                     <input required="" type="text" name="fecha-fin-vot" id="fecha4" value="<?php echo $val5 ?> "  >
                                     <input name="modificacion" type="submit" value="Guardar"></input>
									 <a href="http://chaux.eshost.com.ar/Bussinesvote/admin/index.php>"<input type="submit" value="Cancelar"></input></a>
                               
                              
                                </form>

                        </div>
                </div>
            </div>
        
    </div>




</body>
</html>