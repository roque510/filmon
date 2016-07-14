<?php
require_once ('medoo.php');
require_once('funciones.php');
require_once("config.php");
session_start();

$database = new medoo([
          'database_type' => 'mysql',
          'database_name' => $DBM,
          'server' => $SVR,
          'username' => $USR,
          'password' => $PW,
          'charset' => 'utf8'
        ]);


if (!isset($_SESSION['usrm'])) {
  if(isset($_COOKIE['m09215'])){

      if ($database->has("users", [
      "cook" => $_COOKIE['m09215']
  ]
))
      {
          $_SESSION['usrm'] = 'user';
          $profile = $database->get("users", ["membership_id"], ["cook" => $_COOKIE['m09215']]);
          $date = $database->get("users", ["mem_expire"], ["cook" => $_COOKIE['m09215']]);
          if ($profile['membership_id'] > 0) {
            if (new DateTime() > new DateTime(implode($date))){$_SESSION['date'] = "vencido";}
            else {$_SESSION['date'] = "vigente";}
          }
          else
            $_SESSION['date'] = "vencido";
            modulo('cerrar');
      }
      else
      {
       modulo("logpls");
      }

    }
    else
      modulo("logpls");

    
  }
else
{
  
  modulo('cerrar');
}
     



?>

<!DOCTYPE html>
<html style="min-height: 100%;">

  <head style="background-color: red;"><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Musicon | Bienvenido</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="skin/functional.css">
      <link rel="stylesheet" href="css/foundation.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/stylea.css" />
      
      <link rel="stylesheet" href="css/aroqueStyle.css" />
      <link rel="stylesheet" href="css/normalize.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="js/vendor/modernizr.js"></script>
      <script src="js/musicon.js"></script>
      <script src="audiojs/audio.min.js"></script>
      <link rel="stylesheet" href="includes/index.css" media="screen">
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
      
      <script src="js/jquery.js"></script>
      <script src="js/index.js"></script>
<script src="js/mediaelement-and-player.min.js"></script>
<link rel="stylesheet" href="css/mediaelementplayer.css" />
      

  </head>

<style>
		
		
		
		

		
		iframe { width: 100%; margin: 0 0 20px 0; }
		
		@media (max-width: 480px) {
			body { width: 90%; }
		}
		
	</style>



  <h1 style="margin-top: 10px; margin-bottom: 10px; text-shadow: 0 0px 15px#ffffff; font-size: 100px"  id="home" class="htopbanner"><a style="color: white;" href="?pg=inicio">Musicon</a></h1>

 


  <body class="body1" data-sticky-container onload="startTime()" style="min-height: 100%; height:auto;">


	




   
  <!--https://www.youtube.com/embed/oZa3Dgz-G7k-->



  <?php 
  if(isset($_GET['type'])){
  	if($_GET['type'] == 'formulario'){
  		modulo("form");
  	}
  }

  $page = "inicio";
      if (isset($_GET['pg'])) {
        $page = $_GET['pg'];        
      }

      
        if (file_exists ("Modulos/".$page.".modulo.php")) {
          modulo($page);
           if ($page == "inicio") {
          modulo("listaEmisoras");
        }
        }
        else{
          modulo('error');
        }

    //modulo("inicio");
    
  

  ?>
  <!-- AQUI TERMINA -->
	


<script type="text/javascript">

flowplayer.conf.embed = false;
flowplayer.conf.fullscreen = false;


</script>
<script src="js/index.js"></script>
    <script src="js/sweetalert.min.js"></script>
  	<script src="js/magic.js"></script>
    <script src="js/jplayer.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation.js"></script>
    <!-- foundation.accordion.js -->
    <script src="js/foundation/foundation.tooltip.js"></script>
    



  <script type="text/javascript">

  $(".flowplayer:first").on("pause", function(e, api) {
  
});

  $(document).ready(function(){$('#play').foundation('reveal', 'open')});
var elem = new Foundation.Tooltip(element, options);

flowplayer.conf = { 
embed = false;
fullscreen = false;

};

var elem = new Foundation.Tooltip(element, options);
$('#Form').foundation('reveal', 'open');
      $(document).foundation();
      $('.has-tip').foundation();
    </script>
    <div id="txt"></div>

 <script>

function closeM() {

	$('#myModal').foundation('reveal', 'close');
}

      function startTimea() {
         
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
  // if s%50 and m%5     
    alert("wo");
 
    
    var t = setTimeout(startTime, 500);


}

$(document).on('opened.fndtn.reveal', '[data-reveal]', function () {
	autoPlayVideo();
  var modal = $(this);
var t = setTimeout(startTime, 500);
setTimeout(closeM, 20000);
  

});

function autoPlayVideo(){
  "use strict";
  $("#videoContainer").html('<iframe width="1280" height="720" src="https://www.youtube.com/embed/2aZrODIAbZ0?autoplay=1&loop=1&rel=0&wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
}
</script>



<script src="js/flowplayer.min.js"></script>


<!-- global options -->
<script>
flowplayer.conf = {
   ratio: 25/47,
   embed: false,
   fullscreen: true,
   
};

 
flowplayer(function (api, root) {
  api.on("error", function (e, api, err) {
    console.log(err.message);
    if (err.code === 4) { // Video file not found
 
      // reset state
      api.error = api.loading = false;
 
      // change the skin color and alert the user
      $(root).removeClass("is-error")
             .append("");
 
      // load safe replacement video sources
      api.load({
        sources: [          
          { type: "video/mp4",   src: "img/error.mp4" }
        ]
      });
    }
  });
});
</script>
  <script>
      $(function () {




function firstToUpperCase( str ) {
    return str.substr(0, 1).toUpperCase() + str.substr(1);
}

$('#login').on('submit', function (e) {  

          e.preventDefault();


          $.ajax({
            type: 'post',
            url: 'login.php',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            dataType: "json",
            success: function (data) {
              if(data.response == "correcto"){               
                

                swal({   title: "Exito!",   text: data.comment ,   type: "success",   showCancelButton: false,   confirmButtonColor: "#4db6ac",   confirmButtonText: "Continuar",   cancelButtonText: "No, regresar al inicio",   closeOnConfirm: true,   closeOnCancel: true }, function(isConfirm){   if (isConfirm) {
                   
                   location.href = "index.php";
                    } 
                    });
              }
              else {
                swal("Error", data.comment, "error");
              }


              


            }
          });

        });
 });
        </script>
  </body> 
</html>