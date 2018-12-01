
// ========================================================================
//
// 	FUNCIONES DE AJAX
// 
// ========================================================================

function cargar(elemento,plantilla){

	var params = "elemento="+elemento+"&plantilla="+plantilla+"&rand=" + new Date().getTime();

	var contenedor = "#"+elemento;

	$.ajax({
		url: "./Center.php",
		dataType: 'html',
		type: 'POST',
		async: true,
		data: params,
		success: function muestraContenido(result,status,xhr){
			$(contenedor).html(result);
		},
		error: funcionErrors,
		cache: false
	});

	return true;
}// 

function scargar(elemento,arch){

	var lugar = "./Templates/"+arch;

	var contenedor = "#"+elemento;

	$.ajax({
		url: lugar,
		dataType: 'html',
		async: true,
		success: function muestraContenido2(result,status,xhr){
			$(contenedor).html(result);
		},
		error: funcionErrors,
		cache: false
	});

	return true;
}// 

function scargarAndGetProyectName(elemento,arch,proyect){

	var lugar = "./Templates/"+arch+"?proyect="+proyect;
	var contenedor = "#"+elemento;

	$.ajax({
		url: lugar,
		dataType: 'html',
		async: true,
		success: function muestraContenido2(result,status,xhr){
			$(contenedor).html(result);
			},
		error: funcionErrors,
		cache: false
	});

	return true;
}// 

function scargarAndGetColabAndProyectName(elemento,arch,colabName,proyect){

	var lugar = "./Templates/"+arch+"?colab="+colabName+"&proyect="+proyect;
	var contenedor = "#"+elemento;

	$.ajax({
		url: lugar,
		dataType: 'html',
		async: true,
		success: function muestraContenido2(result,status,xhr){
			$(contenedor).html(result);
			},
		error: funcionErrors,
		cache: false
	});

	return true;
}// 

function scargarAndGetColabName(elemento,arch,colabName){

	var lugar = "./Templates/"+arch+"?colab="+colabName;
	var contenedor = "#"+elemento;

	$.ajax({
		url: lugar,
		dataType: 'html',
		async: true,
		success: function muestraContenido2(result,status,xhr){
			$(contenedor).html(result);
			},
		error: funcionErrors,
		cache: false
	});

	return true;
}// 


function scargarAndSendMsg(elemento,arch,me,him,last,colabName){

	var mesg = $("#mes").val();

	var lugar = "./Templates/"+arch+"?colab="+colabName+"&me="+me+"&him="+him+"&last="+last+"&mesg="+mesg;
	var contenedor = "#"+elemento;

	$.ajax({
		url: lugar,
		dataType: 'html',
		async: true,
		success: function muestraContenido2(result,status,xhr){
			$(contenedor).html(result);
			},
		error: funcionErrors,
		cache: false
	});

	return true;
}// 


/*function despliegaContenido(contenido, cadena, valor){

	var prueba = document.getElementById("entry");

	var params = "nombre="+cadena+"&numero="+valor;
	
	$.ajax({
		url: "./ejemploAjaxContenido1.php",
		dataType: 'html',
		type: 'POST',
		async: true,
		data: params,
		success: muestraContenido,
		error: funcionErrors
	});
	
	return true;
}*/ 

/*
function muestraContenido(result,status,xhr){
	$("#contenido").html(result);
}// muestraEditarUsuario
*/

function funcionErrors(xhr,status,error){
	alert(xhr);
}// muestraEditarUsuario

