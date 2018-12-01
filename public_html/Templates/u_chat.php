<?php 
include "../config.php";
session_start();
$me = $_SESSION['id'] ;
$him= $_GET["colab"];

$con = mysqli_connect($host, $ServerUser, $ServerPassword) or die('Could not connect ???: ' . mysqli_error($con)); 
mysqli_select_db($con, $dbname) or die("Could not select database");

$query = "SELECT * FROM Usuarios WHERE idUsuario = $him";
$result = mysqli_query ($con, $query) or die('No ingresó datos del proyecto'); 
$info = mysqli_fetch_row($result);

$conversacion = "SELECT * FROM Mensajes WHERE (idUsuario = $me OR idUsuario = $him) AND (Destinatario = $me OR Destinatario  = $him ) ORDER BY idMensaje ASC";
$result2 = mysqli_query ($con, $conversacion) or die('No ingresó datos del proyecto'); 


?>

<div class="row box margup">
    <h2><?php echo $info[4]; ?></h2>
</div>

<div class="row box margup">

	<div id="chat" class="col-12 box" style="height:70%; overflow:scroll;">

        <script type="text/javascript">
           var div = document.getElementById('chat');
            chat.scrollTop = chat.scrollHeight - chat.clientHeight;
        </script>

		<div id = "contain" class = "curvy">


           
            
<?php 
    if ($result2->num_rows > 0){
  	    while($row = mysqli_fetch_assoc($result2)){
        

        if ($row[idUsuario] == $me){
?>
            <!-- ME -->
			<div class="row box margup">
				<h6 class="nomarg" style="float: right">Enviado:<?php echo $row[Fecha];?></h6>
			</div>
			<div class="row box nomarg" >

				<div class="col-5 box" style="text-align:right;" >
					<h6 style="margin-right: 5px;">Yo</h6>
				</div>
				<div class="col-7 box" style="float: right">
					<div class = "content nomarg curvy mid">
					<?php echo $row[Texto];?>
					</div>
				</div>
            </div>
<!-- ME -->

<?php

        }
        else{
?>
           <!-- HIM -->
            <div class="row box margup">
                            <h6 class="nomarg" style="float: left">Enviado:<?php echo $row[Fecha];?></h6>
                        </div>
                        <div class="row box nomarg">
                            
                            <div class="col-7 box" style="float: left;" >
                                <div class = "content nomarg curvy high">
                                <?php echo $row[Texto];?>
                                </div>
                            </div>
                            <div class="col-5 box" style="text-align:left;" >
                                <h6 style="margin-left: 5px;"><?php echo $info[4]; ?></h6>
                            </div>
                        </div>
            <!-- HIM -->

<?php
 $last = $row[idMensaje];
        }   


       
        }
    }
    else {
        echo "Sin mensajes todavía! ¡Saluda a ". $info[4] . "enviandole un saludo!";
    }
?>

		</div>
       
	</div>

</div>


<!-- 
<div class="row box margup">
	<form action="SendMsg.php" method="post">
        <div class="col-10 menu">
		    <div class = "aside margup">
            <input type="text" name = "msg" size = "70" placeholder="Escribir un mensaje...">
		</div>
	</div>

	<div class="col-2 menu">
		<div class = "aside margup buttona">
        <input type="hidden" name="me" value="<?php echo $me;?>">
        <input type="hidden" name="him" value="<?php echo $him;?>">
        <input type="hidden" name="last" value="<?php echo $last;?>">
        <input type="hidden" name="colab" value="<?php echo $last;?>">
        <input type="submit" value="Enviar" onclick ="scargarAndGetColabName('contenido','u_chat.php','<?php echo $row[idUsuario];?>');">
		</div>
	</div>
</form>
-->



<div class="row box margup">
    <div class="col-10 menu">
        <div class = "aside margup">
           
                <input  id = "mes" type="text" name="msg" size = "70" placeholder="Escribir un mensaje...">
           
		<script>
		var input = document.getElementById("mes");
		input.addEventListener("keyup", function(event) {
		    event.preventDefault();
		    if (event.keyCode === 13) {
			document.getElementById("send").click();
		    }
		});

	</script>

        </div>
    </div>

    <div class="col-2 menu">
        <div class = "aside margup buttona" id="send"
        onclick ="scargarAndSendMsg('contenido','SendMsg.php','<?php echo $me;?>','<?php echo $him;?>','<?php echo $last;?>','<?php echo $row[idUsuario];?>');">
            Enviar
        </div>
    </div>
</div>
