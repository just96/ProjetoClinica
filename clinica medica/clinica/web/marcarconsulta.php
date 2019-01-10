<?php 

session_start();
 include("conectar_bd.php");
// verifica se existe sessao do utiliador 

 if (!isset($_SESSION['Utilizador']) && !isset($_SESSION['id']) ){

     header( "Location:index.php" );

 }

// php para marcar a consulta atendendo a consultas já marcadas(com restrições)


    if(isset($_POST['consulta'])) {
       

        $especialidade = ($_POST['especialidade']);
        $medico = ($_POST['medico']);
        $id= $_SESSION['id'];
        $DataConsulta = strtotime($_POST['DataConsulta']);
        $DataConsulta = date('Y-m-d H:i:s', $DataConsulta);
        $horario = ($_POST['horario']);
        $t=time();
        $comentario = $_POST['comentario'];

        $DataConsulta = stripslashes($DataConsulta);
        $horario =  stripslashes($horario);
        $especialidade =  stripslashes($especialidade);
        $medico =  stripslashes($medico);
        $comentario = stripslashes($comentario);

        $comentario = mysqli_real_escape_string($connection,$comentario);
        $DataConsulta = mysqli_real_escape_string($connection,$DataConsulta);
        $horario = mysqli_real_escape_string($connection,$horario);
        $especialidade = mysqli_real_escape_string($connection,$especialidade);
        $medico = mysqli_real_escape_string($connection,$medico);


        $sql_horario = "INSERT INTO consultas(id_user,Medico,Especialidade,DataConsulta,HoraConsulta,Comentario)
        VALUES('$id','$medico','$especialidade','$DataConsulta','$horario','$comentario')";
        $sql_fetch = "SELECT * FROM consultas WHERE Medico='$medico' AND DataConsulta = '$DataConsulta' AND HoraConsulta = '$horario'";


        $query_f = mysqli_query($connection,$sql_fetch);


         if ($DataConsulta <= (date("Y-m-d H:i:s",$t))) {
           ?>
              <div class="alert alert-danger">
             Data inválida!
              </div>
              <?php
              
}
        elseif (mysqli_num_rows($query_f)) {
            ?>
              <div class="alert alert-danger">
             Já existe consulta marcada nesse dia!
              </div>
            <?php
            
        }
       
       elseif(mysqli_query($connection,$sql_horario)){;
          ?>
          <div class="alert alert-success">
          Consulta marcada com sucesso!
          </div>
          <?php
            header("refresh:1;url=marcarconsulta.php");
}

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

    <meta charset="iso 8859-1">
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
          <li class="active"><a href="marcarconsulta.php">Marcar Consulta</a></li>
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

<div class="container">

  <div class="alert alert-warning" role="alert" >
  Atenção! Uma vez que a consulta é marcada ,até 12 horas, a consulta passará a ser oficial/efetiva.Para resultado contrário apague a sua consulta <a href="verconsulta.php">aqui</a> .
  <p></p><p>Aguarde email de confirmação de consulta!</p>
</div>

<?php include("consulta.php");?>
<br><br>

<div class="container">
<form action="marcarconsulta.php" method="POST">
    <strong class="t2">Tipo de Consulta</strong><br><br>
<select name="especialidade">
    <option value="Acunpuntura">Fisioterapia</option>
    <option value="Fisioterapia">Acupuntura</option>
    <option value="Massagem de relaxamento">Massagem de relaxamento</option>
    <option value="Massagem Pedras Quentes">Massagem Pedras Quentes</option>
    <option value="Massagem pré-natal">Massagem pré-natal</option>
    <option value="Massagem desportiva">Massagem desportiva</option>
    <option value="Massagem terapêutica localizada">Massagem terapêutica localizada</option>
    <option value="Massagem com creme">Massagem com creme</option>
    <option value="Mesoterapia homeopática">Mesoterapia homeopática</option>
    <option value="Drenagem Linfática manual">Drenagem Linfática manual</option>
</select><br><br>
    <strong class="t2">Médico</strong><br><br>
<select name="medico">
    <option value="Dr.António Magalhães">Dr.António Magalhães</option>
    <option id="2" value="Drª Maria Fonseca">Drª Maria Fonseca</option> 
    <option id="3" value="Dr.Miguel C. Silva">Dr.Miguel C. Silva</option>
  <br><br>

</select><br><br>
 <strong class="t2">Hora da Consulta</strong><br><br>
<select name="horario">
    <option value="10:00-11:00">10:00-11:00</option>
    <option value="11:00-12:00">11:00-12:00</option>
    <option value="12:00-13:00">12:00-13:00</option>
    <option value="15:00-16:00">15:00-16:00</option>
    <option value="16:00-17:00">16:00-17:00</option>
    <option value="17:00-18:00">17:00-18:00</option>
</select>
    <br><br>
    <strong class="t2">Data da Consulta</strong><br><br>
    <input type="date" name="DataConsulta" required>
    <br><br>

 <strong class="t2">Observações</strong><br><br>
    <textarea row="10" cols="60" name="comentario">
    </textarea>
    <p></p>

  <input class="button" type="submit" name="consulta" value="Marcar Consulta" onClick="return confirm('Deseja marcar a consulta?')">
</form>
</div>

</div>



            <div class="clear"> </div>
           <div class="footer">
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