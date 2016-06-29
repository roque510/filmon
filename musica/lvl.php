<?php

require_once("config.php");


$archivo = $_POST["archivo"];
$nombre = 0;

$con = mysqli_connect($SVR,$USR,$PW,$DB);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

    if (!$items =  mysqli_query($con,'SELECT * FROM `playlist` where `numpc` = "'.$MAQUINA.'" order by `prioridad` desc limit 1 '))
    {
        echo("Error description: " . mysqli_error($con));
    }else
        while ($gal = mysqli_fetch_array($items)){

            $nombre = $gal["prioridad"];
            $nombre++;

        }

    if (!$items =  mysqli_query($con,'UPDATE `musicon`.`playlist` SET `prioridad` = "'.$nombre.'" WHERE `numpc` = "'.$MAQUINA.'" and `narchivo` = "'.$archivo.'";'))
    {
        echo("Error description: " . mysqli_error($con));


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

$credi-=$nombre*3;

if (!$items =  mysqli_query($con,'UPDATE `musicon`.`usuarios` SET `creditos` = "'.$credi.'" WHERE `usuarios`.`nombre` = "'.$_COOKIE['musiUser'].'";'))
{
    echo("Error description: " . mysqli_error($con));
}

    echo '<script>window.location="index.php?pg=playlist&flag=4"</script>';




?>