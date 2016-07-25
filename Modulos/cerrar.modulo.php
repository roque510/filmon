<?php
require_once('medoo.php');
require_once('funciones.php');
require('config.php');

$database = new medoo([
          'database_type' => 'mysql',
          'database_name' => $DBM,
          'server' => $SVR,
          'username' => $USR,
          'password' => $PW,
          'charset' => 'utf8'
        ]);

if(isset($_COOKIE['m09215'])){

      if ($database->has("users", [
      "cook" => $_COOKIE['m09215']
  ]
))
      {

        $idmem = $database->get("users", "membership_id", [
  "username" => $_SESSION['usrm']
]);

        ?>

        <div class="row container" style="background-color:;">
          <div class="large-3 columns" style="background-color:;" ></div>
          <div class="large-3 columns" style="background-color:;" ></div>
          <div class="large-6 columns" style="background-color:;" >
            <div class="button-group">
              <a class="button" href="#" onclick="infomem()" >Actualiza tu membresia!</a>
              <a class="button" href="cerrar.php" >Cerrar Sesion</a>
              <?php if ($idmem == 10) {
                echo '<a href="?pg=Autorizaciones" class="button">Autorizaciones</a>';
              }?>
            </div>
          </div>
  			<!--div class="large-offset-6 small-6 large-3 columns"  >
			<a class="button" href="#" onclick="infomem()" >Actualiza tu membresia!</a>
  		</div-->
  		<!--div class="small-4 large-3 columns" >
			<a class="button" href="cerrar.php" >Cerrar Sesion</a>
  		</div-->
      <?php if ($idmem == 10) {
        
      }?>
  		<!-- div class="columns large-3 small-4">Autorizaciones</div-->
		</div>

        <?php

      }
      else
      {
       //kill sessions and cookies
      	unset($_COOKIE['m09215']);
    	setcookie('m09215', null, -1, '/');
      	session_start();
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit();
      }

    }
    else{
      //kill sessions and cookies
    	unset($_COOKIE['m09215']);
    	setcookie('m09215', null, -1, '/');
    	session_start();
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit();
	}

?>
