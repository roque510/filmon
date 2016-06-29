<div  class="row container">
  <div class="secondary button-group">
  <a class="button" href="?vid=canales">Canales</a>
  <a class="button" href="?vid=peli">Peliculas</a>  
</div>
</div>
<div class="row"  id="video" style=" margin-left: 20px; margin-bottom: 20px; ">
<?php
if (isset($_SESSION['date']) && $_SESSION['date'] == "vencido") {
  echo '<div id="vencido" style="display: none; " ></div>';
  echo '<audio  style="display: none; " id="miembro"  autoplay="autoplay" controls="controls">
        <source id="sourceB" src="http://www.xamuel.com/blank-mp3-files/1sec.mp3" type="audio/mp3" />
      </audio>';
}
if (!isset($_SESSION['usrm'])) {
  echo '<div id="vencido" style="display: none; " ></div>';
  echo '<audio  style="display: none; " id="anuncio"  autoplay="autoplay" controls="controls">
        <source id="sourceB" src="http://www.xamuel.com/blank-mp3-files/1sec.mp3" type="audio/mp3" />
      </audio>';
}

?>


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
 <div class="columns large-offset-4 large-12 container" >
 <div id="nombrePLAY">Real Madrid TV</div>
 </div>
 <div class="columns large-12 container" style="margin-bottom: 50px;">
 <div  id="player" data-live="true"
     data-ratio="0.5625"     
     embed="false"
     class="flowplayer fixed-controls">



   <video data-title="MUSICON" autoplay  loop data-title="Autoplay">
<source id="VOD" type="application/x-mpegurl"
        src="http://rmtvlive-lh.akamaihd.net/i/rmtv_1@154306/master.m3u8">
        <track kind="subtitles" default srclang="en" label="English"
             src="subs/subsa.vtt">
   </video>
  
</div>
<div class="columns large-2">

  <button id="chplus" ch-id="7" ch-url="http://rmtvlive-lh.akamaihd.net/i/rmtv_1@154306/master.m3u8" type="button" class="success button">ch +</button>
  <button id="chminus" ch-id="7" ch-url="http://rmtvlive-lh.akamaihd.net/i/rmtv_1@154306/master.m3u8" type="button" class="success button">ch -</button>

  <img id="img" src="http://teleonline.org/wp-content/uploads/2016/02/rmtv-logo-TR.png" onerror="this.src='http://www.angelman.org/wp-content/themes/aaika/assets/images/default.jpg'"/>
  <div id="nombre">Real Madrid TV</div>
  <button id="play" type="button" class="success round button">Play</button>
</div>
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
</div>
<?php 

#end of else vidtype is flow	
 	}
 	
 ?>
 <!-- END VIDEO TAGS -->
</div>


