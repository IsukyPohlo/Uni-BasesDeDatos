<!-- SUBIR ARCHIVOS -->

<?php
include "./config.php";
session_start();
$id = $_SESSION[id] ;
$Proyecto = $_GET["proyect"]; //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");



$Tarea = $_POST['tarea'];
$type= $_GET["type"];

if ($type == 1){
    //Es un archivo de tarea.
    $DIRECTORIO = './files/tasks';
}else{
    //es una imagen de perfil
    $DIRECTORIO = './files/userpic';
}


$DIRECTORIONUEVO = $DIRECTORIO . $_FILES['archivo']['name'];

if (move_uploaded_file($_FILES['archivo']['tmp_name'], $DIRECTORIONUEVO)){
	    	
			//print "El archivo " .$_FILES['archivo']['name'] ." se subió satisfactoriamente";
			$name=$_FILES['archivo']['name'];
		}	
		else{
		   echo "ERROR";
		}
$ruta = "/files/tasks/". $_FILES['archivo']['name'];
//subir ruta a la base de datos
$query = "INSERT INTO Archivos VALUES($id,$Tarea,'$ruta')";
$Tareas = mysqli_query ($con, $query) or die ("ERROR");

header("Location: http://antares.dci.uia.mx/ic16azp/dashboard.php?id=$id");


  ?>