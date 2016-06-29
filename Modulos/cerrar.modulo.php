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
        ?>

        <div class="row">
  			<div class="large-offset-6 small-6 large-3 columns" >
			<a class="button" href="#" onclick="infomem()" >Actualiza tu membresia!</a>
  		</div>
  		<div class="small-6 large-3 columns" >
			<a class="button" href="cerrar.php" >Cerrar Sesion</a>
  		</div>
  		<div class="columns"><!-- ... --></div>
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
