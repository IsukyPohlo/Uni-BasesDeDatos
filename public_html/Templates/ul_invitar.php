<?php

include "../config.php";
session_start();
$id = $_SESSION[id] ;
$Proyecto = $_GET["proyect"]; //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
?>

<div class="row box">
	<div class="col-12">

		<h2><?php echo $Proyecto; ?></h2>

		<h1>Invitar</h1> <br>

	</div>
</div>

<div class="row box">

	<div class="col-12 menu">
		<div class = "aside margup">
			<form action="SendInvitation.php?proyect=<?php echo $Proyecto;?>" method="post">
			<label >Nombre Usuario:</label>
			<input type="text" name ="Invitado">
			<br><br><br>
			<input type="Submit" class="AcceptButton" value="Enviar invitación">

		</div>
	</div>

</div>

