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
      <li class="active"><a href="services.php">Serviços</a></li>
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
		   	<div class="services">
		   		<h4>Serviços</h4>

		    <div class="section group">
				<div class="col_1_of_5 span_1_of_5">
					<h3>Fisioterapia</h3>
					<img src="images/fisioterapia.png" title="service1"  style="width:130px;height:130px;"/>
					<p>•	15 € / Tratamento </p>
					<p>•	Tratamentos de aproximadamente 60 minutos</p>
					<p>•	Utilização de electroestimulação, Ultra-som, calores húmidos, crioterapia, massagem terapêutica, ventosas, manipulação manual e bandas neuromusculares (Kinesiotape) consoante a lesão do paciente.</p>
					<p>•	Algumas lesões a tratar: cervicalgia, lombalgia, dor ciática, entorses, tendinites, luxações, artroses, fibromialgia, roturas musculares, pernas candadas, stress e ansiedade, entre outras.</p>
			        </div>
				<div class="col_1_of_5 span_1_of_5">

					<h3>Acupuntura </h3>
					<img src="images/Acupuntura.png" title="service1" style="width:130px;height:130px;"/>
					<p>•	15 € / Tratamento </p>
					<p>•	Tratamentos de aproximadamente 60 minutos </p>
					<p>•	A acupuntura é um método terapêutico que consiste na estimulação de pontos específicos do corpo através de agulhas. Essa estimulação tem a capacidade de regular o fluxo energético que é responsável pela fisiologia do corpo humano.</p>
					<p>•	“As pedras recolhem e transmitem energia, juntamente com o calor, promovendo um relaxamento profundo”</p>
                    <p>•	Quando necessário utiliza-se a eletroacupuntura, ventosas e moxas para tratamento de determinadas patologias.</p>

				</div>
				<div class="col_1_of_5 span_1_of_5">
					<h3>Massagem de relaxamento</h3>
					<img src="images/relaxamento.png" title="service1" style="width:130px;height:130px;"/>
					<p>•	20 €, 60 minutos, corpo todo </p>
					<p>•	“ Efetuada com movimentos lentos e suaves, de maneira a promover o relaxamento físico” </p>
				</div>

				<div class="col_1_of_5 span_1_of_5">
					<h3>Massagem Pedras Quentes</h3>
					<img src="images/PedrasQuentes.png" title="service1" style="width:130px;height:130px;"/>
					<p>•	25 €, 60 minutos, corpo todo</p>
					<p>•	“As pedras recolhem e transmitem energia, juntamente com o calor, promovendo um relaxamento profundo”</p>

				</div>
				<div class="col_1_of_5 span_1_of_5">
					<h3>Massagem pré-natal</h3>
					<img src="images/relaxamento.png" title="service1" style="width:130px;height:130px;" />
					<p>•	20 €, 60 minutos, corpo todo </p>
					<p>•	“Massagem apropriada para grávidas, trabalha as pernas cansadas reduzindo a retenção de líquidos e as costas doridas do excesso de peso abdominal. Posição deitada lateralmente ou sentada” </p>
				</div>
			</div>

			 <div class="section group">
				<div class="col_1_of_5 span_1_of_5">
					<h3>Massagem desportiva</h3>
					<img src="images/desportiva.png" title="service1" style="width:130px;height:130px;" />
					<p>•	25 €, 60 minutos, corpo todo </p>
					<p>•	“Indicada para todos os praticantes de actividade física. É efetuada com pressão e alongamentos ao longo do corpo. Trabalha toda a massa muscular, libertando os músculos contraídos e aumenta a circulação” </p>
				</div>

				<div class="col_1_of_5 span_1_of_5">
					<h3>Massagem terapêutica localizada </h3>
					<img src="images/localizada.png" title="service1" style="width:130px;height:130px;"/>
					<p>•	15 €, 40 minutos </p>
					<p>•	“Descontraturante, ao longo das costas e pernas, aliviando a dor, ansiedade e tensões acumuladas ” </p>

				</div>
				<div class="col_1_of_5 span_1_of_5">
					<h3>Massagem com creme</h3>
					<img src="images/relaxamento.png" title="service1" style="width:130px;height:130px;" />
					<p>•    Cremes: liporedutor + vacuoterapia + electrolipolise + envolvimento</p>
					<p>•	Individual 15 €, pacote de 10 sessões 100 € </p>
					<p>•	Aproximadamente 45 minutos </p>
				</div>

				<div class="col_1_of_5 span_1_of_5">
					<h3>Mesoterapia homeopática </h3>
					<img src="images/Mesoterapia.png" title="service1" style="width:130px;height:130px;"/>
					<p>•	Individual 30€, pacote de 5 sessões 125 € </p>
					<p>•	Aproximadamente 30 minutos </p>
				</div>

				<div class="col_1_of_5 span_1_of_5">
					<h3>Drenagem linfática manual </h3>
					<img src="images/Drenagem_linfática.png" title="service1" style="width:130px;height:130px;"/>
					<p>•	Individual 15 €, pacote de 10 sessões 100 € </p>
      				<p>•	Aproximadamente 45 minutos </p>

				</div>
			</div><br />
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
		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>

