<?php

include "./config.php";
session_start();
$id = $_SESSION[id] ;
$Porcentaje = $_POST["por"];
$Tarea = $_GET["idtarea"]; //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query1 = "UPDATE Tareas SET Porcentaje = $Porcentaje WHERE idTarea = $Tarea";
$Colaboradores = mysqli_query ($con, $query1);

header("Location: http://antares.dci.uia.mx/ic16azp/dashboard.php?id=$id");

?>