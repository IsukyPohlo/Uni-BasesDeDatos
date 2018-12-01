<?php
include "../config.php";
session_start();
$idNotificacion= $_GET["colab"];

?>


<div class="row box">

	<h1> ¿Aceptar unirse al proyecto? </h1>
	
</div>


<div class="row box">
	<div id="usuario" class="col-6 menu">
		<div class = "aside margup mid">
			<ul> 
				<li class="mid" onclick ="scargar('contenido','JoinProyect.php?answ=yes&id=<?php echo $idNotificacion; ?>');">
					Si
				</li> 
			</ul>
		</div>
	</div>

	<div id="usuario" class="col-6 menu">
		<div class = "aside margup mid">
			<ul> 
            <li class="mid" onclick ="scargar('contenido','JoinProyect.php?answ=no&id=<?php echo $idNotificacion; ?>');">
					No
				</li> 
			</ul>
		</div>
	</div>

</div>