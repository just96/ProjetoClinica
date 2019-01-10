
		<?php

		$connection = mysqli_connect('localhost','root', '#Qwerty3', 'users');
			if (!$connection){
			die("Database connection failed: " . mysqli_connect_error());
		}

			$db_select = mysqli_select_db($connection, 'users');
			if (!$db_select) {
    		die("Database selection failed: " . mysqli_error($connection));
    	}

 
		?>
