<?php 
	
	session_start();

	// echo "<pre>";
	// print_r($_SESSION);

	unset($_SESSION['admin_id']);
	session_unset();
	session_destroy();

	header("Location: ../home.php");

?>