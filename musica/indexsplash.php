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





  <h1 style="margin-top: 50px; margin-bottom: 50px; text-shadow: 0 0px 15px#ffffff; font-size: 100px"  id="home" class="htopbanner">Musicón</h1>


  <body class="body1">
  <div class="row" style="margin-bottom:35px; ">
      <?php
      if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false  )
      {
          // User agent is Google Chrome
      ?>

      <nav class="radial fade-in one">
          <input type="1checkbox" id="menu" unchecked>
          <a href="index.php?pg=musicaFav" class="fa fa-question ">favs</a>
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

  </div>


  <div class="row">

      <h1 class="htopbanner"> ¡Usar Musicón es muy sencillo! </h1>
      <div style="text-align: center; color: #ffffff" class="columns large-12">

          Basta con ingresar al final de la dirección URL de tu navegador el nombre del negocio.

      </div>
  </div>

  <div class="row">


      <hr>

      <h1 class="htopbanner"> Así: </h1>

      <div style="text-align: center" class="columns large-12 medium-12 small-12">

          <div style="height: 50px; margin-top: 15px;"> <img src="img/url.png" alt="Smiley face" height="42" width="369">  </div>

      </div>


      <div style="text-align: center" class="columns large-12 medium-12 small-12"> <h4 style="color: #ffffff" class=""> (Sin las comillas "") </h4> </div>


  </div>

  <div class="row">


      <hr>
      <h1 class="htopbanner"> ¡Recuerda que aquí escuchas la música que quieres, cuando quieres!
      </h1>

      <div style="text-align: center" class="columns large-12 medium-12 small-12">


      </div>


      <div style="text-align: center" class="columns large-12 medium-12 small-12"> <h4 style="color: #ffffff" class=""> Cuando ingreses, solicita en caja o a tu mesero que recarguen tu sesión con créditos Musicón, arma tu playlist y disfruta!  </h4> </div>

  </div>


  <hr>

  <h1 class="htopbanner"> ¿Estás Interesado? </h1>
  <h4 style="text-align: center; color: #ffffff" class="">  <br>
      ¡Aprovecha al máximo tu negocio!<br>
      Comunícate con nosotros 9689-5978. </h4>


  <div style="height: 80px; opacity: 1" class="row">

  </div>

