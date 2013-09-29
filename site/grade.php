<?php

include './conexao.php';
$emissora = $_REQUEST['programaca'];

$sql = "SELECT programa.nome,cl.nome AS classificacao,g.nome AS genero,emissora.`nome` AS emissora,t.nome AS tipo,dataExibicao,horaExibicao FROM grade 
JOIN programa ON grade.fk_programa = programa.id LEFT JOIN
classificacaoetaria cl ON cl.id = programa.`fk_classificacao_id` LEFT JOIN
genero g ON g.id = programa.`fk_genero_id` LEFT JOIN tipo t ON t.id = programa.fk_tipo_id
LEFT JOIN emissora ON emissora.`id` = programa.`fk_emissora_id` WHERE emissora.id = ". $emissora ;

$result = mysql_query($sql);
$r = array();

while($row = mysql_fetch_array($result)) {
    $r[] = $row;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Grade de programação</title>
</head>
    <body>
        
        <h2>Lista de grade de programção</h2>
        
        <table border="1" border-collapse="collapse">
            <thead>
                <tr>
                <th>Programa</th>
                <th>Classificação</th>
                <th>Genero</th>
                <th>Emissora</th>
                <th>Tipo</th>
                <th>Data Exibição</th>
                <th>Hora Exibição</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($r as $r) { ?>
                <tr>
                    <td><?=$r['nome']?></td>
                    <td><?=$r['classificacao']?></td>
                    <td><?=$r['genero']?></td>
                    <td><?=$r['emissora']?></td>
                    <td><?=$r['tipo']?></td>
                    <td><?=$r['dataExibicao']?></td>
                    <td><?=$r['horaExibicao']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
        
    </body>
</html>
