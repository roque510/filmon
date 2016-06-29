<?php 

if (isset($_COOKIE['m09215'])) {
	unset($_COOKIE['m09215']);
    	setcookie('m09215', null, -1, '/');
}
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>
