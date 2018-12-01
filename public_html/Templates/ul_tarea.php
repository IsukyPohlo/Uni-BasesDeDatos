<?php
include "../config.php";
session_start();

$Task = $_GET["proyect"];

$id = $_SESSION[id] ;
$Proyecto = $_GET["proyect"]; //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");


$query1 = "SELECT idTarea, Titulo, UserName, Tareas.Descripcion, Porcentaje, FechaEntrega,Tareas.FechaCreacion FROM Tareas LEFT JOIN Proyectos USING(idProyecto) LEFT JOIN Usuarios USING(idUsuario) WHERE Titulo = '$Task'";
$Tareas = mysqli_query ($con, $query1) or die ("No se hizo el query");

$Today = date("Y/m/d"); 

$row = mysqli_fetch_array($Tareas);


$idTarea = $row['idTarea'];

if ($row[Porcentaje] == 100 && $Today < $row["FechaCreacion"]){
	$estado = "Retrasada";
}
else{
	$estado = "A tiempo";
}

$query2 = "SELECT Comentario, UserName FROM Comentarios LEFT JOIN Usuarios USING(idUsuario) WHERE idTarea = $idTarea";
$Comments = mysqli_query ($con, $query2) or die ("No se hizo el query 2");

?>

<div class="row box">
	<div class="col-8">

		<h1><?php echo $Task; ?></h1> <br>

	</div>

</div>

<div class="row box margup">

	<div class="col-4">
		<div class = "aside nomarg mid">
			Colaborador
		</div>

	</div>

	<div class="col-2">
		<div class = "aside nomarg mid">
			Inicio
		</div>
	</div>

	<div class="col-2">
		<div class = "aside nomarg mid">
			Fin
		</div>
	</div>

	<div class="col-2">
		<div class = "aside nomarg mid">
			%
		</div>
	</div>

	<div class="col-2">
		<div class = "aside nomarg mid">
			Estado
		</div>

	</div>

</div>


<div class="row box">

	<div class="col-4 menu">
		<div class = "aside margup">
			<ul> 
				<li onclick ="scargar('contenido','ul_proycolab.html');">
				<?php echo $row[UserName]; ?>
				</li> 
			</ul>
		</div>
	</div>

	<div class="col-2">
		<div class = "aside margup">
			<?php echo $row[FechaCreacion]; ?>
		</div>
	</div>

	<div class="col-2">
		<div class = "aside margup">
			<?php echo $row[FechaEntrega]; ?>
		</div>
	</div>


	<div class="col-2">
		<div class = "aside margup">
		<form method="post" action="ul_tareaPor.php?idtarea=<?php echo $row[idTarea]; ?>">
		<input type="text" name="por" placeholder="<?php echo $row[Porcentaje]; ?>" size="3">
		<input type="submit" style="display:none"/>
		</form>
		</div>
	</div>

	<div class="col-2">
		<div class = "aside margup">
			<?php echo $estado; ?>
		</div>
	</div>

</div>

<h3>Comentarios</h3>

<div class="row box margup">

	<div class="col-8">
		<div class = "aside nomarg mid">
			Comentario
		</div>
	</div>

	<div class="col-4">
		<div class = "aside nomarg mid">
			Autor
		</div>
	</div>

</div>
<?php 

	while($res = mysqli_fetch_assoc($Comments)){
		?>
<div class="row box margup">

	<div class="col-8">
		<div class = "aside nomarg">
			<?php echo $res['Comentario'];?>
		</div>
	</div>

	<div class="col-4">
		<div class = "aside nomarg">
		<?php echo $res['UserName'];?>
		</div>
	</div>

</div>
	<?php }
	?>

<div class="row box margup">
    <div class="col-10 menu">
        <div class = "aside margup">
           <form action="SendComment.php?idTarea=<?php echo $row[idTarea];?>" method="post">
                <input  id = "com" type="text" name="msg" size = "70" placeholder="Escribir un comentario..."><br>
				<br>
				<input type="Submit" class="AcceptButton" value="Enviar comentario">
        </div>
    </div>

	
</form>
</div>


