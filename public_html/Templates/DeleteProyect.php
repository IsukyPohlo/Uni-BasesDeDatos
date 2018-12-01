<?php

include "../config.php";
session_start();
$id = $_SESSION[id];
$Usuario = $_SESSION["User"];

echo $Proyecto = $_GET["pr"];


$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$ObtenerId = "SELECT idProyecto FROM Proyectos WHERE NombreProyecto = '$Proyecto'";
$result = mysqli_query ($con, $ObtenerId) or die ("no se obtuvo ID");
$lel = mysqli_fetch_row($result);
echo $idProyecto = $lel[0];

$deletar = "DELETE FROM Notificaciones WHERE idProyecto = $idProyecto";
$result = mysqli_query ($con, $deletar) or die ("1/4");
$deletar = "DELETE FROM Roles WHERE idProyecto = $idProyecto";
$result = mysqli_query ($con, $deletar) or die ("2/4");
$deletar = "DELETE FROM Tareas WHERE idProyecto = $idProyecto";
$result = mysqli_query ($con, $deletar) or die ("3/4");
$deletar = "DELETE FROM Proyectos WHERE idProyecto = $idProyecto";
$result = mysqli_query ($con, $deletar) or die ("4/4");



?>

<h1>Borrado correctamente</h1>