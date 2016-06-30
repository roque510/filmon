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

$query = "select * from `videos` where `Url` = ".$url."";

$data = $database->get("videos", "id", [
	"url" => $url
]);

$foto = $database->get("videos", "foto", [
	"url" => $url
]);

$nombre = $database->get("videos", "nombre", [
	"url" => $url
]);


//select * from `videos` where `id` = (select max(`id`) from `videos` where `id` < 1) PREV



if($url == "")
	$arr = array ('response'=>'error','comment'=> $data);
else
	$arr = array ('response'=>'correcto','newurl'=> $url,'newid'=> $data,'foto'=> $foto,'nombre'=> $nombre,'comment'=> $url);

echo json_encode($arr);

?>