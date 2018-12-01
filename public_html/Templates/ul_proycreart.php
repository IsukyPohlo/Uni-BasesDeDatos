<?php

include "../config.php";
session_start();
$id = $_SESSION[id] ;
$Proyecto = $_GET["proyect"]; //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query1 = "SELECT UserName,idUsuario FROM Usuarios LEFT JOIN Roles USING(idUsuario) LEFT JOIN Proyectos USING(idProyecto) WHERE NombreProyecto = '$Proyecto' AND Rol = 0";
$Colaboradores = mysqli_query ($con, $query1);

?>

<div class="row box">
	<div class="col-12">

		<h1><?php echo $Proyecto; ?></h1>

		<h2>Tarea Nueva</h2> <br>

	</div>



<form action="CreateTask.php?pr=<?php echo $Proyecto; ?>" method="post">
<label>Título de tarea:</label>
<input type="text" name="nameTarea" size="44" maxlenght="44">
<br>
<br>
	<label>Nombre colaborador:</label>
		<select name="colaborador">
							<?php while($row1 = mysqli_fetch_assoc($Colaboradores)){
								?>
								<option value='<?php echo $row1[idUsuario] ?>'><?php echo $row1["UserName"] ?></option>
							<?php } ?>
		</select>
				  
	<br>
	<br>

		<label>Descripción:</label>
	<br>
			<textarea name="Desc"></textarea>

	<br>
	<br>
	<label>Fecha de entrega:</label>

			<input type="date" name= "FFin">
	
	<br>
	<br>
	<input type="submit" value ="Aceptar" >		
		
	
</form>
<?php echo $_POST['nameTarea'];?>
