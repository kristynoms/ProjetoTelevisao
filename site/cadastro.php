
<?php


$nome= $_POST["nome"];
$genero = $_POST["genero"];
$sinopse = $_POST["sinopse"];
$classifica = $_POST["classifica"];
$emissora = $_POST["emissora"];
$tipo = $_POST["tipo"];

$conexao = mysql_connect("localhost","root"); //essa linha irá fazer a conexão com o banco de dados.
if (!$conexao)
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());//aqui irei testar se houve falha de conexão


//conectando com a tabela do banco de dados
$banco = mysql_select_db("projetotr",$conexao); //nome da tabela onde os dados serão armazenados

//Query que realiza a inserção dos dados no banco de dados na tabela indicada acima
$query = "INSERT INTO 'programa' ('nome','fk_genero_id','sinopse','fk_classificacao_id','fk_emissora_id ','fk_tipo_id' ) 
VALUES ('$nome','$genero','$sinopse','$classifica','$emissora','$tipo' )";
mysql_query($query,$conexao);

echo "Seu cadastro foi realizado com sucesso!";

?>