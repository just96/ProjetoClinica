<?php

require("conectar_bd.php");

function getUsersData($id)
{
	$array = array ();
	$q = mysqli_query("SELECT * FROM `users` WHERE `id`=".$id);
	while($r = mysqli_fetch_assoc($q))
	{
		$array['id'] = $row ['id'];
		$array['username'] = $row ['username'];
		$array['Email'] = $row ['Email'];
		$array['Nome'] = $row ['Nome'];
		$array['DataNascimento'] = $row ['DataNascimento'];
		$array['BI_CC'] = $row ['BI_CC'];

	}
	return $array;
}