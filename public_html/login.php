<?php
include"config.php";
//Variables login
session_start();
$NombreUsuario = $_POST["username"];
$pass =  $_POST["password"];
$denied = $_GET["denied"];

//Conexión
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con));
	  
mysqli_select_db($con, $dbname) or die("Could not select database");
	  	 	
   
$query = "SELECT * FROM Usuarios WHERE UserName = '$NombreUsuario' OR Correo = '$NombreUsuario'";




$result = mysqli_query ($con, $query); 
if ($result->num_rows > 0){

	while($line = mysqli_fetch_assoc($result)){
		
			if($line['Contrasena'] == $pass){
				
				//ACCESO CONCEDIDO
				$_POST["username"] = $line['NombreUsuario'];

				$id = $line[idUsuario];
				if($line['TipoUsuario'] == 1){

					header ("Location: http://antares.dci.uia.mx/ic16azp/admin.php");

				}else if($line['TipoUsuario'] == 0){

					header ("Location: http://antares.dci.uia.mx/ic16azp/dashboard.php?id=$id");
					$_SESSION["User"] = $NombreUsuario;
				

				}else{

					header ("Location: http://antares.dci.uia.mx/ic16azp/index.php?denied=3");
					$_SESSION["User"] = "";

				}
				
			}
			else{
								
				header ("Location: http://antares.dci.uia.mx/ic16azp/index.php?denied=2");
				$_SESSION["User"] = "";
			}

	}	
}	
else {
	
	header ("Location: http://antares.dci.uia.mx/ic16azp/index.php?denied=1");
	$_SESSION["User"] = "";
	}

$con->close();  

//CONTINÚA AL PHP







?>
