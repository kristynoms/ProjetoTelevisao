
<?php

include 'conexao.php';

$nome= $_POST["nome"];
$genero = $_POST["genero"];
$sinopse = $_POST["sinopse"];
$classifica = $_POST["classifica"];
$emissora = $_POST["emissora"];
$tipo = $_POST["tipo"];





//Query que realiza a inserção dos dados no banco de dados na tabela indicada acima
$query = "INSERT INTO programa (id,nome,fk_genero_id,sinopse,fk_classificacao_id,fk_emissora_id,fk_tipo_id )
 
VALUES ('2','$nome','$genero','$sinopse','$classifica','$emissora','$tipo' )";


if(!mysql_query($query))

{
	echo "
	
	<script>
	
	alert('Erro ao Completar esta Operação!');history.go(-1);
	
	</script>
	
	";
}

else 

{
	 echo "<script>";
	 
	 echo "alert('Sucesso ao Completar a Operação!'); document.location.href='index.html'";
	 
	 echo "</script>";
}


?>


