<?php
/**
 * Created by PhpStorm.
 * User: Armando Roque
 * Date: 8/07/15
 * Time: 19:18
 */







$rut="41261533"; // aqui el RUT





?>


<div class="row">
    <div class="columns large-12">
        <!--form style="text-align: center" id="CrediForm" action="soliCredi.php" method="post">
            <fieldset>
                <legend class="htopbanner fade-in one " style="font-size: 40px; background-color: transparent;">Escribe tu numero de celular o tu nombre aqui!</legend>

                <div class="row">
                    <div class="columns large-8">
                        <input style="text-align: center; font-size: 2em; color: #000000; padding: 20px 10px; line-height: 35px;"  name="creditos" type="text" placeholder="Ejmp. 33095555 o Armando">
                    </div>

                    <input name="busqueda" type="hidden" value="<?php if(isset($_GET['busqueda'])) echo $_GET['busqueda']; else echo ""; ?>" ">
                    <input name="red" type="hidden" value="<?php if(isset($_GET['red'])) echo $_GET['red']; else echo ""; ?>" ">
                    <a role="button" href="#"  id="SubmitCred" style="border-radius: 5px" class="ShowLoader button success columns large-4">OK!</a>
                </div>


            </fieldset>
        </form -->
        <?php
        $nick = "";
        $idn = "";
        if(!isset($_COOKIE['musiUser']))
        $nick = "";
        if(isset($_COOKIE['musiUser'])){
            require_once("config.php");

            $con = mysqli_connect($GLOBALS["SVR"],$GLOBALS["USR"],$GLOBALS["PW"],$GLOBALS["DB"]);
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $sql="SELECT * FROM `usuarios` where `nombre` = '".$_COOKIE['musiUser']."'";
            if (!$items =  mysqli_query($con,$sql))
            {
                echo("Error description: " . mysqli_error($con));
            }else
                while ($row = mysqli_fetch_array($items)){
                    $nick = $row['nick'];
                    $idn = $row['id'];

                }

            if($nick == ""){

        ?>
                <form style="text-align: center" id="CrediForm" action="ingresaNomb.php" method="post">
                    <fieldset>
                        <legend class="htopbanner fade-in one " style="font-size: 40px; background-color: transparent;">Escribe tu nombre aqui!</legend>

                        <div class="row">
                            <div class="columns large-8">
                                <input style="text-align: center; font-size: 1em; color: #000000; padding: 20px 10px; line-height: 35px;"  name="nick" type="text" placeholder="Ejmp. Armando">
                            </div>


                            <input name="busqueda" type="hidden" value="<?php if(isset($_GET['busqueda'])) echo $_GET['busqueda']; else echo ""; ?>" ">
                            <input name="red" type="hidden" value="<?php if(isset($_GET['red'])) echo $_GET['red']; else echo ""; ?>" ">

                            <a role="button" href="#"  id="SubmitCred" style="border-radius: 5px" class="ShowLoader button success columns large-4">OK!</a>
                        </div>


                    </fieldset>
                </form >
        <?php

            }//if nick != ""
            else{
                echo "<h1 class='htopbanner' style='text-shadow:0.2em 0.2em 0.2em black;' >Bienvenido, ".$nick." su id es ".$idn." </h1>";

        ?>

                <form style="text-align: center" id="CrediForm" action="soliCred.php" method="post">
                    <fieldset>
                        <legend class="htopbanner fade-in one " style="text-shadow:0.1em 0.1em 0.1em black; font-size: 35px; background-color: transparent;">Para solicitar credito pulsa el boton y dile al encargado que te acredite.</legend>




                            <input name="busqueda" type="hidden" value="<?php if(isset($_GET['busqueda'])) echo $_GET['busqueda']; else echo ""; ?>" ">

                            <a role="button" href="#"  id="SubmitCred" style="border-radius: 5px" class="ShowLoader button success columns large-12">Solicitar Credito!</a>
                </div>


                    </fieldset>
                </form >
        <?php

            }



        }// if isset cookie musiuser

        ?>


        <div style="display:none" id="dvloader" ><img src="../img/page-loader.gif" /></div>

    </div>
</div>
<script>
    $(function() {
        $(".ShowLoader").click(function() {

            $("#dvloader").show();
            $("#CrediForm").submit();


            return false;
        });
    });

    document.getElementById("SubmitCred").onclick = function() {
        document.getElementById("CrediForm").submit();
    }

</script>