<?php

include "../config.php";
session_start();

$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$id = $_SESSION['id'];

	$query = "SELECT COUNT(idNotificacion) FROM Notificaciones WHERE idUsuario = $id";
	$result = mysqli_query($con, $query) or die("Query 1 failed");
	
	$row = mysqli_fetch_row($result);		 				 				 	
	if ($row[0] > 0){
		?>
		 <li onclick ="scargar('contenido','u_VerNotificaciones.php');">Notificaciones (<?php echo $row[0]; ?>)</li>
		<?php 
	}
	else{
		?>
		 <li onclick ="scargar('contenido','u_VerNotificaciones.php');">Sin notificaciones</li>
		 <?php
	}
		
?>
