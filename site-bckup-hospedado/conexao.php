<?php

if (!$conexao = mysql_connect('mysql.hostinger.com.br','u647327060_pjtr','123456')){
	
	echo "Erro ao conectar-se ao Servidor";
	
	exit();
}
	 
if(!mysql_select_db('u647327060_pjtr',$conexao)){
	echo "Erro ao Selecionar a Base de Dados";
	exit();
} 

	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');

?>