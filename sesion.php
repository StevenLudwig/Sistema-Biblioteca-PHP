<?php
	session_start();
	
	if(empty($_SESSION['clavesocio'])) { 
		header('Location: index.php');
	} 
?>