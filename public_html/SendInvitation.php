<?php

include "./config.php";
session_start();
$id = $_SESSION[id];
$Usuario = $_SESSION["User"];
$Proyecto = $_GET["proyect"]; //OBTIENE EL NOMBRE DEL PROYECTO DESDE EL JAVASCRIPT 
$Invitado = $_POST["Invitado"];
//Conexión para revisar proyectos
$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

//Comprobar que el usuario existe.
$exist = "SELECT * FROM Usuarios WHERE UserName = '$Invitado'";
$result1 = mysqli_query ($con, $exist);
$DatosInvitado = mysqli_fetch_assoc($result1);
$idInvitado = $DatosInvitado["idUsuario"];

//Encontrar valores del proyecto
$query = "SELECT * FROM Proyectos WHERE NombreProyecto = '$Proyecto'";
$result2 = mysqli_query ($con, $query);
$DatosProyecto = mysqli_fetch_assoc($result2);
$idProyecto = $DatosProyecto["idProyecto"];

if ($result1->num_rows == 1){
//Existe
    
    //Comprobar que el usuario no está colaborando dentro del mismo proyecto.  
    $existInProyect = "SELECT idUsuario FROM Roles WHERE idUsuario = '$idInvitado' AND idProyecto = '$idProyecto' ";
    $result3 = mysqli_query ($con, $existInProyect);
    if ($result3->num_rows > 0){
       
        //Usuario ya registrado como colaborador o Líder
        echo "El usuario ya está colaborando en el proyecto";
    }
    else{
        
        //Enviar invitación.

        // Comprobar si ya existe una invitación previa:
        $QueryComprobar = "SELECT * FROM Notificaciones WHERE idUsuario = $idInvitado AND idProyecto = $idProyecto";
        $result4 = mysqli_query ($con, $QueryComprobar) or die("No se pudo comprobar si existe una invitación previa"); 
        if ($result4->num_rows == 0){
            //Enviar invitación
            $Tipo = "INV";
            $Titulo = "Invitación a proyecto";
            $Descripcion = "Has sido invitado a colaborar en el proyecto $Proyecto, por el usuario $Usuario";
            $queryInv = "INSERT INTO Notificaciones VALUES (0,'$Tipo','$Titulo','$Descripcion',$idInvitado,$idProyecto)";
            $result5 = mysqli_query ($con, $queryInv) or die("No se envío invitación");
            header ("Location: http://antares.dci.uia.mx/ic16azp/dashboard.php?id=$id");
        }
        else{
            //Ya existe una invitación previa.
            echo "Ya existe una invitación previa.";
        }
    }    

}
else {
    
    //No existe
    echo "El usuario invitado no existe";
}

?>