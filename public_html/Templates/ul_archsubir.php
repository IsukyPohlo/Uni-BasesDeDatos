<?php
include "../config.php";
session_start();
$id = $_SESSION[id] ;
$Proyecto = $_GET["proyect"]; //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query = "SELECT * FROM Tareas LEFT JOIN Proyectos USING(idProyecto) WHERE NombreProyecto = '$Proyecto'";
$Tareas = mysqli_query ($con, $query) or die ("ERROR");

?>

<div class="row box">
	<div class="col-12">

		<h2><?php echo $Proyecto; ?></h2>

		<h1>Subir archivos</h1> <br>

	</div>
</div>

<div class="row box">

	<form action="archivos.php?type=1" method="post" enctype="multipart/form-data">
	<label> Tarea vinculada al archivo: </label>

		<select name="tarea">
							<?php while($row1 = mysqli_fetch_assoc($Tareas)){
								?>
								<option value='<?php echo $row1["idTarea"] ?>'><?php echo $row1["Titulo"] ?></option>
							<?php } ?>
		</select>
	<br><br>
	<label>Archivo:</label>
    	<input type="file" name="archivo" id="archivo"></input>
	
        <input type="submit" value="Crear" class="AcceptButton" name="Aceptar">

	</form>


</div>


</body>
