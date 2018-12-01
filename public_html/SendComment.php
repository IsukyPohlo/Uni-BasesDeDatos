<?php

include "./config.php";
session_start();
$id = $_SESSION[id];
$Usuario = $_SESSION["User"];
$idTarea = $_GET["idTarea"]; //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
$msg = $_POST["msg"];
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

//ENVIAR COMENTARIO
echo $query = "INSERT INTO Comentarios VALUES (0,'$msg',NOW(),$id,$idTarea)";
$result1 = mysqli_query ($con, $query)or die("No se insertó comentario");

//Encontrar valores del proyecto
header("Location: http://antares.dci.uia.mx/ic16azp/dashboard.php?id=$id");


?>