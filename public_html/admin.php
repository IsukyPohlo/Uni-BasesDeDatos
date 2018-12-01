<!-- PLANTILLA PRINCIPAL PARA EL MÓDULO DE ADMINISTRACION -->

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" type="text/css" media="All" href="./css/proyectiza.css" /> 

	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		
	
	<script type="text/javascript" src="./js/Centro.js"></script>

</head>

<body onload="  scargar('users','a_users.php');scargar('proyects','a_proyects.php');">

<div class="header block3">
  <a href="#default" class="logo">Proyectiza </a>
  <div class="header-right">
    <a class="active" href="#home">ADMIN</a>
   
  </div>
</div>

<div class="row blockcont"> <!-- Renglon -->
  <div class="col-2 menu usuario blockcont block3"> <!-- Caja de usuario -->
    <div  class = "aside blockcont" style="margin: 0px;"> 
      <ul class="blockcount">

        <li class="noselec">

            <img class="imglim curvy" src="https://vignette.wikia.nocookie.net/creepypasta/images/4/4c/Name-tag-admin-1000.png/revision/latest?cb=20130730233935" style="max-width: 100%; max-height: 100%;">

        </li>

        <a target="_blank">

        <li class="uns high curvy" onclick ="location.reload();">
          Admin
        </li>

        </a>

      <a target="_blank" href="http://antares.dci.uia.mx/ic16azp/logout.php">
          <li class = "uns curvy">Salir</li>
      </a>

      </ul>
    </div>
  </div>

  <div id="contenido" class="col-10 box">

    <div class = "row bigbox">

      <h1> Adminsitrador </h1>

      <div class="col-6 bigbox">
        <div id=users class = "content nomarg curvy"> 
          Usuarios
        </div>
      </div>

      <div class="col-6 bigbox">
        <div id="proyects" class = "content nomarg curvy">
          Proyectos
        </div>
      </div>
    </div>  

  </div>
</div>

<div class="footer">
    <p>Calpis And Subi Industries</p>
  </div>

</body>
</html>
