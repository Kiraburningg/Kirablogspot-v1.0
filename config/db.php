<?php
	define('ROOT_URL', 'http://localhost/kirablogspot/');
	
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'kirablogspotDB');
	
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(mysqli_connect_errno()){
		echo 'Failed to conenect to database' . mysqli_connect_errno();

	}


 ?>