<?php
include"config.php";
//Variables login

$nombre = $_POST["nombre"];
$ApPaterno = $_POST["ApPaterno"];
$ApMaterno = $_POST["ApMaterno"];
$NombreUsuario = $_POST["NombreUsuario"];
$FechaNac = $_POST["FechaNac"];
$genero = $_POST["genero"];
$email = $_POST["email"];
$pass1 =  $_POST["pass1"];
$pic = $_POST["pic"];

//

//Conexión
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con));
	  
mysqli_select_db($con, $dbname) or die("Could not select database");

//SUBIR FOTO

//subir ruta a la base de datos

$query = "INSERT INTO Usuarios VALUES (0, '$nombre','$ApPaterno','$ApMaterno','$NombreUsuario','$FechaNac','$genero', '', '$email','$pass1',NOW(),0)";

$result = mysqli_query ($con, $query); 
if ( false===$result ) {
	printf("error: %s\n", mysqli_error($con));
	$con->close();
}
else {
$con->close();  
header ('Location: http://antares.dci.uia.mx/ic16azp');
//CONTINÚA AL PHP
} 






?>
