<?php
require_once("../php/clases/class-usuario.php");
require_once("../php/clases/class-eleccion.php");
require_once("../php/clases/class-candidato.php");
require_once("../php/clases/class-voto.php");


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


   <!-- <script src="../js/bootstrap.min.js"></script>-->
 <!--js boostrap.min.js ventana modal -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <title>Index</title>

    <!--estilos boostrap.min.css ventana modal -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <link href="../css/estilos.css" rel="stylesheet">
     
<script>

function ModalConfirmacion(obj){
//obtencion de atributos almacenados - href --> documento de candidato ; value -->nombre de candidato 
  $("#votar").val(obj.getAttribute("href"));
   document.getElementById("blanco").innerHTML='';
   document.getElementById("ncandidato").innerHTML='por: '+obj.getAttribute("value");
  $("#mostrarmodal").modal("show");
  if (obj.getAttribute("value")=='blanco' ) {
    document.getElementById("ncandidato").innerHTML='';
    document.getElementById("blanco").innerHTML='en Blanco';
  }
return false;
}
function Modalmessagesi(){
  document.getElementById("message").innerHTML='Voto realizado';
  $("#img-message").attr("src","../img/si.png");
  $('#Modalmessage').modal('show'); 
}
function Modalmessageno(){
  document.getElementById("message").innerHTML='Usted ya voto ';
  $("#img-message").attr("src","../img/no.png");
  $('#Modalmessage').modal('show'); 
}

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
                        <a class="navbar-brand" href="index.php"><img src="../images/Business_Vote_logo.png" style="width: 79px;"></a>
                    </div>
                                        <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                             <li class="hvr-bounce-to-bottom"><a href="#"> Votante : <?php $obj = new Usuario();
                             $obj->rol=3;
                             $obj->Session();?></a></li>
                           <!--  <li class="hvr-bounce-to-bottom"><a href="reports.html">Reportes</a></li>-->
                        </ul>
                    </div><!-- /navbar-collapse -->
                </nav>
            </div>
        </div>
    </div>
<!-- //header -->

      <div class="container">
      <p class="eum">En este apartado aparecen las elecciones disponibles , de clic en ellas para visualizar los candidatos .</p>
      <?php   
       //listar elecciones en boton
       $obj = new Eleccion();
       $obj->ListarBoton();
     

      ?>
  
    </div>
 
<section id="main" class="candidatos-disponibles">
  <?php

    if(isset($_GET['eleccion'])){
     $ideleccion=$_GET['eleccion'];
   
     //ejecucion de funcion javascript , llamada desde boton de confirmacion de voto .
      echo"<script type=\"text/javascript\">
            function Votar(){
            window.location.href = '?eleccion=$ideleccion&voto='+$('#votar').val();        
            }
      </script>";

     $obj=new Candidato();
     $obj->ver=true;
     $obj->Listar($ideleccion);



       if(isset($_GET['voto'])){
       $estado=1;   
       $documentov=$_SESSION['usuario'];  
       $documentoc=$_GET['voto'];

       if( $documentoc=='blanco'){
        $documentoc='';
        $estado=2;
       }
       $obj=new Voto();
       $obj->documentov=$documentov;
       $obj->documentoc=$documentoc;
       $obj->estado=$estado;
       $obj->ideleccion=$ideleccion;
       $val=$obj->Registrar();

        }

   }



      ?>
  </section>



<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>Ventana de confirmacion </h3>
           </div>
           <div class="modal-body">
              <h4>Esta completamente seguro de votar <a id='blanco'> <a id='ncandidato'></a> </a>?</h4>  
       </div>
           <div class="modal-footer">
           <a onclick='Votar()' id='votar'  href="#" data-dismiss="modal" class="btn btn-primary">SI</a>
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cancelar </a>
           </div>
      </div>
   </div>
</div>



   <div class="modal fade" id="Modalmessage" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 id='message'> </h3>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <center>
      <img  id='img-message'   >
      </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


  </body>
</html>