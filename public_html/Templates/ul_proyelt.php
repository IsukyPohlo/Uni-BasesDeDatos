<?php
include "../config.php";
session_start();

$Proyecto = $_GET["proyect"];
$UserName = $_GET["colab"];
$id = $_SESSION[id] ;
 //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query1 = "SELECT Rol FROM Roles LEFT JOIN Proyectos Using(idProyecto) WHERE idUsuario = $id AND NombreProyecto = '$Proyecto'";
$DatosValidacion = mysqli_query ($con, $query1) or die ("No se hizo el query");
$row = mysqli_fetch_array($DatosValidacion);

?>



<div class="row box">

	<h1> Eliminar a <?php echo $UserName; ?> del proyecto? </h1>
	<br><br><br>

</div>

<?php if ($row[0] == 1){ ?>

<div class="row box">
	<div id="usuario" class="col-6 menu">
		<div class = "aside margup mid">
			<ul> 
				<li class="mid" onclick ="scargarAndGetColabAndProyectName('contenido','DeleteColab.php','<?php echo $UserName;?>','<?php echo $Proyecto; ?>');">
					Si


				</li> 
			</ul>
		</div>
	</div>

	<div id="usuario" class="col-6 menu">
		<div class = "aside margup mid">
			<ul> 
				<li class="mid" onclick ="scargar('contenido','u_proylist.php');">
					No
				</li> 
			</ul>
		</div>
	</div>
</div>
<?php } 
else{

?>


<h2> No se tienen permisos necesarios para realizar la acción. </h2>
<br>
<li class="mid" onclick ="scargar('contenido','u_proylist.php');">Volver</li>


<?php } ?>
