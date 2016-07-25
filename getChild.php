<?php 
require("config.php");
require_once("medoo.php");

$user = "";
$session = "";
$id = "w";
$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => $DBM,
	'server' => $SVR,
	'username' => $USR,
	'password' => $PW,
	'charset' => 'utf8'
]);

if (isset($_POST['user'])) {
	$user = $_POST['user'];
}
if (isset($_POST['session'])) {
	$session = $_POST['session'];
}




$iduser = $database->get("users","id",["username" => $session]);
$queryA = "INSERT INTO `membresias`.`user_parent` (`user_id`, `parent_id`) VALUES ('".$user."', '".$iduser."');";

$data = $database->query($queryA)->fetchAll();



if($id == "")
	$arr = array ('response'=>'error','comment'=> "noid");
else
	$arr = array ('response'=>'correcto','nombre'=> $iduser,'comment'=> $user);

echo json_encode($arr);

?>