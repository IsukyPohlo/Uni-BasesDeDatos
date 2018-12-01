<?php
include "../config.php";
session_start();

$UserName = $_GET["colab"];
$Proyecto = $_GET["proyect"];
$id = $_SESSION[id] ;
 //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query1 = "SELECT * FROM Tareas LEFT JOIN Proyectos USING(idProyecto) LEFT JOIN Usuarios USING(idUsuario) WHERE UserName = '$UserName' AND NombreProyecto = '$Proyecto'";
$DatosUsuario = mysqli_query ($con, $query1) or die ("No se hizo el query");
$Tareas = mysqli_query ($con, $query1) or die ("No se hizo el query");
$row = mysqli_fetch_assoc($DatosUsuario);

?>

<div class="row box">
	<div class="col-8">
		<br>
		<h1><?php echo $row["NombreUsuario"]; ?></h1> <br>

		<h2><?php echo $UserName;?></h2>

	</div>

	<div class="col-4 menu usuario box"> <!-- Caja de usuario -->
 
     	 <ul class="box noselec">

        	<li class="noselec">

           		<img class="imglim" src="https://www.biografiasyvidas.com/monografia/gandhi/fotos/gandhi_mahatma.jpg">

        	</li>
        </ul>
      
    </div>

</div>

<div class="row box">

	<div class="col-6 ">
		<div class = "aside nomarg high">
			<h3>Tareas</h3>
		</div>
	</div>

	<div class="col-2">
		<div class = "aside nomarg high">
			<h3>%</h3>
		</div>
	</div>

	<div id="usuario" class="col-4 menu">
		<div class = "aside nomarg high">
			<ul> 
					<h3>Estado</h3>
			</ul>
		</div>
	</div>

</div>

<?php
	while($row1 = mysqli_fetch_assoc($Tareas)){ ?>
<div class="row box margup">

	<div class="col-6 menu">
		<div class = "aside nomarg ">
			<ul> 
				<li onclick ="scargarAndGetProyectName('contenido','ul_tarea.php','<?php echo $row1["Titulo"]; ?>');"><?php echo $row1["Titulo"]; ?></li> 
				</li> 
		
			</ul>
		</div>
	</div>

	<div class="col-2">
		<div class = "aside margup">
		<?php echo $row1["Porcentaje"]; ?>
		</div>
	</div>

	<div class="col-4">
		<div class = "aside margup">
		<?php 
										if ($row1["Porcentaje"] == 100){
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



<div class="row box">
	<div id="usuario" class="col-4 menu">
		<div class = "aside margup mid">
			<ul> 
				<li class="mid" onclick ="scargarAndGetColabAndProyectName('contenido','ul_proyelt.php','<?php echo $UserName; ?>','<?php echo $Proyecto; ?>');">
					Eliminar colaborador
				</li> 
			</ul>
		</div>
	</div>
</div>


</body>