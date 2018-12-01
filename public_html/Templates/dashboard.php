<?php 

session_start();

echo $id = $_SESSION[id] ;
foto = "http://antares.dci.uia.mx/ic16azp/files/userpic/" . $id . ".jpg";
echo $what= $_GET["msg"];

?>

{VARIABLE}
<div class="header block3">
  <a class="logo">Proyecto</a>
  <div class="header-right">
    <a class="active" >{USUARIO}</a>
  </div>
</div>

<div class="row blockcont"> <!-- Renglon -->
  <div class="col-2 menu usuario blockcont block3"> <!-- Caja de usuario -->
    <div  class = "aside blockcont" style="margin: 0px;"> 
      <ul class="blockcount">
    <?php echo $linea;?>
        <li id = "fotoperf" class="noselec">

        </li>

	     
        


        <li class = "uns curvy" onclick ="scargar('contenido','u_noticias.php');">Noticias</li>

    
      

        <li class="uns high curvy" onclick ="scargar('contenido','u_proylist.php');">Proyectos</li>

        

 

        <li class = "uns curvy" onclick ="scargar('contenido','u_perfil.php');">Mi perfil</li>

      </a>
    
      <a href="http://antares.dci.uia.mx/ic16azp/logout.php">
          <li class = "uns curvy">Salir</li>
      </a>

      </ul>
    </div>
  </div>

  <div class="col-8 box block2">

	 <div class="menu box">
	   	<div id="contenido" class = "content curvy">
	    	<h1> Bienvenido</h1>
	   	</div>
    </div>

  </div>

  <div class="col-2 menu box block1">

    <div class = "content high smallbox margup uns">
    Mensajes

    	 <div id="mensajes" class = "content margup smallbox curvy sel">
    	
    	</div>

    </div>

<div class = "content high smallbox margup uns">
    Notificiaciones
    
    <div id="notificaciones" class = "content margup smallbox curvy sel">
    	
    	</div>

</div>


  </div>

</div>

<div class="footer">
    <p>Calpis And Subi Industries</p>
  </div>

