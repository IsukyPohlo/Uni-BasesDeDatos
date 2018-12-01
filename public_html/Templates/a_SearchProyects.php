<?php
include "../config.php";
//Variables login
session_start();

//Conexión
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con));
	  
mysqli_select_db($con, $dbname) or die("Could not select database");
/* 	 	
   
$query = "SELECT * FROM Proyectos WHERE ";
$result = mysqli_query ($con, $query); 
*/
?>

<div class="row bigbox">

<h2>Buscar</h2>

<div class="col-12 menu">
		<div class="aside">
			<ul> 
            <form method="post" action="http://antares.dci.uia.mx/ic16azp/SearchResult.php?type=2">
				<input type="text" name="search" placeholder="Ingrese fecha, nombre, descripción, etc." size="150">
                <input type="submit" style="display:none"/>
				</li> 
			</ul>
		</div>
	</div>

