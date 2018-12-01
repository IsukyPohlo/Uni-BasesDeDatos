<?php
include "../config.php";
session_start();
$id = $_SESSION[id];
echo $idNotificacion = $_GET["colab"] ;

$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query = "DELETE FROM Notificaciones WHERE idNotificacion = $idNotificacion";
$result = mysqli_query ($con, $query) or die('No se cargaron notificaciones'); 




?>
<script>scargar('contenido','u_noticias.php');</script>