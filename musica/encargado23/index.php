<?php
/**
 * Created by PhpStorm.
 * User: Armando Roque
 * Date: 12/09/15
 * Time: 15:41
 */
require_once("../funciones.php");
require_once("../config.php");
?>


<!doctype html>
<html class="no-js" lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Karaoke | Musicon</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/aroqueStyle.css" />
    <script src="../js/vendor/modernizr.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script src="../js/musicon.js"></script>
</head>
<body class="body1" >



<a href="index.php"><h1 style="margin-top: 10px; margin-bottom: 50px; text-shadow: 0 0px 15px#ffffff; font-size: 50px"  id="home" class="htopbanner">Solicitudes</h1></a>
<?php




$con = mysqli_connect($GLOBALS["SVR"],$GLOBALS["USR"],$GLOBALS["PW"],$GLOBALS["DB"]);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql="SELECT * FROM `usuarios` where `status` = '1' and `pc` = '".$MAQUINA."' ";
if (!$items =  mysqli_query($con,$sql))
{
    echo("Error description: " . mysqli_error($con));
}else
    while ($row = mysqli_fetch_array($items)){

        echo '
        <div class="row">
            <form  id="aproveform" action="aprove.php" method="post">
            <input type="hidden" name="idp" value="'.$row["id"].'">

            </form>
            <a id="idaprov" class="ShowLoader"><div class="large-2 columns small-3"><img src="../img/aprobar.png"/></div></a>
            <div class="large-10 columns">
              <p class="htopbanner"><strong style="font-size:40px; text-shadow:0.2em 0.2em 0.2em black;">'.$row['nick'].' con id: '.$row['id'].'</strong><br>Esta solicitando credito desde las '.$row['hora'].'.</p>

            </div>
          </div>
          <div style="display:none" id="dvloader" ><img src="../img/page-loader.gif" /></div>


          <hr/>';


        $credi = $row['creditos'];

    }

?>

<script>
    $(function() {
        $(".ShowLoader").click(function() {

            $("#dvloader").show();
            $("#aproveform").submit();


            return false;
        });
    });

    document.getElementById("idaprov").onclick = function() {
        document.getElementById("aproveform").submit();
    }
</script>


</body>
</html>