<!-- MÓDULO PRINCIPAL -->
<?php
	include "config.php";
	require_once "HTML/Template/ITX.php";
	
	// ========================================================================
	//
	// 	Cargamos el template principal
	// 
	// ========================================================================
	$template = new HTML_Template_ITX('./Templates');
	$template->loadTemplatefile("index.html", true, true);
	
	$title = $_GET["title"];
	$UserName = $_POST['UserName'];
	$denied = $_GET['denied'];
		
	//INICIO DE LOGIN
	if ($title == ""){

		$title = "Iniciar Sesión";
		
		$template->setVariable("TITLE", $title);
		$template->addBlockfile("CONTENIDO", "LOGIN", "login.html");
		$template->setCurrentBlock("LOGIN");
		$template->setVariable("VARIABLE", "");
		$template->parseCurrentBlock();
		
		if ($denied == 1){

			echo '<script language="javascript">alert("Datos Incorrectos.");</script>'; 

		}
		else if ($denied == 2){

			echo '<script language="javascript">alert("Su contraseña no coincide.");</script>'; 

		}else if ($denied == 3){

			echo '<script language="javascript">alert("Usuario baneado. Solicite al administrador el acceso de nuevo.");</script>'; 

		}
	
	}//FIN LOGIN
	
	if ($title == "Registrarse"){

		
		$template->setVariable("TITLE", $title);
		$template->addBlockfile("CONTENIDO", "REGISTRO", "registro.html");
		$template->setCurrentBlock("REGISTRO");
		$template->setVariable("VARIABLE", "");
		$template->parseCurrentBlock();

	}//FIN REGISTRO
			
	$template->show();
?>
