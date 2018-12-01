<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 

<?php
	

	require_once "HTML/Template/ITX.php";
	
	// ========================================================================
	//
	// 	Cargamos el template y desplegamos la pagina 
	// 
	// ========================================================================

	$template = new HTML_Template_ITX('./Templates');
	
	$plantilla = $_POST['plantilla'];

	$enlace = "./" . $plantilla;

	$template->loadTemplatefile($enlace, true, true);
	
	$template->setVariable("TEXTO", "$enlace");
	
	$template->parseCurrentBlock();

	$template->show();
?>
