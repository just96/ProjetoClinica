<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Fisionogueira Website</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<body>
		<!--start-wrap-->
		


			<!--start-header PARTE AZUL DE CIMA-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="index.php"><img src="images/logotipo.png" title="logo" style="width:300px;height:60px;"  /></a>
				</div>





				<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">FisioNogueira </a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">Quem Somos</a></li>
      <li><a href="services.php">Serviços</a></li>
      <li class="active"><a  href="contact.php">Contactos</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    	<?php 
						session_start();

						if (isset($_SESSION['Utilizador'])) {
?>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-user" ></span> Perfil</a>
      		<ul class="dropdown-menu">
          <li><a href="verperfil.php">Ver Perfil</a></li>
          <li><a href="marcarconsulta.php">Marcar Consulta</a></li>
          <li><a href="verconsulta.php">Ver consultas</a></li>
        </ul>
      </li> 
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>  
<?php
}else{
?>	
		<li><a href="registo.php"><span class="glyphicon glyphicon-log-in"></span> Registar</a></li>
      	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
<?php
}
?>      
    </ul>
  </div>
</nav>


				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		    <div class="clear"> </div>
		   <div class="wrap">
		   	<div class="contact">
		   	<div class="section group">				
				<div class="col span_1_of_3">
					<div class="contact_info">
			    	 	<h2>Localização</h2><br />
			    	 		<div class="map">
					   			<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2862.275302216805!2d-8.412369384662277!3d41.53209127925116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd24f94cd6bea703%3A0x951325e3625810f9!2sR.+de+Barreiros%2C+4715-213+Nogueira!5e1!3m2!1spt-PT!2spt!4v1484235986510" allowfullscreen></iframe><br><small><a target="_blank" href="https://goo.gl/maps/sg7Zi8b8CjT2" style="color:#666;text-align:left;font-size:12px"></a></small>
					   		</div>
      				</div>
      			<div class="company_address">
				     	<h2>Clinica Informação :</h2>
						    	<p>Rua dos Barreiros nº80 - Nogueira</p>
						    	<p>4715-206 Braga</p>

						   		<p>PT</p>
				   		<p>Telefone:253085491</p>
				   		<p>Telemóvel:937639972</p>
				   		<p>Telemóvel:964842781</p>
				 	 	<p>Email:fisionogueira80@hotmail.com</p>
				   		<p>Follow on: <span><a target="_blank" href="https://www.facebook.com/fisionogueira/?fref=ts">Facebook</span></a></p>
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contactar</h2>
					    <form action="contact.php" method="post" autofocus>
					    	<div>
						    	<span><label>Nome</label></span>
						    	<span><input name="iNome" id="iNome" type="text" value="" autofocus></span>
						    </div>
						    <div>
						    	<span><label>Assunto</label></span>
						    	<span><input name="iAssunto" id="iAssunto" type="text" value=""></span>
						    </div>
						    <div>
						     	<span><label>E-mail</label></span>
						    	<span><input name="iEmail" id="iEmail" type="text" value="" placeholder="exemplo@hotmail.com"></span>
						    </div>
						    <div>
						    	<span><label>Texto</label></span>
						    	<span><textarea name="iTexto" id="iTexto"> </textarea></span>
						    </div>
						   <div>
						   		<span><input name="iBotao" id="iBotao" type="submit" value="Enviar"></span>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
			</div>
	      <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">Sobre</a></li>
						<li><a href="services.php">serviços</a></li>
						<li><a href="contact.php">contactos</a></li>
<?php 
						if (isset($_SESSION['Utilizador'])) {
?>
						<li><a href="verperfil.php">Ver Perfil </a></li>
                        <li><a href="marcarconsulta.php">Marcar Consulta</a></li>
                        <li><a href="verconsulta.php">Ver Consultas</a></li>
						<li><a href="logout.php" >Logout</a></li>

<?php
						}else{
?>	
						<li><a href="Registo.php">Registar</a></li>
						<li><a href="login.php">Login</a></li>
<?php
					    }
?>
					</ul>
		   	</div>
		   	<div class="footer-right">
		   	</div>
		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>

<?php

// php para enviar o email para o mail da clinica

 if (isset($_POST["iBotao"])) {
  $iNome  = $_POST["iNome"];
  $iAssunto = $_POST["iAssunto"];
  $iEmail  = $_POST["iEmail"];
  $iTexto  = $_POST["iTexto"];


  $CorpoEMAIL = "
   Email = $iEmail
   Nome = $iNome

   $iTexto
   ";

  if ($iNome == "" || $iAssunto == "" || $iEmail == "" || $iTexto == "") {
   echo "<script> alert('Preencha todos os campos'); location.href=\"contact.php\" </script>";
  } else { 


  $Enviar = mail ("fisionogueira2017@hotmail.com", $iAssunto, $CorpoEMAIL);

  echo "<script> alert('E-mail enviado com sucesso!');location.href=\"contact.php\"; </script>";
  }
 }
?>