<?php


require_once("funciones.php");
require_once("config.php");



$con = mysqli_connect($SVR,$USR,$PW,$DB);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$cookie_name = "musiUser";
$cookie_value = md5( rand(0,100000) );


if(!isset($_COOKIE[$cookie_name])) {
    setcookie("musiUser", md5( rand(0,100000) ), time() + (86400 * 30), "/"); // 86400 = 1 day
    if (!$items =  mysqli_query($con,"INSERT INTO `musicon`.`usuarios` (`nombre`, `creditos`) VALUES ('".$cookie_value."', '0');"))
    {
        echo("Error description: " . mysqli_error($con));
    }
} else {
    $sql="SELECT * FROM `usuarios` where `nombre` = '".$_COOKIE[$cookie_name]."'";
    if (!$items =  mysqli_query($con,$sql))
    {
        echo("Error description: " . mysqli_error($con));
    }else
        if ( mysqli_num_rows($items ) > 0 )
        {

        }
        else{
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            if (!$items =  mysqli_query($con,"INSERT INTO `musicon`.`usuarios` (`nombre`, `creditos`) VALUES ('".$cookie_value."', '0');"))
            {
                echo("Error description: " . mysqli_error($con));
            }
        }

}


?>
<!DOCTYPE html>
<html>

  <head style="background-color: red;">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Musicon | Bienvenido</title>
      <link rel="stylesheet" href="css/foundation.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/aroqueStyle.css" />
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="js/vendor/modernizr.js"></script>
      <script src="js/musicon.js"></script>
  </head>



<div class="headerino" >
    <section class="footer" style="margin-top: 15px">
        <div  class="row">
            <div class="columns large-1 medium-2 small-3" style="margin-top: -15px; ">
                <a href="#home"><img style="width: 50px;" src="img/Home.ico"></a>
            </div>
            <div class="columns large-7 medium-6 small-5 "  >
                <marquee behavior="scroll" direction="left"><?php
                    $sql="SELECT * FROM `playlist` where `numpc` = '".$MAQUINA."' and `status` = '1'";
                    if (!$items =  mysqli_query($con,$sql))
                    {
                        echo("Error description: " . mysqli_error($con));
                    }else
                        if ( mysqli_num_rows($items ) > 0 )
                        {
                            $ruuow = mysqli_fetch_array($items);
                            $sql="SELECT DISTINCT * FROM `musica` where `narchivo` = '".$ruuow['narchivo']."'";
                            if (!$items =  mysqli_query($con,$sql))
                            {
                                echo("Error description: " . mysqli_error($con));
                            }
                            else
                                while ($row = mysqli_fetch_array($items)){
                                    if($row['Nombre' ] == "")
                                        echo "Está sonando : ".$row['NArchivo'];
                                    else
                                        echo "Está sonando : ".$row['Nombre']." - ".$row['Artista'];

                                }
                        }
                        else
                            echo "¡No hay canciones en cola, busca tu canción y escúchala ya!";

                    ?></marquee>
            </div>
            <div class="columns large-4 medium-4 small-4 " style="overflow: hidden; margin-top: -10px;" >
                <?php
                if(isset($_COOKIE['musiUser'])){
                    $sql="SELECT * FROM `usuarios` where `nombre` = '".$_COOKIE['musiUser']."'";
                    if (!$items =  mysqli_query($con,$sql))
                    {
                        echo("Error description: " . mysqli_error($con));
                    }else
                        while ($row = mysqli_fetch_array($items)){
                            echo "Creditos: ".$row['creditos'];

                        }
                }
                else
                    echo "Creditos: 0";

                ?>
            </div>
        </div>
    </section>

