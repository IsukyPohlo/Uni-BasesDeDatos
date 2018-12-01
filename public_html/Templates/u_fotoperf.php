<?php
session_start();
$id = $_SESSION[id];
$foto = "http://antares.dci.uia.mx/ic16azp/files/userpic/" . $id . ".jpg"; 
?>
<img class="imglim curvy" src="<?php echo $foto; ?>">