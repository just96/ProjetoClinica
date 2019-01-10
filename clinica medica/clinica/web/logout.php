<?php
	session_start();
	
	// verifica se existe sessao do utiliador 

if (!isset($_SESSION['Utilizador']) && !isset($_SESSION['id']) ){

     header( "Location:index.php" );

 }
	session_destroy();
	unset($_SESSION['Utilizador']);
	unset($_SESSION['Password']);
	header("refresh:0;url=index.php");

?>