
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
      <a class="navbar-brand" href="index.php"> FisioNogueira </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="about.php">Quem Somos</a></li>
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
			<!--end-header PARTE AZUL DE CIMA-->

<!-- IMAGEM A RODAR-->
		<div class="clear"> </div>
			<!--start-image-slider---->
					<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides" id="slider1">
					      <li><img src="images/slider-image1.jpg" alt=""></li>
					      <li><img src="images/slider-image2.jpg" alt=""></li>
					      <li><img src="images/slider-image1.jpg" alt=""></li>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
					<!--End-image-slider---->
		    <div class="clear"> </div>
		<!-- FIM DA IMAGEM A RODAR -->

		</div>




		   <div class="wrap">
		   <div class="content-box">
		   <div class="section group">
				<div class="col_1_of_3 span_1_of_3 frist">
					<h3>Fisioterapia</h3>
					<img src="images/Home.png " title="Fisioterapia" style="width:300px;height:300px;" />
					<span>
					</span>

				</div>
				<div class="col_1_of_3 span_1_of_3 second">
					<h3>Qual a missao da FisioNogueira ?</h3>
					<span>
						A missão da Fisionogueira é a promoção da saúde e bem-estar. O nosso lema é “para termos saúde é preciso prevenção”. Contudo, quando a doença instalada fazemos o nosso melhor para aumentar a qualidade de vida do cliente.<p></p>Apoiamos a relação entre Fisioterapeuta e paciente, e proporcionamos às pessoas a informação, a orientação e as ferramentas necessárias para que possam fazer escolhas e tomar as melhores decisões sobre a sua saúde.Desta forma propomos um espaço dedicado a si, á sua saúde, ao equilíbrio e bem-estar.<p></p>A Fisionogueira cresce com os seus clientes, guiada por valores de inovação, qualidade e transparência de serviço. Como resultado, orgulha-se e publicamente agradece o reconhecimento que os clientes lhes concedem.
					</span>	
				</div>
<?php 
if(isset($_SESSION['Utilizador'])){



}else{
?>
				<div class="col_1_of_3 span_1_of_3 frist">
					<h3>Conta pessoal</h3>
					<span>Faça a sua conta pessoal para dispor da marcação online das suas consultas. As supresas não ficam por aqui faça login e descubra!</span>
					<p>Click na imagem e Registe-se</p>
					<a href="registo.php"><img src="Registar.png" style="width:100px;height:100px;" /></a>
					
				</div>
	<?php
}
	?>
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
						<li><a href="logout.php">Logout</a></li>

<?php
						}else{
?>	
						<li><a href="registo.php">Registar</a></li>
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

