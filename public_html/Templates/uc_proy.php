	<?php

include "../config.php";
session_start();
$id = $_SESSION[id] ;
$Proyecto = $_GET["proyect"]; //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query1 = "SELECT UserName FROM Usuarios LEFT JOIN Roles USING(idUsuario) LEFT JOIN Proyectos USING(idProyecto) WHERE NombreProyecto = '$Proyecto' AND Rol = 0";
$Colaboradores = mysqli_query ($con, $query1);

$query2 = "SELECT Titulo, UserName, Tareas.Descripcion, Porcentaje, FechaEntrega FROM Tareas LEFT JOIN Proyectos USING(idProyecto) LEFT JOIN Usuarios USING(idUsuario) WHERE NombreProyecto = '$Proyecto'";
$Tareas = mysqli_query ($con, $query2);

$TareasTime = mysqli_query ($con, $query2);

$Today = date("Y/m/d"); 

$estado = "A tiempo";

if ($TareasTime->num_rows > 0){
	//Existen proyectos donde se es el LIDER
		
		
		while($fila = mysqli_fetch_assoc($TareasTime)){									
		
			if ($fila[Porcentaje] < 100 && $fila[FechaEntrega] < $Today){
			$estado = "Retrasado";
			}
	
		}
	
	}
	
	?>
	
	
	<div class="row box">
		<div class="col-12 box">
	
			<h1><?php echo $Proyecto; ?></h1>
	
			<div class="col-6 menu usuario">
				<div class = "content nomarg curvy mid">
					Estado: <?php echo $estado; ?>
				</div>
			</div>

		<div class="col-12 box">

			<div class = "content margup curvy">

				<h2>Colaboradores:</h2> <br>

				<ul>

				<?php
				//Consulta de los proyectos disponibles
					if ($Colaboradores->num_rows > 0){
						//Existen proyectos donde se es el LIDER
							while($row1 = mysqli_fetch_assoc($Colaboradores)){
							?> 
							<li onclick ="scargarAndGetColabName('contenido','ul_proy.php','<?php echo $row1[UserName]; ?>');"><?php echo $row1[UserName]; ?> </li>
							<?php	 				
							}	
						}
						else{
						echo "No hay colaboradores.";
						}	//fin de la consulta
				?>

					<li class="noselec">
					</li>

				</ul>

			</div>
		</div>

		<!-- ENCABEZADO DE TAREAS -->
	<div class="col-12 box margup">
			<div  class = "content nomarg curvy">
				<h2>Tareas</h2> <br>
				<div class="row box margup">
					<div class="col-4">
						<div class = "aside nomarg mid">
							Nombre
						</div>
					</div>
					<div class="col-2">
						<div class = "aside nomarg mid">
							Encargado
						</div>
					</div>
					<div class="col-4">
						<div class = "aside nomarg mid">
							Descripción
						</div>
					</div>
					<div class="col-2">
						<div class = "aside nomarg mid">
							Estado
						</div>
					</div>
				</div>
	<!-- ENCABEZADO DE TAREAS -->
				<?php 
									
				while($row2 = mysqli_fetch_assoc($Tareas)){
										
				?>
				<div class="row box margup">
					<div class="col-4">
						<div class = "aside nomarg">
							<ul> 							
					<li onclick ="scargarAndGetProyectName('contenido','ul_tarea.php','<?php echo $row2["Titulo"]; ?>');"><?php echo $row2["Titulo"]; ?></li> 
							</ul>
						</div>
					</div>
					<div class="col-2">
						<div class = "aside nomarg">
							<ul> 
							<li onclick ="scargarAndGetColabName('contenido','ul_proycolab.php?pr=<?php echo $Proyecto; ?>','<?php echo $row2["UserName"]; ?>');"><?php echo $row2["UserName"]; ?></li> 
							</ul>
						</div>
					</div>
					<div class="col-4">
						<div class = "aside nomarg">
										<?php echo $row2["Descripcion"]; ?>
						</div>
					</div>
					<div class="col-2">
						<div class = "aside nomarg">
									<?php 
										if ($row2[Porcentaje] == 100){
											echo "Finalizada";
										}
										else{
											echo "En progreso";
										}
										?>
						</div>
					</div>
					
				</div>
				<?php	
									}
								?>
				<ul>

					<li class="noselec">
					</li>



				</ul>

			</div>
		</div>

		<div class="col-12 box margup">

			<div  class = "content nomarg curvy">

				<h2>Archivos:</h2> <br>
				
				<ul>

					<li class="mid" onclick ="scargarAndGetProyectName('contenido','ul_arch.php','<?php echo $Proyecto; ?>');">
					Ver archivos
					</li>


					<li class="noselec">
					
					</li>

					<li class="high" onclick ="scargarAndGetProyectName('contenido','ul_archsubir.php','<?php echo $Proyecto; ?>');">
					Subir Archivo
					</li>


				</ul>

			</div>
		</div>

		<div class="row box">

			<div class="col-6 menu">
				<div class = "aside margup mid">
					<ul> 
						<li class="mid" onclick ="scargarAndGetColabAndProyectName('contenido','uc_quit.php','<?php echo $id;?>','<?php echo $Proyecto;?>');">
							Salir del Proyecto
						</li> 
					</ul>
				</div>
			</div>

		</div>

	</div>
</div>
