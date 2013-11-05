
<?php

include 'conexao.php';

$nome= $_POST["nome"];
$genero = $_POST["genero"];
$sinopse = $_POST["sinopse"];
$classifica = $_POST["classifica"];
$emissora = $_POST["emissora"];
$tipo = $_POST["tipo"];

$dataExibicao = $_POST["dataExibicao"];
$horaExibicao = $_POST["horaExibicao"];
$horaExibicao2 = $_POST["horaExibicao2"];
$horaMinutos = $_POST['horasminutos'];
$horaMinutos2 = $_POST['horasminutos2'];

$date = str_replace('/', '-', $dataExibicao);
$date = date('Y-m-d', strtotime($date));



//Query que realiza a inserção dos dados no banco de dados na tabela indicada acima
$query = "INSERT INTO programa (nome,fk_genero_id,sinopse,fk_classificacao_id,fk_emissora_id,fk_tipo_id )
 
VALUES ('$nome','$genero','$sinopse','$classifica','$emissora','$tipo' )";

mysql_query($query);
$id = mysql_insert_id();

// Another query
$queryg = "INSERT INTO grade (fk_programa,dataExibicao,horaExibicao,horaTermino) VALUES (".$id.",'".$date."','".$horaExibicao.":".$horaMinutos."','".$horaExibicao2.":".$horaMinutos2."')";
mysql_query($queryg);

if(!mysql_error()) {
    header( 'Location: home.php' ) ;
}

?>


