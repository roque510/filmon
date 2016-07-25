<?php 
require("config.php");
require_once("medoo.php");

$id = "";
$url = "";
$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => $DBM,
	'server' => $SVR,
	'username' => $USR,
	'password' => $PW,
	'charset' => 'utf8'
]);

if (isset($_POST['id'])) {
	$id = $_POST['id'];
}

$queryA = "UPDATE `users` SET `mem_expire` = DATE_ADD(`mem_expire` , INTERVAL 30 DAY) WHERE `id` = ".$id;


$data = $database->query($queryA)->fetchAll();



if($id == "")
	$arr = array ('response'=>'error','comment'=> "noid");
else
	$arr = array ('response'=>'correcto','nombre'=> $id,'comment'=> $id);

echo json_encode($arr);

?>