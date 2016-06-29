<?php 
require_once ('medoo.php');
require_once('funciones.php');
require_once('config.php');
session_start();



$alias = "";
$pass = "";
$admin = "no es admin";

if (isset($_POST['usuario'])) {
	$alias = $_POST['usuario'];
}
if (isset($_POST['pass'])) {
	$pass = SHA1($_POST['pass']);
}

$database = new medoo([
          'database_type' => 'mysql',
          'database_name' => $DBM,
          'server' => $SVR,
          'username' => $USR,
          'password' => $PW,
          'charset' => 'utf8'
        ]);



if ($database->has("users", [
	"AND" => [
		"OR" => [
			"username" => $alias
		]
		
		,
		"password" => $pass
	]
]))
{
	$digits = 5;
	$token = rand(pow(10, $digits-1), pow(10, $digits)-1);

	$cookie_name = "m09215";
	$cookie_value = md5($token);

	if(!isset($_COOKIE[$cookie_name])) {
    	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    	$database->update("users", [
			"cook" => $_COOKIE[$cookie_name]
		], [
			"username" => $alias
		]);
	} else {
    $valorT = $database->get("users", [
	"cook"
	], [
		"username" => $alias
	]);

	if ($valorT['cook'] != $_COOKIE[$cookie_name]) {
		$database->update("users", [
			"cook" => $_COOKIE[$cookie_name]
		], [
			"username" => $alias
		]);
		
	}


	}

	
	
	
	$_SESSION['usrm'] = $alias;


	$profile = $database->get("users", [
	"membership_id"
	], [
		"username" => $alias
	]);

	$date = $database->get("users", [
	"mem_expire"
	], [
		"username" => $alias
	]);	

	
	if ($profile['membership_id'] > 0) {
		if (new DateTime() > new DateTime(implode($date))){
	  		$_SESSION['date'] = "vencido";
		}
		else {
  			$_SESSION['date'] = "vigente";
		}
	}
	else
		$_SESSION['date'] = "vencido";


	
	$arr = array ('response'=>'correcto','user'=> $alias, 'comment'=> 'Bienvenido, '.$alias);
	echo json_encode($arr);
}
else
{
	$arr = array ('response'=>'Error','comment'=> 'Usuario o Contraseña incorrecta.' );
	echo json_encode($arr);
}





?>