</div>


  <h1 style="margin-top: 50px; margin-bottom: 50px; text-shadow: 0 0px 15px#ffffff; font-size: 80px"  id="home" class="htopbanner">Musicón</h1>
  <h6  style="margin-top: -40px; margin-left: 190px; text-shadow: 0 0px 15px#ffffff; font-size: 30px" class="htopbanner"><?php
  $sql="SELECT * FROM `locales` where `numpc` = '".$MAQUINA."'";
  if (!$items =  mysqli_query($con,$sql))
  {
      echo("Error description: " . mysqli_error($con));
  }else
      while ($row = mysqli_fetch_array($items)){
          echo ucfirst(strtolower($row['lugar']));

      }
  ?></h6>

  <body class="body1">
  <div class="row" style="margin-bottom:35px; ">
      <?php
      if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false  )
      {
          // User agent is Google Chrome
      ?>

      <nav class="radial fade-in one">
          <input type="checkbox" id="menu" unchecked>
          <a href="http://www.musicon.me/maquina20" class="fa fa-question ">Play</a>
          <a href="index.php?pg=creditos" class="fa fa-book">creditos</a>
          <a href="index.php?pg=info" class="fa fa-code">info</a>
          <a href="index.php?pg=playlist" class="fa fa-github">playlist</a>
          <a href="index.php?pg=search" class="fa fa-stack-exchange">search</a>
          <label for="menu" class='fa fa-bars'>Menu</label>
      </nav>
      <?php }

      else {
      ?>

          <nav id="colorNav">
              <ul>
                  <li class="green" style=" width:70px !important; height:70px !important;padding-top: 6px !important;">
                      <a href="index.php?pg=musicaFav" style="color: black !important; padding-left: 0px !important; font-size: 20px;"><img src="css/fav.svg"></a>

                  </li>
                  <li class="red" style=" width:70px !important; height:70px !important;padding-top: 20px !important;">
                      <a href="index.php?pg=creditos" style="color: black !important; padding-left: 0px !important; font-size: 19px;"><img src="css/coins.svg"></a>

                  </li>
                  <li class="blue" style=" width:70px !important; height:70px !important;padding-top: 20px !important; ">
                      <a href="index.php?pg=info" style="color: black !important; text-align:center;  font-size: 20px;"><img src="css/info.svg"></a>

                  </li>
                  <li class="yellow" style=" width:70px !important; height:70px !important;padding-top: 0px !important;">
                      <a href="index.php?pg=playlist" style="color: black !important; padding-left: 0px !important; font-size: 18px;"><img src="css/playlist.svg"></a>

                  </li>
                  <li class="purple" style=" width:70px !important; height:70px !important;padding-top: 20px !important;">
                      <a href="index.php?pg=search" style="color: black !important; text-align:center; padding-left: 0px !important; font-size: 20px;"><img src="css/search.svg"></a>

                  </li>
              </ul>
          </nav>

      <?php }
      ?>

  </div><br><br><br><br>



  <div id="comprar" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
      <div class="row" style="background-color: ;">
          <div class="columns large-9  ">
              <ul class="pricing-table">
                  <li class="title nombreCancion"></li>
                  <li class="price nombreArtista"></li>
              </ul>
          </div>



          <div class="large-3 columns">
              <form method="post" id="compraform" action="compra.php">
                  <input type="hidden" class="artista " name="artista" value="" />
                  <input type="hidden" class="archivo" name="archivo" value="" />
                  <input type="hidden" class="search" name="search" value="" />
                  <?php
                  $credi = 0;
                  $sql="SELECT * FROM `usuarios` where `nombre` = '".$_COOKIE['musiUser']."'";
                  if (!$items =  mysqli_query($con,$sql))
                  {
                      echo("Error description: " . mysqli_error($con));
                  }else
                      while ($row = mysqli_fetch_array($items)){
                          $credi = $row['creditos'];

                      }
                  if($credi > 2){
                      echo '<input type="submit" style="" id="boton"  class="button" value="Comprar Ahora" />';
                      echo '<div style="display:none" id="dvloader"><img src="img/page-loader.gif" /></div>';
                  }
                  else
                      echo '
              <a href="index.php?pg=creditos" id="Search"  class="srchlink alert button expand">No tienes creditos... Compra Aqui!</a>
              ';


                  ?>

              </form>



          </div>
      </div>
  </div>




  <div id="uplevel" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
      <?php
      if (!$items =  mysqli_query($con,'SELECT * FROM `playlist` order by `prioridad` desc limit 1 '))
      {
          echo("Error description: " . mysqli_error($con));
      }else
          while ($gal = mysqli_fetch_array($items)){

              $nombre = $gal["prioridad"];
              $narchivo = $gal["narchivo"];
              $id = $gal["id"];
          }
      ?>
      <div class="row" style="background-color: ;">
