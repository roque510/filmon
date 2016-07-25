<?php
require("config.php");

$database = new medoo([
          'database_type' => 'mysql',
          'database_name' => $DBM,
          'server' => $SVR,
          'username' => $USR,
          'password' => $PW,
          'charset' => 'utf8'
        ]);

$user = $database->select("users", [
	"username",
	"email",
	"mem_expire",
	"id"

], [
	"username" => $_SESSION['usrm']
]); //saca el usuaroi de la sesion

//busca hijos de la sesion
$children = $database->select("user_parent", "*", [
	"parent_id" => $user[0]["id"]
]);









$q = "";
//chekea si hay algun query en especifico
	if (isset($_GET['q'])) {
		$q = $_GET['q'];
	}
	if ($q != "") {
	$children = $database->select("users", "*", [
	"username" => $q
]);
}


 ?>
<DIV class="ROW">
	<div class="columns large-12 downLine">
		<div class="row collapse">
    		<div class="large-8 small-9 columns">
      			<input id="searchUser" type="text" value="<?php echo $q; ?>" placeholder="Filtra por usuario o correo">
    		</div>

    		<div class="large-4 small-3 columns">
      			<a id="finduser" href="#" class="alert button expand">Buscar</a>
    		</div>
  		</div>
	</div>
</DIV>
<div class="row" style="">

<div class="row">
	<div class="columns large-2 small-2 titles" >Usuario</div>
	<div class="columns large-3 small-3 titles" >Correo</div>
	<div class="columns large-2 small-2 titles" >Fecha Exp</div>
	<div class="columns large-2 small-2 titles" >status</div>
	<div class="columns large-2 small-2 titles" >Patrocinado</div>
</div>
<?php 
foreach($children as $child)
{
	
if ($q != "") {
	$userc = $database->select("users", "*", [
	"username" => $q
]);
}else
	$userc = $database->select("users", [
	"username",
	"email",
	"mem_expire",
	"id"

], [
	"id" => $child['user_id']
]); 
	

	$add = "<div idUser='".$userc[0]["id"]."' class='ag button'>Agregar 30 Dias</div>";
	$hijo = "No Tomado";

	if($q != "")
		$valueid = $child['id'];
	else{
		$valueid = $child['user_id'];
	}

if ($database->has("user_parent", [
	"user_id" => $valueid
]))
{
	$hijo = "Tomado";
	$padre = $database->select("user_parent", [
	"parent_id"

	], [
	"user_id" => $valueid
	]);

	if($padre[0]["parent_id"] == $user[0]["id"]){

		$hijo = "suyo";
	}
}
else
{
	$add = "";
	$hijo = "<div idUser='".$userc[0]["id"]."' idSession='".$_SESSION["usrm"]."' class='button tomar'>Tomar</div>";
}



	echo '
	<div class="row">
	<div class="columns large-2 subti" >'.$userc[0]["username"] .'</div>
	<div class="columns large-3 subti" >'.$userc[0]["email"] .'</div>
	<div class="columns large-2 subti" >'.$userc[0]["mem_expire"] .'</div>';
	$datel = date('Y-m-d h:i:s', time());
		
		//$nxtdate = new DateTime(implode($date));
		//echo $nxtdate;
		if ($datel > $userc[0]['mem_expire']){
	  		$stat = "<div style='color:red; text-shadow:0.1em 0.1em 0.1em black !important;'>vencido</div>
			
	  		".$add;
		}
		else {
  			$stat = "<div style='color:lightgreen; text-shadow:0.1em 0.1em 0.1em black !important;'>vigente</div>";
		}
		echo'
	<div class="columns large-2 subti" >'.$stat.'</div>
	<div class="columns large-2 titles" >'.$hijo.'</div>
	</div>

	<br/>';
}  

 ?>
</div>
