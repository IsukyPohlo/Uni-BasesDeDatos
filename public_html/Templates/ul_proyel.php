<?php
include "../config.php";
session_start();
$Proyecto= $_GET["proyect"];

$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

?>


<div class="row box">

	<h1> Eliminar la Proyecto: <?php echo $Proyecto; ?> </h1>
	
</div>


<div class="row box">
	<div id="usuario" class="col-6 menu">
		<div class = "aside margup mid">
			<ul> 
				<li class="mid" onclick ="scargar('contenido','DeleteProyect.php?pr=<?php echo $Proyecto; ?>');">
					Si
				</li> 
			</ul>
		</div>
	</div>

	<div id="usuario" class="col-6 menu">
		<div class = "aside margup mid">
			<ul> 
				<li class="mid" onclick ="scargar('contenido','ul_proy.php');">
					No
				</li> 
			</ul>
		</div>
	</div>

</div>
