<?php
require_once("config.php");

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



$sql = "SELECT * FROM ".$type;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	?>


<?php

	echo '

	<div class="row" style="border:1pt dashed black;" >
	<div class="columns large-2">
	<img class=" thumbnail" width=100 height=100 src="'. $row["Foto"].'" />
	</div>
	<h1 class="columns large-8" >'. $row["Nombre"].'</h1>
	
	';  ?>
	<a href="#video"><button class="columns large-2" data-reveal-id="myModal" onclick="updateSource('<?php echo $row["Url"]; ?>','<?php echo $row["Nombre"]; ?>')" >Elegir Canal</button> </a>
	<?php 
	echo'
	
	
	
	
	
	</div>

	';
        
    }
} else {
    echo "0 results";
}
$conn->close();


?>