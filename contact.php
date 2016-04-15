<!DOCTYPE html>
<html>
<head style="background-color: red;"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Musicon | Bienvenido</title>
      <link rel="stylesheet" href="css/foundation.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/aroqueStyle.css" />
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="js/vendor/modernizr.js"></script>
      <script src="js/musicon.js"></script>
      <script src="audiojs/audio.min.js"></script>
      <link rel="stylesheet" href="includes/index.css" media="screen">
      <script> audiojs.events.ready(function() { audiojs.createAll(); }); </script>
  </head>
<body style="background: #1b1c1c; ">

<h1 style="margin-top: 50px; margin-bottom: 50px; text-shadow: 0 0px 15px#ffffff; font-size: 100px"  id="home" class="htopbanner">Musicon</h1>

  <h1 id="modalTitle" class="" style="color: #fff !important; font-family: lobster; font-size: 80px; ">Deseas <span style="color:#cf2949; "> mas informacion?</span></h1>
  
  <form method="post" action="contacto.php">
  <div class="row" style="color: #fff !important; font-family: lobster; text-shadow: 0em 0em 0em black !important; ">
    <div class="medium-6 columns">
      <label style="font-size: 40px; color: #fff !important;">Nombre
        <input type="text" name="name" placeholder="Nombre">
      </label>
    </div>
    <div class="medium-6 columns">
      <label style="font-size: 40px; color: #fff !important;">Correo
        <input type="text" name="correo" placeholder="correo@email.com">
      </label>
    </div>
    
  </div>
  <div class="row" style="color: #fff !important; font-family: lobster; text-shadow: 0em 0em 0em black !important;" >
    <div class="small-3 columns">
      <label style="font-size: 30px; color: #fff !important;" for="middle-label" class="text-right middle">Telefono</label>
    </div>
    <div class="small-3 columns">
      <input type="number" name="area" id="middle-label" placeholder="Codigo de area">
    </div>
    <div class="small-6 columns">
      <input type="number" name="cel" id="middle-label" placeholder="numero de celular">
    </div>
    
  </div>

<label class="columns large-12" style="color: #fff !important; font-family: lobster; font-size:40px;  text-shadow: 0em 0em 0em black !important;">
  Mensaje
  <textarea placeholder="None" name="mensaje"></textarea>
</label>

<button type="submit" class="columns large-12 expand button">Enviar</button>
</form>

  <a class="close-reveal-modal" aria-label="Close">&#215;</a>

</body>
</html>
