﻿<?php

include './conexao.php';
$emissora = $_REQUEST['programaca'];

$sql = "SELECT programa.nome AS programa ,cl.nome AS classificacao,g.nome AS genero,emissora.`nome`
 AS emissora,t.nome,programa.sinopse ,tipo.nome AS tipo,dataExibicao,horaExibicao,horaTermino FROM grade 
JOIN programa ON grade.fk_programa = programa.id  JOIN
classificacaoetaria cl ON cl.id = programa.`fk_classificacao_id`  JOIN
tipo ON tipo.id = programa.fk_tipo_id  JOIN
genero g ON g.id = programa.`fk_genero_id` LEFT JOIN tipo t ON t.id = programa.fk_tipo_id
 JOIN emissora ON emissora.`id` = programa.`fk_emissora_id` WHERE emissora.id =". $emissora ;


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
<title>TelevisionRecords</title>
<style type="text/css">
<!--
body {wadawd
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #4E5869;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Seletores de elementos/tag ~~ */
ul, ol, dl { /* Devido a variações entre navegadores, é recomendado zerar o padding e a margem nas listas. É possível especificar as quantidades aqui ou nos itens da lista (LI, DT, DD) que eles contêm. Lembre-se: o que você fizer aqui ficará em cascata para a lista de navegação a não ser que você escreva outro seletor mais específico. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* ao remover a margem superior, as margens podem escapar das suas containing div. A margem inferior restante vai mantê-la afastada de qualquer elemento que se segue. */
	padding-right: 15px;
	padding-left: 15px; /* adicionando o padding para os lados dos elementos dentro dos divs, ao invés dos próprios divs o livra de qualquer combinação de modelo de caixa. Um div aninhado com padding lateral também pode ser usado como método alternativo. */
}
a img { /* esse seletor remove a borda azul padrão exibida em alguns navegadores ao redor de uma imagem circundada por um link. */
	border: none;
}

/* ~~ A estilização dos links do seu site deve permanecer nesta ordem – incluindo o grupo de seletores que criam o efeito hover. ~~ */
a:link {
	color:#414958;
	text-decoration: underline; /* a não ser que você estilize seus links para que pareçam extremamente únicos, é melhor utilizar links sublinhados para uma identificação visual mais rápida. */
}
a:visited {
	color: #4E5869;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* esse grupo de seletores dará ao navegador que estiver usando um teclado a mesma experiência de hover do que uma pessoa usando um mouse. */
	text-decoration: none;
}

/* ~ esse contêiner envolve todos os outros divs dando a eles uma largura com base em porcentagem ~~ */
.container {
	width: 80%;
	max-width: 1260px;/* uma largura máxima pode ser desejável para evitar que esse layout fique muito largo num monitor grande. Isso torna o comprimento da linha mais legível. O IE6 não concorda com essa declaração. */
	min-width: 780px;/* uma largura mínima pode ser desejável para evitar que esse layout fique muito estreito. Isso torna o comprimento da linha mais legível nas colunas laterais. O IE6 não concorda com essa declaração. */
	background-color: #6F7D94;
	margin: 0 auto; /* o valor automático nos lados, combinado com a largura, centraliza o layout. Não é necessário definir a largura do contêiner para 100%. */
}

/* ~~o cabeçalho não tem uma largura definida. Ele pode ocupar toda a largura do layout. Possui um alocador de espaço de imagem que deve ser substituído pelo seu logotipo com link~~ */
.header {
	background-color: #6F7D94;
}

/* ~~ Essas são as colunas para o layout. ~~ 

1) O padding é posto somente na parte superior e inferior dos divs. Os elementos nesses divs têm padding nos seus lados impedindo o modelo tipo caixa. Lembre-se: ao adicionar qualquer padding lateral ou bordas para o próprio div, ele será adicionado à largura que você define para criar a largura *total*. Também é possível remover o padding no elemento dentro do div e estabelecer um segundo div dentro do primeiro, sem largura, e com o padding necessário para o seu design.

2) Como as colunas são todas flutuantes, não foi dada nenhuma margem. Se for necessário adicionar margem, evite colocá-la no lado flutuante, por exemplo, uma margem direita em um div definido para flutuar à direita. Em vez disso, muitas vezes, o padding é utilizado. Para os divs em que essa regra tem que ser quebrada, é necessário adicionar a declaração "display:inline" que irá solucionar um erro recorrente em algumas versões do Internet Explorer em que a imagem é duplicada.

3) Como as classes podem ser usadas diversas vezes em um documento e um elemento também pode ter várias classes aplicadas, foram atribuídas às colunas nomes de classe ao invés de IDs. Por exemplo, se for necessário, os divs com duas barras laterais podem ser empilhados. Se preferir, é possível alterar facilmente para os IDs desde que esteja usando-os somente uma vez em cada documento.

4) Caso prefira seu navegador à direita ao invés de à esquerda, simplesmente flutue essas colunas para a direção oposta, todas à direita ao invés de à esquerda, e elas irão processar na ordem inversa. Não há necessidade de mover os divs ao redor da fonte HTML.

*/
.sidebar1 {
	float: left;
	width: 50%;
	
	padding-bottom: 10px;
}
.content {
	padding: 10px 0;
	width: 80%;
	float: left;
	background-color:#6F7D94;
	color:#FFF;
}

/* ~~ Este seletor agrupado oferece as listas dentro do espaço da área de conteúdo.~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* esse padding espelha o padding direito nos cabeçalhos e regra de parágrafo acima. O padding foi colocado na parte inferior para obter espaço entre outros elementos das listas e à esquerda para criar o recuo. Estes podem ser ajustados como desejar. */
}

