<?php
include "../config.php";
//Variables login
session_start();

//Conexión
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con));
	  
mysqli_select_db($con, $dbname) or die("Could not select database");
 	 	
   
$query = "SELECT COUNT(idProyecto) FROM Proyectos";
$result = mysqli_query ($con, $query); 
$NoProyectos = mysqli_fetch_array($result);

$query2 = "SELECT COUNT(idTarea) FROM Tareas";
$result2 = mysqli_query ($con, $query2); 
$NoTareas = mysqli_fetch_array($result2);



?>
<div class="row box">
	<div class="col-12">

		<h2>Proyectos</h2>

		<div class="col-6 box">
			<div class = "content">
			No. proyectos:<br>
			<?php echo $NoProyectos[0];?>
			</div>
		</div>

		<div class="col-6 box">
			<div class = "content">
			No. tareas:<br>
			<?php echo $NoTareas[0];?>
			</div>
		</div>
	</div>
			
</div>

<div class="row">
	<div class="col-6 menu">
		<div class = "aside nomarg">
			<ul> 
				<li onclick ="scargar('contenido','a_proyectslist.php');">
					Ver más
				</li> 
			</ul>
		</div>
	</div>
	<div class="col-6 menu">
		<div class = "aside nomarg">
			<ul> 
				<li onclick ="scargar('contenido','a_SearchProyects.php');">
					Buscar
				</li> 
			</ul>
		</div>
	</div>
</div>

</body>
