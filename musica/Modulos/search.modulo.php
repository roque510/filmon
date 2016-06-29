<?php
/**
 * Created by PhpStorm.
 * User: Armando Roque
 * Date: 19/06/15
 * Time: 15:50
 */

if(isset($_GET['busqueda'])){
    echo '<script>musicaSearch("'.$_GET['busqueda'].'");

    function musicaSearch(str) {




        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("musica").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET","getmusica.php?q="+str,true);
            xmlhttp.send();
        }


    }



    </script>';}



?>
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
        $(".srchlink").attr('href', "index.php?pg=creditos&busqueda="+Nombre);


        return false;
    }
</script>

<?php
$sugerencias = array
(
    array(0,"Vicente Fernandez"),
    array(1,"Pitbull"),
    array(2,"Enanitos Verdes"),
    array(3,"Heroes del Silencio"),
    array(4,"Aerosmith"),
    array(5,"Soda Stereo"),
    array(6,"Queen"),
    array(7,"Los Temerarios"),
    array(8,"Rancheras"),
    array(9,"Calvin Harris"),
    array(10,"Daft Punk"),
    array(11,"Showtek"),
    array(12,"Plan B"),
    array(13,"J. Balvin"),
    array(	14	,	"Reggae"),
array(	15	,	"Regueton"),
array(	16	,	"SALSA"),
array(	17	,	"SELENA"),
array(	18	,	"SHAKIRA"),
array(	19	,	"SONORA SANTANERA"),
array(	20	,	"Alejandro Fernandez"),
array(	21	,	"Alpha Blondy"),
array(	22	,	"Antonio Aguilar"),
array(	23	,	"BACHATA"),
array(	24	,	"Bachateros"),
array(	25	,	"BAILABLES"),
array(	26	,	"BALADAS CLASICAS EN INGLES"),
array(	27	,	"BANDA GORDA"),
array(	28	,	"BARRIO MUSIC"),
array(	29	,	"BRONCO"),
array(	30	,	"El Recodo"),
array(	31	,	"Black Eyed Peas"),
array(	32	,	"Blues"),
array(	33	,	"Brindis"),
array(	34	,	"CAMILO SESTO"),
array(	35	,	"CELIA CRUZ"),
array(	36	,	"CHAYANNE"),
array(	37	,	"CHELO"),
array(	38	,	"CHRISTIAN CASTRO"),
array(	39	,	"COLECCION DE ROCK"),
array(	40	,	"CORNELIO REYNA"),
array(	41	,	"CORRIDOS DE CABALLOS"),
array(	42	,	"Country"),
array(	43	,	"CREEDENCE"),
array(	44	,	"Cantinero"),
array(	45	,	"DJ"),
array(	46	,	"ELVIS CRESPO"),
array(	47	,	"EMINEM"),
array(	48	,	"ENANITOS VERDES"),
array(	49	,	"ENRIQUE IGLESIAS"),
array(	50	,	"EQUIPOS DE FUTBOL 	"),
array(	51	,	"EXITOS"),
array(	52	,	"EZEQUIEL PEÑA"),
array(	53	,	"Español Del Recuerdo"),
array(	54	,	"Calipso"),
array(	55	,	"Exterminador"),
array(	56	,	"GILBERTO SANTA ROSA"),
array(	57	,	"GRUPO MIRAMAR"),
array(	58	,	"Gruperas"),
array(	59	,	"HEROES"),
array(	60	,	"JOAN SEBASTIAN"),
array(	61	,	"JOHN LENNON"),
array(	62	,	"JOSE ALFREDO JIMENEZ"),
array(	63	,	"JOSE FELICIANO"),
array(	64	,	"JOSE JOSE"),
array(	65	,	"JUAN GABRIEL"),
array(	66	,	"JUAN Y JUNIOR"),
array(	67	,	"JULIO IGLESIAS"),
array(	68	,	"Javier Solis"),
array(	69	,	"Juan Luis Guerra"),
array(	70	,	"Juanes"),
array(	71	,	"Kpaz De La Sierra"),
array(	72	,	"LA LEY"),
array(	73	,	"LEO DAN"),
array(	74	,	"LEONARDO FAVIO"),
array(	75	,	"LOS 007"),
array(	76	,	"ANGELES NEGROS"),
array(	77	,	"BUKIS"),
array(	78	,	"IRACUNDOS"),
array(	79	,	"TEMERARIOS"),
array(	80	,	"TIGRES DEL NORTE"),
array(	81	,	"LOS TRI-O"),
array(	82	,	"TUCANES"),
array(	83	,	"LUCHA VILLA"),
array(	84	,	"LUCIA MENDEZ"),
array(	85	,	"LUCKY DUBE"),
array(	86	,	"LUPILLO RIVERA"),
array(	87	,	"Leodan"),
array(	88	,	"Huracanes Del Norte"),
array(	89	,	"Los Panchos"),
array(	90	,	"Tigres Del Norte	"),
array(	91	,	"MANA"),
array(	92	,	"MARC ANTONY"),
array(	93	,	"MARCO ANTONIO SOLIS"),
array(	94	,	"MARIACHI LOCO"),
array(	95	,	"MARISELA"),
array(	96	,	"METALLICA"),
array(	97	,	"MEXICANOS"),
array(	98	,	"MOCEDADES"),
array(	99	,	"MODA 2002"),
array(	100	,	"MOTIVOS"),
array(	101	,	"Marisela"),
array(	102	,	"Merengue"),
array(	103	,	"Mexicanisimo"),
array(	104	,	"Monchy Y Alexandra"),
array(	105	,	"Musica De Navidad"),
array(	106	,	"Motivos Para Recordar"),
array(	107	,	"NAT KING COLE"),
array(	108	,	"NAPOLEON"),
array(	109	,	"Nino Bravo"),
array(	110	,	"ORO SOLIDO"),
array(	111	,	"Oscar De Leon"),
array(	112	,	"PABLO MONTERO"),
array(	113	,	"PAQUITA LA DEL BARRIO"),
array(	114	,	"PAULINA RUBIO"),
array(	115	,	"PEDRO FERNANDEZ"),
array(	116	,	"PEDRO INFANTE"),
array(	117	,	"PEPE AGUILAR"),
array(	118	,	"PIMPINELA"),
array(	119	,	"RECUERDO"),
array(	120	,	"Paquita"),
array(	121	,	"Polache"),
array(	122	,	"Popurris"),
array(	123	,	"Punta"),
array(	124	,	"QUEEN"),
array(	125	,	"RABANES"),
array(	126	,	"RAFAEL"),
array(	127	,	"RAMON AYALA"),
array(	128	,	"RAPHAEL"),
array(	129	,	"RATA BLANCA"),
array(	130	,	"REGGAE"),
array(	131	,	"BOB MARLEY"),
array(	132	,	"RICKY MARTIN"),
array(	133	,	"ROBERTO CARLOS"),
array(	134	,	"ROCIO DURCAL"),
array(	135	,	"ROCK EN INGLES"),
array(	136	,	"ROLAS ROCK"),
array(	137	,	"ROLLING STONES"),
array(	138	,	"ROMANTICAS"),
array(	139	,	"Ricardo Montaner"),
array(	140	,	"SALSA"),
array(	141	,	"salseros"),
array(	142	,	"SANDRO"),
array(	143	,	"SELENA"),
array(	144	,	"SHAGGY"),
array(	145	,	"SHAKIRA"),
array(	146	,	"SODA STEREO"),
array(	147	,	"SON BY FOUR"),
array(	148	,	"SONORA SANTANERA"),
array(	149	,	"Santa Fe"),
array(	150	,	"TEMERARIOS"),
array(	151	,	"BEATLES"),
array(	152	,	"BEST IN ENGLISH"),
array(	153	,	"TOP GUN"),
array(	154	,	"TOÑO ROSARIO"),
array(	155	,	"TUCANES"),
array(	156	,	"Corridos"),
array(	157	,	"Tono Rosario"),
array(	158	,	"VARIOS"),
array(	159	,	"VICENTE FERNANDEZ"),
array(	160	,	"VILMA PALMA E VAMPIROS"),
array(	161	,	"funk"),
array(	162	,	"Vicente Fernandez"),
array(	163	,	"WILFRIDO VARGAS"),
array(	164	,	"WISIN"),
array(	165	,	"Bruno Mars"),
array(	166	,	"YOLANDA DEL RIO"),
array(	167	,	"Bandas"),
array(	168	,	"La mera yema"),
array(	169	,	"los 40 principales"),
array(	170	,	"cuba"),
array(	171	,	"Dance"),
array(	172	,	"exitos espanol"),
array(	173	,	"bailables"),
array(	174	,	"bee gees"),
array(	175	,	"camila"),
array(	176	,	"arjona"),
array(	177	,	"Navidad"),
array(	178	,	"Narco"),
array(	179	,	"Enrique Iglesias"),
array(	180	,	"De La Ghetto"),
array(	181	,	"Arcangel"),
array(	182	,	"Nicky Jam"),
array(	183	,	"Joey Montana"),
array(	184	,	"Enrique Iglesias"),
array(	185	,	"ROMEO"),
array(	186	,	"Chino y Nacho"),
array(	187	,	"Maluma"),
array(	188	,	"Zion y Lennox"),
array(	189	,	"La arrolladora banda limon"),
array(	190	,	"Grupo Extra"),
array(	191	,	"Ksanova"),

);

