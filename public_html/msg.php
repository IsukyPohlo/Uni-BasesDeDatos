<!-- CÓDIGO PARA CREAR NUEVAS CONVERSACIONES -->
<?php

include "./config.php";
session_start();
$id = $_SESSION[id];

$him = $_POST['him'];

$msg = $_POST['msg'];


$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query = "SELECT idUsuario FROM Usuarios WHERE UserName = '$him'";
$result = mysqli_query($con, $query) or die("Query 1 failed");
$lel = mysqli_fetch_row($result);
$idhim = $lel[0];

$query = "INSERT INTO Mensajes VALUES (0,$idhim,NOW(),'$msg',0,$id)";
$result = mysqli_query($con, $query) or die("Query 2 failed");

header("Location: http://antares.dci.uia.mx/ic16azp/dashboard.php?id=$id");

?>
