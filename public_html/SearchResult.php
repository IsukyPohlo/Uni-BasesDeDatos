<?php
include "./config.php";
//Variables login
session_start();
$tipo = $_GET['type'];
$busqueda = $_POST['search'];
//Conexión
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con));
	  
mysqli_select_db($con, $dbname) or die("Could not select database");
    
if ($tipo == 2){
    $query = "SELECT * FROM Proyectos WHERE NombreProyecto LIKE '$busqueda' OR FechaCreacion LIKE '$busqueda' OR Descripcion LIKE '$busqueda'";
}
else{
    $query = "SELECT * FROM Usuarios WHERE UserName LIKE '$busqueda' OR NombreUsuario LIKE '$busqueda' OR TipoUsuario LIKE '$busqueda'";
   }

$result = mysqli_query ($con, $query) or die("ERROR"); 

?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" type="text/css" media="All" href="./css/proyectiza.css" /> 

	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		
	
	<script type="text/javascript" src="./js/Centro.js"></script>

</head>
<body>

<div class="row bigbox">

<?php if($tipo == 2){
?>

    <h2>Proyectos</h2>



<div class="row box">

<div class="col-12">

    <div class="col-2 box">
        <div id="contenido" class = "aside nomarg high">
        ID
        </div>
    </div>

    <div class="col-3 box">
        <div class = "aside nomarg high">
        Nombre
        </div>
    </div>

    <div class="col-2 box">
        <div class = "aside nomarg high">
        fecha
        </div>
    </div>

    <div class="col-4 box">
        <div class = "aside nomarg high">
        Desc
        </div>
    </div>

    <div class="col-1 box">
        <div class = "aside nomarg high">
            Editar
        </div>
    </div>

</div>
</div>
<?php 
if ($result->num_rows > 0){

        while($row = mysqli_fetch_assoc($result)){
        
        ?> 
        
<div class="row box">

<div class="col-12">

    <div class="col-2 box">
        <div id="contenido" class = "aside nomarg">
        <?php echo $row['idProyecto']; ?>
        </div>
    </div>

    <div class="col-3 box">
        <div class = "aside nomarg">
        <?php echo $row['NombreProyecto']; ?>
        </div>
    </div>

    <div class="col-2 box">
        <div class = "aside nomarg">
        <?php echo $row['FechaCreacion']; ?>
        </div>
    </div>

    <div class="col-4 box">
        <div class = "aside nomarg">
        <?php echo $row['Descripcion']; ?>
        </div>
    </div>

    <div class="col-1 box">
    <div class = "aside nomarg buttona" onclick = "scargar('contenido','elim.php?type=2&id=<?php echo $row['idProyecto']; ?>');">
            Eliminar
        </div>
    </div>

</div>

</div>

        <?php }
        }
        ?>


<?php
}

else{
?>

<h2> Editar </h2>

<div class="col-12">

    <div class="col-1 box">
        <div id="contenido" class = "aside nomarg high">
        ID
        </div>
    </div>

    <div class="col-2 box">
        <div id="agrea" class = "aside nomarg high">
        Usuario
        </div>
    </div>

    <div class="col-2 box">
        <div id="agrea" class = "aside nomarg high">
        Nombre
        </div>
    </div>

    <div class="col-1 box">
        <div id="agrea" class = "aside nomarg high">
        Edad
        </div>
    </div>

    <div class="col-1 box">
        <div id="agrea" class = "aside nomarg high">
        Gen.
        </div>
    </div>

    <div class="col-2 box">
        <div id="agrea" class = "aside nomarg high">
        Correo
        </div>
    </div>

    <div class="col-1 box">
        <div id="agrea" class = "aside nomarg high">
        F.Reg.
        </div>
    </div>

    <div class="col-1 box">
        <div id="agrea" class = "aside nomarg high">
        Tipo
        </div>
    </div>

    <div class="col-1 box">
        <div id="agrea" class = "aside nomarg high">
        Opc.
        </div>
    </div>

</div>

<div class="col-12">
    <form method="post" action="edit.php?idUsuario=<?php echo $row['idUsuario']; ?>">
        <div class="col-1 box">
            <div id="contenido" class = "aside nomarg">
            <?php echo $row['idUsuario']; ?>
            </div>
        </div>

        <div class="col-2 box">
            <div id="agrea" class = "aside nomarg">
            <?php echo $row['UserName']; ?>
            </div>
        </div>

        <div class="col-2 box">
            <div id="agrea" class = "aside nomarg">
            <?php echo $row['NombreUsuario'] . " " . $row['ApellidoPaterno'] . " ". $row['ApellidoMaterno']  ; ?>
            </div>
        </div>

        <div class="col-1 box">
            <div id="agrea" class = "aside nomarg">
            <?php echo $row['FechaNacimiento']; ?>
            </div>
        </div>

        <div class="col-1 box">
            <div id="agrea" class = "aside nomarg">
            <?php echo $row['Genero']; ?>
            </div>
        </div>

        <div class="col-2 box">
            <div id="agrea" class = "aside nomarg">
            <input type="text" name="correo" value="<?php echo $row['Correo']; ?>" size="25">
            </div>
        </div>

        <div class="col-1 box">
            <div id="agrea" class = "aside nomarg">
            <?php echo $row['FechaRegistro']; ?>
            </div>
        </div>

        <div class="col-1 box">
            <div id="agrea" class = "aside nomarg">
            <input type="text" name="tipo" value="<?php echo $row['TipoUsuario']; ?>" size="1">
            </div>
        </div>

        <div class="col-1 box">
        <div class = "aside nomarg buttona" onclick = "scargar('contenido','elim.php?type=1&id=<?php echo $row['idUsuario']; ?>');">
            Eliminar
        </div>
        </div>
        <input type="submit" style="display:none"/>
</form>		
</div>

<?php 
}
?>


</div>
</body>
</html>