<?php
include "../config.php";
session_start();
$id = $_SESSION[id] ;
$Proyecto = $_GET["proyect"];

$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");


$queryPr = "SELECT idProyecto, NombreProyecto FROM Proyectos WHERE NombreProyecto = '$Proyecto'";
$result1 = mysqli_query ($con, $queryPr) or die ("ERROR 1");
$GetResult = mysqli_fetch_array($result1);
$idProyecto = $GetResult[0];

$query = "SELECT RutaArchivo,Titulo FROM Archivos LEFT JOIN Tareas USING(idTarea) WHERE idProyecto = $idProyecto";
$result2 = mysqli_query ($con, $query) or die ("ERROR 2");;

?>
<div class="row box">
	<div class="col-12 box">

		<h1>Archivos:</h1>
		<h2> del Proyecto: <?php echo $Proyecto; ?> </h2> 

<?php 

	while($fila2 = mysqli_fetch_assoc($result2)){
		?>	
		<div class="col-12 box">
			<div class = "content margup curvy">

				<div class="row box margup">

					<div class="col-12 menu">
					
							<ul> 
								<li class="high curvy centext" >
									<h3>Tarea:<?php echo $fila2['Titulo'];?> </h3>
								</li> 
							</ul>
						
					</div>

				<div class="row box margup">

					<div class="col-12">
						<div class = "aside nomarg mid">
							Archivo
						</div>
					</div>

				

				</div>

				<div class="row box">

					<div class="col-12">
						<div class = "aside margup">
							<?php echo $fila2['RutaArchivo']; ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php }
	?>
