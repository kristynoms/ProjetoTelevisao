<?php
include('conexao.php');
	session_start();
	$user = $_POST['login'];
	$senha = $_POST['senha'];
	$logar = mysql_query("SELECT * FROM usuario WHERE login='$user' AND senha='$senha'") ;
	 $count = mysql_num_rows($logar);
	if($count >= 1) {
		$_SESSION['user'] = $user;
		header('Location: home.php');
	} else {
		$_SESSION['error'] = 1;
		header('Location: index.php');
	}
	
	
?>