<?php
/**
 * Created by PhpStorm.
 * User: Armando Roque
 * Date: 13/09/15
 * Time: 12:33
 */


require_once("../config.php");

$con = mysqli_connect($GLOBALS["SVR"],$GLOBALS["USR"],$GLOBALS["PW"],$GLOBALS["DB"]);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$credi = 0;
$sql="SELECT * FROM `usuarios` where `id` = '".$_POST['idp']."'";
if (!$items =  mysqli_query($con,$sql))
{
    echo("Error description: " . mysqli_error($con));
}else
    while ($row = mysqli_fetch_array($items)){
        $credi = $row['creditos'];

    }


$credi += 15;
if (!$items =  mysqli_query($con,"UPDATE `musicon`.`usuarios` SET `status` = '0',`creditos` = '".$credi."' WHERE `usuarios`.`id` = '".$_POST['idp']."';"))
{
    echo("Error description: " . mysqli_error($con));
}

echo '<script>window.location="index.php"</script>';

?>