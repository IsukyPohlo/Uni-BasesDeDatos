<?php
   session_start();
// REMOVER SESIÓN
session_unset(); 

// DESTRUIR DATOS GUARDADOS
session_destroy(); 

header ("Location: http://antares.dci.uia.mx/ic16azp");

?>