/* ~~ Os estilos de lista de navegação (podem ser removidos se for escolhido o uso de um submenu criado anteriormente, como o Spry) ~~ */
ul.nav {
	list-style: none; /* isso remove o marcador de lista */
	border-top: 1px solid #666; /* isso cria a borda da parte superior para os links – todos os outros são colocados usando uma borda na parte inferior no LI */
	margin-bottom: 15px; /* isso cria o espaço entre a navegação no conteúdo abaixo */
}
ul.nav li {
	border-bottom: 1px solid #666; /* isso cria a separação do botão */
}
ul.nav a, ul.nav a:visited { /* ao agrupar estes seletores, seus links mantêm a aparência de botão mesmo após terem sido visitados. */
	padding: 5px 5px 5px 15px;
	display: block; /* isso fornece as propriedades do bloco de links causando o preenchimento de todo o LI. Isso fará com que a área inteira responda ao clique do mouse. */
	text-decoration: none;
	background-color: #8090AB;
	color: #000;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /* isso altera o fundo e a cor do texto para navegação com o mouse ou teclado. */
	background-color: #6F7D94;
	color: #FFF;
}

/* ~~ O rodapé ~~ */
.footer {
	padding: 10px 0;
	background-color: #6F7D94;
	position: relative;/* isso possibilita que o hasLayout do IE6 faça a limpeza corretamente. */
	clear: both; /* essa propriedade de limpeza força o contêiner a reconhecer o conteúdo das colunas e onde elas terminam. */
}

/* ~~ flutuações diversas/limpeza de classes ~~ */
.fltrt {  /* essa classe pode ser usada para flutuar um elemento à direita da página. O elemento flutuado deve preceder o elemento e ser o próximo da página. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* essa classe pode ser usada para flutuar um elemento à esquerda da página. O elemento flutuado deve preceder o elemento e ser o próximo da página. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* essa classe pode ser colocada em um <br /> ou em um div vazio como o elemento final que segue o último div flutuado (no #contêiner) caso o rodapé seja removido ou retirado do contêiner. */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}

/*css global tabela*/
        .full_table_list{width: 200px;border-collapse: collapse; color:#000}
         
        /*colocando bordas nas linhas*/
        .full_table_list tr{border:1px black solid;}
         
        /*Definido cor das linhas pares*/
        .full_table_list tr:nth-child(even) {background: #06C}
         
        /*Definindo cor das Linhas impáres*/
        .full_table_list tr:nth-child(odd) {background: #CCC}       
-->
</style><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* essa margem negativa de 1px pode ser colocada em qualquer uma das colunas nesse layout com o mesmo efeito corretivo. */
ul.nav a { zoom: 1; }  /* a propriedade do zoom fornece ao IE o acionador de hasLayout necessário para corrigir o espaço extra em branco entre os links */
</style>
<![endif]--></head>

<body>

<div class="container">
  <div class="header" align="center">
    <p>TelevisionRecords</p>
    <p>&nbsp;</p>
  </div>
  <div class="sidebar1">
    <ul class="nav" >
      <li><a href="prog.php">Selecionar Programação</a></li>
      <li><a href="cadastroProgramacao.php">Cadastrar</a></li>      
   
    </ul>
    <!-- end .sidebar1 --></div>
  <div class="content">
     <h2>Lista de grade de programação</h2>
        
        <table width="692" border="1" class="full_table_list" border-collapse="collapse">
            <thead>
                <tr>
                
                <th>Programa</th>
                <th>Classificação</th>
                <th>Gênero</th>
                <th>Emissora</th>
                <th>Sinopse</th>
                <th>Tipo</th>
                <th>Data Exibição</th>
                <th>Hora Exibição</th>
                <th>Hora Término</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($r as $r) { ?>
                <tr style=" ">
					
					<?php 
					
					$data = date("d/m/Y", strtotime($r['dataExibicao']));
					?>
				
                    <td><?=$r['programa']?></td>
                    <td><?=$r['classificacao']?></td>
                    <td><?=$r['genero']?></td>
                    <td><?=$r['emissora']?></td>
                    <td><textarea name="a" cols="40" rows="4" readonly="readonly"><?=$r['sinopse']?></textarea></td>
                     <td><?=$r['tipo']?></td>
                    <td><?=$data?></td>
                    <td><?=$r['horaExibicao']?></td>
                    <td><?=$r['horaTermino']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <!-- end .content --></div>
  <div class="footer">
    <p align="center"> TelevisionRecords @2013</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
