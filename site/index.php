<?php
    include 'conexao.php';
    
    /* Emissoras */   
   $sql = "select * from emissora";
   $emisors = array();
   $emissoras = mysql_query($sql);
    while($row = mysql_fetch_array($emissoras)) {
            $emisors[ ] = $row; 
      }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Grade de programação</title>
</head>
    
<body>
    <h2>Escolha a programação que deseja assistir</h2>
    <ul><?php foreach($emisors as $e) { ?>
         <li><a href="grade.php?programaca=<?=$e['id']?>"><?=$e['nome']?></a></li>
          <?php } ?>
     </ul>   
</body>
</html>

