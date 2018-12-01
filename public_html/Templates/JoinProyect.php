<?php
include "../config.php";
session_start();
$id = $_SESSION[id];
$answer= $_GET["answ"];
$idNotificacion = $_GET["id"];
$yes = "yes";
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query = "SELECT * FROM Notificaciones WHERE idNotificacion = $idNotificacion";
$result = mysqli_query ($con, $query) or die('No se cargaron notificaciones'); 
$row = mysqli_fetch_array($result);
$idProyecto = $row[idProyecto];
if(strcmp($answer, $yes) == 0){

    $query1 = "INSERT INTO Roles VALUES ('$idProyecto','$id',0)";
    $result1 = mysqli_query ($con, $query1) or die('No se registró Rol'); 

    $QUERY2 = "DELETE FROM Notificaciones WHERE idNotificacion = '$idNotificacion'";
    $result2 = mysqli_query ($con, $QUERY2) or die('No se borró notificacion 1'); 

}else{

    $QUERY3 = "DELETE FROM Notificaciones WHERE idNotificacion = '$idNotificacion'";
    $result3 = mysqli_query ($con, $QUERY3) or die('No se borró notificacion 2'); 
        

}

?>
<script>scargar('contenido','u_VerNotificaciones.php');</script>

