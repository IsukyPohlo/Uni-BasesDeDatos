<?php

include "../config.php";
session_start();
$id = $_SESSION[id];
$Usuario = $_SESSION["User"];

$Proyecto = $_GET["proyect"];
$UserName = $_GET["colab"];

$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");


$query ="DELETE FROM Roles WHERE idUsuario = $UserName";
$result = mysqli_query ($con, $query) or die ("No se eliminó 1");

$query ="DELETE FROM Tareas WHERE idUsuario = $UserName";
$result = mysqli_query ($con, $query) or die ("No se eliminó 2");



?>

<script>scargar('contenido','u_proylist.php');</script>