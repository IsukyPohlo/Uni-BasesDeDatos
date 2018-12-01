<?php
include "../config.php";
//Variables login
session_start();

//Conexión
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con));
	  
mysqli_select_db($con, $dbname) or die("Could not select database");
 	 	
   
$query = "SELECT * FROM Usuarios WHERE TipoUsuario = 0 OR TipoUsuario = 3";
$result = mysqli_query ($con, $query); 

?>

<div class="row bigbox">

		<h2>Usuarios</h2>
	
<div class="row box">

	<div class="col-12">

		<div class="col-1 box">
			<div id="contenido" class = "aside nomarg high">
			ID
			</div>
		</div>

		<div class="col-2 box">
			<div class = "aside nomarg high">
			Usuario
			</div>
		</div>

		<div class="col-4 box">
			<div class = "aside nomarg high">
			Nombre
			</div>
		</div>

		<div class="col-3 box">
			<div class = "aside nomarg high">
			Correo
			</div>
		</div>

		<div class="col-1 box">
			<div class = "aside nomarg high">
			Tipo
			</div>
		</div>

		<div class="col-1 box">
			<div class = "aside nomarg high">
				Editar
			</div>
		</div>

	</div>
</div>

<?php 
	if ($result->num_rows > 0){

			while($row = mysqli_fetch_assoc($result)){
			
			?> 



<div class="row box">

	<div class="col-12">

		<div class="col-1 box">
			<div class = "aside nomarg">
			<?php echo $row['idUsuario']; ?>
			</div>
		</div>

		<div class="col-2 box">
			<div class = "aside nomarg">
			<?php echo $row['UserName']; ?>
			</div>
		</div>

		<div class="col-4 box">
			<div class = "aside nomarg">
			<?php echo $row['NombreUsuario'] . " " . $row['ApellidoPaterno'] . " ". $row['ApellidoMaterno']  ; ?>
			</div>
		</div>

		<div class="col-3 box">
			<div class = "aside nomarg">
			<?php echo $row['Correo']; ?>
			</div>
		</div>


		<div class="col-1 box">
			<div class = "aside nomarg">
			<?php 
			echo $row['TipoUsuario'];	
				?>
			</div>
		</div>

		<div class="col-1 box">
		<div class = "aside nomarg buttona" onclick = "scargar('contenido','a_userslistedit.php?id=<?php echo $row['idUsuario']; ?>');">
				Edit
			</div>
		</div>

	</div>

				<?php }
			}
			?>

</div>

