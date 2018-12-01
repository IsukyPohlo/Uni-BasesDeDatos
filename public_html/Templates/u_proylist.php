<?php

include "../config.php";
session_start();
$id = $_SESSION['id'] ;

//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$Lider = "SELECT NombreProyecto FROM Proyectos LEFT JOIN Roles USING(idProyecto) LEFT JOIN Usuarios USING(idUsuario) WHERE idUsuario = $id AND Rol = 1";
$result1 = mysqli_query ($con, $Lider); 

$Colaborador = "SELECT NombreProyecto FROM Proyectos LEFT JOIN Roles USING(idProyecto) LEFT JOIN Usuarios USING(idUsuario) WHERE idUsuario = $id AND Rol = 0";
$result2 = mysqli_query ($con, $Colaborador); 

?>

<div class="row box">
	<div class="col-12 box">

		<h1>Mis Proyectos</h1>

		<div class="col-12 box">

			<div id="agrea" class = "content nomarg curvy">

				<h2>Soy Lider:</h2>
				<br>
				
				<?php
				//Consulta de los proyectos disponibles
					if ($result1->num_rows > 0){
						$count=0;
						//Existen proyectos donde se es el LIDER
							while($row1 = mysqli_fetch_assoc($result1)){
							$count= $count+1;	
							?> 
							<li id="ProyectList" onclick ="scargarAndGetProyectName('contenido','ul_proy.php','<?php echo $row1[NombreProyecto]; ?>');"><?php echo $row1[NombreProyecto]; ?> </li>
							<?php	 				
							}	
						}
						else{
						echo "No se ha creado ningún proyecto.";
						}	//fin de la consulta
				?>
				
			</div>
		</div>

		<div class="col-12 box margup">

			<div class = "content nomarg curvy">

				<h2>Soy Colaborador:</h2>
				<br>


				<?php
				//Consulta de los proyectos disponibles
					if ($result2->num_rows > 0){
						//Existen proyectos donde se es el LIDER
							while($row2 = mysqli_fetch_assoc($result2)){
								
							?> 
								<li onclick ="scargarAndGetProyectName('contenido','uc_proy.php','<?php echo $row2[NombreProyecto]; ?>');"><?php echo $row2[NombreProyecto]; ?> </li>
							<?php	 				
							}	
						}
						else{
						echo "No ha sido invitado a ningún proyecto.";
						}	//fin de la consulta
				?>
			</div>
		</div>

	</div>
</div>

<div class="row box">

			<div class="col-6 menu">
				<div class = "aside margup mid">
					<ul> 
						<li class="high" onclick ="scargar('contenido','ul_proycrear.php');">
							Crear Proyecto
						</li> 
					</ul>
				</div>
			</div>

		</div>

