<?php 
require_once("config.php");
require_once("medoo.php");

$id = "";
$url = "";
$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => $DB,
	'server' => $SVR,
	'username' => $USR,
	'password' => $PW,
	'charset' => 'utf8'
]);






if (isset($_POST['url'])) {
	$url = $_POST['url'];
}

if (isset($_POST['id'])) {
	$id = $_POST['id'];
}

$query = "select * from `videos` where `id` = (select max(`id`) from `videos` where `id` < ".$id.")";

$data = $database->query($query)->fetchAll();


//select * from `videos` where `id` = (select max(`id`) from `videos` where `id` < 1) PREV



if($id == "")
	$arr = array ('response'=>'error','comment'=> $url);
else
	$arr = array ('response'=>'correcto','newurl'=> $data[0][2],'newid'=> $data[0][0],'foto'=> $data[0][3],'nombre'=> $data[0][1],'comment'=> $data[0][2]);

echo json_encode($arr);

?>