shuffle($sugerencias);

?>

<div class="row">







    <div class="large-12 columns">


        <form>
            <div class="large-9 small-10 columns">
                <input type="text" id="txtSearchProdAssign" placeholder="Encuentra tu musica aqui">
            </div>
            <div class="large-3 small-2 columns">
                <a href="#" id="Search" onclick="musicaSearch($('#txtSearchProdAssign').val())" class="alert button expand">Buscar</a>
            </div>


        </form>


        <div style="color: #ffffff" id="large-12 medium-12 small-12 columns ">
            <ul class="navlist">
                <li><a style="color: #ffffff; text-decoration: underline;" href="index.php?pg=search&busqueda=<?php echo $sugerencias[0][1];?>"><?php echo $sugerencias[0][1];?></a></li>
                <li><a style="color: #ffffff; text-decoration: underline;" href="index.php?pg=search&busqueda=<?php echo $sugerencias[1][1];?>"><?php echo $sugerencias[1][1];?></a></li>
                <li><a style="color: #ffffff; text-decoration: underline;" href="index.php?pg=search&busqueda=<?php echo $sugerencias[2][1];?>"><?php echo $sugerencias[2][1];?></a></li>
                <li><a style="color: #ffffff; text-decoration: underline;" href="index.php?pg=search&busqueda=<?php echo $sugerencias[3][1];?>"><?php echo $sugerencias[3][1];?></a></li>
                <li><a style="color: #ffffff; text-decoration: underline;" href="index.php?pg=search&busqueda=<?php echo $sugerencias[4][1];?>"><?php echo $sugerencias[4][1];?></a></li>
            </ul>
        </div>

        </hr>



        <div id="musica">
            <div style="display:none" id="dvloader" class="ShowLoader"><img src="../img/page-loader.gif" /></div>

        </div>









        <hr>






    </div>

    <div style="height: 80px; opacity: 1" class="row">

    </div>






</div>
<script>



</script>

<script>


    $('#txtSearchProdAssign').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            musicaSearch(this.value);
            return false;
        }
    });


    function hola(){

        alert("holaa");
    }
    function musicaSearch(str) {




        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("musica").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET","getmusica.php?q="+str,true);
            xmlhttp.send();
        }
    }





</script>