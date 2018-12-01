<!-- administrador de plantillas HTML -->
<?php

	require_once "HTML/Template/ITX.php";
	
	// ========================================================================
	//
	// 	Cargamos el template principal
	// 
	// ========================================================================
	$template = new HTML_Template_ITX('./Templates');
	$template->loadTemplatefile("index.html", true, true);
	
	session_start();

	$Usuario = $_SESSION["User"];
	$title = $_GET['title'];
	$UserName = $_POST['UserName'];
	$denied = $_GET['denied'];
	$show = $_GET['show'];
	$id = $_GET["id"];
	$_SESSION["id"] = $id;
			
	
	$title = "Inicio";
	
	$template->setVariable("TITLE", $title);
	$template->addBlockfile("CONTENIDO", "DASHBOARD", "dashboard.php");
	$template->setCurrentBlock("DASHBOARD");
	$template->setVariable("VARIABLE", "");
	$template->setVariable("USUARIO", $Usuario);
	$template->setVariable("TEXTO", $Usuario);
	$template->parseCurrentBlock();
	
	

	


	$template->show();
?>























