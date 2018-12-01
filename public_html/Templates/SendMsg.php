<?php
include "../config.php";
session_start();
echo "Mensaje: ";

echo $msg = $_GET["mesg"];

echo ", Him: ";

echo $him = $_GET["him"];

echo ", Me: ";

echo $me = $_GET["me"];

echo ", Last: ";

echo $last = $_GET["last"];

echo ",";

$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect agrea : ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

echo $query = "INSERT INTO Mensajes VALUES (0,$him,NOW(),'$msg',0,$me)";

$result = mysqli_query ($con, $query) or die('ERROR 1'); 
if($last != NULL){
    $update = "UPDATE Mensajes SET Visto = 1 WHERE idMensaje = '$last'";
    $result2 = mysqli_query ($con, $update) or die('ERROR 2'); 
}



//afuera 

?>

<script> scargarAndGetColabName('contenido','u_chat.php','<?php echo $him;?>');</script>