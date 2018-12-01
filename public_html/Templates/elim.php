<?php
include "../config.php";
$id = $_GET['id'];
$tipo = $_GET['type'];
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con));
	  
mysqli_select_db($con, $dbname) or die("Could not select database");
 	 	
if ($tipo == 1){//Usuario

    echo $query = "DELETE FROM Usuarios WHERE idUsuario = $id";
    $result = mysqli_query ($con, $query)or die("Something went wrng"); 

}else{

    $deletar = "DELETE FROM Notificaciones WHERE idProyecto = $id";
    $result = mysqli_query ($con, $deletar) or die ("1/4");
    $deletar = "DELETE FROM Roles WHERE idProyecto = $id";
    $result = mysqli_query ($con, $deletar) or die ("2/4");
    $deletar = "DELETE FROM Tareas WHERE idProyecto = $id";
    $result = mysqli_query ($con, $deletar) or die ("3/4");
    $deletar = "DELETE FROM Proyectos WHERE idProyecto = $id";
    $result = mysqli_query ($con, $deletar) or die ("4/4");
}



?>

<script>
cargar('users','a_users.php'); cargar('proyects','a_proyects.php');
</script>