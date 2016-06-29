<script>
    function doalert(obj) {


        var str = obj.getAttribute("href");

        var arr = str.split("/");
        var text = "";

        var Nombre = decodeURI(arr[0]);//7 SERVIDOR 8 LOCALHOST
        var Artista = decodeURI(arr[1]);//4 SERVIDOR 5 LOCALHOST
        var archivo = decodeURI(arr[2]);//4 SERVIDOR 5 LOCALHOST
        var search = decodeURI(arr[3]);//4 SERVIDOR 5 LOCALHOST

        $('.nombreCancion').html(Nombre);
        $('.nombreArtista').html(Artista);


        $(".artista").attr('value', Artista);
        $(".archivo").attr('value', archivo);
        $(".search").attr('value', search);


        return false;
    }
</script>
<legend class="htopbanner fade-in one columns large-12" style="font-size: 40px; background-color: transparent;">Musicon TOP 10!</legend><br><br>
<?php
/**
 * Created by PhpStorm.
 * User: Armando Roque
 * Date: 20/07/15
 * Time: 15:29
 */


require_once("config.php");



$value = 0;

$con = mysqli_connect($GLOBALS["SVR"],$GLOBALS["USR"],$GLOBALS["PW"],$GLOBALS["DB"]);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sqle="SELECT * FROM `musica` where `contador` > 0 order by `contador` desc limit 10";
if (!$itemts =  mysqli_query($con,$sqle))
{
echo("Error description: " . mysqli_error($con));
}else

while ($ruow = mysqli_fetch_array($itemts)){
    $value++;

    if($ruow['Nombre'] == ""){
        echo '
        <div class="row">
    <h3 style="text-align:center; padding-top: 10px" class="htopbanner columns large-1 small-1 ">
        '.$value.'
    </h3>
    <div class="columns large-11 small-11 medium-11" style="overflow:hidden; height: 70px; border: 2pt dashed black; background-color: rgba(211, 214, 220, 0.51);" >
        <div class="columns large-10 small-10 medium-10" style="background-color:;">
            <h4 class="playtext">
                '. $ruow['NArchivo'] .'
            </h4>
        </div>
        <div class="columns large-2 small-2 medium-2" style="overflow:hidden; background-color:; margin-top:0px; padding-top:10px; height:70px;">
            <a   href="'. $ruow['NArchivo'] .'/'. $ruow['Artista'] .'/'. $ruow['NArchivo'] .'/'. $ruow['NArchivo'] .'" data-reveal-id="comprar" onkeypress="return doalert(this);" onclick="return doalert(this);">
                <div  style="" class="squircle2 clickable">
                </div>
            </a>
        </div>


    </div>
</div>

    ';}
    else
    {
        echo '

        <div class="row">
            <h3 style="text-align:center; padding-top: 10px" class="htopbanner columns large-1 small-1 ">
                '.$value.'
            </h3>
            <div class="columns large-11 small-11 medium-11" style="overflow:hidden; height: 70px;border: 2pt dashed black; background-color: rgba(211, 214, 220, 0.51);">
                <div class="columns large-10 small-10 medium-10" style="background-color:;">
                <h4 class="playtext">
                    '. $ruow['Nombre'] .'
                </h4>
                <span style="color:black">
                    '. $ruow['Artista'].'
                </span>
                </div>
                <div class="columns large-2 small-2 medium-2" style="overflow:hidden; background-color:; margin-top:0px; padding-top:10px; height:70px;">
            <a   href="'. $ruow['Nombre'] .'/'. $ruow['Artista'] .'/'. $ruow['NArchivo'] .'/'. $ruow['NArchivo'] .'" data-reveal-id="comprar" onkeypress="return doalert(this);" onclick="return doalert(this);">
                <div  style="" class="squircle2 clickable">
                </div>
            </a>
        </div>
            </div>
        </div>

        ';

    }

}


    ?>
<hr>



