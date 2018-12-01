<?php 
include "../config.php";
//Variables login
session_start();
$id = $_GET['id'];
//Conexión
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con));
	  
mysqli_select_db($con, $dbname) or die("Could not select database");
 	 	
   
$query = "SELECT * FROM Usuarios WHERE idUsuario = $id";
$result = mysqli_query ($con, $query); 

$row = mysqli_fetch_array($result);

?>


<div class="row box">

<h2> Editar </h2>

	<div class="col-12">

		<div class="col-1 box">
			<div id="contenido" class = "aside nomarg high">
			ID
			</div>
		</div>

		<div class="col-2 box">
			<div id="agrea" class = "aside nomarg high">
			Usuario
			</div>
		</div>

		<div class="col-2 box">
			<div id="agrea" class = "aside nomarg high">
			Nombre
			</div>
		</div>

		<div class="col-1 box">
			<div id="agrea" class = "aside nomarg high">
			Edad
			</div>
		</div>

		<div class="col-1 box">
			<div id="agrea" class = "aside nomarg high">
			Gen.
			</div>
		</div>

		<div class="col-2 box">
			<div id="agrea" class = "aside nomarg high">
			Correo
			</div>
		</div>

		<div class="col-1 box">
			<div id="agrea" class = "aside nomarg high">
			F.Reg.
			</div>
		</div>

		<div class="col-1 box">
			<div id="agrea" class = "aside nomarg high">
			Tipo
			</div>
		</div>

		<div class="col-1 box">
			<div id="agrea" class = "aside nomarg high">
			Opc.
			</div>
		</div>

	</div>

	<div class="col-12">
		<form method="post" action="edit.php?idUsuario=<?php echo $row['idUsuario']; ?>">
			<div class="col-1 box">
				<div id="contenido" class = "aside nomarg">
				<?php echo $row['idUsuario']; ?>
				</div>
			</div>

			<div class="col-2 box">
				<div id="agrea" class = "aside nomarg">
				<?php echo $row['UserName']; ?>
				</div>
			</div>

			<div class="col-2 box">
				<div id="agrea" class = "aside nomarg">
				<?php echo $row['NombreUsuario'] . " " . $row['ApellidoPaterno'] . " ". $row['ApellidoMaterno']  ; ?>
				</div>
			</div>

			<div class="col-1 box">
				<div id="agrea" class = "aside nomarg">
				<?php echo $row['FechaNacimiento']; ?>
				</div>
			</div>

			<div class="col-1 box">
				<div id="agrea" class = "aside nomarg">
				<?php echo $row['Genero']; ?>
				</div>
			</div>

			<div class="col-2 box">
				<div id="agrea" class = "aside nomarg">
				<input type="text" name="correo" value="<?php echo $row['Correo']; ?>" size="25">
				</div>
			</div>

			<div class="col-1 box">
				<div id="agrea" class = "aside nomarg">
				<?php echo $row['FechaRegistro']; ?>
				</div>
			</div>

			<div class="col-1 box">
				<div id="agrea" class = "aside nomarg">
				<input type="text" name="tipo" value="<?php echo $row['TipoUsuario']; ?>" size="1">
				</div>
			</div>

			<div class="col-1 box">
			<div class = "aside nomarg buttona" onclick = "scargar('contenido','elim.php?type=1&id=<?php echo $row['idUsuario']; ?>');">
				Eliminar
			</div>
			</div>
			<input type="submit" style="display:none"/>
	</form>		
</div>
