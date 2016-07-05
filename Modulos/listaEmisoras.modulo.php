<?php
require("config.php");

$conn = new mysqli($SVR,$USR,$PW,$DB);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$type = 'videos';

if(isset($_GET['vid'])){
if($_GET['vid'] == 'peli')
	$type = 'peliculas';
else
	$type = 'videos';
}


if ($type == 'videos') {
	$sql = "SELECT * FROM ".$type." ORDER BY  `videos`.`desc` ASC ";
}
else
	$sql = "SELECT * FROM ".$type;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	?>


<?php

	echo '

	<div class="row" style="border:1pt dashed black;" >
	<div class="columns small-2">
	<img class=" thumbnail" width=100 height=100 src="'. $row["Foto"].'" onerror="this.src=`http://www.angelman.org/wp-content/themes/aaika/assets/images/default.jpg`" />
	</div>
	<h5 class="columns small-8" style="overflow:hidden;">'. $row["Nombre"].'<br><p style="color:white;">'.$row["desc"].'</p></h5>
	
	';  ?>
	<a href="#video"><button class="columns small-2" data-reveal-id="myModal" onclick="updateSource('<?php echo $row["Url"]; ?>')" >Play</button> </a>
	<?php
	if ($type == 'peliculas') {
		if (isset($_SESSION['date'])){
			if ($_SESSION['date'] == 'vigente') {
				if ($row["subs"] != "") {
					echo '<a style="margin-left:10px; margin-top:10px;" class="large button" href="'.$row["subs"].'">Descargar</a>';	
				}
						
			}
			else
				if ($row["subs"] != "")
				echo '<a style="margin-left:10px; margin-top:10px;" class="large button" href="#" onclick="infomem()">Actualiza tu membresia para descargar</a>';
		}
		else
				if ($row["subs"] != "")
				echo '<a style="margin-left:10px; margin-top:10px;" class="large button" href="#" onclick="infomem()">Actualiza tu membresia para descargar</a>';
	}


	echo'
	
	
	
	
	
	</div>

	';
        
    }
} else {
    echo "0 results";
}
$conn->close();


?>

