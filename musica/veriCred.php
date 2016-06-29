<?php

require_once("config.php");
/**
 * Created by PhpStorm.
 * User: Armando Roque
 * Date: 9/07/15
 * Time: 15:26
 */

//flag 1 significa codigo malo
//flag 2 significa codigo correcto

$con = mysqli_connect($SVR,$USR,$PW,$DB);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$busqueda = "";

if(isset($_POST["busqueda"]))
    $busqueda = $_POST["busqueda"];

if(isset($_POST["red"]))
    $red = $_POST["red"];



if(isset($_POST["creditos"]))
    $codigoi = $_POST["creditos"];
else
    echo '<script>window.location="index.php?pg=creditos&flag=1</script>';

function validar_rut($codigo){

    $digito_v = substr($codigo,0,1);

    $rut = substr($codigo,1,9);

    $comp = 11; //<-----------------------------------------------------------------------------------

    if(substr($codigo,1,2) != $comp){
        $verificado = false;
        return $verificado;
    }


    if ($rut == ""){
        $verificado=false;
        return $verificado;
    }

    $x=2;
    $sumatorio=0;
    for ($i=strlen($rut)-1;$i>=0;$i--){
        if ($x>7){$x=2;}
        $sumatorio=$sumatorio+($rut[$i]*$x);
        $x++;
    }
    $digito=$sumatorio%11;
    $digito=11-$digito;

    switch ($digito){
        case 10:
            $digito="k";
            break;
        case 11:
            $digito="0";
            break;
    }

    if (strtolower($digito_v)==$digito){
        $verificado=true;
    } else {
        $verificado=false;
    }

    return $verificado;
}


if(validar_rut($codigoi))
{

    require_once("config.php");

    $value = 0;
    $permiso = true;

    $con = mysqli_connect($GLOBALS["SVR"],$GLOBALS["USR"],$GLOBALS["PW"],$GLOBALS["DB"]);
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql="SELECT * FROM `codi` where `co` = '".md5($codigoi)."'";
    if (!$items =  mysqli_query($con,$sql))
    {
        echo("Error description: " . mysqli_error($con));
    }else
        if ( mysqli_num_rows($items ) > 0 )
        {
            $permiso = false;
            echo '<script>window.location="index.php?pg=creditos&flag=3&busqueda='.$busqueda.'"</script>';
        }

    if($permiso){
        if (!$items =  mysqli_query($con,'INSERT INTO `musicon`.`codi` (`co`, `cantidad`) VALUES ("'.md5($codigoi).'", "15"); '))
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


        $credi += 15;

        if (!$items =  mysqli_query($con,"UPDATE `musicon`.`usuarios` SET `creditos` = '".$credi."' WHERE `usuarios`.`nombre` = '".$_COOKIE['musiUser']."';"))
        {
            echo("Error description: " . mysqli_error($con));
        }


        if ($red != "")
            echo '<script>window.location="index.php?pg='.$red.'&flag=2"</script>';
        else
        echo '<script>window.location="index.php?pg=search&flag=2&busqueda='.$busqueda.'"</script>';
    }
    else
    {

            echo '<script>window.location="index.php?pg=creditos&flag=1&busqueda='.$busqueda.'"</script>';


    }



}
else
{
    echo '<script>window.location="index.php?pg=creditos&flag=1&busqueda='.$busqueda.'"</script>';
}

?>