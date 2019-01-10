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
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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



    </div>

<?php

  if ( isset($_SESSION['Utilizador']) && isset($_SESSION['id']) )
  header("refresh:0;url=index.php");

  if(isset($_POST['login'])) {
  include_once("conectar_bd.php");

  
  $Utilizador = strip_tags($_POST['Utilizador']);
  $Password = strip_tags($_POST['Password']);

  $Utilizador = stripcslashes($Utilizador);
  $Password = stripcslashes($Password);

  $Utilizador = mysqli_real_escape_string($connection,$Utilizador);
  $Password = mysqli_real_escape_string($connection,$Password);

  $Password=md5($Password);

  $sql ="SELECT * FROM users WHERE username='$Utilizador'";
  $query = mysqli_query($connection,$sql);
  $row = mysqli_fetch_array($query);
  $id = $row['id'];
  $bd_password = $row['password'];
  if($Password == $bd_password){
    
  ?>
  <div class="alert alert-success">
  <strong>Login Efetuado com sucesso!</strong>
  </div>

  <?php
    $_SESSION['Utilizador'] = $Utilizador;
    $_SESSION['id'] = $id;
    header("refresh:1;url=index.php");

  }else{
  ?>
 
<div class="alert alert-danger">
   <strong>Erro:</strong>
  Dados não válidos
    </div> 
    

  
<?php 
}

}
?>








<html>
<head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="stylesregisto.css">

        <!-- Website CSS style -->
        <link rel="stylesheet" type="text/css" href="stylesregisto.css">

        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

        <title>Admin</title>
    </head>
    <body>
        <div class="container">
            <div class="row main">
          
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action="#">

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Utilizador</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="Utilizador" placeholder="Nome de Utilizador" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="Password" placeholder="Password"required/>
                                </div>
                            </div>
                        </div>

                        

                        <div class="form-group ">
                            <button name ="login" type="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
                        </div>
                        <div class="login-register">
                            <a href="registo.php">Registar</a>
                         </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="assets/js/bootstrap.js"></script>

</body>
</html>
</form>
</html>


      <div class="clear"> </div>
       <div class="footer1">
         <div class="wrap">
        <div class="footer-left">
            <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">Quem Somos</a></li>
            <li><a href="services.php">serviços</a></li>
            <li><a href="contact.php">contactos</a></li>
            <li><a href="Registo.php">Registar</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </div>
        <div class="clear"> </div>
       </div>
       </div>
    <!--end-wrap-->
  </body>
</html>
