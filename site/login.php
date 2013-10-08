<?php
	session_start();
	$user = $_POST['login'];
	$senha = $_POST['senha'];
	
	if($user != "" && $senha == "123") {
		$_SESSION['user'] = $user;
		header('Location: index.php');
	} else {
		$_SESSION['error'] = 1;
		header('Location: index.php');
	}
	
	
?>