<!-- CÓDIGO PARA LA CREACIÓN DE TAREAS -->
<?php

include "./config.php";
session_start();
$id = $_SESSION[id];
$_POST['nameTarea'];
$Proyecto = $_GET["pr"];
$Usuario = $_SESSION["User"];
$Titulo = $_POST["nameTarea"];
$Colaborador = $_POST[colaborador];
$Desc = $_POST["Desc"];
$Inicio = $_POST["FInicio"];
$Fin = $_POST["FFin"];
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");


$query1 = "SELECT idProyecto FROM Proyectos WHERE NombreProyecto = '$Proyecto'";
$result1 = mysqli_query ($con, $query1)or die ("ERROR 1");
$row1 = mysqli_fetch_array($result1);
$idProyecto = $row1[0];

$query2 = "INSERT INTO Tareas VALUES (0,'$Titulo','$Desc',0,NOW(),'$Fin',$Colaborador,$idProyecto)";
$result2 = mysqli_query ($con, $query2)or die ("ERROR 2");

header("Location: http://antares.dci.uia.mx/ic16azp/dashboard.php?id=$id");

?>
<script>scargar('contenido','ul_proy.php');</script>
