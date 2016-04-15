<?php 

require_once('config.php');

$Nombre = "";
$Url = "";
$Foto = "";

if(isset($_POST['Nombre']))
	$Nombre = $_POST['Nombre'];

if(isset($_POST['Url']))
	$Url = $_POST['Url'];

if(isset($_POST['Foto']))
	$Foto = $_POST['Foto'];

$con = mysqli_connect($SVR,$USR,$PW,$DB);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




if (!$items =  mysqli_query($con,"UPDATE `emisoras`.`videos` SET `Nombre` = '".$Nombre."',`Url` = '".$Url."',`Foto` = '".$Foto."' WHERE `videos`.`Id` = 1;"))
{
    echo("Error description: " . mysqli_error($con));
}

echo '<script>window.location="index.php"</script>';
 ?>