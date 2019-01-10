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
      <li class="active"><a href="about.php">Quem Somos</a></li>
      <li><a href="services.php">Serviços</a></li>
      <li><a  href="contact.php">Contactos</a></li>
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
		   	<div class="about">
		   		<h4>Medicos</h4>
		   <div class="content-box">
		   <div class="section group">
				<div class="col_1_of_3 span_1_of_3 frist">
					<h3>Antonio Magalhães</h3>
					<img src="images/medico.jpg" title="staff" />
					<span></span>
					<p></p>
				</div>
				<div class="col_1_of_3 span_1_of_3 second">
					<h3>Maria Fonseca</h3>
					<img src="images/medico2.jpg" title="staff" />
					<span></span>
					<p></p>
				</div>
				<div class="col_1_of_3 span_1_of_3 frist">
					<h3>Miguel Silva</h3>
					<img src="images/medico3.jpg" title="staff" style="width:220px;height:230px;" />
					<span></span>
				</div>
			</div>
		   </div>
		   </div>
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
						<li><a href="logout.php" onClick="return confirm('Deseja terminar a sessão?')">Logout</a></li>

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

