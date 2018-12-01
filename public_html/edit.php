<!-- CÓDIGO PARA EDITAR TABLAS DE USUARIOS -->
<?php

include "./config.php";

$idUsuario = $_GET['idUsuario'];
$correo = $_POST['correo'];
$tipo = $_POST['tipo'];

//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query = "UPDATE Usuarios SET Correo = '$correo', TipoUsuario = $tipo WHERE idUsuario = $idUsuario";
$result = mysqli_query ($con, $query) or die("ERROR"); 
header('Location: http://antares.dci.uia.mx/ic16azp/admin.php');


?>