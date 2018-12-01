<?php
include "../config.php";
session_start();
$id = $_SESSION[id];

$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");
$query = "SELECT * From Notificaciones WHERE idUsuario = $id";
$result = mysqli_query ($con, $query) or die('No se cargaron notificaciones'); 



?>

<div class="row bigbox">

    <h2>Notificaciones </h2>
    <div class="col-12 menu">

    </div>
</div>

<div class="row box">

    <div class="col-12">

        <div class="col-5 box">
            <div class = "aside nomarg high">
            Título
            </div>
        </div>

        <div class="col-5 box">
            <div class = "aside nomarg high">
            Descripción
            </div>
        </div>

        <div class="col-2 box">
            <div class = "aside nomarg high">
            Acción
            </div>
        </div>

      

    </div>
</div>

<?php 
    while($row = mysqli_fetch_assoc($result)){
?>
    <div class="row box">

        <div class="col-12">

            <div class="col-5 box">
                <div class = "aside nomarg">
               <?php echo $row["Titulo"];   ?>             
                </div>
            </div>

            <div class="col-5 box">
                <div class = "aside nomarg">
                <?php echo $row["Descripcion"];  ?>
                </div>
            </div>
            <?php
            if ($row["Tipo"] == "INV"){?>

                <div class="col-2 box">
                    <div class = "aside nomarg">
                    <li class="high" onclick ="scargarAndGetColabName('contenido','AceptarInvitacion.php','<?php echo $row[idNotificacion];?>');">Ver</li> 
                    </div>
                </div>
<?php

            }else{?>

                  <div class="col-2 box">
                    <div class = "aside nomarg">
                    <li class="high" onclick ="scargarAndGetColabName('contenido','DeleteNotif.php','<?php echo $row[idNotificacion];?>');">Eliminar</li> 
                    </div>
                </div>

<?php        
            }
     
     ?>
            

        </div>

    </div>
    <?php 
    }
?>