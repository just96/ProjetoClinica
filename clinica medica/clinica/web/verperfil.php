<?php

session_start();
include("conectar_bd.php");

// verifica se existe sessao do utiliador 

 if (!isset($_SESSION['Utilizador']) && !isset($_SESSION['id']) ){

     header( "Location:index.php" );

 }

// atribuir às variáveis as variáveis globais.

$Utilizador = $_SESSION['Utilizador'];
$id = $_SESSION ['id'];
$sql ="SELECT * FROM users WHERE id='$id'";
$query = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($query);
$sql2 ="SELECT * FROM users WHERE id='$id'";
$result= mysqli_query($connection,$sql2);

   

?>

<?php

// php para editar o perfil do utilizador 

     if(isset($_POST['editar'])) {
         
        $Nome = $_POST['Nome'];
        $Utilizador = $_POST['Utilizador'];
        $Email = $_POST['Email'];
        $DataNascimento = strtotime($_POST['DataNascimento']);
        $DataNascimento = date('Y-m-d H:i:s', $DataNascimento);
        $Contacto = $_POST['Contacto'];
        $BI_CC = $_POST['BI_CC'];


        $sqlperfil="UPDATE users SET Nome='$Nome', username='$Utilizador' , Email='$Email', DataNascimento='$DataNascimento',
        Contacto = '$Contacto', BI_CC = '$BI_CC' WHERE id = '$id'";

        if(($Nome or $Utilizador or  $Email or $Contacto or $BI_CC) == '' ){
          header( "Location:verperfil.php" );
          return;
        }

            mysqli_query($connection,$sqlperfil);
           ?>  
           <div class="alert alert-success">
              Alterações guardadas!
           </div>
  <?php
            header("refresh:2;url=verperfil.php");
           

}

// php para apagar a conta através da verificação da password do utilizador.

     if(isset($_POST['dele'])) {

        $Password = $_POST['Password'];

        $bd_password = $row['password'];

        $Password = md5($Password);

        if($Password == $bd_password){


        $apagar = "DELETE FROM users WHERE id='$id'";
        $apagar_consultas = "DELETE FROM consultas WHERE id_user = '$id'";

            mysqli_query($connection,$apagar) && mysqli_query($connection,$apagar_consultas)
            ?>
             <div class="alert alert-success">
              Conta eliminada com sucesso!
            </div>

            <?php
            header("refresh:1;url=logout.php");
        }else{
      ?>
         <div class="alert alert-danger">
              Password errada!
            </div>
      <?php
    }
  }
  



?>

<?php
    // php para editar a password do utilizador , com validação de password .

  if(isset($_POST['peditar'])) {
    
    include("conectar_bd.php");
  
     $Password = $_POST['Password'];
     $PasswordC = $_POST['PasswordC'];
     $Passwordant = $_POST['Passwordant'];

     $Passwordant = md5($Passwordant);

     $bd_password = $row['password'];

     $error="";


    
 if($Passwordant == $bd_password AND $PasswordC == $Password ){
          

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
} else {
 ?>
            <div class="alert alert-success">
              Password é forte , alterada com sucesso!
            </div>
 <?php
      $Password = md5($Password);
     $PasswordC = md5($PasswordC);

     $sql_password = "UPDATE users SET password = '$Password' WHERE id='$id'";
  mysqli_query($connection,$sql_password);
  header("refresh:1;url=verperfil.php");
}

          
}else{
  ?>
   <div class="alert alert-danger">
              Password antiga incorreta ou passwords não são iguais!
            </div>
  <?php
}
}


  

?>

