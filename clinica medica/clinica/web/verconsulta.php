<?php 

session_start();

include("conectar_bd.php");
$id = $_SESSION ['id'];

// verifica se existe sessao do utiliador 

 if (!isset($_SESSION['Utilizador']) && !isset($_SESSION['id']) ){

     header( "Location:index.php" );

 }

 

$sql1337 = "SELECT * FROM consultas WHERE id_user = '$id'";
$query2= mysqli_query($connection,$sql1337);
$row1 = mysqli_fetch_array($query2);
$resultado = mysqli_query($connection,$sql1337);



?>

<?php 

// php para apagar consultas do utilizador

  if(isset($_POST['apagarc'])){
 

      $sqlapagar="DELETE FROM consultas WHERE id_consultas =" .$_POST['idconsulta'];  

            mysqli_query($connection,$sqlapagar);
           ?>
            <div class="alert alert-success">
          Consulta eliminada com sucesso!
          </div>
           <?php
            header( "refresh:2;url=verconsulta.php" );

        }
      

          
   
?>






<!DOCTYPE HTML>
<html>
  <head>
 <style>

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
          <li><a href="verperfil.php">Ver Perfil</a></li>
          <li><a href="marcarconsulta.php">Marcar Consulta</a></li>
          <li class="active"><a href="verconsulta.php">Ver consultas</a></li>
        </ul>
      </li> 
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>  
<?php
}else{
?>  
    <li><a href="registo.php"><span class="glyphicon glyphicon-log-in"></span> sing in</a></li>
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

<div class="container">
<div class="alert alert-warning" role="alert" >
  Atenção! Se quiser cancelar a consulta deverá ser com 24 horas de antecedência.
</div>

</div>



<?php

// buscar à base de dados as consultas do utilizador e mostrá-las

        if(mysqli_num_rows($resultado)>0){
?>



 <div class="table-responsive">          

  <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>

    <tr>
      
        <th class="t2">Médico</th>
        <th class="t2">Especialidade </th>
        <th class="t2">Data da Consulta</th>
        <th class="t2">Hora da Consulta</th>
        <th class="t2">Observação</th>
         <th></th><br><br>
    </tr>
  </thead>
  <tbody>
     <?php
            while($row1=mysqli_fetch_assoc($resultado)){ 


  ?>      
      <tr class="active">
          <form action="" method="POST" >

          <input type="hidden" name="idconsulta" value="<?php echo $row1['id_consultas'];?>">

          <td class="t1"><?php echo $row1['Medico'];?></td>
          <td class="t1"><?php echo $row1['Especialidade'];?></td>
          <td class="t1"><?php echo $row1['DataConsulta'];?></td>  
          <td class="t1"><?php echo $row1['HoraConsulta'];?></td>  
          <td class="t1"><?php echo $row1['Comentario'];?></td>
          <td ><input class="button" type="submit" name="apagarc" value="Apagar Consulta" onClick="return confirm('Deseja eliminar a consulta?')"></td>
          </form>
      </tr>
            <?php   

    }
    ?>

  

    </tbody>
  </table>
  </div>
</div>



<?php }else{
  ?>
<div class="container">
    <div class="alert alert-danger">
             Não há consultas marcadas!
    </div>
</div>
    <?php
}


      ?>



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

