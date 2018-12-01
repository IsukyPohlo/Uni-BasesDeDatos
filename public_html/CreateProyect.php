<!-- CÓDIGO PARA LA CREACIÓN DE PROYECTOS -->
<?php

include "./config.php";
session_start();
$id = $_SESSION[id] ;

echo $id;
    $NombreNuevoProyecto = $_POST[nameProyect]; //get input text
    $Desc = $_POST[Desc];
    //echo $NombreNuevoProyecto;
    echo $Desc;
    //Conexión para revisar proyectos
    $con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
    mysqli_select_db($con, $dbname) or die("Could not select database");
    //CREAR NUEVO PROYECTO
    $query = "INSERT INTO Proyectos VALUES (0,'$NombreNuevoProyecto','$Desc',NOW())";
    $result = mysqli_query ($con, $query) or die('No ingresó datos del proyecto'); 
    
    ///OBTENER ID DEL NUEVO PROYECTO
    $query2 = "SELECT idProyecto FROM Proyectos WHERE NombreProyecto = '$NombreNuevoProyecto'";
    $result2 = mysqli_query ($con, $query2); 
    //CREAR RELACIÓN USUARIO-ROL-PROYECTO
    $idProyecto = mysqli_fetch_row($result2);
    $query3 = "INSERT INTO Roles VALUES ('$idProyecto[0]','$id',1)";
    $result3 = mysqli_query ($con, $query3);
    //Listo
    header ("Location: http://antares.dci.uia.mx/ic16azp/dashboard.php?id=$id");



?>