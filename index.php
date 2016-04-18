<?php
require_once("funciones.php");

?>

<!DOCTYPE html>
<html style="min-height: 100%;">

  <head style="background-color: red;"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Musicon | Bienvenido</title>
    <link rel="stylesheet" href="skin/functional.css">
      <link rel="stylesheet" href="css/foundation.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/aroqueStyle.css" />
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="js/vendor/modernizr.js"></script>
      <script src="js/musicon.js"></script>
      <script src="audiojs/audio.min.js"></script>
      <link rel="stylesheet" href="includes/index.css" media="screen">
      
      <script src="js/jquery.js"></script>
<script src="js/mediaelement-and-player.min.js"></script>
<link rel="stylesheet" href="css/mediaelementplayer.css" />
      

  </head>

<style>
		
		
		
		

		
		iframe { width: 100%; margin: 0 0 20px 0; }
		
		@media (max-width: 480px) {
			body { width: 90%; }
		}
		
	</style>



  <h1 style="margin-top: 20px; margin-bottom: 10px; text-shadow: 0 0px 15px#ffffff; font-size: 100px"  id="home" class="htopbanner">Musicon</h1>

 


  <body class="body1" onload="startTime()" style="text-shadow:0.2em 0.2em 0.2em black; min-height: 100%; height:auto;">


	
<div class="row container">
  <div class="secondary button-group">
  <a class="button" href="?vid=canales">Canales</a>
  <a class="button" href="?vid=peli">Peliculas</a>  
</div>
</div>
<div class="row" id="video" style=" margin-left: 20px; margin-bottom: 20px; ">


 <!-- VIDEO TAGS -->
 <?php 
 	$vidtype = 'flow';
 	if (isset($_GET['vid'])) {
 		if ($_GET['vid'] == "peli") {
 					$vidtype = "iframe";
 		}
 		else{
 			$vidtype = "flow";
 		}


 	}

 	if ($vidtype == 'flow') {
 	

 ?>
 <div class="columns large-12 large-offset-2 container" style="margin-bottom: 50px;">
 <div  id="player" data-live="true"
     data-ratio="0.5625"     
     embed="false"
     class="flowplayer fixed-controls">

   <video data-title="MUSICON" autoplay  data-title="Autoplay">
<source id="VOD" type="application/x-mpegurl"
        src="http://rmtvlive-lh.akamaihd.net/i/rmtv_1@154306/master.m3u8">
        <track kind="subtitles" default srclang="en" label="English"
             src="subs/subsa.vtt">
   </video>
  
</div>
<?php 
#end of if vidtype is flow	
 	}
 	else {
 ?>

<div class="columns large-12 large-offset-1 container" style="margin-bottom: 50px;">
<div class="video-container">
    <iframe id="elframe" src="http://www.spruto.tv/iframe_embed.php?video_id=180754" height="400" width="560" allowfullscreen="" frameborder="0">
    </iframe>
</div>
<?php 

#end of else vidtype is flow	
 	}
 	
 ?>
 <!-- END VIDEO TAGS -->
</div>



</div>
<div class="row">
    <div class="columns large-12 large-offset-4">      
      <audio   style="display: none;" id="anuncio"  autoplay="autoplay" controls="controls">
        <source id="sourceB" src="http://www.xamuel.com/blank-mp3-files/1sec.mp3" type="audio/mp3" />
      </audio>
    </div>
  </div>
   
  <!--https://www.youtube.com/embed/oZa3Dgz-G7k-->



  <?php 
  if(isset($_GET['type'])){
  	if($_GET['type'] == 'formulario'){
  		modulo("form");
  	}
  }
  
  modulo("listaEmisoras");
  

  ?>
  <!-- AQUI TERMINA -->
	


<script type="text/javascript">

flowplayer.conf.embed = false;
flowplayer.conf.fullscreen = false;


</script>
  	<script src="js/magic.js"></script>
    <script src="js/jplayer.js"></script>
    <script src="js/foundation.min.js"></script>
    



  <script type="text/javascript">

  $(".flowplayer:first").on("pause", function(e, api) {
  
});

  $(document).ready(function(){$('#play').foundation('reveal', 'open')});

flowplayer.conf = { 
embed = false;
fullscreen = false;

};


$('#Form').foundation('reveal', 'open');
      $(document).foundation();
    </script>
    <div id="txt"></div>

 <script>

function closeM() {

	$('#myModal').foundation('reveal', 'close');
}

      function startTime() {
         
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
  // if s%50 and m%5 
  if (m%8 == 0 && s == 00) {
    
    $('#myModal').foundation('reveal', 'open');

  };
  if (m%2 == 0 && s == 50) {
    
  };

 
    
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


<div id="myModala" class="reveal-modal " data-reveal aria-labelledby="modalTitle" aria-hidden="true" style="480px;" role="dialog">
  
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
  <div id="videoContainera">
  <iframe width="1280" height="720" src="https://www.youtube.com/embed/2aZrODIAbZ0?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
  </div>
</div>
<script src="js/flowplayer.min.js"></script>
<!-- global options -->
<script>
flowplayer.conf = {
   ratio: 5/12,
   embed: false,
   fullscreen: true,
   
};
</script>
  </body> 
</html>