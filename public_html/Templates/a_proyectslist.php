<?php
include "../config.php";
//Variables login
session_start();

//Conexión
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con));
	  
mysqli_select_db($con, $dbname) or die("Could not select database");
 	 	
   
$query = "SELECT * FROM Proyectos";
$result = mysqli_query ($con, $query); 

?>


<div class="row bigbox">

	<h2>Proyectos</h2>



<div class="row box">

	<div class="col-12">

		<div class="col-2 box">
			<div id="contenido" class = "aside nomarg high">
			ID
			</div>
		</div>

		<div class="col-3 box">
			<div class = "aside nomarg high">
			Nombre
			</div>
		</div>

		<div class="col-2 box">
			<div class = "aside nomarg high">
			fecha
			</div>
		</div>

		<div class="col-4 box">
			<div class = "aside nomarg high">
			Desc
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

		<div class="col-2 box">
			<div id="contenido" class = "aside nomarg">
			<?php echo $row['idProyecto']; ?>
			</div>
		</div>

		<div class="col-3 box">
			<div class = "aside nomarg">
			<?php echo $row['NombreProyecto']; ?>
			</div>
		</div>

		<div class="col-2 box">
			<div class = "aside nomarg">
			<?php echo $row['FechaCreacion']; ?>
			</div>
		</div>

		<div class="col-4 box">
			<div class = "aside nomarg">
			<?php echo $row['Descripcion']; ?>
			</div>
		</div>

		<div class="col-1 box">
		<div class = "aside nomarg buttona" onclick = "scargar('contenido','elim.php?type=2&id=<?php echo $row['idProyecto']; ?>');">
				Eliminar
			</div>
		</div>

	</div>

</div>

			<?php }
			}
			?>
		
</div>
