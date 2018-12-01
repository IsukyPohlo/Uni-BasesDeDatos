<?php
include "../config.php";
//Variables login
session_start();

//Conexión
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con));
	  
mysqli_select_db($con, $dbname) or die("Could not select database");
 	 	
   
$query = "SELECT COUNT(idUsuario) FROM Usuarios WHERE TipoUsuario = 0";
$result = mysqli_query ($con, $query); 
$NoUsuarios = mysqli_fetch_array($result);

$query2 = "SELECT COUNT(idUsuario) FROM Usuarios WHERE TipoUsuario = 3";
$result2 = mysqli_query ($con, $query2); 
$NoBaneados = mysqli_fetch_array($result2);



?>
<div class="row box">
	<div class="col-12">

		<h2>Usuarios</h2>

		<div class="col-6 box">
			<div class = "content">
			No. usuarios:<br>
			<?php echo $NoUsuarios[0];?>
			</div>
		</div>

		<div class="col-6 box">
			<div class = "content">
			No. baneados:<br>
			<?php echo $NoBaneados[0];?>
			</div>
		</div>
	</div>
			
</div>

<div class="row">
	<div class="col-6 menu">
		<div class = "aside nomarg">
			<ul> 
				<li onclick ="scargar('contenido','a_userslist.php');">
					Ver más
				</li> 
			</ul>
		</div>
	</div>
	<div class="col-6 menu">
		<div class = "aside nomarg">
			<ul> 
			<li onclick ="scargar('contenido','a_SearchUsers.php');">
					Buscar
				</li> 
			</ul>
		</div>
	</div>
</div>
