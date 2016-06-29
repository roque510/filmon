<?php
date_default_timezone_set(timezone_name_from_abbr("America/Tegucigalpa"));
/**
 * Created by PhpStorm.
 * User: Armando Roque
 * Date: 12/09/15
 * Time: 12:15
 */

$busqueda = "";

$red="creditos";
if(isset($_POST["busqueda"]))
    $busqueda = $_POST["busqueda"];
if(isset($_POST["red"]))
    $red = $_POST["red"];

require_once("config.php");

$con = mysqli_connect($GLOBALS["SVR"],$GLOBALS["USR"],$GLOBALS["PW"],$GLOBALS["DB"]);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


if (!$items =  mysqli_query($con,"UPDATE `musicon`.`usuarios` SET `status` = '1',`hora` = '".date("Y-m-d H:i:s")."',`pc` = '".$MAQUINA."' WHERE `usuarios`.`nombre` = '".$_COOKIE['musiUser']."';"))
{
    echo("Error description: " . mysqli_error($con));
}
echo '<script>window.location="index.php?pg='.$red.'&flag=5&busqueda='.$busqueda.'"</script>';

?>