<h1 class="htopbanner" style="text-shadow: 0 0px 15px#ffffff; color: black !important">Musicon</h1><br>
          <h3>La proxima cancion a sonar tiene una prioridad de <?php echo $nombre;?> por lo tanto si usted quiere escuchar esta cancion despues de la que esta sonando debera pagar <?php echo ($nombre+1)*3;?> creditos</h3><br>
          <h3>Estas seguro de que quieres que esta cancion suene despues?</h3>
      </div>
      <form method="post" id="compraform" action="lvl.php">

          <input type="hidden" class="archivo" name="archivo" value="" />

          <?php
          $credi = 0;
          $sql="SELECT * FROM `usuarios` where `nombre` = '".$_COOKIE['musiUser']."'";
          if (!$items =  mysqli_query($con,$sql))
          {
              echo("Error description: " . mysqli_error($con));
          }else
              while ($row = mysqli_fetch_array($items)){
                  $credi = $row['creditos'];

              }
          if($credi > ($nombre+1)*3 - 1){
              echo '<div class="columns large-12" style="background-color: ;">';
              echo '<input type="submit" style="width: 300px;" id="boton"  class="button round" value="Si" />';
              echo '<div style="display:none" id="dvloader"><img src="img/page-loader.gif" /></div>';
          }
          else
              echo '
              <a href="index.php?pg=creditos&red=playlist" class="alert button expand">No tienes suficiente creditos... Compra Aqui!</a>
              ';


          ?>






      </form>




      <a href="index.php?pg=playlist" style="width: 300px;" id="Search"  class="srchlink round button expand">No</a>
          </div>
  </div>



  <?php
echo '<div class="row"><div class="columns large-12"> ';

    if(isset($_GET["flag"]))
        switch($_GET["flag"]){
            case 1:echo '<div data-alert class="alert-box alert radius">Codigo incorrecto.<a href="#" class="close">&times;</a></div>';break;
            case 2:echo '<div data-alert class="alert-box success radius">Credito ingresado exitosamente.<a href="#" class="close">&times;</a></div>';break;
            case 3:echo '<div data-alert class="alert-box info radius">Lo sentimos este codigo ya fue utilizado.<a href="#" class="close">&times;</a></div>';break;
            case 4:echo '<div data-alert class="alert-box info radius">Nombre registrado!.<a href="#" class="close">&times;</a></div>';break;
            case 5:echo '<div data-alert class="alert-box info radius">Solicitud registrada exitosamente!<a href="#" class="close">&times;</a></div>';break;

        }
echo '</div></div>';

  if(isset($_GET["pg"]))
  switch($_GET["pg"]){
  case "inicio":modulo($_GET["pg"]);break;
      case "search":modulo($_GET["pg"]);break;
      case "playlist":modulo($_GET["pg"]);break;
      case "creditos":modulo($_GET["pg"]);break;
      case "musicaFav":modulo($_GET["pg"]);break;
      case "info":modulo($_GET["pg"]);break;


  default:modulo('error');break;
  }
  else
      modulo("inicio");

?>
  <script type="text/javascript">


  </script>
    
    <script src="js/vendor/jquery.js">


    </script>
    <script src="js/foundation.min.js"></script>
  <script type="text/javascript">
      $(function() {
          $("#boton").click(function() {
              $("#dvloader").show();
              $("#compraform").submit();

              return false;
          });
      });
      $(function() {
          $(".ShowLoader").click(function() {
              $("#dvloader").show();
              $("#Search").submit();

              return false;
          });
      });


      $(document).foundation();



    </script>



    
	

  </body>


  
</html>

<script>
    $(function(){
        $(window).bind("load", function () {
            var footer = $("#Footer");
            var pos = footer.position();
            var height = $(window).height();
            height = height - pos.top;
            height = height - footer.height();
            if (height > 0) {
                footer.css({
                    'margin-bot': height + 'px'
                });
            }
        });
    }); // end jquery

</script>