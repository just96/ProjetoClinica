

<!DOCTYPE HTML>
<html>
    <head>
       
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="iso-8859-1">
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
          <li><a href="alterarpw.php">Alterar password</a></li>
          <li><a href="marcarconsulta.php">Marcar Consulta</a></li>
          <li><a href="verconsulta.php">Ver consultas</a></li>
        </ul>
      </li> 
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>  
<?php
}else{
?>  
        <li class="active"><a href="registo.php"><span class="glyphicon glyphicon-log-in"></span>Registar</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
<?php
}
?>


        </div>
        <div class="clear"> </div>
        <!--end-top-nav-->
      </div>
      <!--end-header-->
    </div>




<?php

// verifica se existe sessao do utiliador 

    if (isset($_SESSION['Utilizador']) && isset($_SESSION['id']) ){

     header( "Location:index.php" );

 }


// php para registar o utilizador no site , com restrições de password , e com restrições a nivel do nome de utilizador ,contacto etc.

    if(isset($_POST['registar'])) {
        include("conectar_bd.php");


        $Nome = strip_tags($_POST['Nome']);
        $Utilizador = strip_tags($_POST['Utilizador']);
        $Password = strip_tags($_POST['Password']);
        $PasswordC = strip_tags($_POST['PasswordC']);
        $Email = strip_tags($_POST['Email']);
        $DataNascimento = strtotime($_POST['DataNascimento']);
        $DataNascimento = date('Y-m-d H:i:s', $DataNascimento);
        $Contacto = ($_POST['Contacto']);
        $BI_CC = strip_tags($_POST['BI_CC']);

        $Nome = stripcslashes($Nome);
        $Utilizador = stripcslashes($Utilizador);
        $Password = stripcslashes($Password);
        $PasswordC = stripcslashes($PasswordC);
        $Email = stripcslashes($Email);
        $Contacto = stripcslashes($Contacto);
        $BI_CC = stripcslashes($BI_CC);

        $Nome = mysqli_real_escape_string($connection,$Nome);
        $Utilizador = mysqli_real_escape_string($connection,$Utilizador);
        $Password = mysqli_real_escape_string($connection,$Password);
        $PasswordC = mysqli_real_escape_string($connection,$PasswordC);
        $Email = mysqli_real_escape_string($connection,$Email);
        $Contacto = mysqli_real_escape_string($connection,$Contacto);
        $DataNascimento = mysqli_real_escape_string($connection,$DataNascimento);
        $BI_CC = mysqli_real_escape_string($connection,$BI_CC);


     
        $sql_fetch_username = "SELECT username FROM users WHERE username = '$Utilizador'";
        $sql_fetch_email = "SELECT Email FROM users WHERE email = '$Email'";
        $sql_fetch_BI_CC = "SELECT BI_CC FROM users WHERE BI_CC ='$BI_CC'";
        $sql_fetch_Contacto = "SELECT Contacto FROM users WHERE Contacto = '$Contacto'";
    

        $query_username = mysqli_query($connection,$sql_fetch_username); //usado para comprar o nome de utilizador introduzido com os da base de dados.
        $query_email = mysqli_query($connection,$sql_fetch_email);
        $query_BI_CC = mysqli_query($connection,$sql_fetch_BI_CC);
        $query_Contacto = mysqli_query($connection,$sql_fetch_Contacto);

       if (strlen($Utilizador)<=5){
            ?>
             <div class="alert alert-warning">
               O Utilizador tem de ter pelo menos 5 caracteres.
                </div>
            <?php
            return;
        }

        $error="";


    
         if($PasswordC == $Password ){
                  

        if(strlen($Password) < 8 ){
          $error .= "Password muito curta! 
        ";
        }

        if(strlen($Password) > 20 ){
          $error .= "Password muito longa! 
        ";
        }


        if( !preg_match("#[0-9]+#", $Password) ) {
          $error .= "Password tem de incluir pelo menos um número! 
        ";
        }


        if( !preg_match("#[a-z]+#", $Password) ) {
          $error .= "Password tem de incluir pelo menos uma letra!
        ";
        }


        if( !preg_match("#[A-Z]+#", $Password) ) {
          $error .= "Password tem de incluir pelo menos uma letra maiúscula!
        ";
        }


        if( !preg_match("#\W+#", $Password) ) {
          $error .= "Password tem de incluir pelo menos um símbolo!
        ";
        }

        if($error){
          ?>
        <div class="alert alert-danger">
        Validação da Password falhou (password fraca): <?php echo "$error"; ?>
        </div>
         <?php
          return;
        } 
                  
        }else{
          ?>
           <div class="alert alert-danger">
                    Passwords não são iguais!
                    </div>
          <?php
          return;
        }

        if (mysqli_num_rows($query_username) ) {
            ?>
                <div class="alert alert-warning">
               Nome de utilizador já em uso!
                </div>
            <?php
            return;
        }

       
        if(!filter_var($Email,FILTER_VALIDATE_EMAIL) || $Email == ""){
            ?>
                <div class="alert alert-warning">
               Email não válido!
                </div>
            <?php
            return;
        }
        if (mysqli_num_rows($query_email)) {
              ?>
                <div class="alert alert-warning">
               Email já em uso!
                </div>
            <?php
            return;
        }

        if(mysqli_num_rows($query_BI_CC)){
                ?>
                <div class="alert alert-warning">
               Identificação em uso!
                </div>
            <?php
            return;
        }
        if(mysqli_num_rows($query_Contacto)){
              ?>
                <div class="alert alert-warning">
               Contacto já em uso!
                </div>
            <?php
            return;
        }

        $Password = md5($Password);
        $PasswordC = md5($PasswordC);

        $sql_store = "INSERT INTO users( Nome ,username , password , Email, Contacto , DataNascimento,BI_CC)
        VALUES ('$Nome','$Utilizador','$Password', '$Email','$Contacto','$DataNascimento','$BI_CC')";
        mysqli_query($connection,$sql_store);

      ?>
    <div class="alert alert-success">
    <strong>Registo Efetuado com sucesso!</strong>
    </div>

    <?php  
      header("refresh:1;url=index.php"); }
?>




<!DOCTYPE html>



<html>
<head> 
        
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
                            <label for="name" class="cols-sm-2 control-label">Nome</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="Nome" placeholder="Nome Completo"required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Bilhete Identidade/Cartão Cidadão</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" min="0" type="int" name="BI_CC" placeholder="Número BI/CC" maxlength="8" required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="Email" placeholder="Email" required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Contacto</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="Contacto" maxlength="9" placeholder="Contacto"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Data de Nascimento</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa-lg" aria-hidden="true"></i></span>
                                    <input type="Date" class="form-control" name="DataNascimento" />
                                </div>
                            </div>
                        </div>


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

                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Confirmar Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="PasswordC" placeholder="Password"required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button type="submit" name="registar" class="btn btn-primary btn-lg btn-block login-button">Registar</button>
                        </div>
                        <div class="login-register">
                            <a href="login.php">Login</a>
                         </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="assets/js/bootstrap.js"></script>

</body>
</html>






 <div class="clear"> </div>
           <div class="footer">
             <div class="wrap">
            <div class="footer-left">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">Sobre</a></li>
                        <li><a href="services.php">serviços</a></li>
                        <li><a href="contact.php">contactos</a></li>
                        <li><a href="registo.php">Registar</a></li>
                        <li><a href="login.php">Login</a></li>
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