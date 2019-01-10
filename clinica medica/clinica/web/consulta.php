
<div class="col_1_of_3 span_1_of_3 frist">

   <strong class="t2">Consultas do Dr.António Magalhães</strong><br><br>




<?php

$sql_antonio = "SELECT * FROM consultas WHERE Medico = 'Dr.António Magalhães'";
$query_antonio=mysqli_query($connection,$sql_antonio);
$row2 = mysqli_fetch_array($query_antonio);
$resultado_antonio = mysqli_query($connection,$sql_antonio);


?>



    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" >Dr.António Magalhães</a>
        <ul class="dropdown-menu">
<?php


            if(mysqli_num_rows($resultado_antonio)>0){
?>
               <div class="table-responsive">          

                  <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>

                    <tr>
                      
                        <th class="t2">Médico</th>
                        <th class="t2">Especialidade </th>
                        <th class="t2">Data da Consulta</th>
                        <th class="t2">Hora da Consulta</th>
                    </tr>
                  </thead>
<?php
                  while($row2=mysqli_fetch_assoc($resultado_antonio)){ 
?>      
                      <tr class="active">

                          <td class="t1"><?php echo $row2['Medico'];?></td>
                          <td class="t1"><?php echo $row2['Especialidade'];?></td>
                          <td class="t1"><?php echo $row2['DataConsulta'];?></td>  
                          <td class="t1"><?php echo $row2['HoraConsulta'];?></td>  

                      </tr>
<?php   

                    }
?>
                  </table>
              </div>





<?php           
                 }else echo"Este(a) medico(a) não tem consultas marcadas";
?>

        </ul>
      </li> 

      <img src="images/medico.jpg" title="staff" />

</div>
<div class="col_1_of_3 span_1_of_3 frist">

  <strong class="t2">Consultas da Drª Maria Fonseca</strong><br><br>

<?php


$sql_maria = "SELECT * FROM consultas WHERE Medico = 'Drª Maria Fonseca'";
$query_maria=mysqli_query($connection,$sql_maria);
$row3 = mysqli_fetch_array($query_maria);
$resultado_maria = mysqli_query($connection,$sql_maria);
 
?>  



      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" >Drª Maria Fonseca</a>
        <ul class="dropdown-menu">
<?php
            if(mysqli_num_rows($resultado_maria)>0){
?>
               <div class="table-responsive">          

                  <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>

                    <tr>
                      
                        <th class="t2">Médico</th>
                        <th class="t2">Especialidade </th>
                        <th class="t2">Data da Consulta</th>
                        <th class="t2">Hora da Consulta</th>
                    </tr>
                  </thead>
<?php
                  while($row3=mysqli_fetch_assoc($resultado_maria)){ 
?>      
                      <tr class="active">

                          <td class="t1"><?php echo $row3['Medico'];?></td>
                          <td class="t1"><?php echo $row3['Especialidade'];?></td>
                          <td class="t1"><?php echo $row3['DataConsulta'];?></td>  
                          <td class="t1"><?php echo $row3['HoraConsulta'];?></td>  

                      </tr>
<?php   

                    }
?>
                  </table>
              </div>



<?php           
                 }else echo"Este(a) medico(a) não tem consultas marcadas";
?>

        </ul>
      </li> 


      <img src="images/medico2.jpg" title="staff" />

</div>
<div class="col_1_of_3 span_1_of_3 frist">
  <strong class="t2">Consultas do Dr.Miguel C. Silva</strong><br><br>


<?php

$sql_miguel = "SELECT * FROM consultas WHERE Medico = 'Dr.Miguel C. Silva'";
$query_miguel =mysqli_query($connection,$sql_miguel);
$row4 = mysqli_fetch_array($query_miguel);
$resultado_miguel = mysqli_query($connection,$sql_miguel);
 

?>


      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" >Dr.Miguel C. Silva</a>
        <ul class="dropdown-menu">
<?php
            if(mysqli_num_rows($resultado_miguel)>0){
?>
               <div class="table-responsive">          

                  <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>

                    <tr>
                      
                        <th class="t2">Médico</th>
                        <th class="t2">Especialidade </th>
                        <th class="t2">Data da Consulta</th>
                        <th class="t2">Hora da Consulta</th>
                    </tr>
                  </thead>
<?php
                  while($row4=mysqli_fetch_assoc($resultado_miguel)){ 
?>      
                      <tr class="active">

                          <td class="t1"><?php echo $row4['Medico'];?></td>
                          <td class="t1"><?php echo $row4['Especialidade'];?></td>
                          <td class="t1"><?php echo $row4['DataConsulta'];?></td>  
                          <td class="t1"><?php echo $row4['HoraConsulta'];?></td>  

                      </tr>
<?php   

                    }
?>
                  </table>
              </div>




<?php           
                 }else echo"Este(a) medico(a) não tem consultas marcadas";
?>
        </ul>
      </li> 

      <img src="images/medico3.jpg" title="staff" style="width:200px;height:200px;" />




      </div>
</div>
