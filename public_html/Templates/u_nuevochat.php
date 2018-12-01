<?php

include "../config.php";
session_start();
$id = $_SESSION[id];
?>

<form action="msg.php" method="post">
<div class="row box margup">
    <div class="col-12 menu">
    	<input  id = "sub" type="text" name="him" size = "70" placeholder="Destinatario">
           
    </div>
</div>



<div class="row box margup">
    <div class="col-10 menu">
        <div class = "aside margup">
           
                <input  id = "mes" type="text" name="msg" size = "70" placeholder="Escribir un mensaje...">
           
        </div>
    </div>

    <div class="col-2 menu">
    <input type="submit" style="display:none"/>
    <br>
    </form>
    </div>
</div>