<?php
include "../config.php";
session_start();
$id = $_SESSION[id];

$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");
$query = "SELECT DISTINCT UserName, idUsuario FROM Mensajes LEFT JOIN Usuarios USING(idUsuario)WHERE Destinatario = $id";
$result = mysqli_query ($con, $query) or die('No se cargaron mensajes'); 

?>

<div class="row bigbox">

    <h2>Conversaciones </h2>
    <div class="col-12 menu">

    </div>
</div>

<div class="row box">

    <div class="col-12">

        <div class="col-4 box">
            <div class = "aside nomarg high">
            FOTO
            </div>
        </div>

        <div class="col-4 box">
            <div class = "aside nomarg high">
            Usuario
            </div>
        </div>

        <div class="col-4 box">
            <div class = "aside nomarg high">
            Ver
            </div>
        </div>

      

    </div>
</div>

<?php 
    while($row = mysqli_fetch_assoc($result)){
?>
    <div class="row box">

        <div class="col-12">

            <div class="col-4 box">
                <div class = "aside nomarg">
               <?php
                $idUser = $row[idUsuario];
               $foto = "http://antares.dci.uia.mx/ic16azp/files/userpic/" . $idUser . ".jpg"; ?>
               <img class="imglim" style="max-width: 50%; min-width: 50%;" src="<?php echo $foto;?>">
                </div>
            </div>

            <div class="col-4 box">
                <div class = "aside nomarg">
                <?php echo $row["UserName"];  ?>
                </div>
            </div>

            <div class="col-4 box">
                <div class = "aside nomarg">
                       
                <li class="high" onclick ="scargarAndGetColabName('contenido','u_chat.php','<?php echo $row[idUsuario];?>');">Ver conversación</li>       
                </div>
            </div>


        </div>

    </div>
    <?php 
    }
?>


<div class="row box">
<div class="col-4 box">
          <br><br>        
                       
                <li class="high" onclick ="scargarAndGetColabName('contenido','u_nuevochat.php','<?php echo $row[idUsuario];?>');">Nueva conversación</li>       
                
            </div>


        </div>