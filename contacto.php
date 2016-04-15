<?php
/**
 * Created by sublime.
 * User: Armando Roque
 * Date: 10/05/15
 * Time: 18:30
 */
$email = "super1roque@gmail.com";
$nombre = "";
$correo = "";
$area = "";
$cel = "";
$mensajex = "";

require_once("funciones.php");

if(isset($_POST["name"]))
    $nombre = test_input($_POST["nombre"]);
if(isset($_POST["area"]))
    $area = test_input($_POST["usuario"]);
if(isset($_POST["correo"]))
    $correo = test_input($_POST["correo"]);
if(isset($_POST["cel"]))
    $cel = test_input($_POST["desc"]);
if(isset($_POST["mensaje"]))
    $mensajex = test_input($_POST["desc"]);

$to      = $email; // Send email to our user
$subject = 'CONTACTAME!!'; // Give the email a subject
$message = 'El Cliente :'.$nombre.', el correo del usuario es: '.$correo.' y su telefono es .'$area.' '.$cel.', MENSAJE DE LA PERSONA:'.$mensajex; // Our message above including the link
$mensaje = "¡Su mensaje fue enviado con EXITO! Estaremos en contacto con usted lo mas pronto posible, ¡SALUDOS!";


$headers = 'From:'.$correo . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
mail($correo,"Aviso de contacto con Musicon.me",$mensaje, "From:noreply@musicon.me". "\r\n");


echo '<script>window.location="index.php?pg=inicio"</script>';
?>