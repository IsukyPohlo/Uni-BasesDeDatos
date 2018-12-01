<?php
include "../config.php";
session_start();
$id = $_SESSION[id];

$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");
$query = "SELECT * FROM Usuarios WHERE idUsuario = $id";
$result = mysqli_query ($con, $query) or die('No ingresó datos del proyecto'); 
$info = mysqli_fetch_row($result);
$foto = "http://antares.dci.uia.mx/ic16azp/files/userpic/" . $id . ".jpg";
$info[0];
?>

<div class="row box">
	<div class="col-8">

		<h1><?php echo $info[4]; ?></h1> <br>

		<h2><?php echo $info[1] . " " .  $info[2] . " " . $info[3];?></h2>

	</div>

	<div class="col-3 menu usuario box">
 
     	 <ul class="box noselec">

        	<li class="noselec">

           		<img class="imglim" src="<?php echo $foto;  ?>">

        	</li>
        </ul>
      
    </div>

</div>

<div class="row box margup">

	<div class="col-4">
		<div class = "aside margup mid">
			Correo:
		</div>
	</div>

	<div class="col-8">
		<div class = "aside margup">
		<?php echo $info[8]; ?>
		</div>
	</div>
</div>

<div class="row box margup">

	<div class="col-4">
		<div class = "aside margup mid">
			Genero:
		</div>
	</div>

	<div class="col-8">
		<div class = "aside margup">
		<?php echo $info[6]; ?>
		</div>
	</div>
	
</div>


<div class="row box margup">

	<div class="col-4">
		<div class = "aside margup mid">
			Fecha nacimiento:
		</div>
	</div>

	<div class="col-8">
		<div class = "aside margup">
		<?php echo $info[5]; ?>
		</div>
	</div>
</div>
<div class="row box margup">

	<div class="col-4">
		<div class = "aside margup mid">
			Fecha registro:
		</div>
	</div>

	<div class="col-8">
		<div class = "aside margup">
		<?php echo $info[10]; ?>
		</div>
	</div>
</div>


</div>
