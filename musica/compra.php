<?php
/**
 * Created by PhpStorm.
 * User: Armando Roque
 * Date: 22/06/15
 * Time: 21:19
 */




require_once("config.php");



$artista = $_POST["artista"];
$archivo = $_POST["archivo"];
$search = $_POST["search"];

$con = mysqli_connect($SVR,$USR,$PW,$DB);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$credi = 0;
$sql="SELECT * FROM `usuarios` where `nombre` = '".$_COOKIE['musiUser']."'";
if (!$items =  mysqli_query($con,$sql))
{
    echo("Error description: " . mysqli_error($con));
}else
    while ($row = mysqli_fetch_array($items)){
        $credi = $row['creditos'];

    }

$credi-=3;
//si es menor de 3 regresar con flag 4 de creditos insuficientes

if (!$items =  mysqli_query($con,'UPDATE `musicon`.`usuarios` SET `creditos` = "'.$credi.'" WHERE `usuarios`.`nombre` = "'.$_COOKIE['musiUser'].'";'))
{
    echo("Error description: " . mysqli_error($con));
}

/*-----------------*/

$fav = 0;
$sql="SELECT * FROM `musica` where `narchivo` = '".$archivo."'";
if (!$items =  mysqli_query($con,$sql))
{
    echo("Error description: " . mysqli_error($con));
}else
    while ($row = mysqli_fetch_array($items)){
        $fav = $row['contador'];

    }

$fav++;

if (!$items =  mysqli_query($con,'UPDATE `musicon`.`musica` SET `contador` = "'.$fav.'" WHERE `musica`.`narchivo` = "'.$archivo. '";'))
{
    echo("Error description: " . mysqli_error($con));
}


if (!$items =  mysqli_query($con,'INSERT INTO `musicon`.`playlist` (`id`, `narchivo`, `nombre`, `prioridad`, `numpc`) VALUES (NULL, "'.$archivo.'", "'.$artista.'", "1","'.$MAQUINA.'"); '))
{
    echo("Error description: " . mysqli_error($con));
}

echo '<script>window.location="index.php?pg=search&busqueda='.$search.'"</script>';

?>