<!DOCTYPE HTML>
<html>
  <head>

      <style>

      .f1 {
      padding:3px;
      display:block;
      width:50%;
      border-radius: 5px;
      outline:none;
      color:rgb(139, 139, 139);
      }

      .button {
          background-color: #008CBA; 
          border: none;
          border-radius: 5px;
          color: white;
          padding: 10px 25px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
      }

      .t1 {
       font-family: Arial, Helvetica, sans-serif;
  padding: 0.2em 0;
  font-size: 0.8125em;
  line-height: 1.5em;
      }

      .t2 {
        font-family: Arial, Helvetica, sans-serif;
  padding: 0.2em 0;
  font-size: 0.8125em;
  
  line-height: 1.5em; 
        font-weight: bold;
      }
      </style>

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

            if (isset($_SESSION['Utilizador'])) {
?>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-user" ></span> Perfil</a>
          <ul class="dropdown-menu">
          <li class="active"><a href="verperfil.php">Ver Perfil</a></li>
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




   


<?php
// buscar os dados do utilizador que estão na base de dados

   if  (mysqli_num_rows($result)>0){
    ?>
        <form action="verperfil.php" method="POST">
    <?php
      while($row=mysqli_fetch_assoc($result)){
?>

<form action="verperfil.php" method="POST">
<div class="table-responsive">          

  <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tbody>
    <tr>
        <th class="t2">Nome</th><td><input required class="f1" class="t1" type="text" name="Nome" value="<?php echo $row["Nome"]; ?>"  ></td><br><br>
    </tr>
    <tr>
        <th class="t2">Username</th><td><input required class="f1" class="t1" type="text" name="Utilizador" value="<?php echo $row["username"]; ?>" ></td>
    </tr>
    <tr>
        <th class="t2">Contacto</th><td><input required class="f1" class="t1" type="int" name="Contacto" maxlength="9" value="<?php echo $row["Contacto"]; ?>" ></td>
    </tr>
    <tr>
        <th class="t2">Email</th><td><input required class="f1" class="t1" type="text" name="Email" value="<?php echo $row["Email"]; ?>"  ></td>
    </tr>
    <tr>
      <th class="t2">Bilhete de Identidade/Cartão Cidadão</th><td><input required class="f1" class="t1" min="0" type="int" name="BI_CC" value="<?php echo $row["BI_CC"]; ?>"  maxlength="8" ></td>
    </tr> 
    <tr>
        <th class="t2">Data de Nascimento</th> <td><input required class="f1" class="t1" type="date" name="DataNascimento" value="<?php echo $row["DataNascimento"]; ?>"  required ></td>
    </tr>
    <tr>
      <th></th><td><button class="button" type="submit" name="editar" onClick="return confirm('Deseja editar o Perfil?')">Editar Perfil</button></td>
    </tr>
  
</thead>


    </tbody>
  </table>
  </div>
</div>

 <br><br>





<?php      
    }
?>
    </form>
<?php  
  }
?>


   <form action="" method="POST">
                      

                      <input class="t1" type="password" name="Passwordant" placeholder="Password antiga" required>
                        <br><br>



                      <input class="t1" type="password" name="Password" placeholder="Nova Password" required>
                        <br><br>
                    
                        
                      
                        <input class="t1" type="password" name="PasswordC" placeholder="Confirmar Password" required>
                       <br><br>
                    <button class="button" type="submit" name="peditar" onClick="return confirm('Deseja alterar a password?')">Alterar Password</button>
                 


 </form>

 <br><br>
<br><br>


 <form action="" method="POST">
  <div class="t2" > Introduzir password para eliminar conta:</div>
 <input class="t1" type="password" name="Password" placeholder="Password" required>
 <button class="button" type="submit" name="dele" onClick="return confirm('Deseja eliminar a sua conta?')">Eliminar Conta</button>
</div>
</form>
<br><br>
<br><br>



            <div class="clear"> </div>
           <div class="footer1">
             <div class="wrap">
            <div class="footer-left">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">Quem Somos</a></li>
                        <li><a href="services.php">serviços</a></li>
                        <li><a href="contact.php">contactos</a></li>
                        <li><a href="verperfil.php">Ver Perfil </a></li>
                        <li><a href="marcarconsulta.php">Marcar Consulta</a></li>
                        <li><a href="verconsulta.php">Ver Consultas</a></li>
                        <li><a href="logout.php">Logout</a></li>
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




