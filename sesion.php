<?php
session_start();
	if(empty($_SESSION['usuario'])){
		session_start();
		session_destroy();
		header('location: login.php');
	}
	else {
		echo $_SESSION['usuario'];
	}
?>